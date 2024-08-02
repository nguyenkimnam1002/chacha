//copyguard
(function($){
	$.fn.copyguardImage = function(){
		var dummysrc = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw%3D%3D';
    $.each(this, function(index, value){
      var $this = $(this);
      if($this.get(0).tagName == 'img' || $this.get(0).tagName == 'IMG' ){
				$this.on('contextmenu', function(e){
					return false;
				});
        $this.on('dragstart', function(e){
          e.preventDefault();
          return false;
        });
				$this.on('touchstart',function(e){
					var imgsrc = $this.attr('src');
					if (imgsrc.match(dummysrc)) {
						return;
					}
					var w = $this.width();
					var h = $this.height();
					$this.attr('src', dummysrc).width(w).height(h);
					$this.css({
						background: 'url(' + encodeUriWithoutParams(imgsrc) + ') no-repeat',
						webktBackgroundSize: '100% 100%',
						backgroundSize: '100% 100%'
					});
					$this.data('src-org', imgsrc);
				});
				$(window).on('resize', function(e){
					var imgsrc = $this.attr('src');
					if (imgsrc.match(dummysrc)) {
						imgsrc = $this.data('src-org');
					}
					if (!imgsrc || imgsrc.match(dummysrc)) {
						return;
					}
					$this.attr('src',imgsrc).removeAttr('style');
				});
      }
    });
		function encodeUriWithoutParams(uri) {
			if (!uri) return uri;
			var uriOrParamsArray = uri.split('?');
			var encodedUri = encodeURI(uriOrParamsArray.shift());
			return [encodedUri].concat(uriOrParamsArray).join('?');
		}
	};
	$(function(){
		$('.copyguard').copyguardImage();
	});
})(jQuery, window, document);
