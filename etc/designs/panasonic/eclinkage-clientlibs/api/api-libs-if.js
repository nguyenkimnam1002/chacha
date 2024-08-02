// EC Integration JS - for API common core
!function($, root) {
	if (!root.EC) {
		return false;
	}
	var EC = root.EC;
	$.extend(EC.Api, {
		/*
		 * call the getProductPrice-API.
		 * @return jQuery.Deferred object. If successfully obtained, and resumes processing delay
		 */
		getProductPrice: function(productApiParams) {
			if (EC.Utils.isEmptyArray(productApiParams) || !$.isFunction(this.getProductPriceImpl)) {
				return $.Deferred().resolveWith(this, [new EC.Model.ProductInfo()]).promise();
			}
			return this.getProductPriceImpl(productApiParams);
		},
		/*
		 * Usable Add to Basket API?
		 */
		isUsableBasket: function() {
			return false;
		}
	});

	$.extend(EC.Model, {
		ProductApiParam: function(api_id, vari_num) {
			this.api_id = api_id;
			this.vari_num = vari_num;
		},
		ProductInfo: function() {
			this.product_items = new Hashtable();
		},
		ProductItem: function() {
		},
		ImageItem: function(src, alt, title) {
			this.src = src;
			this.alt = alt;
			this.title = title;
		},
		LinkItem: function(href, target) {
			this.href = href;
			this.target = (target ? '_blank' : null);
		}
	});

	// define ProductApiParam's property
	$.extend(EC.Model.ProductApiParam.prototype, {
		// properties
		api_id: null,
		vari_num: null,
		// methods(for Hashtable)
		equals: function(obj) {
			return (obj instanceof EC.Model.ProductApiParam) && this.hashCode() == obj.hashCode();
		},
		hashCode: function() {
			return _gwc.values(this).join(',');
		}
	});

	// define ProductInfo's property
	$.extend(EC.Model.ProductInfo.prototype, {
		// properties
		product_price_annotation: null,
		product_price_title: null,
		product_price: null,
		sales_price_title: null,
		sales_price: null,
		hide_product_price: false,
		/* GWC mod start */
		hide_sales_price: false,
		/* GWC mod end */
		buy_from_panasonic_link: null,
		where_to_buy_link: null,
		buy_link: null,
		product_items: null,
		// methods
		getFirstSellableProductItem: function() {
			return _gwc.find(this.product_items.values().reverse(), function(item) {
				return item.sellable;
			});
		},
		hasSellableProduct: function() {
			return !!this.getFirstSellableProductItem();
		}
	});

	// define ProductItem's property
	$.extend(EC.Model.ProductItem.prototype, {
		parent: null,
		product_id: null,
		price: null,
		sellable: false
	});

	// define ImageItem's property
	$.extend(EC.Model.ImageItem.prototype, {
		// properties
		src: null,
		alt: null,
		title: null,
		// methods
		isEnabled: function() {
			return !!this.src;
		},
		toElement: function() {
			return $('<img>').attr(_gwc.pick(this, 'src', 'alt', 'title'));
		}
	});

	// define LinkItem's property
	$.extend(EC.Model.LinkItem.prototype, {
		// properties
		href: null,
		target: null,
		// methods
		isEnabled: function() {
			return !!this.href;
		},
		toElement: function() {
			return $('<a>').attr(this.toAttrs());
		},
		toAttrs: function() {
			var attrs = _gwc.pick(this, 'href', 'target');
			if (attrs.target == '_blank' && !!GwcCommon.newWindowRel) {
				attrs.rel = GwcCommon.newWindowRel;
			}
			return attrs;
		}
	});

// Root will be 'window' in browser or 'global' on the server:
}(jQuery, this);