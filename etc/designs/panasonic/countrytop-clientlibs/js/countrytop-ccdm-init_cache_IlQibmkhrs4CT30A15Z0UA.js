/** CCDM Ctt Common */
var GWCCttCcdm = GWCCttCcdm || {
	defaultTimeout : 3000,
	dpuTimeout : 3000,
	isSendGAMeta : false,
	isDPUMbox : function (mboxName) {
		return !!mboxName && mboxName.indexOf('dpu') > -1;
	},
	isHeroMbox : function (mboxName) {
		return !!mboxName && mboxName.indexOf('herovisual4ctt') > -1;
	},
	isTileAreaMbox : function (mboxName) {
		return !!mboxName && mboxName.indexOf('tilearea4ctt') > -1;
	},
	parseHtmlDeferred : $.Deferred()
};

/** No Results | Error */
$(document).on('at-embedded-noresult.gwc', function (e, params) {
	GWCCttCcdm.parseHtmlDeferred.promise().done(function () {
		GWCCttCcdm.eventNoResults(e, params);
	});
});

/** Hero - AT-Offer */
$(document).on('at-embedded.gwc', function (e, params) {
	GWCCttCcdm.parseHtmlDeferred.promise().done(function () {
		GWCCttCcdm.eventHero(e, params);
	});
});

/** Tile Area - AT-Offer */
$(document).on('at-embedded-tilearea.gwc', function (e, params) {
	GWCCttCcdm.parseHtmlDeferred.promise().done(function () {
		GWCCttCcdm.eventTileArea(e, params);
	});
});

/** Send GA when displaying Hero or Tile Area. */
$(document).on('launch-rt-handle.gwc', function (e, params) {
	GWCCttCcdm.parseHtmlDeferred.promise().done(function () {
		GWCCttCcdm.eventGA(e, params);
	});
});