var _gaq = _gaq || [];

var browser = "";
(function(){
	if(!jQuery.support.opacity){
    	if(!jQuery.support.tbody){
			browser = "ie7or6";
		}else{
			browser = "ie8";
   		}
	}
});

/* BUILD VERSION 0.1.83 */
var addthis_config = addthis_config || {};
addthis_config.ui_offset_top = 0;

var isMobile = function() {
	return window.matchMedia('(max-width: 767px)').matches;
};

/* for Cookie Policy */
var GwcCommon = {
	/* cookie-policy related utilities. */
	cookiePolicyOptIn: $.Deferred(),
	isCookieUsable: function(){return !window.CookiePolicy || cookieStatus == 0;},

	/*
	 * After logging in, viewing a non-authenticated pages to redirect to the authentication page path.
	 */
	authAreaForwardPath: '',
	/*
	 * Gets the forwardPath.
	 * GwcCommon.authAreaForwardPath(if specified) or own page path.
	 */
	getForwardPath: function() {
		return GwcCommon.authAreaForwardPath || document.location.pathname;
	},
	getSamlUrl: function(basePath) {
		var params = {relayState: document.location.pathname, d: document.domain};
		if (basePath.match(/\{0\}/)) {
			return basePath.replace(/\{0\}/, 'relay=' + encodeURIComponent('relayState='+params.relayState+'&d='+params.d));
		}
		return basePath + '?' + $.param(params);
	},
	replaceUrlForLogin: function(target) {
		$(target).prop('href', GwcCommon.getSamlUrl($.trim($('#sp_sso_login_url_eu').text()) || 'https://' + document.domain + '/servlet/saml/login'));
	},
	replaceUrlForLogout: function(target) {
		$(target).prop('href', GwcCommon.getSamlUrl($.trim($('#sp_sso_logout_url_eu').text()) || 'https://' + document.domain + '/servlet/saml/logout'));
	},
	/*
	 * Always On SSL flag
	 */
	isAlwaysOnSsl:false,

	/*
	 * Returns if the Launch Script has been already loaded.
	 */
	isLaunchScriptLoaded: function() {
		/*
		 * It seems that window._satellite is always generated while using Adobe Experience Debugger,
		 * so use "buildInfo" to determine if the script has been loaded because "buildInfo" wouldn't be defined in this situation.
		 * (see) https://experienceleague.adobe.com/docs/launch/using/client-side-info/launch-object-reference.html?lang=ja#buildinfo
		 */
		return ("_satellite" in window && "buildInfo" in window._satellite);
	},

	/*
	 * Regional data list of the country being displayed.
	 * This property has current country code and list of the languages data.
	 * This is set at the page loading.
	 * langs properties are as below.
	 * {
	 *   lang: language code
	 *   isDefault: Whether the language code is optional or not at URL.
	 *   isCurrent: Whether or not it is the language currently being displayed.
	 * } 
	 */
	regionalData: {
		currentCountry: '',
		langs: []
	},
	/*
	 * Convert target URL path to URL corresponding to the language of the displayed country.
	 * @param urlPath target URL path
	 */
	toRegionalUrl: function(urlPath) {
		var resolvedUrlPath = urlPath;
		if (!resolvedUrlPath) {
			return '';
		}
		var regionalData = GwcCommon.regionalData;
		if (!regionalData || regionalData.langs.length <= 0 || !('_' in window)) {
			return urlPath;
		}
		var isNotShortUrl = resolvedUrlPath.match(/^\/content/);
		var langs = _gwc.chain(regionalData.langs).filter(function(data){
			return isNotShortUrl || !data.isDefault;
		}).map(function(data) {
			return data.lang+'/';
		}).value().join('|');

		var pathPrefix = '';
		if (isNotShortUrl) {
			pathPrefix = '/content/panasonic';
		}
		pathPrefix += '/' + regionalData.currentCountry + '/';
		var replacement = pathPrefix;
		var selectedLang = _gwc.find(regionalData.langs, function(data) {return data.isCurrent;});
		if (!!selectedLang) {
			if (isNotShortUrl || !selectedLang.isDefault) {
				replacement += selectedLang.lang + '/';
			}
		}
		// replace url pattern like: /middleeast/(en/|fa/)? -> /middleeast/
		var urlPattern = new RegExp('^' + pathPrefix + '(' + langs + ')?');
		return resolvedUrlPath.replace(urlPattern, replacement);
	},
	newWindowRel: ''
};