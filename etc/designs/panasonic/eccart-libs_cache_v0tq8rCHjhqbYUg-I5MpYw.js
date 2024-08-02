jQuery(function($){
	if(!$.support.opacity && $('.product-box-in .buy-btn .btn-blue').length){
		$(window).on('load',function(e){
			$('.product-box-in .buy-btn .btn-blue').each(function(index, element) {
				$(this).addClass('ie8');
			});
		});
	}
	
	var usercart = function(){
		this.init = function(){
			eventCart();
			eventBuyBtn();
		}
		var container = $('#userbar-cart');
		var cartlist = $('#userbar-cartlist');
		/* add start */
		cartlist.on('noticecart.ec', showhideCartlist);
		/* add end */
		var apiscroll;
		var timerId = setTimeout('',0);
		function eventCart(){
			if(container.children('a').hasClass('noitem')){
				container.children('a').find('.num').hide();
			} else if(container.hasClass('onloadopen')) {
				if(document.readyState === 'complete'){
					setTimeout(showhideCartlist, 200);
				}else{
					$(window).on('load',function(e){
						setTimeout(showhideCartlist,200);
					});
				}
			}
			container.children('a').on('click tap', function(e){
				e.preventDefault();
				if(!$(this).hasClass('noitem')){
					if(cartlist.hasClass('opened')){
						hideCartlist();
					}else{
						showCartlist();
					}
				}
			});
			if(!$('html').hasClass('touch-device') && $('#page').css('min-width') != '320px'){
				cartlist.hover(
					function(){
						clearTimeout(timerId);
					},
					function(){
						if(cartlist.hasClass('opened')){
							hideCartlist();
						}
					}
				);
			}
			cartlist.on('keydown', function(event){
				if ( event.which == 9 ) {
					var o = $(this).find('*');
					var focusableItems;
					focusableItems = o.filter(focusableElementsString).filter(':visible')
					var focusedItem;
					focusedItem = jQuery(':focus');
					var numberOfFocusableItems;
					numberOfFocusableItems = focusableItems.length
					var focusedItemIndex;
					focusedItemIndex = focusableItems.index(focusedItem);
					if (event.shiftKey) {
						if(focusedItemIndex==0){
							if(cartlist.hasClass('opened')){hideCartlist();container.children('a').focus();}
							event.preventDefault();
						}
					} else {
						if(focusedItemIndex==numberOfFocusableItems-1){
							if(cartlist.hasClass('opened')){hideCartlist();container.children('a').focus();}
							event.preventDefault();				
						}
					}
				}
			});
		}
		function showCartlist(callback){
			cartlist.addClass('opened');
			cartlist.slideDown(500,function(){
				if(callback){
					callback();
				}
			});
			scrollbar();
		}
		function hideCartlist(){
			cartlist.slideUp(500,function(){
				if(apiscroll && cartlist.find('.jspContainer').length){
					apiscroll.destroy();
					cartlist.find('.cartlist-table').height('auto');
				}
				cartlist.removeClass('opened');
			});
		}
		function showhideCartlist(){
			showCartlist(function(){
				timerId = setTimeout(hideCartlist, 3000);
			});
		}
		function scrollbar(){
			if(cartlist.hasClass('forcountrytop')){
				return this;
			}
			if(!$('html').hasClass('touch-device') && $('#page').css('min-width') != '320px'){
				var _h = cartlist.find('.cartlist-table table').outerHeight();
				if(_h > 330){
					cartlist.find('.cartlist-table').height(330);
					apiscroll =  cartlist.find('.cartlist-table').eq(0).jScrollPane({
						autoReinitialise : true,
						mouseWheelSpeed : 20
					}).data('jsp');
				}else{
					//cartlist.find('.cartlist-table').css('height') = _h + 'px';
				}
			}
		}
		function eventBuyBtn(){
			/* GWC mod start */
			$(document).on('click', '#browsebar-buy a.cart-direct, .product-box-in .buy-btn .btn-blue:not(.inc-options), .product-box-in .buy-btn .btn-white, #ChooseProduct .ChooseProduct_entry_etc_inner_block .ec-part .buy-btn a.btn-blue, .common-productbox-btns__buy__in > a:not(.inc-options), .cmp-comparison__produnct-shop-btn > a, .buybtn a.cart-direct', function(e){
				$(this).trigger('click:buy-btn.ec');
			/* GWC mod end */
				const multiple = $(this).hasClass('multiple');
				/* add start */
				const selectorId = $(this).attr('data-selector-id');
				/* add end */
				if($(this).attr('href')){
					if($(this).attr('href').match(/javascript*|#/)){
						e.preventDefault();
						/* mod start */
						buyWin(multiple, selectorId);
						/* mod end */
						return;
					}
				}else{
					e.preventDefault();
					/* mod start */
					buyWin(multiple, selectorId);
					/* mod end */
					return;
				}
			});
		}
		/* mod start */
		function buyWin(_multiple, selectorId){
		/* mod end */
			/* add start */
			var $lightbox = $('body').find('#lightbox-overlay');
			var existLightbox = ($lightbox.length != 0);
			/* add end */
			var buywin_wrapper, btnClose;
			focusedElementBeforeModal = jQuery(':focus');
			overlayset().done(function(){
				/* mod start */
				if (existLightbox) {
					$lightbox.find("#buywindow").remove();
					$lightbox.find('#buywindow-bg').append('<div id="buywindow"></div>');
				} else {
					$lightbox = $('#lightbox-overlay');
					$lightbox.append('<div id="buywindow-wrapper" role="dialog"><div id="buywindow-bg"><a href="#" class="btn-close"><img src="/etc/designs/panasonic/eccart-clientlibs/images/btn-lightbox-close.png" alt="Close"></a><div id="buywindow"></div></div></div>');
				}
				/* mod end */
				buywin_wrapper = $('#buywindow-wrapper');
				btnClose = buywin_wrapper.find('.btn-close');
				buyContent().then(() => {
					buywin_wrapper.find('.buymenu__products-selector__ui').mousedragscrollable();
         			var activeTab = $(opener).data('opentab');
					onlineIframeSize();
				  buyTabs(activeTab);
					/* add start */
					if (selectorId) {
						var $baseRoot = $('#' + selectorId);

						var $selectorList4P = buywin_wrapper.find('#buymenu_buyfrompanasonic .buymenu__products-selector__ui .buymenu__products-selector__list');
						$selectorList4P.children().remove();
						$selectorList4P.append($baseRoot.find('.buymenu2-products-selector-list-p').children().clone(true));

						var $selectorList4O = buywin_wrapper.find('#buymenu_buyfromonline .buymenu__products-selector__ui .buymenu__products-selector__list');
						$selectorList4O.children().remove();
						$selectorList4O.append($baseRoot.find('.buymenu2-products-selector-list-o').children().clone(true));

						buywin_wrapper.find('.buymenu__products-selector__ui').attr('data-replaced-by-component', 'true');
					}
					/* add end */
					productsSelector();
					$('#lightbox-overlay').fadeIn({
						/* add start */
						start: function(){
							$('#buywindow').trigger('buymenuready.ec');
							if (!_multiple) {
								buywin_wrapper.find('.buymenu__products-selector__ui').remove();
							} else {
								var selectedTab = $lightbox.attr('selectedTab');
								if (selectedTab) {
									if($('#page').css('min-width')=='320px') {
										var $tabSelect = $lightbox.find('#buywindow .tabnavigation-mob .tabs-menu-select-mob');
										if ($tabSelect.find('option[value=' + selectedTab + ']').length > 0) {
											$tabSelect.val(selectedTab).change();
										}
									} else {
										$lightbox.find('.ui-tabs-nav li[aria-controls=' + selectedTab + '] a').click();
									}
								}
								var checkedIndex = $lightbox.attr('checkedIndex');
								if (checkedIndex) {
									$lightbox.find('#buymenu_buyfrompanasonic .item-btn[data-target-product-index=\'' + checkedIndex + '\'],#buymenu_buyfromonline .item-btn[data-target-product-index=\'' + checkedIndex + '\']').prop('checked', true);
								} else {
									$lightbox.find('#buymenu_buyfrompanasonic .item-btn:eq(0),#buymenu_buyfromonline .item-btn:eq(0)').prop('checked', true);
								}
								var scrollPosition = $lightbox.attr('scrollPosition');
								if (scrollPosition) {
									$lightbox.find('.buymenu__products-selector__ui').scrollLeft(scrollPosition);

									if($('#page').css('min-width')=='320px') {
										var notSelectedTabId = (selectedTab === '1') ? 'buymenu_buyfrompanasonic' : 'buymenu_buyfromonline';
										var notSelectValue = (selectedTab === '1') ? '0' : '1';
										var $tabSelect = $lightbox.find('#buywindow .tabnavigation-mob .tabs-menu-select-mob');
										var $target = $lightbox.find('#' + notSelectedTabId);
										$tabSelect.on('change.buymenu2', function() {
											if (notSelectValue === $tabSelect.find('option:selected').val()) {
												$tabSelect.off('change.buymenu2');
												var timerId = setInterval(function() {
													if ($target.css('display') !== 'none') {
														clearInterval(timerId);
														$target.find('.buymenu__products-selector__ui').scrollLeft(scrollPosition);
													}
												}, 2);
											}
										});
									} else {
										var notSelectedTabId = (selectedTab === 'buymenu_buyfromonline') ? 'buymenu_buyfrompanasonic' : 'buymenu_buyfromonline';
										var $notSelectedTab = $lightbox.find('.ui-tabs-nav .ui-tabs-tab[aria-controls=' + notSelectedTabId + ']');
										var $target = $lightbox.find('#' + notSelectedTabId);
										$notSelectedTab.one('click', function() {
											var timerId = setInterval(function() {
												if ($target.css('display') !== 'none') {
													clearInterval(timerId);
													$target.find('.buymenu__products-selector__ui').scrollLeft(scrollPosition);
												}
											}, 2);
										});
									}
								}
							}
						},
						/* add end */
						done:function(){
							/* mod start */
							if ($(this).is(':not(:has(.ec-wait-overlay))')) {
								setInitialFocusModal($(this));
							}
							/* mod end */
							$(this).keydown(function(event){trapTabKey($(this),event);});
							contentEvents();
							onlineContentEvents();
						}
					});
				});
				/* GWC mod start */
				if (existLightbox) {
					return;
				}
				/* GWC mod end */
				btnClose.click(function(e) {
					if($(this).hasClass('success') && (container.hasClass('onloadopen') /* add start */ || (!!EC && !!EC.settings && EC.settings.auto_basket_close_buymenu) /* add end */ )){
						closeBox(showhideCartlist);
					}else{
						closeBox();
					}
					return false;
				});
				buywin_wrapper.on('click','.btn-cookieok a', function(e){
					e.preventDefault();
					$(this).closest('.btn-addCart').removeClass('nocookie');
					$('#notescookies').slideUp();
					$('#notescookies-rwd').slideUp();
					/* add start */
					if ("CookiePolicy" in window && $.isFunction(CookiePolicy.onclick)) {
						CookiePolicy.onclick(0);
					}
					if ("GwcCommon" in window && "cookiePolicyOptIn" in GwcCommon) {
						GwcCommon.cookiePolicyOptIn.resolve();
					}
					/* add end */
				});
			});
			
			function closeBox(_callback){
				$('#lightbox-overlay').fadeOut(function(){
					overlayRemove();
					focusedElementBeforeModal.focus();
					if(_callback){
						if($('#page').css('min-width')==='320px'){
							$(window).scrollTop(0);
						}
						_callback();
					}
				});
			}
			function buyContent(){
				return new Promise((resolve, reject) => {
					var _content = $('#buywindow-element').html();
					$('#buywindow').html(_content);
					resolve();
				});	
				/* add start */
				$('#buywindow').on('buymenuadjustsize.ec', function() {
					if($('#page').css('min-width')=='320px') onlineIframeSize();
					sizeSetting();
					scrlboxSize();
				});
				/* add end */
			}
			function buyTabs(activeTab){
				var _tabs = $('#buywindow').find('.buymenu_tabs');
				var _mobTab = $('#buywindow').find('.tabnavigation-mob');
        var _active = (activeTab && $('#' + activeTab).length) ? $('#' + activeTab).index() : 0;
				_tabs.tabs({
          active: _active,
					activate: function( event, ui ) {
						onlineIframeSize();
					},
					/* add start */
					active: $('ul li.default-select', _tabs).length > 0 ? $('ul li.default-select', _tabs).index() : 0
					/* add end */
				});
				if($('#page').css('min-width')=='320px'){
					/* mod start */
					/*
					_mobTab.find('.tabs-menu-text').text(_mobTab.find('.tabs-menu-select-mob option').eq(0).text());
					*/
					_mobTab.find('.tabs-menu-text').text(_mobTab.find('.tabs-menu-select-mob option:selected').text());
					/* mod end */
					_mobTab.find('.tabs-menu-select-mob').on('change',function(){
						/* mod start */
						/*
						_tabs.tabs('option', 'active', $(this).val());
						*/
						_tabs.tabs('option', 'active', $(this).prop('selectedIndex'));
						/* mod end */
						/* mod start */
						/*
						_mobTab.find('.tabs-menu-text').text(_mobTab.find('.tabs-menu-select-mob option').eq($(this).val()).text());
						*/
						_mobTab.find('.tabs-menu-text').text(_mobTab.find('.tabs-menu-select-mob option:selected').text());
						/* mod end */
					});
				}
			}
			function onlineIframeSize(){
				$('#buywindow #buymenu_buyfromonline').find('.retailers iframe').each(function(index, element) {
					/* mod start */
					var bodyElement = $(this).contents().find('body').get(0);
					if (bodyElement) {
						$(this).height('auto');
    					var _bH = bodyElement.offsetHeight;
    					$(this).height(_bH);
					}
					/* mod end */
				});
			}

			//products selector
			function productsSelector(){
				buywin_wrapper.find('.buymenu__products-selector').each((i, v) => {
					const id = $(v).attr('id'),
					idx = i,
					$ui =	$(v).find('.buymenu__products-selector__ui'),
					$panel = $(v).find('.buymenu__products-selector__panel'),
					$items = $(v).find('.buymenu__products-selector__list__item .item-btn'),
					checkedValue = () => {
						let val;
						$items.filter(function(i, elm){
							if($(elm).is(':checked')){
								val = $(elm).val();
							}
						});
						return val;
					};
					if($items.length <= 1) {
						$ui.remove();
						$panel.removeAttr('aria-live').removeAttr('aria-atomic');
						return;
					}
					$panel.attr('id', id + '-products-selector-' + idx);
					$items.each((i, item) => {
						$(item).attr({
							'name': id + '-selector',
							'aria-controls': $panel.attr('id'),
						});
					}).on('change', (e) => {
            
						/* change product */
						$panel.empty();
						$panel.html(checkedValue());
						if(id === 'buymenu') {
							contentEvents();
						}
						if(id === 'buymenu_buyfromonline') {
							onlineContentEvents();
						}
            
					});
				});
			}

			//fromPanasonicContentEvents
			function contentEvents(){
				var _bw = buywin_wrapper.find('#buywindow');
				var _bm = _bw.find('#buymenu');
				var _bs = _bw.find('#buysuccess');
				var _buymenuCaptionMore =_bm.find('.buymenu-caption-moreinfo-detail');
				var _shippingDetail = _bm.find('.shipping-detail');
				var _enegyDetail = _bm.find('.buymenu-energylable-detail');
				/* del */
				// var _enegyTop = _bm.find('.buymenu-product-name').outerHeight() + parseInt(_bm.find('.buymenu-product-name').css('margin-bottom'),10) + 20;
				// mod start
				/*
				_bm.find('form').on('submit',function(e){
				*/
				_bm.find('form').on('submit cartadded.gwc',function(e){
				// mod end
					formsubmit();
					return false;
				});
				_bm.find('.btn-addCart > a').on('click', function(e){
					if(!$(this).hasClass('outoforder')){
						_bm.find('form').submit();
					}
					return false;
				});
				if($('html').hasClass('touch-device')){
					_bm.find('.buymenu-caption.pcfix .buymenu-caption-moreinfo span').on('click tap', function(){
						if($(this).find('.buymenu-tooltips').length){
							baloonHide(this);
						}else{
							var content = '<div class="buymenu-tooltips-content">'+_buymenuCaptionMore.html()+'</div>';
							baloonShow(this,content,0,0,342,300,30);
						}
					});
					_bm.find('.shipping.pcfix > span').on('click tap', function(){
						if($(this).find('.buymenu-tooltips').length){
							baloonHide(this);
						}else{
							var content = '<div class="buymenu-tooltips-content">'+_shippingDetail.html()+'</div>';
							baloonShow(this,content,60,0,322,280);
						}
					});
				}else{
					_bm.find('.buymenu-caption.pcfix .buymenu-caption-moreinfo span').hover(
						function(e){
							var content = '<div class="buymenu-tooltips-content">'+_buymenuCaptionMore.html()+'</div>';
							baloonShow(this,content,0,0,342,300,30);
						},
						function(e){
							baloonHide(this);
						}
					).on('click',function(e){
						e.preventDefault();
					});
					_bm.find('.shipping.pcfix > span').hover(
						function(e){
							var content = '<div class="buymenu-tooltips-content">'+_shippingDetail.html()+'</div>';
							baloonShow(this,content,60,0,322,280);
						},
						function(e){
							baloonHide(this);
						}
					).on('click',function(e){
						e.preventDefault();
					});
				}
				//mobile
				_bm.find('.buymenu-caption.rwd .buymenu-caption-moreinfo a').on('click tap',
					function(e){
						_buymenuCaptionMore.slideToggle(200);
						$(this).toggleClass('opened');
					});
				_bm.find('.shipping.rwd a').on('click tap',
					function(e){
						_shippingDetail.slideToggle(200);
						$(this).toggleClass('opened');
					});
					
				//energy Label
				if($('#page').css('min-width')!='320px'){
					if($('html').hasClass('touch-device')){
						_bm.find('.buymenu-energylable').on('click tap', function(){
							if($(this).find('.buymenu-tooltips').length){
								baloonHide(this);
							}else{
								var content = _enegyDetail.html();
								/* add */
								var _enegyTop = _bm.find('.buymenu-product-name').outerHeight() + parseInt(_bm.find('.buymenu-product-name').css('margin-bottom'),10) + 20;
								baloonShow(this,content,_enegyTop,0,600,400);
							}
						});
					}else{
						_bm.find('.buymenu-energylable').hover(
							function(e){
								var content = _enegyDetail.html()/*'<img src="'+$(this).find('a').attr('data-content')+'" alt="'+$(this).find('img').attr('alt')+'" style="display:block">'*/;
								/* add */
								var _enegyTop = _bm.find('.buymenu-product-name').outerHeight() + parseInt(_bm.find('.buymenu-product-name').css('margin-bottom'),10) + 20;
								baloonShow(this,content,_enegyTop,0,600,400);
							},
							function(e){
								baloonHide(this);
							}
						);
					}
				}else{
					_bm.find('.buymenu-energylable').on('click tap',
						function(e){
							_enegyDetail.slideToggle(200);
						});
				}
				//by keys
				_bm.find('.buymenu-caption.pcfix .buymenu-caption-moreinfo span a').on('focus', function(e){
					if($('html').hasClass('pressTabkey')){
						var content = '<div class="buymenu-tooltips-content">'+_buymenuCaptionMore.html()+'</div>';
						baloonShow($(this).parent(),content,0,0,342,300,30);
					}
				});
				_bm.find('.shipping.pcfix > span a').on('focus', function(e){
					if($('html').hasClass('pressTabkey')){
						var content = '<div class="buymenu-tooltips-content">'+_shippingDetail.html()+'</div>';
						baloonShow($(this).parent(),content,60,0,322,280);
					}
				});
				_bm.find('.buymenu-energylable a').on('focus', function(e){
					if($('html').hasClass('pressTabkey')){
						var content = _enegyDetail.html();
						/* add */
						var _enegyTop = _bm.find('.buymenu-product-name').outerHeight() + parseInt(_bm.find('.buymenu-product-name').css('margin-bottom'),10) + 20;
						baloonShow($(this).parent(),content,_enegyTop,0,600,400);
					}
				});
				_bm.find('.buymenu-caption.pcfix .buymenu-caption-moreinfo span a').on('blur', function(e){
					baloonHide($(this).parent());
				});
				_bm.find('.shipping.pcfix > span a').on('blur', function(e){
					baloonHide($(this).parent());
				});
				_bm.find('.buymenu-energylable a').on('blur', function(e){
					baloonHide($(this).parent());
				});

				//addToCartQuantity
				_bm.find('.addToCartQuantity .editQuantity').on('click', function(e){
					if($(this).hasClass('disabled')){
						$(this).removeClass('disabled');
						$(this).prevAll('input.buynowNumber').removeClass('disabled').removeAttr('disabled');
					}else{
						$(this).addClass('disabled');
						// mod start
						/*
						$(this).prevAll('input.buynowNumber').addClass('disabled').attr('disabled','disabled');
						*/
						$(this).prevAll('input.buynowNumber').addClass('disabled').attr('disabled','disabled').each(function(){$(this).val($(this).val().replace(/^0(.+)/, '$1'));});
						// mod end
					}
				});
				_bm.find('.addToCartQuantity .buynowNumber').keyup(function(){
					var s = new Array();
					$.each( $(this).val().split(''), function(i, v){
						if( v.match(/[0-9]/gi) ) s.push(v);
					} );
					if(s.length > 0)
						$(this).val( s.join('') );
					else $(this).val(''); 
				});
        
				_bs.find('.btn-continue a').on('click', function(e){
					if(container.hasClass('onloadopen')){
						closeBox(showhideCartlist);
					}else{
						closeBox();
					}
					return false;
				});

				function formsubmit(){
					buywin_wrapper.find('#buywindow-title').css('visibility','hidden');
					/* mod start */
					if (_bs.length == 0) {
						btnClose.addClass('success').triggerHandler('click');
					} else {
						_bm.fadeOut(200,function(e){
							_bs.fadeIn(200);
							btnClose.addClass('success');
							/*
							container.children('a').find('.num').show();
							container.children('a').removeClass('noitem');
							*/
						});
					}
					/* mod end */
				}
				function baloonShow(_obj,_content,_top,_left,_w,_h,_bottom){
					var pointerImg,pointerClass,sideP;
					$(_obj).css('z-index',1);
					if($(_obj).parents('.buymenu-left').length){
						pointerImg = '/etc/designs/panasonic/eccart-clientlibs/images/img-tooltips-pointer-l.png'
						pointerClass = 'pointer-l';
					}else{
						pointerImg = '/etc/designs/panasonic/eccart-clientlibs/images/img-tooltips-pointer-r.png'
						pointerClass = 'pointer-r';
					}
					_html = '<div class="buymenu-tooltips"><div class="buymenu-tooltips-in">'+_content+'</div><div class="tooltips-pointer '+pointerClass+'"><img src="'+pointerImg+'" alt=""></div></div>';
					$(_obj).append(_html);
					var _ttp = $(_obj).find('.buymenu-tooltips');
					_ttp.find('.buymenu-tooltips-in').css({'width': _w+'px', 'max-height': _h+'px'});
					if(_bottom){
						var _objPos = $(_obj).position();
						_ttp.css({'bottom':-1*_bottom+'px'});
						_ttp.find('.buymenu-tooltips-in').css({'max-height':_objPos.top+_bottom+'px'});
						_ttp.find('.tooltips-pointer').css({'bottom':_bottom+'px'});
					}else{
						_ttp.css({'top':-1*_top+'px'});
						_ttp.find('.tooltips-pointer').css({'top':_top+'px'});
					}
					if(pointerClass == 'pointer-l'){
						if($('body').css('direction') !== 'rtl'){
							_ttp.css({'right':-1*(_ttp.outerWidth()-_left)+'px'});
						} else {
							_ttp.css({'left':-1*(_ttp.outerWidth()-_left)+'px'});
						}
					}else{
						if($('body').css('direction') !== 'rtl'){
							_ttp.css({'left':-1*(_ttp.outerWidth()-_left)+'px'});
						} else {
							_ttp.css({'right':-1*(_ttp.outerWidth()-_left)+'px'});
						}
					}
					_ttp.show();
				}
				function baloonHide(_obj){
					$(_obj).css('z-index',0);
					$(_obj).find('.buymenu-tooltips').remove();
				}
				/* add start */
				_bw.trigger('buymenushow.ec');
				/* add end */
			}

			//onlineContentEvents
			function onlineContentEvents(){
				const _bmonline = buywin_wrapper.find('#buymenu_buyfromonline');
				//buymenu_buyfromonline colorselector v2
				const $colorselector = _bmonline.find('.product-colorselector input[type="radio"]');
				const $retilersIframe = _bmonline.find('.retailers iframe');
				const checkedIndex = function(){
					var index = 0;
					$colorselector.filter(function(i, elm){
						if($(elm).is(':checked')){
							index = i;
						}
					});
					return index;
				};
				$retilersIframe.eq(checkedIndex()).show().siblings().hide();
				$colorselector.on('change', function(){
					$retilersIframe.eq(checkedIndex()).show().siblings().hide();
					onlineIframeSize();
				});
			}
		}
	}

	var Usercart = new usercart();
	Usercart.init();
});