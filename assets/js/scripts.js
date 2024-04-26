/* -----------------------------------------------
Table of Contents (common js)
--------------------------------------------------
1. userAgent判別
2. URL判別
3. 設定
4. JSファイル読み込み時即実行(Execute JavaScript when the page loaded.)
5. DOM構築後実行(Execute JavaScript when the DOM is fully loaded.)
6. 画像など含めてページ読込み完了後に実行(Execute JavaScript when the Window Object is fully loaded.)
7. 動的コンテンツに対してイベントを設定
8. その他のイベントを設定
9. 関数(プラグイン)複数

// require jQuery JavaScript Library v3.5.1
/* ------------------------------------------------------------
 * [ userAgent ] http://www.useragentstring.com/pages/useragentstring.php
 * ------------------------------------------------------------ */
var ua                   = window.navigator.userAgent;
var appVer               = window.navigator.appVersion;

//PC
var isIE                 = ua.indexOf('MSIE') != -1 || ua.indexOf('Trident') != -1;
var isIE6                = isIE && appVer.indexOf('MSIE 6') != -1;
var isIE7                = isIE && appVer.indexOf('MSIE 7.') != -1;
var isIE8                = isIE && ua.indexOf('Trident/4.') != -1;
var isIE9                = isIE && ua.indexOf('Trident/5.') != -1;
var isIE10               = isIE && ua.indexOf('Trident/6.') != -1;
var isIE11               = ua.indexOf('Trident/7.') != -1;

var isFirefox            = ua.indexOf('Firefox') != -1;
var isChrome             = ua.indexOf('Chrome') != -1;
var isSafari             = ua.indexOf('Safari') != -1;

//Mobile (smartphone + tablet)
var isMobileSafari       = ua.match(/iPhone|iPad|iPod/i) ? true : false;
var isMobileSafariTypeT  = ua.match(/ipad/i) ? true : false;
var isMobileSafariTypeS  = ua.match(/iphone|ipod/i) ? true : false;
var isAndroid            = ua.indexOf('Android') != -1;
var isMobileAndroidTypeT = isAndroid && ua.indexOf('Mobile') == -1;
var isMobileAndroidTypeS = isAndroid && ua.indexOf('Mobile') != -1;
var isAndroidChrome      = isChrome && isAndroid;
var isAndroidFirefox     = isFirefox && isAndroid;
var isMobileFirefox      = isFirefox && ua.indexOf('Mobile') != -1;
var isTabletFirefox      = isFirefox && ua.indexOf('Tablet') != -1;

//PC or Mobile
var isTablet             = isMobileSafariTypeT || isMobileAndroidTypeT || isTabletFirefox;
var isSmartPhone         = isMobileSafariTypeS || isMobileAndroidTypeS || isMobileFirefox;
var isMobile             = isTablet || isSmartPhone || isAndroidChrome || isAndroidFirefox;
var isPC                 = !isMobile;



/* ------------------------------------------------------------
 * [ Location ]
 * ------------------------------------------------------------ */
var  locationHref     = window.location.href,     // http://www.google.com:80/search?q=demo#test
     locationProtocol = window.location.protocol, // http:
     locationHostname = window.location.hostname, // www.google.com
     locationHost     = window.location.host,     // www.google.com:80
     locationPort     = window.location.port,     // 80
     locationPath     = window.location.pathname, // /search
     locationSearch   = window.location.search,   // ?q=demo
     locationHash     = window.location.hash;     // #test

/* ============================================================
* IE11 Fixed element problems
* ============================================================ */
if(isIE11) {
	document.body.addEventListener("mousewheel", function(event) {
		event.preventDefault();
		var weelDelta = event.wheelDelta;
		var currentOffset = window.pageYOffset;
		window.scrollTo(0, currentOffset - weelDelta);
	});
}
/* ============================================================
* Common Script
* ============================================================ */
var Common = (function () {
	function Common() {
		this.onInit();
	}
	
	/**
	* 初期化
	*/
	Common.prototype.onInit = function () {
		var _this = this;
		_this.addAgentClass();
		_this.globalNavButton();
		_this.initGlobalNav();
		_this.jsMatchHeight();
		_this.fullBackground();
		_this.smoothScroll();
	}

	/**
	* initLocomotive SmoothScroll
	*/
	Common.prototype.initLocomotive = function () {
		var _this = this;
		_this.scroller = new LocomotiveScroll({
			el: document.querySelector('[data-scroll-container]'),
			smooth: true,
			reloadOnContextChange: true,
			tablet: {
				breakpoint: 768
			}
		});
		$(window).on('load', function(){
			_this.scroller.update();
		});
	}

	/**
	* userAgent Classes to <html>
	*/
	Common.prototype.addAgentClass = function(){
		if (isTablet) {
			$('html').addClass('is-tablet');
		}
		if (isSmartPhone) {
			$('html').addClass('is-sp');
		}
		if (isPC) {
			$('html').addClass('is-pc');
		}
		if (isMobile) {
			$('html').addClass('is-mobile');
		}
		if (isIE) {
			$('html').addClass('is-ie');
		}
		if (isIE11) {
			$('html').addClass('is-ie11');
		}

		var vh = window.innerHeight * 0.01;
		var vw = window.innerWidth * 0.01;
		var resizeTimerVh = false;
		document.documentElement.style.setProperty('--vh', vh + 'px');
		document.documentElement.style.setProperty('--vw', vw + 'px');
		$(window).on('resize', function(){
			if(resizeTimerVh) clearTimeout(resizeTimerVh);
			resizeTimerVh = setTimeout(function(){
				var vh = window.innerHeight * 0.01;
				var vw = window.innerWidth * 0.01;
				document.documentElement.style.setProperty('--vh', vh + 'px');
				document.documentElement.style.setProperty('--vw', vw + 'px');
			}, 200);
		});
	}

	/**
	* smoothScroll
	*/
	Common.prototype.smoothScroll = function(){
		$('body').on('click', 'a[href^="#"]:not([href="#top"])',function(){
			var href= $(this).attr('href');
			var target = $(href === '#' || href === '' ? 'html' : href);
			var position = target.offset().top;
			$('body,html').animate({scrollTop:position}, 500, 'swing');
			return false;
		});
	}

	//Global menu
	Common.prototype.globalNavButton = function () {
		var menuBtn = $(".nav-global-menu");
		var header = $("#header");
		var globalNav = $(".nav-global-wrap");
		menuBtn && menuBtn.on('click', function(e){
			e.preventDefault();
			if(menuBtn.hasClass('is-active')){
				menuBtn.removeClass('is-active');
				header.removeClass('is-hover');
				globalNav.removeClass('is-active');
				$('html').removeClass('is-opened-menu');
				disableBodyScroll(false, globalNav.get(0));
			} else{
				menuBtn.addClass('is-active');
				header.addClass('is-hover');
				globalNav.addClass('is-active');
				$('html').addClass('is-opened-menu');
				disableBodyScroll(true, globalNav.get(0));
			}
		});		
	}

	/**
	* グローバリゼーション
	*/
	Common.prototype.initGlobalNav = function () {
		var _this = this;
		var globalNavItem = $(".nav-global > li");
		var globalNavSub = $(".nav-global__sub > li");
		var header = $("#l-header");
		if(isPC){
			globalNavItem.each(function(i, elem){
				var timer = false;
				var elem = $(elem);
				elem.on('mouseenter', function(){
					if(timer) clearTimeout(timer);
					elem.addClass('is-hover');
				});
				elem.on('mouseleave', function(){
					timer = setTimeout(function(){
						elem.removeClass('is-hover');
					}, 50)
				});
			});
			globalNavSub.each(function(i, elem){
				var elem = $(elem);
				var subNav = elem.find(".nav-global__sub__child");
				if(subNav.length){
					elem.addClass('has-sub');
					var globalNav = elem.closest('.nav-parent');
					elem.on('mouseenter', function(){
						var subNavHeight = subNav.get(0).clientHeight;
						if(subNavHeight > 0 && globalNav != null){
							globalNav.get(0).style.minHeight = subNavHeight + 'px';
						}
					});
					elem.on('mouseleave', function(){
						globalNav.get(0).style.minHeight = 0 + 'px';
					});
				}
			});


			var subTitle = $(".nav-global__sub__title");
			subTitle.each(function(i, item){
				item = $(item);
				var subNav = item.closest('li');
				var subNavWrap = subNav.find(".nav-global__sub__child");
				var globalNav = item.closest('.nav-parent');
				item.on('click', function(e){
					if(window.innerWidth <= 768){
						e.preventDefault();
						if(!subNav.hasClass('is-active')){
							subTitle.each(function(i, elem){
								var subNav1 = $(elem).closest('li');
								subNav1.removeClass('is-active');
							});
							subNav.addClass('is-active');
							var subNavHeight = subNav.get(0).clientHeight;
							if(subNavHeight > 0 && globalNav != null){
								globalNav.get(0).style.minHeight = subNavHeight + 'px';
							}
						} else{
							subNav.removeClass('is-active');
						}
					}
				})
			});
		} else{
			globalNavItem.each(function(i, elem){
				var elem = $(elem);
				var anchor = elem.find('.nav-item');
				var navParent = elem.find(".nav-parent-wrap");
				if(navParent){
					anchor.on('click', function(e){
						if(window.innerWidth > 768){
							if(elem.hasClass('is-hover')){
								elem.removeClass('is-hover');
								header.removeClass('is-hover');
							} else{
								e.preventDefault();
								globalNavItem.removeClass('is-hover');
								header.addClass('is-hover');
								elem.addClass('is-hover');
							}
						}
					});
				}
			});
			$(document).on('click', function(e){
				if(!$(e.target).closest('.nav-global') && !$(e.target).closest('#l-header')){
					globalNavItem.removeClass('is-hover');
					header.removeClass('is-hover');
				}
			});

			var subTitle = $(".nav-global__sub__title");
			subTitle.each(function(i, item){
				var item = $(item);
				var subNav = item.closest('li');
				var subNavWrap = subNav.find(".nav-global__sub__child");
				var globalNav = item.closest('.nav-parent');
				subNav.addClass('has-sub');
				item.on('click', function(e){
					e.preventDefault();
					if(!subNav.hasClass('is-active')){
						subTitle.each(function(i, elem){
							var subNav1 = $(elem).closest('li');
							subNav1.removeClass('is-active');
						});
						subNav.addClass('is-active');
						var subNavHeight = subNavWrap.get(0).clientHeight;
						if(subNavHeight > 0 && globalNav != null){
							globalNav.get(0).style.minHeight = subNavHeight + 'px';
						}
					} else{
						subNav.removeClass('is-active');
					}
				})
			});
		}
	}

	/**
	* jsFullBackground
	*/
	Common.prototype.fullBackground = function(){
		$('.js-fullbg').jsFullBackground();
	}

	/**
	* matchHeight
	*/
	Common.prototype.jsMatchHeight = function(){
		$('.js-matchheight').matchHeight();
		$('.js-matchheight02').matchHeight();
	}

	return Common;
}());


/* ============================================================
 * Plugin
 * ============================================================ */

/**
* Full background
*/
$.fn.jsFullBackground = function(config){
	var defaults = {
			position : 'center center',
			bgsize: 'cover',
			repeat: 'no-repeat'
		};
	var config = $.extend({}, defaults, config);
	return this.each(function() {
		var $this = $(this);
		var $img = $this.children('img').first();
		if (!$img.length) return false;
		var src = $img.attr('src');
		var position = config.position;
		var bgsize = config.bgsize;
		var repeat = config.repeat;
		if ($this.data('position')) {
			position = $this.data('position');
		}
		if ($this.data('bgsize')) {
			bgsize = $this.data('bgsize');
		}
		if ($this.data('repeat')) {
			repeat = $this.data('repeat');
		}
		$this.css({
			backgroundSize: bgsize,
			backgroundImage: 'url(' + src + ')',
			backgroundRepeat: repeat,
			backgroundPosition: position
		});
		$img.hide();
	});
}


/* ============================================================
 * Execute JavaScript when the DOM is fully loaded.
 * ============================================================ */
var commonJS;
function eventHandler(){
	commonJS = new Common();
}
if(document.readyState !== 'loading') {
	eventHandler();
} else {
	document.addEventListener('DOMContentLoaded', eventHandler);
}