var snsgadgetData = snsgadgetData || {
    facebook: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-facebook.svg" alt="facebook">',
      panel: $('<div class="fb-page" data-href="" data-tabs="timeline" data-width="" data-height="" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/facebook"></a></blockquote></div>'),
      func: function(obj, _href, _title){
        var $obj = $(obj);
        var $fb_page = $('.fb-page', $obj);
        var timer = false;
              var timerFB = false;
              function setFB(){
                  if(!window.FB){
                      timerFB = setTimeout(function(){
                          setFB();
                      },100);
                  } else {
                      if(timerFB !== false){
                          clearTimeout(timerFB);
                      }
                      if(!$obj.data('isLoaded')){
                          $fb_page.attr({
                              'data-width': Math.floor($obj.width()), 
                              'data-height': Math.floor($obj.height()),
                          });
                          if(FB.XFBML && $fb_page.has('iframe') && Math.floor($obj.width()) !== $fb_page.width()){
                              FB.XFBML.parse($obj.get(0));
                          }
                          $(window).on('resize', function(){
                              if(timer !== false){
                                  clearTimeout(timer);
                              }
                              timer = setTimeout(function(){
                                  if(Math.floor($obj.width()) !== $fb_page.width()){
                                      $fb_page.attr({'data-width': Math.floor($obj.width()), 'data-height': Math.floor($obj.height())});
                                      FB.XFBML.parse($obj.get(0));
                                  }
                              }, 200);
                          });
                          $obj.data('isLoaded', true);
                      } else {
                          if(Math.floor($obj.width()) !== $fb_page.width()){
                              $fb_page.attr({'data-width': Math.floor($obj.width()), 'data-height': Math.floor($obj.height())});
                              FB.XFBML.parse($obj.get(0));
                          }
                      }
                  }
              };
              setFB();
      }
    },
    twitter: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-x.svg" alt="X">',
      panel: $('<a data-height="" class="twitter-timeline" href=""></a>'),
      func: function(obj){
        var $obj = $(obj);
        if(!$obj.data('isLoaded')){        
          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
          if(typeof window.twttr !== 'undefined'){
            window.twttr.widgets.load();
          }
          $obj.data('isLoaded', true);
        }
      }
    },
    youtube: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-youtube.svg" alt="youtube">',
      panel: $('<div class="load"></div><div class="snsyoutube"><ul class="videoslist"></ul></div>'),
      func: function (obj, servletUrl, bn) {
        var $obj = $(obj);
        if(!$obj.data('isLoaded')){
            $.ajax({
              type: 'GET',
              url: servletUrl + '?v=' + bn,
              cache: true,
              dataType: 'json',
              success: function (json) {
                getList(json);
                $obj.data('isLoaded', true);
              },
              error: function () {}
            });
        }
        function getList(json) {
          $('.load', $obj).fadeOut();
          var videos = json.items;
          var channelTitle = '';
          $.each(videos, function (i, video) {
            var snippet = video.snippet;
            if (i === 0) {
              var relAttr = '';
              if (GwcCommon.newWindowRel && GwcCommon.newWindowRel.length > 0) {
                  relAttr = 'rel="' + GwcCommon.newWindowRel + '"';
              }
              channelTitle = '<h4 class="channelttl"><a href="https://www.youtube.com/channel/' + snippet.channelId + '" target="_blank" ' + relAttr + '>' + snippet.channelTitle + ' - Youtube</a></h4>';
            }
            var imgURL = snippet.thumbnails.default.url;
            var s = '';
            s += '<div class="thumb"><img src="' + imgURL + '" alt="" /></div>';
            s += '<div class="videodata">';
            s += '<div class="title">' + snippet.title + '</div>';
            s += '<p>' + snippet.description + '</p>';
            s += '</div>';
            $('.snsyoutube .videoslist', $obj).append('<li class="videoslist__item "><a href="https://www.youtube.com/watch?v=' + snippet.resourceId.videoId + '">' + s + '</a></li>');
            $('.video').fadeIn(1000);
          });
          $('.snsyoutube', $obj).prepend(channelTitle);
        }
      }
    },
    youku: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-youku2.png" alt="youku">',
      panel: $('<div class="load"></div><div class="snsyoutube"><ul class="videoslist"></ul></div>'),
      func: function (obj, uid, cid, cttl) {
        var $obj = $(obj);
        var clientId = cid;
        var userId = uid;
        var apiVideoByUser = 'https://openapi.youku.com/v2/videos/by_user.json';
        var apiVideoByUserData = 'client_id=' + clientId + '&user_id=' + userId + '&orderby=published&page=1&count=10';
        if(!$obj.data('isLoaded')){
          $.getJSON(apiVideoByUser, apiVideoByUserData).done(function(json) {
            /* $('#result').text(JSON.stringify(json)); */
            getListYouku(json);
            $obj.data('isLoaded', true);
          });
        }
        function getListYouku(json) {
          $.each(json.videos, function(i, item) {
            var s = '';
            s += '<div class="thumb"><img src="' + item.thumbnail + '" /></div>';
            s += '<div class="videodata">';
            s += '<div class="title">' + item.title + '</div>';
            s += '</div>';
            $('.snsyoutube .videoslist', $obj).append('<li class="videoslist__item "><a href="' + item.link + '">' + s + '</a></li>');
            $('.video').fadeIn(1000);
          });
                  if(cttl && cttl !== ''){
                      $('.snsyoutube', $obj).prepend('<h4 class="channelttl">' + cttl + '</h4>');
                  }
        }
      }
    },
    vk: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-vk.svg" alt="vk">',
      panel: $('<div class="vk_groups"></div>'),
      func: function (obj, cid, _id) {
        !function(d,s,id){
          var js = d.createElement('script');
          if(!d.getElementById(id)){
            js.id = id;
            js.src = '//vk.com/js/api/openapi.js?101';
            js.setAttribute('async', 'true');
            d.body.appendChild(js);
          }
        }(document, 'script', 'vkwidget-js');
        var vkCommunityId = cid;
        var $vkWidget = $(obj);
        var createVkWidget = function () {
          if (!$vkWidget.data('isLoaded')) {
            var i = 0;
            var sid = setInterval(function () {
              if (window.VK) {
                var color1 = 'FFFFFF';
                var color2 = '2B587A';
                var color3 = '5B7FA6';
                VK.Widgets.Group(_id, {
                  mode: 2,
                  width: $vkWidget.width(),
                  height: $vkWidget.height(),
                  color1: color1,
                  color2: color2,
                  color3: color3
                }, vkCommunityId);
                clearInterval(sid);
              }
              if (i > 10) {
                clearInterval(sid);
              }
              i += 1;
            }, 200);
            $vkWidget.data('isLoaded', true);
          }
        };
        createVkWidget();
      }
    },
    instagram: {
      tab: '<img src="/etc/designs/panasonic/common-clientlibs/images/icn-sns-instagram.svg" alt="instagram">',
      panel: $('<div class="instagram-container"></div>'),
      func: function (obj, _urls) {
        var $obj = $(obj);
        var $container = $('.instagram-container', $obj);
        var urls = _urls.split(',');
              var addMedia = function(){
          var d = new $.Deferred();
          $(urls).each(function(i,v){
            $('<div class="instagram-item"><blockquote class="instagram-media" data-instgrm-permalink="'+v+'?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:240px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"></blockquote></div>').appendTo($container);
            //$('<div class="instagram-item"><blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="'+v+'?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:240px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"></blockquote></div>').appendTo($container);
                          if(i >= urls.length - 1){
                              d.resolve();
                          }
          });
          return d.promise();
        };
        if(!$obj.data('isLoaded')){
                  addMedia().then(function(){
                      !function(d,s,id){
                          var js = d.createElement('script');
                          if(!d.getElementById(id)){
                              js.id = id;
                              js.src = 'https://www.instagram.com/static/bundles/metro/EmbedSDK.js/33cd2c5d5d59.js';
                              js.setAttribute('async', 'true');
                              d.body.appendChild(js);
                d.getElementById(id).addEventListener('load', function(){
                  if(typeof window.instgrm !== 'undefined' && window.instgrm.Embeds){
                    window.instgrm.Embeds.process();
                  }
                });
                          } else {
                if(typeof window.instgrm !== 'undefined' && window.instgrm.Embeds){
                  window.instgrm.Embeds.process();
                }
              }
                      }(document, 'script', 'instagram-js');
                      $obj.data('isLoaded', true);
                  });
        }
      }
    }
  };