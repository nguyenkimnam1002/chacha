/**
 * GWC Cookie Manager.
 * 
 * As a cookie policy handled by the system, the Opt In / Opt Out status of the following cookie categories is managed.
 * 
 *  * Strictly Necessary Cookies
 *  * Performance Cookies
 *  * Functional Cookies
 *  * Targeting Cookies
 *  * Social Media Cookies
 *  
 *  GWCCookieManager has a CookieConsent object for each cookie categories.
 *  
 *  @properties
 *    GWCCookieManager.StrictlyNecessaryCookies : CookieConsent of Strictly Necessary Cookies
 *    GWCCookieManager.PerformanceCookies : CookieConsent of Performance Cookies
 *    GWCCookieManager.FunctionalCookies : CookieConsent of Functional Cookies
 *    GWCCookieManager.TargetingCookies : CookieConsent of Targeting Cookies
 *    GWCCookieManager.SocialMediaCookies : CookieConsent of Social Media Cookies
 * 
 *    GWCCookieManager.cookieCategories : List of cookie categories
 * 
 * CookieConsent has the following methods.
 *  @method
 *    optedIn(function: callback) :
 *      Argument callback function is executed at Opt In.
 *    optedOut(function: callback) :
 *      Argument callback function is executed at Opt Out.
 *      "isStrict" is passed as an argument of the callback function.
 *      If isStrict is true, you are explicitly opting out.
 *      If isStrict is false, it means that Opt In is not done. (Selection pending)
 * 
 *  Usage:
 *  // Waiting for document-ready
 *  $(function() {
 *    GWCCookieManager.StrictlyNecessaryCookies.optedIn(function() {
 *      // Implementation when Opt In
 *    });
 * 
 *    // or below
 *    GWCCookieManager.of(GWCCookieManager.StrictlyNecessaryCookies, GWCCookieManager.TargetingCookies).optedIn(function() {
 *      // Implementation when Opt In both of StrictlyNecessaryCookies and TargetingCookies
 *    });
 *  });
 * 
 * @version 1.0.0
 */
(function(win, $) {
	var CookieConsent = function(cookieCategoryName) {
		this.categoryName = cookieCategoryName;
	};

	CookieConsent.prototype = {
		optedIn : function(callback) {
			this.isOpted().done(callback);
			return this;
		},
		optedOut : function(callback) {
			this.isOpted().fail(callback);
			return this;
		},
		/**
		 * Check the cookie consent status.
		 * By default, it is always Opt In. You need to override it if necessary.
		 * @return jQuery.Deferred#promise()
		 */
		isOpted : function($d_cookieStateDeferred) {
			return $.Deferred().resolve().promise();
		}
	};

	win.GWCCookieManager = $.extend(win.GWCCookieManager, {
		registCookieCategory: function(cookieCategoryName) {
			this.cookieCategories = this.cookieCategories || [];
			var cookieCategory = new CookieConsent(cookieCategoryName);
			this.cookieCategories.push(cookieCategory);
			this[cookieCategoryName] = cookieCategory;
		},
		/**
		 * Check the consent status of multiple cookie categories at once.
		 * Specify the multiple CookieConsent object in the argument.
		 * Return the CookieConsentGroup object, so call optedIn () or optedOut (),
		 * and implement the processing according to the cookie state in the callback function.
		 * @return CookieConsentGroup
		 */
		"of" : function() {
			var CookieConsentGroup = function(cookieConsents) {
				this.cookieConsents = cookieConsents;
			};

			CookieConsentGroup.prototype = {
				optedIn : function(callback) {
					this._makePromiseObj().done(callback);
					return this;
				},
				optedOut : function(callback) {
					this._makePromiseObj().fail(callback);
					return this;
				},
				_makePromiseObj : function() {
					return $.when.apply(null, $.map(this.cookieConsents, function(cc) {
						return cc.isOpted();
					}));
				}
			};
			return new CookieConsentGroup($.map(arguments, function(cc) {
				if (cc instanceof CookieConsent) {
					return cc;
				}
			}));
		}
	});
	win.GWCCookieManager.registCookieCategory('StrictlyNecessaryCookies');
	win.GWCCookieManager.registCookieCategory('PerformanceCookies');
	win.GWCCookieManager.registCookieCategory('FunctionalCookies');
	win.GWCCookieManager.registCookieCategory('TargetingCookies');
	win.GWCCookieManager.registCookieCategory('SocialMediaCookies');
})(window, jQuery);