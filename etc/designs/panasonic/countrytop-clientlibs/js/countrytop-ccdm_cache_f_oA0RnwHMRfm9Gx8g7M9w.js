/** Logger */
var GWCCttCcdmLogger = {
	debug: function(message) {
		if (console && typeof console.debug != "undefined") {
			console.debug(message);
		}
	}
};

/**
 * No Results / Error.
 */
GWCCttCcdm.eventNoResults = function (e, params) {
	GWCCttCcdmLogger.debug('[CTT] No Results event fired.');
	if (!params) {
		return;
	}

	var mboxName = params.mbox;

	if (GWCCttCcdm.isDPUMbox(mboxName)) {

		/* If there is no result in the Tile Area or an error occurs, the default will be displayed immediately. */
		GWCCttCcdm.exe.dpuExecuted();

	} else if (GWCCttCcdm.isHeroMbox(mboxName)) {

		/* No action required because it is handled by the Launch tag */

	} else if (GWCCttCcdm.isTileAreaMbox(mboxName)) {

		/* If there is no result in the Tile Area or an error occurs, the default will be displayed immediately. */
		var $mboxDiv = $(params.selector);
		executeDefaultOffer($mboxDiv);
	}
};

/**
 * Hero Visual - AT-Offer
 */
GWCCttCcdm.eventHero = function (e, params) {
	GWCCttCcdmLogger.debug('[CTT] Hero Visual event fired.');
	if (!params) {
		return;
	}
	var offerUrl = params.offer_url;
	var $heroAtContent = $(params.at_content);
	var showHero = function () {
		$heroAtContent.css('visibility', 'visible');
	};
	if (!!offerUrl && offerUrl.length > 0) {
		var heroOfferPath = $heroAtContent.closest('.keyvisualsection').find('.gwc-herovisualsection-settings').data('offer-basepath') + offerUrl;
		$.ajax({
			url: heroOfferPath,
			dataType: 'html',
			timeout: GWCCttCcdm.defaultTimeout
		}).done(function (data) {
			var kv = $(data).find(".keyvisualdata");
			if (kv && kv.length > 0) {
				$heroAtContent.html(kv);
				$('.keyvisualdata .modalvideo-link').each(function(index, element){ 
			        ModalWindow.implement(element);
			    });
			}
		}).fail(function (errorThrown) {
			GWCCttCcdmLogger.debug('[CTT] *ERROR* Hero Visual');
			GWCCttCcdmLogger.debug(errorThrown);
		}).always(function () {
			showHero();
		});
	} else {
		/* Show default hero */
		showHero();
	}
};

/**
 * Tile Area - AT-Offer
 */
GWCCttCcdm.eventTileArea = function (e, params) {
	GWCCttCcdmLogger.debug('[CTT] Tile Area Offer event fired.');
	if (!params) {
		return;
	}

	var $tileArea = $(params.at_content).closest('.visualpanels');

	params.offer_url = $tileArea.find('.gwc-tilearea-settings').data('offer-basepath') + params.offer_url;

	executeOffer($tileArea, $(params.at_content).parent().attr('id'), params, true);
};

/**
 * Send GA when displaying Hero or Tile Area.
 */
GWCCttCcdm.eventGA = function (e, params) {

	// GA is sent only once.
	if (!GWCCttCcdm.isSendGAMeta) {

		var mboxName = params.mbox;
		var meta = params.ttMETA;
		
		// Set value to 'Default' if the user has no category affinity
		var categoryAffinity = meta['profile.categoryAffinity'] ? meta['profile.categoryAffinity'] : 'Default';
		var experienceName = meta['experience.name'] || '';
		var activityName = meta['activity.name'] || '';
		
		// Send GA when displaying Hero or Tile Area dynamically.
		if (GWCCttCcdm.isHeroMbox(mboxName) || GWCCttCcdm.isTileAreaMbox(mboxName)) {
			
			if (categoryAffinity.length > 0
					&& experienceName.length > 0
					&& activityName.length > 0) {
				
				if (typeof _globalDataLayer !== 'undefined') {
					_globalDataLayer.push({
						event: 'ctt.sendCustomDimension',
						activityName: activityName,
						categoryAffinity: categoryAffinity,
						experienceName: experienceName
					});

					// Sending GA was done.
					GWCCttCcdm.isSendGAMeta = true;
				}
			}
		}
	}
};

/**
 * @param $tileFrame Tile frame to add Tile HTML snippet
 * @param tileType Tile Type (dpu / recs / normal)
 * @param tileHtml Tile HTML snippet
 * @param isDpu Set to true if the tile specified in the parameters is DPU.
 */
var setTile = function ($tileFrame, tileType, tileHtml, isDpu) {
	// set tile to html
	$tileFrame.html(tileHtml);
	$tileFrame.attr('data-tile-set', 1);
	$tileFrame.attr('data-tile-type', tileType);
	// Add join action
	if (isDpu) {
		$tileFrame.find('a').on('click', function () {
			if (typeof DynamicContentController !== 'undefined') {
				DynamicContentController.clickJoinNow();
			}
		});
	} else {
		ModalWindow.implement($tileFrame.find(".modalvideo-link"));
	}
	// Lazy Load
	GWCLazyLoad.lazyload({}, $tileFrame);
};

/** create Tile HTML from Tile Data */
var createTileHtml = function ($tileInfo, mboxId, tilesize) {
	var tileareaSettings = $('#' + mboxId).closest('.visualpanels').find('.gwc-tilearea-settings');

	var $tileHtml = $tileInfo.find('div[data-tile-size="' + tilesize + '"] a');
	if ($tileHtml.length <= 0) {
		return;
	}
	// Drop Shadow Effect
	if (tileareaSettings.data('tile-class-dropshadow') != '') {
		// If the drop shadow effect setting of each tile is 'notSpecified' or not set, apply the setting of the tile area.
		if (!$tileInfo.find('.visualpanels__item').data('tile-dropshadow')) {
			$tileHtml.find('.visualpanels__item__tx').addClass(tileareaSettings.data('tile-class-dropshadow'));
		}
	}
	var $itemImg = $tileHtml.find('.visualpanels__item__img');

	// Copy Guard
	// reset copyguard in advance.
	$itemImg.removeClass('img-copyguard');
	if (tileareaSettings.data('use-copyguard')) {
		$itemImg.addClass('img-copyguard');
	}

	// Color Bar
	if (tileareaSettings.data('display-colorbar')) {
		$tileHtml.find('.visualpanels__item__tx').addClass('colorbar');
	}
	return $tileHtml;
};

/**
 * Get DPU Offer and Set the first DPU frame to it.
 * 
 * @param dpuOfferPath The path of DPU offer.
 */
var setDpuTile = function (dpuOfferPath) {
	if (GWCCttCcdm.exe.executed) {
		// No DPU is inserted since the offer has already been executed.
		return;
	}
	if (!dpuOfferPath) {
		GWCCttCcdm.exe.dpuExecuted();
		return;
	}
	// Target only the first tile.
	var $target = $('.visualpanels__item[data-tile-type="dpu"]:first');
	$.ajax({
		url: dpuOfferPath,
		dataType: 'html',
		timeout: GWCCttCcdm.defaultTimeout
	}).done(function (data) {
		var mboxId = $target.closest('.visualpanels').find('.mbox > div').attr('id');
		var $tileHtml = createTileHtml($(data).find('.visualpanels__container'), mboxId, 4);
		if (!!$tileHtml) {
			// tile-type='dpu'
			setTile($target, $target.data('tile-type'), $tileHtml, true);
			var tile = {};
			tile.headline = $(data).find('a > .visualpanels__item__tx > .visualpanels__item__tx__in > .visualpanels__item__tx__header').text();
			$(document).triggerHandler('show-dc.ctt.gwc', tile);	/* added for GA(GTM) tracking. */
		}
	}).fail(function () {
		if ($target.data('tile-set') == 1 && $target.data('tile-fixed') == 1) {
			// show DPU alternative tile
			$target.show();
		}
		GWCCttCcdmLogger.debug('[CTT] *ERROR* Tile Area DPU');
	}).always(function () {
		GWCCttCcdm.exe.dpuExecuted();
	});
};

/** Tile Offer List */
var $tileOfferList = [];

var TileOfferItem = function (tileData) {
	this.isSet = false;
	this.type = $(tileData).find('.visualpanels__item').data('tile-type');
	this.data = $(tileData).find('.visualpanels__item').data('tile-type') == 'recs' ? '' : $(tileData);
}

/** Execute Offer Process */
var executeOffer = function ($tileArea, mboxId, params, failover) {

	// create tile Offer List for Zone
	$tileOfferList[mboxId] = [];

	$.ajax({
		url: params.offer_url,
		dataType: 'html',
		timeout: GWCCttCcdm.defaultTimeout
	}).done(function (data) {
		var opts = {
			$target: $tileArea,
			data: data,
			mboxId: mboxId,
			params: params
		}

		GWCCttCcdm.exe.poolOrExecSetOffer(setOfferData, opts)
	}).fail(function (errorThrown) {
		if (failover) {
			GWCCttCcdmLogger.debug('[CTT] *ERROR* Tile Area AT-Offer');
			// set Default Tile to Tile frame
			setDefaultTile($tileArea, mboxId, params);
		}
	}).always(function () {
		// nothing to do.
	});
};

/** Execute Default Offer Process */
var executeDefaultOffer = function ($mboxDiv) {

	var params = {
		offer_url: $mboxDiv.find(".gwc-tile-offer-default").data("offer-path"),
		at_content: $mboxDiv.find(".at-content")
	};

	executeOffer($mboxDiv.closest('.visualpanels'), $mboxDiv.attr('id'), params, false);
};

/**
 * Sets a tile frame to a tile in the offer.
 * 
 */
var setOfferData = function (opts) {
	// set All Tile Data to Tile Offer List
	$.each($(opts.data).find('.visualpanels__container'), function (i, tileData) {
		$tileOfferList[opts.mboxId].push(new TileOfferItem(tileData));
	});
	// set Tile in Tile Offer List to Tile frame
	setOfferTile(opts.$target, opts.mboxId, !!!opts.params.product_urls);
	// fire AT-Recs
	if (!!opts.params.product_urls) {
		sendRequestRecs(opts.$target, opts.mboxId, opts.params.product_urls);
	}
};

/** set Default Offer Tile */
var setDefaultTile = function ($target, mboxId, params) {
	$.ajax({
		url: $(params.at_content).find('.gwc-tile-offer-default').data('offer-path'),
		dataType: 'html',
		timeout: GWCCttCcdm.defaultTimeout
	}).done(function (data) {
		var opts = {
			$target: $target,
			data: data,
			mboxId: mboxId,
			params: params
		}
		// setOfferData($target, data, mboxId, params);
		GWCCttCcdm.exe.poolOrExecSetOffer(setOfferData, opts)
	}).fail(function () {
		GWCCttCcdmLogger.debug('[CTT] *ERROR* Tile Area AT-Offer (Default)');
	})
};

/**
 * Sets a tile frame to the tile in the tile offer. 
 * 
 * @param $tileArea tile area  
 * @param mboxId mbox id
 * @param isRecsCompleted  
 */
var setOfferTile = function ($target, mboxId, isRecsCompleted) {
	$.each($tileOfferList[mboxId], function (i, tileOfferItem) {
		if (tileOfferItem.isSet) {
			return;
		}
		// skip Recs Tile if return all Recs responce
		if (isRecsCompleted && tileOfferItem.type == 'recs' && tileOfferItem.data == '') {
			tileOfferItem.isSet = true;
			return;
		}
		var tileData = tileOfferItem.data
		if (tileData != '') {				
			if (tileData.find('.visualpanels__item a').length > 0) {
				var $tileFrame = $target.find('.visualpanels__item[data-tile-set="0"]:first');
				var $tileHtml = createTileHtml(tileData, mboxId, $tileFrame.data('tile-size'));
				if (!!$tileHtml) {
					setTile($tileFrame, tileOfferItem.type, $tileHtml, false);
				}
			}
			tileOfferItem.isSet = true;
			return;
		} else {
			return false;
		}
	});
};

/** Tile Area - AT-Recs */
var sendRequestRecs = function ($target, mboxId, productUrlList) {
	GWCCttCcdmLogger.debug('[CTT] Tile Area Recs event fired.');
	if (productUrlList.length == 0) {
		return;
	}
	// create path check list
	var doubleCheckPathList = [];
	// Path in Tile frame
	$.each($target.find('.visualpanels__item'), function (i, item) {
		if (!!$(item).find('a')) {
			doubleCheckPathList.push($(item).find('a').attr('href'));
		}
	});
	// Path in Tile Offer List
	$.each($tileOfferList[mboxId], function (i, item) {
		if (!!$(item.data).find('a')) {
			doubleCheckPathList.push($(item.data).find('a').attr('href'));
		}
	});

	var recsItemList = [];
	var RecsItem = function (isSet, data) {
		this.isSet = isSet;
		this.data = data;
	}
	var setRecsTileData = function (isRecsCompleted) {
		// set Recs Tile to Tile Offer List
		$.each(recsItemList, function (i, recsItem) {
			// Break if no responce
			if (!recsItem) {
				return false;
			}
			// Skip if already set to Tile Offer List
			if (recsItem.isSet) {
				return;
			}
			// Skip if path is duplicated
			if (doubleCheckPathList.indexOf($(recsItem.data).find('a').attr('href')) > -1) {
				recsItem.isSet = true;
				return;
			}
			$.each($tileOfferList[mboxId], function (i, tileOfferItem) {
				if (tileOfferItem.type == 'recs' && tileOfferItem.data == '') {
					tileOfferItem.data = recsItem.data;
					recsItem.isSet = true;
					return false;
				}
			})
		})
		setOfferTile($target, mboxId, isRecsCompleted);
	}

	var recsCount = 0;
	$.each(productUrlList, function (i, product_url) {
		GWCCttCcdmLogger.debug('[CTT] produtUrl=' + product_url);
		/* Recs data has multiple language pages, so the url that must be requested is regarded as displayed language's page. */
		var regionalProductUrl  = GwcCommon.toRegionalUrl(product_url);
		GWCCttCcdmLogger.debug('[CTT] regionalProductUrl=' + regionalProductUrl);
		var isRecsCompleted = false;
		$.ajax({
			url: regionalProductUrl,
			dataType: 'html',
			timeout: GWCCttCcdm.defaultTimeout
		}).done(function (data) {
			GWCCttCcdmLogger.debug('[CTT] recs-data#' + i);
			recsItemList[i] = new RecsItem(false, $($(data).find('.visualpanels__container')[0]));
		}).fail(function () {
			GWCCttCcdmLogger.debug('[CTT] *ERROR* Tile Area AT-Recs');
			recsItemList[i] = new RecsItem(true, '');
		}).always(function () {
			recsCount++;
			if (recsCount == productUrlList.length) {
				// return all Recs responce
				isRecsCompleted = true;
			}
			setRecsTileData(isRecsCompleted);
		});
	});
};

/** EXECUTOR */
var OfferExecutor = function (usePool) {
	this.funcs = [];
	this.usePool = usePool;
	this.executed = false;
};

OfferExecutor.prototype = {
	// Add function that getting offer and recs
	poolOrExecSetOffer: function (func, opts) {
		if (this.executed || !this.usePool) {
			func(opts);
		} else {
			this.funcs.push({ func: func, opts: opts });
		}
	},
	// Run function that getting offer and recs
	dpuExecuted: function () {
		if (this.executed) {
			return false;
		}

		var fs = this.funcs;
		for (var i = 0; i < fs.length; i++) {
			fs[i]['func'](fs[i]['opts']);
		}

		// release func to do GC
		this.funcs = [];
		this.executed = true;

		return true;
	}
};

!function ($) {

	/*-------------------------------------------
	   Run CCDM function after page is loaded.
	-------------------------------------------*/

	// DPU is set and DPU tile exists.
	var hasDPU = $('.visualpanels__item[data-tile-type="dpu"]').length && $('#dynamic-popup-data').length > 0;

	GWCCttCcdm.exe = new OfferExecutor(hasDPU);

	var execBytimeout = function () {
		GWCCttCcdm.exe.dpuExecuted();
	}
	setTimeout(execBytimeout, GWCCttCcdm.dpuTimeout);

	/** Tile Area - AT-DPU (at-embedded-dpu.gwc) */
	GWCCookieManager.TargetingCookies.optedIn(function() {
		if (typeof DynamicContentController !== 'undefined' && DynamicContentController.isOfferAcceptance()) {
			DynamicContentController.embeddedOfferContent().done(function(offerContentJson) {
				setDpuTile(offerContentJson.offerUrl.replace(/offer.html/g, 'ctttile.html'));
			});
		} else {
			GWCCttCcdm.exe.dpuExecuted();
		}
	}).optedOut(function() {
		GWCCttCcdm.exe.dpuExecuted();
	});

	/** Run no-targeting tiles */
	$(".visualpanels .tilearea4ctt[data-mbox-enabled='0']").each(function (i, mboxDiv) {
		var $mboxDiv = $(mboxDiv);
		executeDefaultOffer($mboxDiv);
	});

	/*
	 * If Launch Script cannot be loaded due to reasons such as Auto-Blocking, the Tile Area will be displayed in the default offer.
	 * Since the DPU cannot be returned, it will be handled as the executed state.
	 */
	if (!GwcCommon.isLaunchScriptLoaded()) {
		$(".visualpanels .tilearea4ctt[data-mbox-enabled='1']").each(function (i, mboxDiv) {
			var $mboxDiv = $(mboxDiv);
			executeDefaultOffer($mboxDiv);
			GWCCttCcdm.exe.dpuExecuted();
		});
	}

	// HTML has been parsed.
	// (This JS is read by defer option.)
	GWCCttCcdm.parseHtmlDeferred.resolve();
}(jQuery);