//scrollOut
var ScrollOut=function(){"use strict"
    function S(e,t,n){return e<t?t:n<e?n:e}function T(e){return+(0<e)-+(e<0)}var q,t={}
    function n(e){return"-"+e[0].toLowerCase()}function d(e){return t[e]||(t[e]=e.replace(/([A-Z])/g,n))}function v(e,t){return e&&0!==e.length?e.nodeName?[e]:[].slice.call(e[0].nodeName?e:(t||document.documentElement).querySelectorAll(e)):[]}function h(e,t){for(var n in t)n.indexOf("_")&&e.setAttribute("data-"+d(n),t[n])}var z=[]
    function e(){q=0,z.slice().forEach(function(e){return e()}),F()}function F(){!q&&z.length&&(q=requestAnimationFrame(e))}function N(e,t,n,r){return"function"==typeof e?e(t,n,r):e}function m(){}return function(L){var i,P,_,H,o=(L=L||{}).onChange||m,l=L.onHidden||m,c=L.onShown||m,s=L.onScroll||m,f=L.cssProps?(i=L.cssProps,function(e,t){for(var n in t)n.indexOf("_")&&(!0===i||i[n])&&e.style.setProperty("--"+d(n),(r=t[n],Math.round(1e4*r)/1e4))
    var r}):m,e=L.scrollingElement,A=e?v(e)[0]:window,W=e?v(e)[0]:document.documentElement,x=!1,O={},y=[]
    function t(){y=v(L.targets||"[data-scroll]",v(L.scope||W)[0]).map(function(e){return{element:e}})}function n(){var e=W.clientWidth,t=W.clientHeight,n=T(-P+(P=W.scrollLeft||window.pageXOffset)),r=T(-_+(_=W.scrollTop||window.pageYOffset)),i=W.scrollLeft/(W.scrollWidth-e||1),o=W.scrollTop/(W.scrollHeight-t||1)
    x=x||O.scrollDirX!==n||O.scrollDirY!==r||O.scrollPercentX!==i||O.scrollPercentY!==o,O.scrollDirX=n,O.scrollDirY=r,O.scrollPercentX=i,O.scrollPercentY=o
    for(var l,c=!1,s=0;s<y.length;s++){for(var f=y[s],u=f.element,a=u,d=0,v=0;d+=a.offsetLeft,v+=a.offsetTop,(a=a.offsetParent)&&a!==A;);var h=u.clientHeight||u.offsetHeight||0,m=u.clientWidth||u.offsetWidth||0,g=(S(d+m,P,P+e)-S(d,P,P+e))/m,p=(S(v+h,_,_+t)-S(v,_,_+t))/h,w=1===g?0:T(d-P),X=1===p?0:T(v-_),Y=S((P-(m/2+d-e/2))/(e/2),-1,1),b=S((_-(h/2+v-t/2))/(t/2),-1,1),D=void 0
    D=L.offset?N(L.offset,u,f,W)>_?0:1:(N(L.threshold,u,f,W)||0)<g*p?1:0
    var E=f.visible!==D;(f._changed||E||f.visibleX!==g||f.visibleY!==p||f.index!==s||f.elementHeight!==h||f.elementWidth!==m||f.offsetX!==d||f.offsetY!==v||f.intersectX!=f.intersectX||f.intersectY!=f.intersectY||f.viewportX!==Y||f.viewportY!==b)&&(c=!0,f._changed=!0,f._visibleChanged=E,f.visible=D,f.elementHeight=h,f.elementWidth=m,f.index=s,f.offsetX=d,f.offsetY=v,f.visibleX=g,f.visibleY=p,f.intersectX=w,f.intersectY=X,f.viewportX=Y,f.viewportY=b,f.visible=D)}H||!x&&!c||(l=C,z.push(l),F(),H=function(){!(z=z.filter(function(e){return e!==l})).length&&q&&(cancelAnimationFrame(q),q=0)})}function C(){u(),x&&(x=!1,h(W,{scrollDirX:O.scrollDirX,scrollDirY:O.scrollDirY}),f(W,O),s(W,O,y))
    for(var e=y.length-1;-1<e;e--){var t=y[e],n=t.element,r=t.visible,i=n.hasAttribute("scrollout-once")||!1
    t._changed&&(t._changed=!1,f(n,t)),t._visibleChanged&&(h(n,{scroll:r?"in":"out"}),o(n,t,W),(r?c:l)(n,t,W)),r&&(L.once||i)&&y.splice(e,1)}}function u(){H&&(H(),H=void 0)}t(),n(),C()
    var r=0,a=function(){r=r||setTimeout(function(){r=0,n()},0)}
    return window.addEventListener("resize",a),A.addEventListener("scroll",a),{index:t,update:n,teardown:function(){u(),window.removeEventListener("resize",a),A.removeEventListener("scroll",a)}}}}()
    
    if(document.readyState === 'interactive' || document.readyState === 'complete'){
      ScrollOut();
    } else {
      window.addEventListener('DOMContentLoaded', function(){
        ScrollOut();
      });
    }
    
    const holdingsMql = window.matchMedia('(min-width:981px)');
    document.documentElement.style.setProperty('--vh', window.innerHeight * 0.01 + 'px');
    
    //header fix
    (function($){
      const observer = new IntersectionObserver(
        function(entries, observer){
          entries.forEach(function(entry){
            //console.log(entry.isIntersecting);
            //console.log(entry.intersectionRatio);
            //console.log(entry.boundingClientRect);
            const $header = entry.target.closest('.holdings-header');
            const $headerFix = $header.querySelector('.holdings-header__fixarea:not(.clone)');
            const $nav = $($headerFix).find('.holdings-header__nav');
            const $search = $($headerFix).find('.holdings-header__search');
            if(entry.isIntersecting){
              $headerFix.classList.remove('fix');
              if(!holdingsMql.matches){
                $nav.trigger('navClose');
                $search.trigger('searchClose');
                $('.holdings-header__sub__nav').each(function(){
                  $(this).trigger('subnavClose');
                });
              }
            } else {
              $headerFix.classList.add('fix');
              const $activeCpanel = $($headerFix).find('.link-consumerpanel[aria-expanded="true"]');
              if($activeCpanel.length){
                $($headerFix).find('.holdings-header__nav.globalnav-lg').data('cpanel').closepanel($activeCpanel);
              }
            }
          });
        },
        {
          threshold:[0, 0.25, 0.5, 0.75, 1],
        }
      );
      if(document.readyState === 'interactive' || document.readyState === 'complete'){
        headerSetting();
      } else {
        window.addEventListener('DOMContentLoaded', headerSetting);
      }
      function headerSetting(e){
        const $header = document.querySelector('.holdings-header');
        if($header){
          const $headerFix =  $header.querySelector('.holdings-header__fixarea');
          const $headerFixClone = $headerFix.cloneNode(true);
          const $headerFixCloneFixStyle = $headerFix.cloneNode(true);
          $headerFixClone.classList.remove('holdings-header__fixarea');
          $headerFixClone.classList.add('holdings-header__fixareaclone');
          $headerFix.parentNode.insertBefore($headerFixClone, $headerFix.nextSibling);
          if(!$header.classList.contains('nofix')){
            $headerFixCloneFixStyle.classList.add('clone', 'fix');
            $headerFix.parentNode.insertBefore($headerFixCloneFixStyle, $headerFixClone.nextSibling);
            observer.observe($headerFixClone.querySelector('.holdings-header__main'));
          }
        }
      }
    })(jQuery);
    
    //header main
    (function($){
      document.addEventListener('wheel', scrollListener);
      document.addEventListener('touchmove', scrollListener);
      function scrollListener(e){
        //console.log(e.type);
        const dirY = document.querySelector('html').getAttribute('data-scroll-dir-y');
        const $headerMain = document.querySelectorAll('.holdings-header__main');
        if(dirY === '-1'){
          $headerMain.forEach(function(elm){
            elm.classList.add('show');
          });
        } else {
          $headerMain.forEach(function(elm){
            elm.classList.remove('show');
          });
        }
      }
    })(jQuery);
    
    //header nav
    (function($){
      $(function(){
        
        $('.holdings-header__nav').filter(function(i,elm){
          return !$(elm).closest('.holdings-header__fixareaclone, .holdings-header__fixarea.clone.fix').length;
        }).each(function(i,elm){
          var $nav = $(elm),
              isNoFix = $nav.closest('.holdings-header').hasClass('nofix'),
              $anclink = $('.holdings-header__nav__list__item', $nav).filter((i,v) => {
                if($(v).has('> .childlist').length){ return false; }
                if(!$(v).children('.item-box').find('a[href^="#"]').length ){ return false; }
                if($($(v).children('.item-box').find('a').attr('href')).length){ return this; }
              });
          $anclink.find('a').on('click', (e) => {
            e.preventDefault();
            var targetId = e.currentTarget.getAttribute('href');
            $('html, body').animate({
              scrollTop: $(targetId).offset().top
            },{
              duration: 300,
              complete: () => {
                history.pushState({}, '', targetId);
                if($nav.hasClass('pulldown')){
                  $nav.trigger('navClose');
                }
                $nav.closest('.holdings-header__main').removeClass('show');
              }
            });
          });
          
          if($nav.hasClass('pulldown')){
            var $btn = $('.holdings-header__nav__tglbtn', $nav),
                $panel = $('.holdings-header__nav__panel', $nav),
                open = function(){
                  /*if($nav.offset().top > $(window).scrollTop()){
                    $('html, body').animate({
                      scrollTop: $nav.offset().top
                    },{
                      duration: 300
                    });
                  }*/
                  $btn.attr('aria-expanded', 'true');
                  $panel.height(maxH()).attr('aria-hidden', 'false').scrollTop(0).one('transitionend', function(){
                    $panel.find('a').first().focus();
                  });
                  if(isNoFix){
                    $('body').css({'overflow': 'hidden'});
                  }
                  $nav.closest('.holdings-header').find('.holdings-header__search').trigger('searchClose');
                  $('.holdings-header__sub__nav').each(function(){
                    $(this).trigger('subnavClose');
                  });
                },
                close = function(){
                  $btn.attr('aria-expanded', 'false');
                  $panel.css('height', '').one('transitionend', function(){
                    $panel.attr('aria-hidden', 'true');
                    $('body').css({'overflow': ''});
                  });
                },
                maxH = function(){
                  var h = window.innerHeight,
                      $header = $nav.closest('.holdings-header__main');
                  if(!$header.hasClass('fix')){
                    h -= $nav.offset().top - $(window).scrollTop();
                  }
                  h -= $nav.outerHeight();
                  return h;
                };
            $nav.attr('id', 'holdings-header-nav-' + i).on('navClose', function(){
              if(!holdingsMql.matches && $btn.attr('aria-expanded') === 'true'){
                close();
              }
            }).on('click', function(e){
              e.stopPropagation();
            });
            $panel.attr({
              'id': $nav.attr('id') + '-panel',
              'aria-hidden': 'true'
            });
            $btn.attr({
              'aria-expanded': 'false',
              'aria-controls': $panel.attr('id')
            }).on('click', function(){
              if($btn.attr('aria-expanded') === 'false'){
                open();
              } else {
                close();
              }
            }).on('keydown', function(e){
              if(e.key === 'Tab' && e.shiftKey){
                $nav.trigger('navClose');
              }
            });
            $('body').on('click', function(){
              $nav.trigger('navClose');
            });
            $(window).on('scroll resize', function(e){
              if($btn.attr('aria-expanded') === 'true'){
                $panel.css('height', maxH() + 'px');
              }
              if(e.type === 'scroll' && isNoFix){
                $nav.trigger('navClose');
              }
            });
            $nav.find('a').last().on('keydown', function(e){
              if(e.key === 'Tab' && !e.shiftKey){
                close();
              }
            });
            holdingsMql.addEventListener('change', function(e){
              if(e.matches && isNoFix){
                $btn.attr('aria-expanded', 'false');
                $panel.attr('aria-hidden', 'true');
                $('body').css({'overflow': ''});
              }
            });
            //children
            var $hasChildrenItems = $('.holdings-header__nav__list__item', $nav).has('> .childlist');
            $hasChildrenItems.each(function(index, elm){
              var $item = $(elm),
                  $childBtn = $('.item-tglbtn', $item).eq(0),
                  $child = $item.children('.childlist'),
                  childOpen = function(){
                    $item.addClass('opened');
                    $childBtn.attr('aria-expanded', 'true');
                    $child.attr('aria-hidden', 'false').height($child.get(0).scrollHeight).one('transitionend', function(){
                      $child.css('height', 'auto').find('a').first().focus();
                    });
                  },
                  childClose = function(){
                    $childBtn.attr('aria-expanded', 'false');
                    $child.height($child.height()).height(0).one('transitionend', function(){
                      $item.removeClass('opened');
                      $child.attr('aria-hidden', 'true').css('height', '');
                    });
                  };
              $child.attr({
                'id': $nav.attr('id') + '-child-' + index,
                'aria-hidden': 'true'
              }).addClass('childlist');
              $childBtn.attr({
                'aria-controls': $child.attr('id'),
                'aria-expanded': 'false',
                'aria-label': $item.children('.item-box').find('a').text() + ' ' + $childBtn.find('img').eq(0).attr('alt')
              }).on('click', function(){
                if($childBtn.attr('aria-expanded') === 'false'){
                  childOpen();
                } else {
                  childClose();
                }
              });
              if($child.has('[aria-current="page"]').length){
                $item.addClass('opened');
                $childBtn.attr('aria-expanded', 'true');
                $child.attr('aria-hidden', 'false').css('height', 'auto');
              }
            });
          }
        });
      })
    })(jQuery);
    
    //header relnav
    (function($){
      $(function(){
        $('.holdings-header__rel__list__item.withlistmenu > a').each((index, elm) => {
          $(elm).on('click', (e) => {
            e.preventDefault();
          });
          $(elm).on('mouseleave', (e) => {
            $(elm).blur();
          });
        });
      });
    })(jQuery);
    
    //search
    (function($){
      $(function(){
        $('.holdings-header__search').each(function(index, elm){
          var $search = $(elm),
              $header = $(elm).closest('.holdings-header__fixarea'),
              $form = $('.holdings-header__search__form', $search),
              $field = $('.holdings-header__search__inputtx', $search),
              $panel = $('.holdings-header__search__panel', $search),
              $btn = $('.holdings-header__search__tglbtn', $search),
              $submitBtn = $('.holdings-header__search__button', $search),
              $panelID = 'holdings-header__search__panel-' + index,
              open = function(){
                if($panel.data('anim-status') === 'running') {
                  return this;
                }
                $btn.attr('aria-expanded', 'true');
                $panel.attr('aria-hidden', 'false').data('anim-status', 'running').one('transitionend', function(){
                  $panel.data('anim-status', '');
                  $field.focus();
                });
                if($header.hasClass('fix')){
                  $header.find('.holdings-header__nav.horizontal').fadeOut(300);
                } else {
                  $header.find('.holdings-header__relnav .holdings-header__rel__list').fadeOut(300);
                }
                $search.closest('.holdings-header').find('.holdings-header__nav').trigger('navClose');
                $('.holdings-header__sub__nav').each(function(){
                  $(this).trigger('subnavClose');
                });
              },
              close = function(){
                if($panel.data('anim-status') === 'running') {
                  return this;
                }
                $btn.attr('aria-expanded', 'false');
                if(holdingsMql.matches){
                  $panel.width(0);
                } else {
                  $panel.height(0);
                }
                $header.find('.holdings-header__relnav .holdings-header__rel__list').fadeIn(300);
                $header.find('.holdings-header__nav.horizontal').fadeIn(300);
                $panel.data('anim-status', 'running').one('transitionend', function(){
                  $panel.attr('aria-hidden', 'true').css({width:'', height:''}).data('anim-status', '');
                });
              }
          ;
          $panel.attr({
            'id': $panelID,
            'aria-hidden': 'true'
          }).data('anim-status');
          $btn.attr({
            'aria-controls': $panelID,
            'aria-expanded': 'false'
          }).on('click', function(e){
            if($btn.attr('aria-expanded') === 'false'){
              open();
            } else {
              close();
            }
          }).on('keydown', function(e){
            if(e.key === 'Tab' && e.shiftKey){
              $search.trigger('searchClose');
            }
          });
          $search.on('keyup', function(){
            var textval = $field.val();
            if(textval !== ''){
              $field.addClass('contained');
            } else {
              $field.removeClass('contained');
            }
          }).on('click', function(e){
            e.stopPropagation();
          }).on('searchClose', function(){
            if($btn.attr('aria-expanded') === 'true'){
              close();
            }
          });
          $('body').on('click', function(){
            $search.trigger('searchClose');
          });
          $(window).on('scroll', function(){
            if(holdingsMql.matches){
              $search.trigger('searchClose');
            }
          });
          $form.on('submit', function(e){
            if($field.val() === ''){
              e.preventDefault();
            }
          });
          $submitBtn.on('keydown', function(e){
            if(e.key === 'Tab' && !e.shiftKey){
              $search.trigger('searchClose');
            }
          });
        });
      });
    })(jQuery);
    
    //titlenav subnav
    (function($){
      $(function(){
        $('.holdings-titlenav').each(function(index, elm){
          var $subnav = $(elm).find('.holdings-header__sub__nav'),
              $btn = $('.holdings-header__sub__nav__tglbtn', $subnav),
              $panel = $('.holdings-header__sub__nav__panel', $subnav),
              $panelID = 'holdings-header__sub__nav__panel-' + index,
              open = function(){
                $btn.attr('aria-expanded', 'true');
                $panel.attr('aria-hidden', 'false').height(maxH()).scrollTop(0).one('transitionend', function(){
                  $panel.find('a').first().focus();
                });
                $('.holdings-header').find('.holdings-header__nav').trigger('navClose');
                $('.holdings-header').find('.holdings-header__search').trigger('searchClose');
              },
              close = function(){
                $btn.attr('aria-expanded', 'false');
                $panel.height(0).one('transitionend', function(){
                  $panel.attr('aria-hidden', 'true').css({'height': ''});
                });
              },
              maxH = function(){
                var h = window.innerHeight,
                    $browsebar = $subnav.closest('#browsebar');
                if($browsebar.hasClass('fix')){
                  h -= $browsebar.position().top;
                } else {
                  h -= $subnav.offset().top - $(window).scrollTop();
                }
                h -= $subnav.outerHeight();
                return h;
              };
          $panel.attr({
            'id': $panelID,
            'aria-hidden': 'true'
          }).append($subnav.find('.holdings-header__sub__nav__list').eq(0).clone());
          $btn.attr({
            'aria-controls': $panelID,
            'aria-expanded': 'false'
          }).on('click', function(e){
            e.preventDefault();
            if($btn.attr('aria-expanded') === 'false'){
              open();
            } else {
              close();
            }
          }).on('keydown', function(e){
            if(e.key === 'Tab' && e.shiftKey){
              $subnav.trigger('subnavClose');
            }
          });
          $subnav.on('click', function(e){
            e.stopPropagation();
          }).on('subnavClose', function(){
            if(!holdingsMql.matches && $btn.attr('aria-expanded') === 'true'){
              close();
            }
          });
          $('body').on('click', function(){
            $subnav.trigger('subnavClose');
          });
          $(window).on('scroll', function(){
            if($btn.attr('aria-expanded') === 'true'){
              $panel.css('height', maxH() + 'px');
            }
          });
          $panel.find('a').last().on('keydown', function(e){
            if(e.key === 'Tab' && !e.shiftKey){
              $subnav.trigger('subnavClose');
            }
          });
          //children
          var $hasChildrenItems = $('.holdings-header__sub__nav__list__item', $subnav).has('> .childlist');
          $hasChildrenItems.each(function(index, elm){
            var $item = $(elm),
                $childBtn = $('.item-link:only-child, .item-tglbtn', $item).eq(0),
                $childBtnPC = $('.item-link:not(last-child)', $item).eq(0).clone().addClass('tgl'),
                $childCloseBtn = $('.childlist__header__closebtn', $item).eq(0),
                $child = $item.children('.childlist'),
                childOpen = function(){
                  $item.addClass('opened');
                  $childBtn.attr('aria-expanded', 'true');
                  $childBtnPC.attr('aria-expanded', 'true');
                  $child.attr('aria-hidden', 'false').height($child.get(0).scrollHeight).one('transitionend', function(){
                    $child.css('height', 'auto').find('a, button').filter(':visible').first().focus();
                  });
                },
                childClose = function(){
                  $childBtn.attr('aria-expanded', 'false');
                  $childBtnPC.attr('aria-expanded', 'false');
                  $child.height($child.height()).height(0).one('transitionend', function(){
                    $item.removeClass('opened');
                    $child.attr('aria-hidden', 'true').css('height', '');
                  });
                };
            $item.find('.item-box').eq(0).prepend($childBtnPC);
            $child.attr({
              'id': $panel.attr('id') + '-child-' + index,
              'aria-hidden': 'true'
            }).addClass('childlist');
            $childBtn.filter('.item-tglbtn').attr({
              'aria-label': $item.children('.item-box').find('.item-link:not(.tgl)').text() + ' ' + $childBtn.find('img').eq(0).attr('alt')
            });
            $childBtn.add($childBtnPC).attr({
              'role': 'button',
              'aria-controls': $child.attr('id'),
              'aria-expanded': 'false'
            }).on('click', function(e){
              e.preventDefault();
              if($childBtn.attr('aria-expanded') === 'false'){
                childOpen();
              } else {
                childClose();
              }
              if(!$item.parents('.holdings-header__sub__nav__panel').length){
                $item.siblings('.holdings-header__sub__nav__list__item.opened').each(function(){
                  $(this).trigger('subnavChildClose');
                });
              }
            });
            $childCloseBtn.on('click', function(){
              childClose();
            });
            $item.on('subnavChildClose', function(){
              if($childBtn.attr('aria-expanded') === 'true'){
                childClose();
              }
            });
            $(window).on('scroll', function(){
              if(!$item.parents('.holdings-header__sub__nav__panel').length){
                $item.trigger('subnavChildClose');
              }
            });
            $('body').on('click', function(){
              if(!$item.parents('.holdings-header__sub__nav__panel').length){
                $item.trigger('subnavChildClose');
              }
            });
            if(!$item.parents('.holdings-header__sub__nav__panel').length){
              $child.find('a').last().on('keydown', function(e){
                if(e.key === 'Tab', !e.shiftKey){
                  $item.trigger('subnavChildClose');
                }
              });
              $child.find('a, button').first().on('keydown', function(e){
                if(e.key === 'Tab' && e.shiftKey){
                  $item.trigger('subnavChildClose');
                }
              });
            }
            if($item.parents('.holdings-header__sub__nav__panel').length && $child.has('[aria-current="page"]').length){
              childOpen();
            }
          });
        });
      });
    })(jQuery);
    
    //footer fix
    (function($){
      window.addEventListener('load', function(){
        const getStickyH = function(){
          return getComputedStyle(document.querySelector(':root')).getPropertyValue('--sticky-h');
        };
        const observer = new IntersectionObserver(
          function(entries, observer){
            entries.forEach(function(entry){
              if(entry.isIntersecting){
                entry.target.classList.remove('fix');
              } else {
                entry.target.classList.add('fix');
              }
            });
          },
          {
            rootMargin: `0px 0px -${getStickyH().trim()} 0px`
          }
        );
        const $footer = document.querySelector('.holdings-footer');
        observer.observe($footer);
      });
    })(jQuery);
    
    //pagetop
    (function($){
      var $pagetop = $();
      $(function(){
        $pagetop = $('.holdings-footer__pagetop');
        $pagetop.find('a').on('click', function(e){
          e.preventDefault();
          $('html, body').animate({
            scrollTop: 0
          },{
            duration: 300
          });
        });
      });
      $(window).on('load scroll', function(){
        if($(window).scrollTop() > window.innerHeight){
          $pagetop.addClass('show');
        } else {
          $pagetop.removeClass('show');
        }
      });
    })(jQuery);
    
    // footer padding
    (function($){
      var setPadding = function(){
        const stickyItems = [];
        let sticky_h = 0;
        if($('.stickymenu').length) {
          stickyItems.push($('.stickymenu'));
        }
        if(window.matchMedia('(max-width:640px) and (max-device-width:1280px)').matches && $('.product-pagenavi.visible.show').length) {
          stickyItems.push($('.product-pagenavi.visible.show'));
        }
        if(stickyItems.length){
          $.each(stickyItems, (i,v) => {
            sticky_h += $(v).outerHeight();
          });    
          document.querySelector(':root').style.setProperty('--sticky-h', sticky_h + 'px');
        }
      };
      $(window).on('load resize scroll', function(){
        setPadding();
      });
    })(jQuery);