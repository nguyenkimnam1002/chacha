/* Common API. */
var GWCLazyLoad = {
	opts : {},

	init : function() {

		var mergedOpts = {
			data_attribute : "src",
			rootMargin : "0px",
			target_selector : ".lazy",
			load : $.noop
		};

		var threshold = mergedOpts.rootMargin;

		if (!!$.lazyloadOptions) {
			if (isMobile()) {
				threshold = $.lazyloadOptions.threshold_mobile;
			} else {
				threshold = $.lazyloadOptions.threshold;
			}
		}

		mergedOpts.rootMargin = threshold + "px";

		this.opts = mergedOpts;
	},

	lazyload : function(options, $targets) {

		this.init();

		var mergedOpts = this.opts;
		var paramOpts = options || {};
		$.extend(mergedOpts, paramOpts);

		var observer = new IntersectionObserver(callback, mergedOpts);

		/* Add targets to Observer */
		$targets.each(function() {

			/*
			 * If the target has been already added to Observer, no more target
			 * is added to observer.
			 */
			if (!$(this).data("lazy-observed")) {
				observer.observe(this);
				$(this).data("lazy-observed", true);
			}
		});

		function callback(entries, cbObserver) {
			entries.forEach(function(entry) {
				if (!entry.isIntersecting) {
					return;
				}

				var observedTrgt = entry.target;
				var $observedTrgt = $(observedTrgt);

				var nodeName = $observedTrgt[0].nodeName.toLowerCase();

				if ((nodeName == "img" || nodeName == "picture") &&
					$observedTrgt.is(mergedOpts.target_selector)) {
					/* Target is img tag or picture tag. */
					GWCLazyLoad.loadImage(observedTrgt, mergedOpts.data_attribute, mergedOpts.load);
				} else {
					/* The container having the img tags or picture tags must be lazily loaded. */
					$observedTrgt.find("img,picture").filter(mergedOpts.target_selector).each(function() {
						GWCLazyLoad.loadImage(this, mergedOpts.data_attribute, mergedOpts.load);
					});
				}

				cbObserver.unobserve(observedTrgt);
			});
		};
	},

	loadAll : function(options, $targets) {

		this.init();

		var mergedOpts = this.opts;
		var paramOpts = options || {};
		$.extend(mergedOpts, paramOpts);

		var $images = null;

		if ($targets) {
			$images = $targets;
		} else {
			$images = $("img").filter(mergedOpts.target_selector);
		}

		$images.each(function() {
			GWCLazyLoad.loadImage(this, mergedOpts.data_attribute, mergedOpts.load);
		});
	},

	loadImage : function(tag, dataSourceAttr, loadedCallback) {
		var $tag = $(tag);
		var nodeName = $tag[0].nodeName.toLowerCase();

		if (nodeName == "img" || nodeName == "source") {			
			var realImg = $tag.data(dataSourceAttr);
			var lazyLoaded = $tag.data("lazy-loaded");
			
			if (realImg && !lazyLoaded) {
				$tag.one('load', function() {
					$tag.attr("data-lazy-loaded", true);
					if ($.isFunction(loadedCallback)) {
						$.proxy(loadedCallback, $tag)();
					}
				});
				$tag.attr(nodeName == "img" ? "src" : "srcset", realImg);
			}
		} else if (nodeName == "picture") {
			$tag.find("source").each(function() {
				GWCLazyLoad.loadImage(this, dataSourceAttr, loadedCallback);
			});

			// Get img src
			var failOverImg = isMobile() ? $tag.find("source[data-layout='mobile']").data(dataSourceAttr) : $tag.find("source[data-layout='pc']").data(dataSourceAttr);

			$tag.find("img").each(function() {
				// set the dataSource to the image for failover.
				$(this).attr("data-" + dataSourceAttr, failOverImg);
				GWCLazyLoad.loadImage(this, dataSourceAttr, loadedCallback);
			});
		}
	}
};