if (!window.TopicsSocialUtil) TopicsSocialUtil = {};
/* Public */
(function ($) {
	TopicsSocialUtil.render = function (options) {

		options = $.extend({
			url: null,
			targetId: '',
			templateId: '',
			max: null,
			defaultImage: null,
			newsfillter: '',
			cache: true
		}, options);

		/* Show No Result Message */
		var showNoRsltMsg = function () {
			/* nothing to do */
		};

		/* Render */
		var renderHtml = function (items) {
			var optionNode = $("#" + options.targetId);
			if (optionNode.length > 0) {
				$.each(items, function (i, v) {
					var itemNode = $('<li class="topicssocial__list__item item-topics"></li>');
					itemNode.append(_gwc.template($('#' + options.templateId).html(), {params: v}));
					optionNode.append(itemNode);
				});

				/* Lazy Load */
				GWCLazyLoad.lazyload({}, $("#" + options.targetId));
				/* Copy Guard */
				$('#' + options.targetId + ' img.copyguard').copyguardImage();
			}
		};

		/* Parse */
		$.ajax({
			type: 'GET',
			url: options.url,
			cache: options.cache,
			dataType: 'json',
			success: function (json) {
				var len = Math.min(json.items.length, options.max);
				if (len === 0) {
					showNoRsltMsg();
				} else {
					var feed = [];
					for (var i = 0; i < len; i++) {
						var item = new TopicsSocialUtil.FeedItem();
						var jsonItem = json.items[i];
						item.title = jsonItem.title;
						item.shortTitle = jsonItem.shortTitle;
						item.link = jsonItem.link;
						item.pubDate = jsonItem.pubDate;
						item.description = jsonItem.notagDescription;
						item.shortDescription = jsonItem.shortDescription;
						item.image = jsonItem.image;
						item.imageAlt = jsonItem.imageAlt;
						if (jsonItem.image.length == 0) {
							item.image = options.defaultImage;
							item.imageAlt = "";
						}
						item.tagTitles = [];
						item.tagShortTitles = [];
						item.urls = [];
						var taglen = jsonItem.shortTag.length;
						for (var j = 0; j < taglen; j++) {
							var jsonTag = jsonItem.shortTag[j];
							item.tagTitles.push(jsonTag.title);
							item.tagShortTitles.push(jsonTag.shortTitle);
							item.urls.push(jsonTag.url);
						};
						feed.push(item);
					};
					renderHtml(feed);
				}
			},
			error: function () {
				showNoRsltMsg();
			}
		});
	};

	/* Private */
	(function () {
		function FeedItem() { };
		FeedItem.prototype = {
			title: '',
			shortTitle: '',
			link: '',
			pubDate: '',
			description: '',
			shortDescription: '',
			image: '',
			imageAlt: ''
		};
		TopicsSocialUtil.FeedItem = FeedItem;
	})();

	/* execute each component. */
	$(".topicssocial__list.rssnews").each(function(index, element) {
		var $news = $(this);
		var params = {
			url : $news.data("url"),
			targetId : $news.data("targetid"),
			templateId : $news.data("templateid"),
			defaultImage : $news.data("defaultimage")
		};

		var max = $news.data("max");
		if (max > 0) {
			params.max = max;
		}
		
		TopicsSocialUtil.render(params);
	});

})(jQuery);