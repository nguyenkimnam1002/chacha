/* header cookiepolicy */
(function($){
    /* load and write cookies */
    //cookies ok
    var noteCookies = function(_container){
      $(_container).each(function(index, element) {
        var container = $(this);
        container.find('.btn-cookiesok').on('click', function(e){
          container.slideUp(function(){
            //$('.optout_container').addClass('already-optout');
            /* 	load and write cookies */
            $('.optout_container').removeClass('already-optout');
            GwcCommon.cookiePolicyOptIn.resolve();
          });
          return false;
        });
      });
    }
    noteCookies('.notescookies');
    if (!window.CookiePolicy || cookieStatus == 0) {
      GwcCommon.cookiePolicyOptIn.resolve();
    }
  })(jQuery);
  
  // fixbars
  (function($){
    var holdingsH = function(){
      var mql = window.matchMedia('(min-width:976px)');
      var h = 0;
      var $hdh = $('.holdings-header');
      if($hdh.length && $hdh.find('.holdings-header__fixarea.clone').length){
        h = $hdh.find('.holdings-header__fixarea.clone').outerHeight();
      }
      return h;
    };
      // userbar
    $(window).on('scroll resize load', function (e) {
      $('#userbar-wrapper').each(function (index, element) {
        if (!$(this).has('#userbar.nofix').length && $(window).scrollTop() >= $(this).offset().top - holdingsH() && $('#page').css('min-width') != '320px') {
          $(this).css('height', $('#userbar').height() + 'px');
          $(this).find('#userbar').addClass('fix').css('top', holdingsH() + 0 + 'px');
        } else {
          $(this).css('height', '');
          $(this).find('#userbar').removeClass('fix').removeAttr('style');
        }
      });
    });
  })(jQuery);
  
  //youtube
  (function($, window, doccument){
    window.YouTubeUtils = {};
    window.youtubeVideos = [];
    YouTubeUtils.enableYouTube = true;
  
    $(function() {
      if ($('#language-data').attr('cnty') != 'cn') {
        $.ajax({
          url: "https://www.youtube.com/iframe_api",
          method: 'HEAD',
          dataType: 'script',
          timeout: 500
        }).done(function(){
          var tag = document.createElement('script');
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
          tag.src = "https://www.youtube.com/iframe_api";
        }).fail(function(){
          YouTubeUtils.enableYouTube=false;
          onYouTubeIframeAPIReady();
        });
      } else {
        YouTubeUtils.enableYouTube=false;
        onYouTubeIframeAPIReady();
      }
    });
    
    // Function Youtube Event
    window.onYouTubeIframeAPIReady = function() {
      $(".youtube-placeholder").each(function(index, video) {
        YouTubeUtils.setupPlayer(video,index);
      });
      $(window).trigger('ytiframeapiready');
    };
    window.onPlayerStateChange = function(event){
      var target = event.target.getIframe();
      if(event.data == 1 && $(target).parent().hasClass('chan-pana') && !$(target).parent().hasClass('played')){
        $(target).parent().addClass('played');
        var v = $(target).parent().attr('data-cpanaid');
        var aUrl = '//channel.panasonic.com/api/addcount/?v='+v;
        $.ajax({
          url: aUrl,
          type:'GET',
          dataType: 'jsonp',
          timeout:5000,
          success: function(data) {
            try {
              console.log(data);
            } catch (e) {}
          },
          error: function(data) {}
        });
      }
      if(event.data === 1){
        $.each(youtubeVideos, function(i, val){
          if(val !== event.target && typeof val.getIframe === 'function'){
            val.pauseVideo()
          }
        });
      }
    };
    
    //Function create Video
    YouTubeUtils.setupPlayer = function(_elm,index){
      var videoObj = $(_elm),
        playerID;
      var videoID = YouTubeUtils.videoParser(videoObj.attr('src'));
      var videoParam = YouTubeUtils.paramParser(videoObj.attr('src'));
      // additional video params on html tag attribute
      var additionalVideoParams = {};
      $.each($(_elm).data(), function(key) {
          var keyMatches = key.match(/^video\-?params\-?(.*)$/i);
          if (keyMatches && keyMatches.length >= 2) {
            additionalVideoParams[keyMatches[1].toLowerCase()] = $(_elm).data(key);
          }
        return additionalVideoParams;
      });
      videoParam = $.extend(additionalVideoParams, videoParam);
      if(videoObj.hasClass('chan-pana')){
        videoObj.attr('data-cpanaid',videoID);
        playerID = 'cpana' + String(videoID)+index;
      }else{
        playerID = videoID+index;
      }
      // mod start (scsk)
      videoObj.children('div').remove();
      // mod end (scsk)
      videoObj.append('<div id="'+playerID+'"/>');
      var videoTarget = videoObj.children('div');
      if (videoID != null) {
          // mod start (scsk)
          var $d_cookieOpted = $.Deferred();
          var cookiePolicyOpted = function() {
              if (GWCCookieManager.kind === 'OneTrust') {
                  GWCCookieManager.TargetingCookies.isOpted().then($d_cookieOpted.resolve, $d_cookieOpted.reject);
              } else {
                  $d_cookieOpted.resolve();
              }
          };
          if (!videoObj.hasClass('chan-pana')) {
              cookiePolicyOpted();
          }
          $d_cookieOpted.fail(function() {
              videoTarget.addClass('closed').append('<span>' + videoObj.data('cookie-unconsent-message') + '</span>');
          });
  
          if (videoObj.hasClass('youku-player')) {
              $d_cookieOpted.done(function() {
                  var youkuVideo = YouTubeUtils.createYkuPlayer(playerID, videoObj.data('clientid'), videoID, videoParam);
              });
          // mod end (scsk)
          }else if(videoObj.hasClass('chan-pana')){
              YouTubeUtils.chanpanaId = videoID;
              var pStatus = (videoObj.attr('data-editmode') && videoObj.attr('data-editmode')=='true')? 0 : 1 ;
              var aUrl = '//channel.panasonic.com/api/videoid/?v='+videoID+'&status='+pStatus;
              $.ajax({
                  url: aUrl,
                  type:'GET',
                  dataType: 'jsonp',
                  timeout:5000,
                  success: function(data) {
                      if (data.item.ytvideoid && data.item.ytvideoid != "") {
                          // mod start (scsk)
                          cookiePolicyOpted();
  
                          $d_cookieOpted.done(function() {
                              videoParam.rel = 0; videoParam.wmode = 'transparent';
                              YouTubeUtils.createYTPlayer(playerID, data.item.ytvideoid, videoParam);
                          });
                      } else {
                          if(videoObj.attr('data-endmessage')){
                              videoTarget.addClass('closed').append('<span>'+videoObj.attr('data-endmessage')+'</span>');
                          }
                      }
                  },
                  error: function(data) {
                  }
                  // mod end (scsk)
              });
          }else {
              $d_cookieOpted.done(function() {
                  videoParam.rel = 0; videoParam.wmode = 'transparent';
                  YouTubeUtils.createYTPlayer(playerID, videoID, videoParam);
              });
          }
      }
    }
    // Function that stops all the YouTubeVideos
    YouTubeUtils.stopYoutubeVideos = function() {
      for (var indexVideo = 0; indexVideo < youtubeVideos.length; indexVideo++) {
        if (youtubeVideos[indexVideo].stopVideo != null) {
           youtubeVideos[indexVideo].stopVideo();
        }
      }
    }
    // Fuction to get the YouTube or Youku video ID
    YouTubeUtils.videoParser = function(url){
      if (url && url.indexOf('youku\.com') > -1) {
        return YouTubeUtils.youkuParser(url);
      } else if(url.indexOf('youtube\.com') > -1 || url.indexOf('youtu\.be') > -1){
        return YouTubeUtils.youtubeParser(url);
      } else {
        return YouTubeUtils.chanpanaParser(url);
        //return url.split('?')[0];
      }
    }
    // Fuction to get the YouTube video ID
    YouTubeUtils.youtubeParser = function(url){
        var regExp = /(youtube\.com|youtu\.be)\/(watch\?v=|v\/|u\/|embed\/?)?(videoseries\?list=(.*)|[\w-]{11}|\?listType=(.*)&list=(.*)).*/i;
        var regExpExec = regExp.exec(url);
        if (regExpExec && regExpExec[3]) {
            return regExpExec[3];
        }else{
            return null;
        }
    }
    // Fuction to get the Youku video ID
    YouTubeUtils.youkuParser = function(url){
        var regExp = /(v\.youku\.com|player\.youku\.com)\/(v_show\/id_|embed\/)([^?]+?)(\.htm.*|\?.+|$)/i;
        var regExpExec = regExp.exec(url);
        if (regExpExec && regExpExec[3]) {
            return regExpExec[3];
        }else{
            return null;
        }
    }
    // Fuction to get the Channel Panasonic video ID
    YouTubeUtils.chanpanaParser = function(url){
        var regExp = /(ch\.panasonic\.net|channel\.panasonic\.com)\/(embed\/)(\d+)\/.*/i;
        var regExpExec = regExp.exec(url);
        if (regExpExec && regExpExec[3]) {
            return regExpExec[3];
        }else{
            return null;
        }
    }
    // Fuction to get the YouTube or Youku video Param
    YouTubeUtils.paramParser = function(url){
      if (url && url.indexOf('youku\.com') > -1) {
        /* same as Youtube*/
        return YouTubeUtils.youtubeParamParser(url);
      } else {
        return YouTubeUtils.youtubeParamParser(url);
      }
    }
  
    YouTubeUtils.youtubeParamParser = function(url){
        var regExp = /(\?.*)([^\?])/;
        var regExpExec = regExp.exec(url);
      var vars = new Object,
        params;
        if (regExpExec && regExpExec[0]) {
        var temp_params = regExpExec[0].replace(/\?/,'').split('&');
        for(var i = 0; i <temp_params.length; i++) {
          params = temp_params[i].split('=');
          vars[params[0]] = params[1];
        }
            return vars;
        }else{
            return {};
        }
    }
    /* Youtube Player */
    YouTubeUtils.createYTPlayer = function(divId, ytId, param){
      var $iframeWrapper = $('#'+divId);
      if ($iframeWrapper.closest('.youtube-placeholder').is(':has(iframe)')) {
        $iframeWrapper.siblings().remove();
        return;
      }
      if ("YT" in window) {
        youtubeVideos.push(new YT.Player(divId, {
          width:'100%',
          height:'100%',
          videoId: ytId, 
          playerVars: param,
          events: {
            'onStateChange': onPlayerStateChange,
            'onReady' : function(e){
              var target = e.target.getIframe();
              if($(target).closest('.fullsizebackground-video').length){
                $(target).closest('.fullsizebackground-video').trigger('fullbgytready');
              }
            }
          }
        }));
      }
    }
    /* Youku Player */
    YouTubeUtils.createYkuPlayer = function(divId, ykuCId, ykuVId, param){
      var $iframeWrapper = $('#'+divId);
      if ($iframeWrapper.is(':has(iframe)')) {
        $iframeWrapper.siblings().remove();
        return;
      }
      var $youkuFrame = $('<iframe>', {
        'id': 'iframe_p_'+divId,
        'src': '/servlet/ajax/sns/youku-player.html',
        'class': 'youku-player-iframe'
      }).css({
        'width': '100%',
        'height': '100%'
      }).on('load', function() {
        if (!!this.contentWindow && $.isFunction(this.contentWindow.createIframeYkuPlayer)) {
          var childYkPlayer = this.contentWindow.createIframeYkuPlayer(ykuCId, ykuVId, param);
          if (childYkPlayer && childYkPlayer != null) {
            youtubeVideos.push(childYkPlayer);
          }
          YouTubeUtils.switchVisibleYkuPlayerIframe($iframeWrapper);
        }
      });
      $iframeWrapper.append($youkuFrame);
    }
  
    YouTubeUtils.switchVisibleYkuPlayerIframe = function(target, isVisible) {
      var playerIframe = $('iframe', target)[0];
      if (!!playerIframe && $.isFunction(playerIframe.contentWindow.switchVisibleYkuPlayer)) {
        if (typeof isVisible != 'boolean') {
          isVisible = $(target).parent().is(':visible');
        }
        playerIframe.contentWindow.switchVisibleYkuPlayer(isVisible);
      }
    };
    jQuery.fn.switchVisibleYkuPlayer = function(isVisible) {
      return $(this).each(function() {
        YouTubeUtils.switchVisibleYkuPlayerIframe(this, isVisible);
      });
    };
  })(jQuery, window, document);
  
  (function($){
    var header = $('.pageheader');
    Stickyfill.add(header);
  })(jQuery);
  
  
  (function($){
    $(window).on('load', function(){
      $(window).data('isLoaded', true);
    });
  })(jQuery);
  
  /* focus */
  (function($){
    $(document).on('keydown', function(e){
      if(e.keyCode === 9 || (e.keyCode >= 13 && e.keyCode <= 18)){
        $('html').addClass('outline-visible');
      }
    });
  })(jQuery);
  
  /* vw */
  (function(){
    var vw = window.innerWidth * 0.01;
    var bw = document.body.clientWidth * 0.01;
    document.documentElement.style.setProperty('--vw', vw + 'px');
    document.documentElement.style.setProperty('--bw', bw + 'px');
    window.addEventListener('resize', function(){
      vw = window.innerWidth * 0.01;
      bw = document.body.clientWidth * 0.01;
      document.documentElement.style.setProperty('--vw', vw + 'px');
      document.documentElement.style.setProperty('--bw', bw + 'px');
    });
  })();
  
  /* srsset */
  if (!GwcCommon.isLazyLoadEnabled) {
      (function($){
        var elm = document.createElement('picture');
        if(elm.constructor === window.HTMLUnknownElement && window.matchMedia('(max-width:767px)').matches){
          $(function(){
            $('picture').each(function(){
              var $this = $(this),
                  $src = $this.find('source'),
                  src767w;
              $src.each(function(){
                if($(this).attr('media').match(/max-width.*767px/)){
                  src767w = $(this).attr('srcset');
                }
              });
              $(this).find('img').attr('src', src767w);
            });
          });
        }
      
      })(jQuery);
  }
  
  /* onload anchor adjustment */
  (function($){
    $(window).on('load', function(){
      const hash = window.location.hash;
      const headerH = $('.pageheader').length ? $('.pageheader').outerHeight() + 1 : 0;
      if(hash && $(hash).length){
        setTimeout(function(){
          $('html, body').scrollTop($(hash).offset().top - headerH);
        }, 100);
      }
    });
  })(jQuery);
  
  /* pageheader utils */
  (function($){
    $(function(){
      var $utilsItems = $('.pageheader__utils__item');
      var ql = window.matchMedia('(min-width:768px)');
      ql.addListener(function(e){
        var $search = $utilsItems.filter('.pageheader__search');
        var $searchPanel = $('.pageheader__utils__item__panel', $search);
        var $searchBtn = $('.pageheader__utils__item__toggle__button', $search);
        if(e.matches){
          $search.removeClass('active');
          $searchPanel.attr('aria-hidden', 'false').show();
          $searchBtn.attr('aria-expanded', 'false');
        }
      });
      $utilsItems.each(function(i,elm){
        var $elm = $(elm);
        var $btn = $('.pageheader__utils__item__toggle__button', $elm);
        var $panel = $('.pageheader__utils__item__panel', $elm);
        var idname = 'pageheader-utils-item-' + i;
        var openPanel = function(){
          var $activeItem = $elm.siblings('.active');
          var $activePanel = $('.pageheader__utils__item__panel', $activeItem);
          var $activeBtn = $('.pageheader__utils__item__toggle__button', $activeItem);
          $panel.stop().slideDown(300, function(){
            $elm.addClass('active');
            $panel.attr('aria-hidden','false');
            $btn.attr('aria-expanded','true');
          });
          $activeItem.removeClass('active');
          $activeBtn.attr('aria-expanded','false');
          $activePanel.stop().slideUp(300, function () {});
        };
        var closePanel = function(){
          $elm.removeClass('active');
          $panel.attr('aria-hidden','true');
          $btn.attr('aria-expanded','false');
          $panel.stop().slideUp(300, function () {});
        };
        $panel.attr({
          'id': idname + 'panel',
          'aria-hidden': 'true'
        });
        $btn.attr({
          'aria-controls': $panel.attr('id'), 
          'aria-expanded': 'false'
        });
        $btn.on('click', function(){
          if($elm.hasClass('active')){
            closePanel();
          } else {
            openPanel();
          }
        });
      });
      // anchor
      var $headerlinks = $('.pageheader__links');
      var $headerlinks_togglebtn = $('.pageheader__utils__item__toggle__button', $headerlinks);
      var $anchorlinks = $('a.anchor', $headerlinks);
      $anchorlinks.each(function(i, v){
        var $link = $(v);
        var id = $link.attr('href');
        $link.on('click', function(e){
          e.preventDefault();
          if (!$(id).length) {
            return this;
          }
          var offset = $('.pageheader').outerHeight();
          var dY = $(id).offset().top;
          $headerlinks_togglebtn.trigger('click');
          $('html, body').animate({
            scrollTop : dY - offset + 1
          }, {
            duration: 300,
            complete: function(){
              window.history.pushState(null, null, id);
            }
          });
        });
      });
    });
  })(jQuery);
  
  /* pagefooter */
  (function($){
    var $pagetop;
    var pagetopShowHide = function(){
      if (Math.max($('html').scrollTop(), $('body').scrollTop()) > $(window).height()) {
        $pagetop.show();
      } else {
        $pagetop.hide();
      }
    };
    $(function(){
      $('.pagefooter__legal').each(function(){
        var $area = $('.pagefooter__legal__area', $(this));
        $area.clone().addClass('dummy').insertBefore($area);
        
      });
      $pagetop = $('.pagefooter__topagetop');
      $pagetop.hide();
      $pagetop.find('.pagefooter__topagetop__btn').on('click', function(){
        $('html, body').animate({
          scrollTop: 0
        },{
          duration: 300
        });
      });
      $(window).on('scroll', pagetopShowHide);
    });
    $(window).on('load', pagetopShowHide);
  })(jQuery);
  
  /* sectiontitle */
  (function($){
    $(function(){
      $('.sectiontitle').each(function(){
        var $this = $(this);
        var $container = $('.sectiontitle__container', $this);
        var $link = $('.sectiontitle__link', $this);
        $link.clone().addClass('clone').prependTo($container);
      });
    });
  })(jQuery);
  
  /* linksutils */
  (function($){
    $(function(){
      $('.linksutils__links__list').each(function(){
        var $this = $(this);
        if($this.find('.linksutils__links__list__item').length < 3){
          $this.addClass('justify-center');
        }
      });
    });
  })(jQuery);
  
  /* category navigation */
  (function($){
    $(function(){
      $('.catnavigation').each(function(i, el){
        var $el = $(el),
            $consumerpanel = $('.consumerpanel__products__contents', $el),
            $togglebtn_xs = $('.catnavigation__togglebtn', $el),
            $togglebtn_sm = $('.consumerpanel__products__togglebtn', $el),
            $plist =$('.consumerpanel__products__list', $el),
            $items = $('.consumerpanel__products__item', $el),
            elId = 'catnav-' + i,
            setItemHeight = function(){
              var $a = $('.l1item-link', $items),
                maxH = Math.max.apply(null, $.map($.makeArray($a), function(element, index){
                return $(element).outerHeight();
              }));
              $a.css('height', maxH + 'px');
            },
            setPosition = function(){
              $items.each(function(){
                var $item = $(this),
                    $child_panel = $('.consumerpanel__products__list-child__wrapper', $item),
                    pleft = $item.offset().left;
                if($('body').css('direction') !== 'rtl'){
                  $child_panel.css('margin-left', - pleft + 'px');
                } else {
                  $child_panel.css('margin-right', - ($child_panel.outerWidth() - pleft - $item.outerWidth()) + 'px');
                }
              });
            },
            openPanel = function(_item, _callback){
              var $panel = $('.consumerpanel__products__list-child__wrapper', $(_item));
              $panel.slideDown(300, function(){
                $(_item).addClass('active').find('.l1item-link').attr('aria-expanded','true');
                $panel.attr('aria-hidden', 'false');
                if(typeof _callback === 'function'){
                  _callback();
                }
              });
            },
            closePanel = function(_item, _callback){
              var $panel = $('.consumerpanel__products__list-child__wrapper', $(_item));
              $panel.slideUp(300, function(){
                $(_item).removeClass('active').find('.l1item-link').attr('aria-expanded','false');
                $panel.attr('aria-hidden', 'true');
                if(typeof _callback === 'function'){
                  _callback();
                }
              });
            },
            smtoggle = function(){
            if (!$consumerpanel.hasClass('textpanelonly')) {
              return this;
            }
              var $child_panel_tx = $('.consumerpanel__products__list-child__wrapper', $consumerpanel);
              $child_panel_tx.attr({
                'id': elId + '-childpanel-tx',
                'aria-hidden': 'true'
              }).hide();
              $togglebtn_sm.attr({
                'aria-expanded': 'false',
                'aria-controls': $child_panel_tx.attr('id')
              }).removeClass('active');
              $togglebtn_sm.on('click', function(){
                if($togglebtn_sm.hasClass('active')){
                  $child_panel_tx.slideUp(300, function(){
                    $togglebtn_sm.removeClass('active').attr('aria-expanded','false');
                    $child_panel_tx.attr('aria-hidden', 'true');
                  });
                } else {
                  $child_panel_tx.slideDown(300, function(){
                    $togglebtn_sm.addClass('active').attr('aria-expanded','true');
                    $child_panel_tx.attr('aria-hidden', 'false');
                  });
                }
              });
            },
            mobtoggle = function(){
              $consumerpanel.attr({
                'aria-hidden': 'true'
              }).hide();
              $togglebtn_xs.attr({
                'aria-expnaded': 'false',
                'aria-controls': elId
              }).removeClass('active');
              $togglebtn_xs.on('click', function(){
                if($togglebtn_xs.hasClass('active')){
                  $consumerpanel.slideUp(300, function(){
                    $togglebtn_xs.removeClass('active').attr('aria-expanded','false');
                    $consumerpanel.attr('aria-hidden', 'true');
                  });
                } else {
                  $consumerpanel.slideDown(300, function(){
                    $togglebtn_xs.addClass('active').attr('aria-expanded','true');
                    $consumerpanel.attr('aria-hidden', 'false');
                  });
                }
              });
            },
            ql = window.matchMedia('(min-width:768px)');
        $consumerpanel.attr('id', elId);
        if(ql.matches){
          smtoggle();
        } else {
          mobtoggle();
          $('.consumerpanel__products__list-child__wrapper.expanded-xs', $el).show().removeAttr('aria-hidden');
        }
        ql.addListener(function(e){
          if(e.matches){
            $consumerpanel.show().removeAttr('aria-hidden');
            smtoggle();
          } else {
            mobtoggle();
            $('.consumerpanel__products__list-child__wrapper.expanded-xs', $el).show().removeAttr('aria-hidden');
          }
        });
        $el.imagesLoaded().always(function(){
          if(ql.matches){
            setPosition();
            setItemHeight();
          }
        });
        $(window).on('resize', function(){
          if(ql.matches){
            setPosition();
            setItemHeight();
          }
        });
        $items.each(function(idx){
          var $item = $(this),
              $a = $('.l1item-link', $item),
              $child_panel = $('.consumerpanel__products__list-child__wrapper', $item),
              $child_panel_lastitem = $('a', $child_panel).last();
          if (!$child_panel.length) {
            return this;
          }
          $child_panel.attr({
            'id': elId + '-childpanel-' + idx,
            'aria-hidden': 'true'
          });
          $a.addClass('inc-child').attr({
            'aria-expanded': 'false',
            'aria-controls': $child_panel.attr('id'),
            'role': 'button'
          });
          $a.on('click', function(e){
            e.preventDefault();
            if($item.hasClass('active')){
              closePanel($item);
            } else {
              if($item.siblings('.active').length){
                if(window.matchMedia('(min-width:768px)').matches){
                  closePanel($item.siblings('.active'), function(){
                    openPanel($item);
                  });
                } else {
                  openPanel($item);
                }
              } else {
                openPanel($item);
              }
            }
          });
          $child_panel_lastitem.on('keydown', function(e){
            if(e.keyCode === 9 && !e.shiftKey){
              closePanel($item);
            }
          });
        });
      });
    });
  
  })(jQuery);
  
  /* snsgadgets */
  (function($){
    $(function(){
      $('.snsgadgets').each(function(i, v){
        var $el = $(v),
            $container = $('.snsgadgets__in', $el),
            url = $el.data('sns'),
            $tablist = $('.snsgadgets__icon', $el),
            $panels = $('.snsgadget-content', $el),
            tabUI = false,
            tabsetup = function(){
              $el.on('tabscreate', function(event, ui){
                $(ui.panel).trigger('panelactive');
              });
              $el.on('tabsactivate', function(event, ui){
                $(ui.newPanel).trigger('panelactive');
              });
              $el.tabs({
                heightStyle: 'auto'
              });
              if(!$(window).data('isLoaded')){
                $el.tabs('option', 'disabled', true);
                $(window).on('load', function(){
                  $el.tabs('option', 'disabled', false);
                });
              }
            };
        $el.attr('id', 'snsgadgets-'+ i);
  
        function panelSetup(_panel, _index){
          var $panel = $(_panel),
              $tab = $tablist.find('li').eq(_index),
              func = function(){},
              ch = $container.height(),
              cw = $container.width();
          if(tabUI){
            $tab.find('a').attr('href','#'+$panel.attr('id'));
          }
          if($panel.data('type') === 'facebook'){
           $(snsgadgetData.facebook.tab).appendTo($tab.find('a'));
            snsgadgetData.facebook.panel.filter('.fb-page').attr({
              'data-href': $panel.data('href')
            }).find('blockquote').attr('cite', $panel.data('href')).find('a').attr('href', $panel.data('href')).text($panel.data('title'));
            $panel.append(snsgadgetData.facebook.panel.clone());
            func = snsgadgetData.facebook.func;
            $panel.on('panelactive', function(){
              func($panel);
            });
          }
          if($panel.data('type') === 'twitter'){
            $(snsgadgetData.twitter.tab).appendTo($tab.find('a'));
            snsgadgetData.twitter.panel.filter('.twitter-timeline').attr({
              'data-height': Math.min(ch - $tablist.height(), 400),
              'href': $panel.data('href'),
              //'data-widget-id': $panel.data('wid')
            }).text($panel.data('title'));
            if($panel.data('tw-lang')){
              snsgadgetData.twitter.panel.filter('.twitter-timeline').attr('data-lang', $panel.data('tw-lang'));
            }
            $panel.append(snsgadgetData.twitter.panel.clone());
            func = snsgadgetData.twitter.func;
            $panel.on('panelactive', function(){
              func($panel);
            });
          }
          if($panel.data('type') === 'youtube'){
            $(snsgadgetData.youtube.tab).appendTo($tab.find('a'));
            $panel.append(snsgadgetData.youtube.panel.clone());
            func = snsgadgetData.youtube.func;
            $panel.on('panelactive', function(){
              func($panel, $panel.data('yt-servlet-url'), $panel.data('yt-bn') ? $panel.data('yt-bn') : false);
            });
          }
          if($panel.data('type') === 'youku'){
            $(snsgadgetData.youku.tab).appendTo($tab.find('a'));
            $panel.append(snsgadgetData.youku.panel.clone());
            func = snsgadgetData.youku.func;
            $panel.on('panelactive', function(){
              func($panel, $panel.data('yk-uid'), $panel.data('yk-cid'), $panel.data('yk-cttl') ? $panel.data('yk-cttl') : false);
            });
          }
          if($panel.data('type') === 'instagram'){
            $(snsgadgetData.instagram.tab).appendTo($tab.find('a'));
            $panel.append(snsgadgetData.instagram.panel.clone());
            func = snsgadgetData.instagram.func;
            //func($panel, $panel.data('urls'));
            $panel.on('panelactive', function(){
              func($panel, $panel.data('urls'));
            });
          }
          if($panel.data('type') === 'vk'){
            $(snsgadgetData.vk.tab).appendTo($tab.find('a'));
            $panel.append(snsgadgetData.vk.panel.clone());
            $panel.find('.vk_groups').attr('id', $panel.attr('id') + '-vk');
            func = snsgadgetData.vk.func;
            $panel.on('panelactive', function(){
              func($panel, $panel.data('vk-cid'), $panel.attr('id') + '-vk')
            });
          }
          if(!tabUI){
            $panel.trigger('panelactive');
          }
        }
  
        if ($panels.length > 1) {
            tabUI = true;
            $panels.addClass('sns-tabspanel');
            for(var n = 0; n < $panels.length; n++){
              $tablist.append('<li><a></a></li>');
            }
        }
  
        $panels.each(function(ind, v){
            var $this = $(this);
            var id = $el.attr('id') + '-panel' + ind;
            $this.attr('id', id);
            panelSetup($this, ind);
        });
  
        if(tabUI === true){
          tabsetup();
        }
      });
    });
  })(jQuery);
  
  /* modalvideo */
  var ModalWindow = {
    init : function () {
  
      this.$modalwindow = $('<div id="modalvideo-window" class="modalvideo-window"><div class="modalvideo-window__bg"><div class="modalvideo-window__container" tabindex="-1"><div class="modalvideo-window__controls"><button class="closebtn"><img src="/etc/designs/panasonic/countrytop-clientlibs/images/icn-utils-close.svg" alt=""></button></div><div class="modalvideo-window__contents"></div><div class="lastfocusable" style="height:1px;" tabindex="0"></div></div></div></div>').appendTo('body');
      this.$opener = null;
  
      $container = this.getContainer();
      $contentsarea = this.getContentsArea();
      $closebtn = this.getCloseButton();
      $lastfocusable = this.getLastFocusable();
  
      var mw = this;
      $closebtn.add('.modalvideo-window__bg').on('click', function(){
          mw.getModalWindow().fadeOut(300, function(){
          mw.getOpener().focus();
          $contentsarea.empty();
        });
      });
  
      mw.getModalWindow().find('button, a').eq(0).on('keydown', function(e){
        if(e.keyCode === 9 && e.shiftKey){
          $lastfocusable.focus();
        }
      });
      $lastfocusable.on('keydown', function(e){
        if(e.keyCode === 9 && !e.shiftKey){
          $container.focus();
        }
      });
      $contentsarea.on('click', function(e){
        e.stopPropagation();
      });
    },
    getContainer : function () {
      return $('.modalvideo-window__container', this.$modalwindow);
    },
    getContentsArea : function () {
      return $('.modalvideo-window__contents', this.$modalwindow);
    },
    getCloseButton : function () {
      return $('.modalvideo-window__controls .closebtn', this.$modalwindow);
    },
    getLastFocusable : function () {
      return $('.lastfocusable', this.$modalwindow);
    },
    getModalWindow : function () {
      return this.$modalwindow;
    },
    getOpener : function () {
      return this.$opener;
    },
    setOpener : function ($opener) {
      this.$opener = $opener;
      return this.$opener;
    },
    implement : function (linkElement) {
      if (!linkElement || linkElement.length == 0) {
        return;
      }
      var $el = $(linkElement),
      $contentsarea__in = $('<div class="modalvideo-window__contents__in" />'),
      $video_container = $('<div class="video-container" />'),
      $info_container = $('<div class="info-container" />'),
      $video = $('<div class="youtube-placeholder" src="'+ $el.attr('href') +'"></div>'),
      $rel_a = $('<a class="btn-style style-lg style-border-dg" />');
      //video
      $video.attr({
        //'data-editmode': $el.data('editmode')? $el.data('editmode'): 'false',
        'data-tracking-label': $el.data('tracking-label')? $el.data('tracking-label'): '',
        'data-source-component': $el.data('source-component')? $el.data('source-component'): '',
        'data-cookie-unconsent-message': $el.data('cookie-unconsent-message')? $el.data('cookie-unconsent-message'): ''
      });
      if($el.hasClass('chan-pana')){
        $video.addClass('chan-pana').attr('data-endmessage', $el.data('endmessage') ? $el.data('endmessage') : '');
      }
      if($el.hasClass('youku-player')){
        $video.addClass('youku-player').attr('data-clientid', $el.data('clientid') ? $el.data('clientid') : '');
      }
      $video_container.append('<div class="video-placeholder" />').find('.video-placeholder').append($video);
      $video_container.appendTo($contentsarea__in);
      //info
      if($el.data('caption')){
        $('<div class="info__caption"></div>').append($.parseHTML($el.data('caption'))).appendTo($info_container);
        if($info_container.find('.info__caption').find('p, ul, ol, div').length){
          $info_container.find('.info__caption').addClass('richtext');
        }
      }
      if($el.data('link') || $el.data('link2')){
        $('<ul class="info__links" />').appendTo($info_container);
      }
      if($el.data('link')){
        var $rel_a_clone = $rel_a.clone();
        $info_container.find('.info__links').append($('<li class="info__links__item" />').append($rel_a_clone.attr({
          'href': $el.data('link'),
          'target': $el.data('link-target') ? $el.data('link-target') : '',
          'data-tracking-label': $el.data('link-tracking-label') ? $el.data('link-tracking-label') : '',
        }).append('<span class="btn-style__tx">'+ $el.data('link-title') +'</span>')));
        if($el.data('link-target') && $el.data('link-target') === '_blank'){
          $rel_a_clone.addClass('with-icn').append('<span class="btn-style__icn"><img src="/etc/designs/panasonic/countrytop-clientlibs/images/icn-link-newwin-dg.svg" alt="'+ $el.data('alt-newwin') +'"/></span>')
          $rel_a_clone.attr({
            'rel': GwcCommon.newWindowRel ? GwcCommon.newWindowRel : '',
          });
        }
      }
      if($el.data('link2')){
        var $rel_a_clone2 = $rel_a.clone();
        $info_container.find('.info__links').append($('<li class="info__links__item" />').append($rel_a_clone2.attr({
          'href': $el.data('link2'),
          'target': $el.data('link2-target') ? $el.data('link2-target') : '',
          'data-tracking-label': $el.data('link2-tracking-label') ? $el.data('link2-tracking-label') : '',
        }).append('<span class="btn-style__tx">'+ $el.data('link2-title') +'</span>')));
        if($el.data('link2-target') && $el.data('link2-target') === '_blank'){
          $rel_a_clone2.addClass('with-icn').append('<span class="btn-style__icn"><img src="/etc/designs/panasonic/countrytop-clientlibs/images/icn-link-newwin-dg.svg" alt="'+ $el.data('alt-newwin') +'"/></span>')
          $rel_a_clone2.attr({
            'rel': GwcCommon.newWindowRel ? GwcCommon.newWindowRel : '',
          });
        }
      }
      if($info_container.not(':empty')){
        $info_container.appendTo($contentsarea__in);
      }
  
      var mw = this;
      $el.on('click', function(e){
        e.preventDefault();
        var $clone = $contentsarea__in.clone(),
            $clone_video_placeholder = $('.video-placeholder', $clone);
        mw.setOpener($el);
        mw.getModalWindow().attr('data-source-component', $el.data('source-component'));
        mw.getCloseButton().find('img').attr('alt', $el.data('alt-close'));
        mw.getContentsArea().empty().append($clone);
        YouTubeUtils.setupPlayer($clone.find('.youtube-placeholder'),'on-modalvideo-window');
        mw.getModalWindow().fadeIn(300, function(){
          $clone_video_placeholder.css('max-width', $clone_video_placeholder.parent().height() * 16 / 9);
          mw.getContainer().focus();
        });
      });
    }
  };
  ModalWindow.init();
  
  (function($){
    $(function(){
      $('.modalvideo-link').each(function(index, element){
        ModalWindow.implement(element);
      });
    });
  })(jQuery);