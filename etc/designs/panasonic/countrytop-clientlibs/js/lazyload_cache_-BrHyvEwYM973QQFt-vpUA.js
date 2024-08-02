/* Implementation for Country Top. */
(function($) {

	/* Lazily load each image */
	if (GWCLazyLoad) {
		var opts = { rootMargin : "100px" };
		/* Tile Area component : tile */
		GWCLazyLoad.lazyload(opts, $(".visualpanels__container"));

        /* Menu component : Image + Text L1 menu */
		GWCLazyLoad.lazyload({}, $(".l1item-link"));

		/* Menu component : Category Top menu */
		GWCLazyLoad.lazyload({}, $(".consumerpanel__learnabout__list"));

		/* Menu component : Cross-Category Top menu */
		GWCLazyLoad.lazyload({}, $(".consumerpanel__banner__container"));

		/* Footer */
		GWCLazyLoad.lazyload({}, $(".pagefooter"));

		/* Disable lazy loading when beforeprint */
		$(window).one('beforeprint', function() {
			GWCLazyLoad.loadAll();
		});
	}
})(jQuery);