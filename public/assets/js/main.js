/*!
 * pace.js v1.2.4
 * https://github.com/CodeByZach/pace/
 * Licensed MIT © HubSpot, Inc.
 */
!function(){function o(t,e){return function(){return t.apply(e,arguments)}}var u,c,i,s,n,y,t,l,v,r,a,p,e,h,w,b,f,g,d,m,k,S,q,L,x,P,T,R,j,O,E,M,A,C,N,_,F,U,W,X,D,H,I,z,G,B,J=[].slice,K={}.hasOwnProperty,Q=function(t,e){for(var n in e)K.call(e,n)&&(t[n]=e[n]);function r(){this.constructor=t}return r.prototype=e.prototype,t.prototype=new r,t.__super__=e.prototype,t},V=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++)if(e in this&&this[e]===t)return e;return-1};function Y(){}for(g={className:"",catchupTime:100,initialRate:.03,minTime:250,ghostTime:100,maxProgressPerFrame:20,easeFactor:1.25,startOnPageLoad:!0,restartOnPushState:!0,restartOnRequestAfter:500,target:"body",elements:{checkInterval:100,selectors:["body"]},eventLag:{minSamples:10,sampleCount:3,lagThreshold:3},ajax:{trackMethods:["GET"],trackWebSockets:!0,ignoreURLs:[]}},P=function(){var t;return null!=(t="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance.now():void 0)?t:+new Date},R=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,f=window.cancelAnimationFrame||window.mozCancelAnimationFrame,p=function(t,e,n){if("function"==typeof t.addEventListener)return t.addEventListener(e,n,!1);var r;"function"!=typeof t["on"+e]||"object"!=typeof t["on"+e].eventListeners?(r=new s,"function"==typeof t["on"+e]&&r.on(e,t["on"+e]),t["on"+e]=function(t){return r.trigger(e,t)},t["on"+e].eventListeners=r):r=t["on"+e].eventListeners,r.on(e,n)},null==R&&(R=function(t){return setTimeout(t,50)},f=function(t){return clearTimeout(t)}),O=function(e){var n=P(),r=function(){var t=P()-n;return 33<=t?(n=P(),e(t,function(){return R(r)})):setTimeout(r,33-t)};return r()},j=function(){var t=arguments[0],e=arguments[1],n=3<=arguments.length?J.call(arguments,2):[];return"function"==typeof t[e]?t[e].apply(t,n):t[e]},d=function(){for(var t,e,n,r=arguments[0],s=2<=arguments.length?J.call(arguments,1):[],o=0,i=s.length;o<i;o++)if(e=s[o])for(t in e)K.call(e,t)&&(n=e[t],null!=r[t]&&"object"==typeof r[t]&&null!=n&&"object"==typeof n?d(r[t],n):r[t]=n);return r},h=function(t){for(var e,n,r=e=0,s=0,o=t.length;s<o;s++)n=t[s],r+=Math.abs(n),e++;return r/e},k=function(t,e){var n,r;if(null==t&&(t="options"),null==e&&(e=!0),r=document.querySelector("[data-pace-"+t+"]")){if(n=r.getAttribute("data-pace-"+t),!e)return n;try{return JSON.parse(n)}catch(t){return"undefined"!=typeof console&&null!==console?console.error("Error parsing inline pace options",t):void 0}}},Y.prototype.on=function(t,e,n,r){var s;return null==r&&(r=!1),null==this.bindings&&(this.bindings={}),null==(s=this.bindings)[t]&&(s[t]=[]),this.bindings[t].push({handler:e,ctx:n,once:r})},Y.prototype.once=function(t,e,n){return this.on(t,e,n,!0)},Y.prototype.off=function(t,e){var n,r,s;if(null!=(null!=(r=this.bindings)?r[t]:void 0)){if(null==e)return delete this.bindings[t];for(n=0,s=[];n<this.bindings[t].length;)this.bindings[t][n].handler===e?s.push(this.bindings[t].splice(n,1)):s.push(n++);return s}},Y.prototype.trigger=function(){var t,e,n,r,s,o,i=arguments[0],a=2<=arguments.length?J.call(arguments,1):[];if(null!=(r=this.bindings)&&r[i]){for(n=0,o=[];n<this.bindings[i].length;)e=(s=this.bindings[i][n]).handler,t=s.ctx,s=s.once,e.apply(null!=t?t:this,a),s?o.push(this.bindings[i].splice(n,1)):o.push(n++);return o}},B=Y,y=window.Pace||{},window.Pace=y,d(y,B.prototype),T=y.options=d({},g,window.paceOptions,k()),X=0,H=(z=["ajax","document","eventLag","elements"]).length;X<H;X++)!0===T[C=z[X]]&&(T[C]=g[C]);function Z(){return Z.__super__.constructor.apply(this,arguments)}function $(){this.progress=0}function tt(){this.bindings={}}function et(){var e,o=this;et.__super__.constructor.apply(this,arguments),e=function(r){var s=r.open;return r.open=function(t,e,n){return A(t)&&o.trigger("request",{type:t,url:e,request:r}),s.apply(r,arguments)}},window.XMLHttpRequest=function(t){t=new W(t);return e(t),t};try{m(window.XMLHttpRequest,W)}catch(t){}if(null!=U){window.XDomainRequest=function(){var t=new U;return e(t),t};try{m(window.XDomainRequest,U)}catch(t){}}if(null!=F&&T.ajax.trackWebSockets){window.WebSocket=function(t,e){var n=null!=e?new F(t,e):new F(t);return A("socket")&&o.trigger("request",{type:"socket",url:t,protocols:e,request:n}),n};try{m(window.WebSocket,F)}catch(t){}}}function nt(){this.complete=o(this.complete,this);var t=this;this.elements=[],S().on("request",function(){return t.watch.apply(t,arguments)})}function rt(t){var e,n,r,s;for(null==t&&(t={}),this.complete=o(this.complete,this),this.elements=[],null==t.selectors&&(t.selectors=[]),n=0,r=(s=t.selectors).length;n<r;n++)e=s[n],this.elements.push(new i(e,this.complete))}function st(t,e){this.selector=t,this.completeCallback=e,this.progress=0,this.check()}function ot(){var t,e,n=this;this.progress=null!=(e=this.states[document.readyState])?e:100,t=document.onreadystatechange,document.onreadystatechange=function(){return null!=n.states[document.readyState]&&(n.progress=n.states[document.readyState]),"function"==typeof t?t.apply(null,arguments):void 0}}function it(t){this.source=t,this.last=this.sinceLastUpdate=0,this.rate=T.initialRate,this.catchup=0,this.progress=this.lastProgress=0,null!=this.source&&(this.progress=j(this.source,"progress"))}B=Error,Q(Z,B),n=Z,$.prototype.getElement=function(){var t;if(null==this.el){if(!(t=document.querySelector(T.target)))throw new n;this.el=document.createElement("div"),this.el.className="pace pace-active",document.body.className=document.body.className.replace(/(pace-done )|/,"pace-running ");var e=""!==T.className?" "+T.className:"";this.el.innerHTML='<div class="pace-progress'+e+'">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>',null!=t.firstChild?t.insertBefore(this.el,t.firstChild):t.appendChild(this.el)}return this.el},$.prototype.finish=function(){var t=this.getElement();return t.className=t.className.replace("pace-active","pace-inactive"),document.body.className=document.body.className.replace("pace-running ","pace-done ")},$.prototype.update=function(t){return this.progress=t,y.trigger("progress",t),this.render()},$.prototype.destroy=function(){try{this.getElement().parentNode.removeChild(this.getElement())}catch(t){n=t}return this.el=void 0},$.prototype.render=function(){var t,e,n,r,s,o,i;if(null==document.querySelector(T.target))return!1;for(t=this.getElement(),r="translate3d("+this.progress+"%, 0, 0)",s=0,o=(i=["webkitTransform","msTransform","transform"]).length;s<o;s++)e=i[s],t.children[0].style[e]=r;return(!this.lastRenderedProgress||this.lastRenderedProgress|0!==this.progress|0)&&(t.children[0].setAttribute("data-progress-text",(0|this.progress)+"%"),100<=this.progress?n="99":(n=this.progress<10?"0":"",n+=0|this.progress),t.children[0].setAttribute("data-progress",""+n)),y.trigger("change",this.progress),this.lastRenderedProgress=this.progress},$.prototype.done=function(){return 100<=this.progress},c=$,tt.prototype.trigger=function(t,e){var n,r,s,o,i;if(null!=this.bindings[t]){for(i=[],r=0,s=(o=this.bindings[t]).length;r<s;r++)n=o[r],i.push(n.call(this,e));return i}},tt.prototype.on=function(t,e){var n;return null==(n=this.bindings)[t]&&(n[t]=[]),this.bindings[t].push(e)},s=tt,W=window.XMLHttpRequest,U=window.XDomainRequest,F=window.WebSocket,m=function(t,e){var n,r=[];for(n in e.prototype)try{null==t[n]&&"function"!=typeof e[n]?"function"==typeof Object.defineProperty?r.push(Object.defineProperty(t,n,{get:function(t){return function(){return e.prototype[t]}}(n),configurable:!0,enumerable:!0})):r.push(t[n]=e.prototype[n]):r.push(void 0)}catch(t){0}return r},L=[],y.ignore=function(){var t=arguments[0],e=2<=arguments.length?J.call(arguments,1):[];return L.unshift("ignore"),e=t.apply(null,e),L.shift(),e},y.track=function(){var t=arguments[0],e=2<=arguments.length?J.call(arguments,1):[];return L.unshift("track"),e=t.apply(null,e),L.shift(),e},A=function(t){if(null==t&&(t="GET"),"track"===L[0])return"force";if(!L.length&&T.ajax){if("socket"===t&&T.ajax.trackWebSockets)return!0;if(t=t.toUpperCase(),0<=V.call(T.ajax.trackMethods,t))return!0}return!1},Q(et,s),t=et,D=null,M=function(t){for(var e,n=T.ajax.ignoreURLs,r=0,s=n.length;r<s;r++)if("string"==typeof(e=n[r])){if(-1!==t.indexOf(e))return!0}else if(e.test(t))return!0;return!1},(S=function(){return D=null==D?new t:D})().on("request",function(t){var o,i=t.type,a=t.request,e=t.url;if(!M(e))return y.running||!1===T.restartOnRequestAfter&&"force"!==A(i)?void 0:(o=arguments,"boolean"==typeof(e=T.restartOnRequestAfter||0)&&(e=0),setTimeout(function(){var t,e,n,r,s="socket"===i?a.readyState<1:0<(s=a.readyState)&&s<4;if(s){for(y.restart(),r=[],t=0,e=(n=y.sources).length;t<e;t++){if((C=n[t])instanceof u){C.watch.apply(C,o);break}r.push(void 0)}return r}},e))}),nt.prototype.watch=function(t){var e=t.type,n=t.request,t=t.url;if(!M(t))return n=new("socket"===e?r:a)(n,this.complete),this.elements.push(n)},nt.prototype.complete=function(e){return this.elements=this.elements.filter(function(t){return t!==e})},u=nt,a=function(e,n){var t,r,s,o,i=this;if(this.progress=0,null!=window.ProgressEvent)for(p(e,"progress",function(t){return t.lengthComputable?i.progress=100*t.loaded/t.total:i.progress=i.progress+(100-i.progress)/2}),t=0,r=(o=["load","abort","timeout","error"]).length;t<r;t++)p(e,o[t],function(){return n(i),i.progress=100});else s=e.onreadystatechange,e.onreadystatechange=function(){var t;return 0===(t=e.readyState)||4===t?(n(i),i.progress=100):3===e.readyState&&(i.progress=50),"function"==typeof s?s.apply(null,arguments):void 0}},r=function(t,e){for(var n,r=this,s=this.progress=0,o=(n=["error","open"]).length;s<o;s++)p(t,n[s],function(){return e(r),r.progress=100})},rt.prototype.complete=function(e){return this.elements=this.elements.filter(function(t){return t!==e})},k=rt,st.prototype.check=function(){var t=this;return document.querySelector(this.selector)?this.done():setTimeout(function(){return t.check()},T.elements.checkInterval)},st.prototype.done=function(){return this.completeCallback(this),this.completeCallback=null,this.progress=100},i=st,ot.prototype.states={loading:0,interactive:50,complete:100},B=ot,Q=function(){var e,n,r,s,o,i=this;this.progress=0,o=[],s=0,r=P(),n=setInterval(function(){var t=P()-r-50;return r=P(),o.push(t),o.length>T.eventLag.sampleCount&&o.shift(),e=h(o),++s>=T.eventLag.minSamples&&e<T.eventLag.lagThreshold?(i.progress=100,clearInterval(n)):i.progress=3/(e+3)*100},50)},it.prototype.tick=function(t,e){return 100<=(e=null==e?j(this.source,"progress"):e)&&(this.done=!0),e===this.last?this.sinceLastUpdate+=t:(this.sinceLastUpdate&&(this.rate=(e-this.last)/this.sinceLastUpdate),this.catchup=(e-this.progress)/T.catchupTime,this.sinceLastUpdate=0,this.last=e),e>this.progress&&(this.progress+=this.catchup*t),e=1-Math.pow(this.progress/100,T.easeFactor),this.progress+=e*this.rate*t,this.progress=Math.min(this.lastProgress+T.maxProgressPerFrame,this.progress),this.progress=Math.max(0,this.progress),this.progress=Math.min(100,this.progress),this.lastProgress=this.progress,this.progress},v=it,b=e=_=w=E=N=null,y.running=!1,q=function(){if(T.restartOnPushState)return y.restart()},null!=window.history.pushState&&(I=window.history.pushState,window.history.pushState=function(){return q(),I.apply(window.history,arguments)}),null!=window.history.replaceState&&(G=window.history.replaceState,window.history.replaceState=function(){return q(),G.apply(window.history,arguments)}),l={ajax:u,elements:k,document:B,eventLag:Q},(x=function(){var t,e,n,r,s,o,i,a;for(y.sources=N=[],e=0,r=(o=["ajax","elements","document","eventLag"]).length;e<r;e++)!1!==T[t=o[e]]&&N.push(new l[t](T[t]));for(n=0,s=(a=null!=(i=T.extraSources)?i:[]).length;n<s;n++)C=a[n],N.push(new C(T));return y.bar=w=new c,E=[],_=new v})(),y.stop=function(){return y.trigger("stop"),y.running=!1,w.destroy(),b=!0,null!=e&&("function"==typeof f&&f(e),e=null),x()},y.restart=function(){return y.trigger("restart"),y.stop(),y.start()},y.go=function(){var m;return y.running=!0,w.render(),m=P(),b=!1,e=O(function(t,e){w.progress;for(var n,r,s,o,i,a,u,c,l,p,h=a=0,f=!0,g=u=0,d=N.length;u<d;g=++u)for(C=N[g],i=null!=E[g]?E[g]:E[g]=[],s=c=0,l=(r=null!=(p=C.elements)?p:[C]).length;c<l;s=++c)o=r[s],f&=(o=null!=i[s]?i[s]:i[s]=new v(o)).done,o.done||(h++,a+=o.tick(t));return n=a/h,w.update(_.tick(t,n)),w.done()||f||b?(w.update(100),y.trigger("done"),setTimeout(function(){return w.finish(),y.running=!1,y.trigger("hide")},Math.max(T.ghostTime,Math.max(T.minTime-(P()-m),0)))):e()})},y.start=function(t){d(T,t),y.running=!0;try{w.render()}catch(t){n=t}return document.querySelector(".pace")?(y.trigger("start"),y.go()):setTimeout(y.start,50)},"function"==typeof define&&define.amd?define(function(){return y}):"object"==typeof exports?module.exports=y:T.startOnPageLoad&&y.start()}.call(this);

/*
	----------------------------
	APPS CONTENT TABLE
	----------------------------

	<!-- ======== GLOBAL SCRIPT SETTING ======== -->
	01. Handle Scrollbar
	02. Handle Sidebar - Menu
	03. Handle Sidebar - Mobile View Toggle
	04. Handle Sidebar - Minify / Expand
	05. Handle Page Load - Fade in
	06. Handle Panel - Remove / Reload / Collapse / Expand
	07. Handle Panel - Draggable
	08. Handle Tooltip & Popover Activation
	09. Handle Scroll to Top Button Activation

	<!-- ======== Added in V1.2 ======== -->
	10. Handle Theme & Page Structure Configuration - added in V1.2
	11. Handle Theme Panel Expand - added in V1.2
	12. Handle After Page Load Add Class Function - added in V1.2

	<!-- ======== Added in V1.5 ======== -->
	13. Handle Save Panel Position Function - added in V1.5
	14. Handle Draggable Panel Local Storage Function - added in V1.5
	15. Handle Reset Local Storage - added in V1.5

	<!-- ======== Added in V1.6 ======== -->
	16. Handle IE Full Height Page Compatibility - added in V1.6
	17. Handle Unlimited Nav Tabs - added in V1.6

	<!-- ======== Added in V1.9 ======== -->
	18. Handle Top Menu - Unlimited Top Menu Render - added in V1.9
	19. Handle Top Menu - Sub Menu Toggle - added in V1.9
	20. Handle Top Menu - Mobile Sub Menu Toggle - added in V1.9
	21. Handle Top Menu - Mobile Top Menu Toggle - added in V1.9
	22. Handle Clear Sidebar Selection & Hide Mobile Menu - added in V1.9

	<!-- ======== Added in V4.0 ======== -->
	23. Handle Check Bootstrap Version - added in V4.0
	24. Handle Page Scroll Class - added in V4.0
	25. Handle Toggle Navbar Profile - added in V4.0
	26. Handle Sidebar Scroll Memory - added in V4.0
	27. Handle Sidebar Minify Sub Menu - added in V4.0
	28. Handle Ajax Mode - added in V4.0
	29. Handle Float Navbar Search - added in V4.0

	<!-- ======== APPLICATION SETTING ======== -->
	Application Controller
*/



/* 01. Handle Scrollbar
------------------------------------------------ */
var handleSlimScroll = function () {
	"use strict";
	$.when($('[data-scrollbar=true]').each(function () {
		generateSlimScroll($(this));
	})).done(function () {
		$('[data-scrollbar="true"]').mouseover();
	});
};
var generateSlimScroll = function (element) {
	var isMobile = (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));

	if ($(element).attr('data-init') || (isMobile && $(element).attr('data-skip-mobile'))) {
		return;
	}
	var dataHeight = $(element).attr('data-height');
	dataHeight = (!dataHeight) ? $(element).height() : dataHeight;

	var scrollBarOption = {
		height: dataHeight
	};
	if (isMobile) {
		$(element).css('height', dataHeight);
		$(element).css('overflow-x', 'scroll');
	} else {
		$(element).slimScroll(scrollBarOption);
	}
	$(element).attr('data-init', true);
	$('.slimScrollBar').hide();
};


/* 02. Handle Sidebar - Menu
------------------------------------------------ */
var handleSidebarMenu = function () {
	"use strict";

	var expandTime = ($('.sidebar').attr('data-disable-slide-animation')) ? 0 : 250;
	$(document).on('click', '.sidebar .nav > .has-sub > a', function () {
		var target = $(this).next('.sub-menu');
		var otherMenu = $('.sidebar .nav > li.has-sub > .sub-menu').not(target);

		if ($('.page-sidebar-minified').length === 0) {
			$(otherMenu).closest('li').addClass('closing');
			$(otherMenu).slideUp(expandTime, function () {
				$(otherMenu).closest('li').addClass('closed').removeClass('expand closing');
			});
			if ($(target).is(':visible')) {
				$(target).closest('li').addClass('closing').removeClass('expand');
			} else {
				$(target).closest('li').addClass('expanding').removeClass('closed');
			}
			$(target).slideToggle(expandTime, function () {
				var targetLi = $(this).closest('li');
				if (!$(target).is(':visible')) {
					$(targetLi).addClass('closed');
					$(targetLi).removeClass('expand');
				} else {
					$(targetLi).addClass('expand');
					$(targetLi).removeClass('closed');
				}
				$(targetLi).removeClass('expanding closing');
			});
		}
	});
	$(document).on('click', '.sidebar .nav > .has-sub .sub-menu li.has-sub > a', function () {
		if ($('.page-sidebar-minified').length === 0) {
			var target = $(this).next('.sub-menu');
			if ($(target).is(':visible')) {
				$(target).closest('li').addClass('closing').removeClass('expand');
			} else {
				$(target).closest('li').addClass('expanding').removeClass('closed');
			}
			$(target).slideToggle(expandTime, function () {
				var targetLi = $(this).closest('li');
				if (!$(target).is(':visible')) {
					$(targetLi).addClass('closed');
					$(targetLi).removeClass('expand');
				} else {
					$(targetLi).addClass('expand');
					$(targetLi).removeClass('closed');
				}
				$(targetLi).removeClass('expanding closing');
			});
		}
	});
};


/* 03. Handle Sidebar - Mobile View Toggle
------------------------------------------------ */
var sidebarProgress = false;
var handleMobileSidebarToggle = function () {
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$('.sidebar-minify-btn').hide();
	}
	$(document).on('click touchstart', '.sidebar', function (e) {
		if ($(e.target).closest('.sidebar').length !== 0) {
			sidebarProgress = true;
		} else {
			sidebarProgress = false;
			e.stopPropagation();
		}
	});

	$(document).on('click touchstart', function (e) {
		if ($(e.target).closest('.sidebar').length === 0) {
			sidebarProgress = false;
		}
		if ($(e.target).closest('#float-sub-menu').length !== 0) {
			sidebarProgress = true;
		}

		if (!e.isPropagationStopped() && sidebarProgress !== true) {
			if ($('#page-container').hasClass('page-sidebar-toggled')) {
				sidebarProgress = true;
				$('#page-container').removeClass('page-sidebar-toggled');
				hideMiniMenu(true);
				$('.sidebar-minify-btn').hide();
			}
			if ($(window).width() <= 767) {
				if ($('#page-container').hasClass('page-right-sidebar-toggled')) {
					sidebarProgress = true;
					$('#page-container').removeClass('page-right-sidebar-toggled');
				}
			}
		}
	});

	$(document).on('click', '[data-click=right-sidebar-toggled]', function (e) {
		e.stopPropagation();
		var targetContainer = '#page-container';
		var targetClass = 'page-right-sidebar-collapsed';
		targetClass = ($(window).width() < 768) ? 'page-right-sidebar-toggled' : targetClass;
		if ($(targetContainer).hasClass(targetClass)) {
			$(targetContainer).removeClass(targetClass);
		} else if (sidebarProgress !== true) {
			$(targetContainer).addClass(targetClass);
		} else {
			sidebarProgress = false;
		}
		if ($(window).width() < 480) {
			$('#page-container').removeClass('page-sidebar-toggled');
		}
		$(window).trigger('resize');
	});

	$(document).on('click', '[data-click=sidebar-toggled]', function (e) {
		e.stopPropagation();
		var sidebarClass = 'page-sidebar-toggled';
		var targetContainer = '#page-container';
		if ($(targetContainer).hasClass(sidebarClass)) {
			$(targetContainer).removeClass(sidebarClass);
			$('.sidebar-minify-btn').hide();

		} else if (sidebarProgress !== true) {
			$(targetContainer).addClass(sidebarClass);
			$('.sidebar-minify-btn').show();
		} else {
			sidebarProgress = false;
			$('.sidebar-minify-btn').hide();
		}
		if ($(window).width() < 480) {
			$('#page-container').removeClass('page-right-sidebar-toggled');
		}
	});
};


/* 04. Handle Sidebar - Minify / Expand
------------------------------------------------ */
var handleSidebarMinify = function () {
	$(document).on('click', '[data-click="sidebar-minify"]', function (e) {
		e.preventDefault();
		var sidebarClass = 'page-sidebar-minified';
		var targetContainer = '#page-container';
		var sidebarMinified = false;
		// var sidebarMinifiedBtn = '.sidebar-minify-btn';

		if ($(targetContainer).hasClass(sidebarClass)) {
			$(targetContainer).removeClass(sidebarClass);
			$('.sidebar-minify-btn').addClass('sidebar-minify-open');
		} else {
			$(targetContainer).addClass(sidebarClass);
			$('.sidebar-minify-btn').removeClass('sidebar-minify-open');

			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				$('#sidebar [data-scrollbar="true"]').css('margin-top', '0');
				$('#sidebar [data-scrollbar="true"]').css('overflow-x', 'scroll');
			}
			sidebarMinified = true;
		}
		$(window).trigger('resize');

		if (Cookies) {
			Cookies.set('sidebar-minified', sidebarMinified);
		}


	});
	if (Cookies) {
		var sidebarMinified = Cookies.get('sidebar-minified');
		if (sidebarMinified == 'true') {
			$('#page-container').addClass('page-sidebar-minified');
			$('.sidebar-minify-btn').removeClass('sidebar-minify-open');
		}
		else {
			$('.sidebar-minify-btn').addClass('sidebar-minify-open');
			if (!sidebarProgress && $('#page-container').hasClass('page-sidebar-minified')) {
				$('.sidebar-minify-btn').removeClass('sidebar-minify-open');
			}
		}
	}
};


/* 05. Handle Page Load - Fade in
------------------------------------------------ */
var handlePageContentView = function () {
	"use strict";

	var hideClass = '';
	var showClass = '';
	var removeClass = '';
	var bootstrapVersion = handleCheckBootstrapVersion();

	if (bootstrapVersion >= 3 && bootstrapVersion < 4) {
		hideClass = 'hide';
		showClass = 'in';
	} else if (bootstrapVersion >= 4 && bootstrapVersion < 5) {
		hideClass = 'd-none';
		showClass = 'show';
	}
	$(window).on('load', function () {
		$.when($('#page-loader').addClass(hideClass)).done(function () {
			$('#page-container').addClass(showClass);
		});
	});
};


/* 06. Handle Panel - Remove / Reload / Collapse / Expand
------------------------------------------------ */
var panelActionRunning = false;
var handlePanelAction = function () {
	"use strict";

	if (panelActionRunning) {
		return false;
	}
	panelActionRunning = true;

	// remove
	$(document).on('hover', '[data-click=panel-remove]', function (e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Remove',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-click=panel-remove]', function (e) {
		e.preventDefault();
		var bootstrapVersion = handleCheckBootstrapVersion();

		if (bootstrapVersion >= 4 && bootstrapVersion < 5) {
			$(this).tooltip('dispose');
		} else {
			$(this).tooltip('destroy');
		}
		$(this).closest('.panel').remove();
	});

	// collapse
	$(document).on('hover', '[data-click=panel-collapse]', function (e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Collapse / Expand',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-click=panel-collapse]', function (e) {
		e.preventDefault();
		$(this).closest('.panel').find('.panel-body').slideToggle();
	});

	// reload
	$(document).on('hover', '[data-click=panel-reload]', function (e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Reload',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-click=panel-reload]', function (e) {
		e.preventDefault();
		var target = $(this).closest('.panel');
		if (!$(target).hasClass('panel-loading')) {
			var targetBody = $(target).find('.panel-body');
			var spinnerHtml = '<div class="panel-loader"><span class="spinner-small"></span></div>';
			$(target).addClass('panel-loading');
			$(targetBody).prepend(spinnerHtml);
			setTimeout(function () {
				$(target).removeClass('panel-loading');
				$(target).find('.panel-loader').remove();
			}, 2000);
		}
	});

	// expand
	$(document).on('hover', '[data-click=panel-expand]', function (e) {
		if (!$(this).attr('data-init')) {
			$(this).tooltip({
				title: 'Expand / Compress',
				placement: 'bottom',
				trigger: 'hover',
				container: 'body'
			});
			$(this).tooltip('show');
			$(this).attr('data-init', true);
		}
	});
	$(document).on('click', '[data-click=panel-expand]', function (e) {
		e.preventDefault();
		var target = $(this).closest('.panel');
		var targetBody = $(target).find('.panel-body');
		var targetTop = 40;
		if ($(targetBody).length !== 0) {
			var targetOffsetTop = $(target).offset().top;
			var targetBodyOffsetTop = $(targetBody).offset().top;
			targetTop = targetBodyOffsetTop - targetOffsetTop;
		}

		if ($('body').hasClass('panel-expand') && $(target).hasClass('panel-expand')) {
			$('body, .panel').removeClass('panel-expand');
			$('.panel').removeAttr('style');
			$(targetBody).removeAttr('style');
		} else {
			$('body').addClass('panel-expand');
			$(this).closest('.panel').addClass('panel-expand');

			if ($(targetBody).length !== 0 && targetTop != 40) {
				var finalHeight = 40;
				$(target).find(' > *').each(function () {
					var targetClass = $(this).attr('class');

					if (targetClass != 'panel-heading' && targetClass != 'panel-body') {
						finalHeight += $(this).height() + 30;
					}
				});
				if (finalHeight != 40) {
					$(targetBody).css('top', finalHeight + 'px');
				}
			}
		}
		$(window).trigger('resize');
	});
};


/* 07. Handle Panel - Draggable
------------------------------------------------ */
var handleDraggablePanel = function () {
	"use strict";
	var target = $('.panel:not([data-sortable="false"])').parent('[class*=col]');
	var targetHandle = '.panel-heading';
	var connectedTarget = '.row > [class*=col]';

	$(target).sortable({
		handle: targetHandle,
		connectWith: connectedTarget,
		stop: function (event, ui) {
			ui.item.find('.panel-title').append('<i class="fa fa-refresh fa-spin m-l-5" data-id="title-spinner"></i>');
			handleSavePanelPosition(ui.item);
		}
	});
};


/* 08. Handle Tooltip & Popover Activation
------------------------------------------------ */
var handelTooltipPopoverActivation = function () {
	"use strict";
	if ($('[data-toggle="tooltip"]').length !== 0) {
		$('[data-toggle=tooltip]').tooltip();
	}
	if ($('[data-toggle="popover"]').length !== 0) {
		$('[data-toggle=popover]').popover();
	}
};


/* 09. Handle Scroll to Top Button Activation
------------------------------------------------ */
var handleScrollToTopButton = function () {
	"use strict";
	var bootstrapVersion = handleCheckBootstrapVersion();
	var showClass = '';

	if (bootstrapVersion >= 3 && bootstrapVersion < 4) {
		showClass = 'in';
	} else if (bootstrapVersion >= 4 && bootstrapVersion < 5) {
		showClass = 'show';
	}
	$(document).scroll(function () {
		var totalScroll = $(document).scrollTop();

		if (totalScroll >= 200) {
			$('[data-click=scroll-top]').addClass(showClass);
		} else {
			$('[data-click=scroll-top]').removeClass(showClass);
		}
	});

	$('[data-click=scroll-top]').click(function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	});
};


/* 10. Handle Theme & Page Structure Configuration - added in V1.2
------------------------------------------------ */
var handleThemePageStructureControl = function () {

	// THEME - color selection
	$(document).on('click', '.theme-panel [data-click="theme-selector"]', function () {
		var targetFile = $(this).attr('data-theme-file');
		var targetTheme = $(this).attr('data-theme');

		if ($('#theme-css-link').length === 0) {
			$('head').append('<link href="' + targetFile + '" rel="stylesheet" id="theme-css-link" />');
		} else {
			$('#theme-css-link').attr('href', targetFile);
		}
		$('.theme-panel [data-click="theme-selector"]').not(this).closest('li').removeClass('active');
		$(this).closest('li').addClass('active');

		if (Cookies) {
			Cookies.set('page-theme', targetTheme);
		}
	});

	// HEADER - header styling selection
	$(document).on('change', '.theme-panel [name="header-inverse"]', function () {
		var targetValue = $(this).is(':checked');
		var targetClassAdd = (!targetValue) ? 'navbar-default' : 'navbar-inverse';
		var targetClassRemove = (!targetValue) ? 'navbar-inverse' : 'navbar-default';
		$('#header').removeClass(targetClassRemove).addClass(targetClassAdd);
		if (Cookies) {
			Cookies.set('header-theme', targetClassAdd);
		}
	});

	// SIDEBAR - sidebar grid selection
	$(document).on('change', '.theme-panel [name="sidebar-grid"]', function () {
		var sidebarGrid = false;
		if ($(this).is(':checked')) {
			$('#sidebar').addClass('sidebar-grid');
			sidebarGrid = true;
		} else {
			$('#sidebar').removeClass('sidebar-grid');
		}

		if (Cookies) {
			Cookies.set('sidebar-grid', sidebarGrid);
		}
	});

	// SIDEBAR - sidebar gradient selection
	$(document).on('change', '.theme-panel [name="sidebar-gradient"]', function () {
		var sidebarGradient = false;
		if ($(this).is(':checked')) {
			$('#page-container').addClass('gradient-enabled');
			sidebarGradient = true;
		} else {
			$('#page-container').removeClass('gradient-enabled');
		}

		if (Cookies) {
			Cookies.set('sidebar-gradient', sidebarGradient);
		}
	});

	// SIDEBAR - sidebar fixed selection
	$(document).on('change', '.theme-panel [name="sidebar-fixed"]', function () {
		var sidebarFixed = false;

		if ($(this).is(':checked')) {
			if (!$('.theme-panel [name="header-fixed"]').is(':checked')) {
				alert('Default Header with Fixed Sidebar option is not supported. Proceed with Fixed Header with Fixed Sidebar.');
				$('.theme-panel [name="header-fixed"]').prop('checked', true);
				$('#page-container').addClass('page-header-fixed');
			}
			$('#page-container').addClass('page-sidebar-fixed');
			if (!$('#page-container').hasClass('page-sidebar-minified')) {
				generateSlimScroll($('.sidebar [data-scrollbar="true"]'));
			}
			sidebarFixed = true;
		} else {
			$('#page-container').removeClass('page-sidebar-fixed');
			if ($('.sidebar .slimScrollDiv').length !== 0) {
				if ($(window).width() <= 979) {
					$('.sidebar').each(function () {
						if (!($('#page-container').hasClass('page-with-two-sidebar') && $(this).hasClass('sidebar-right'))) {
							$(this).find('.slimScrollBar').remove();
							$(this).find('.slimScrollRail').remove();
							$(this).find('[data-scrollbar="true"]').removeAttr('style');
							var targetElement = $(this).find('[data-scrollbar="true"]').parent();
							var targetHtml = $(targetElement).html();
							$(targetElement).replaceWith(targetHtml);
						}
					});
				} else if ($(window).width() > 979) {
					$('.sidebar [data-scrollbar="true"]').slimScroll({ destroy: true });
					$('.sidebar [data-scrollbar="true"]').removeAttr('style');
					$('.sidebar [data-scrollbar="true"]').removeAttr('data-init');
				}
			}
			if ($('#page-container .sidebar-bg').length === 0) {
				$('#page-container').append('<div class="sidebar-bg"></div>');
			}
		}

		if (Cookies) {
			Cookies.set('sidebar-fixed', sidebarFixed);
		}
	});

	// HEADER - fixed or default
	$(document).on('change', '.theme-panel [name="header-fixed"]', function () {
		var headerFixed = false;

		if ($(this).is(':checked')) {
			$('#header').addClass('navbar-fixed-top');
			$('#page-container').addClass('page-header-fixed');
			headerFixed = true;
		} else {
			if ($('.theme-panel [name="sidebar-fixed"]').is(':checked')) {
				alert('Default Header with Fixed Sidebar option is not supported. Proceed with Default Header with Default Sidebar.');
				$('.theme-panel [name="sidebar-fixed"]').prop('checked', false);
				$('.theme-panel [name="sidebar-fixed"]').trigger('change');
				if ($('#page-container .sidebar-bg').length === 0) {
					$('#page-container').append('<div class="sidebar-bg"></div>');
				}
			}
			$('#header').removeClass('navbar-fixed-top');
			$('#page-container').removeClass('page-header-fixed');
		}
		if (Cookies) {
			Cookies.set('header-fixed', headerFixed);
		}
	});

	if (Cookies) {
		var pageTheme = Cookies.get('page-theme');
		var headerTheme = Cookies.get('header-theme');
		var sidebarGrid = Cookies.get('sidebar-grid');
		var sidebarGradient = Cookies.get('sidebar-gradient');
		var sidebarFixed = Cookies.get('sidebar-fixed');
		var headerFixed = Cookies.get('header-fixed');

		if (pageTheme) {
			$('.theme-panel [data-click="theme-selector"][data-theme="' + pageTheme + '"]').trigger('click');
		}
		if (headerTheme && headerTheme == 'navbar-inverse') {
			$('.theme-panel [name="header-inverse"]').prop('checked', true).trigger('change');
		}
		if (sidebarGrid == 'true') {
			$('.theme-panel [name="sidebar-grid"]').prop('checked', true).trigger('change');
		}
		if (sidebarGradient == 'true') {
			$('.theme-panel [name="sidebar-gradient"]').prop('checked', true).trigger('change');
		}
		if (sidebarFixed == 'false') {
			$('.theme-panel [name="sidebar-fixed"]').prop('checked', false).trigger('change');
		}
		if (headerFixed == 'false') {
			$('.theme-panel [name="header-fixed"]').prop('checked', false).trigger('change');
		}
	}
};


/* 11. Handle Theme Panel Expand - added in V1.2
------------------------------------------------ */
var handleThemePanelExpand = function () {
	$(document).on('click', '[data-click="theme-panel-expand"]', function () {
		var targetContainer = '.theme-panel';
		var targetClass = 'active';
		var targetExpand = false;
		if ($(targetContainer).hasClass(targetClass)) {
			$(targetContainer).removeClass(targetClass);
		} else {
			$(targetContainer).addClass(targetClass);
			targetExpand = true;
		}
		if (Cookies) {
			Cookies.set('theme-panel-expand', targetExpand);
		}
	});
	if (Cookies) {
		var themePanelExpand = Cookies.get('theme-panel-expand');

		if (themePanelExpand == 'true') {
			$('[data-click="theme-panel-expand"]').trigger('click');
		}
	}
};


/* 12. Handle After Page Load Add Class Function - added in V1.2
------------------------------------------------ */
var handleAfterPageLoadAddClass = function () {
	if ($('[data-pageload-addclass]').length !== 0) {
		$(window).on('load', function () {
			$('[data-pageload-addclass]').each(function () {
				var targetClass = $(this).attr('data-pageload-addclass');
				$(this).addClass(targetClass);
			});
		});
	}
};


/* 13. Handle Save Panel Position Function - added in V1.5
------------------------------------------------ */
var handleSavePanelPosition = function (element) {
	"use strict";
	if ($('.ui-sortable').length !== 0) {
		var newValue = [];
		var index = 0;
		$.when($('.ui-sortable').each(function () {
			var panelSortableElement = $(this).find('[data-sortable-id]');
			if (panelSortableElement.length !== 0) {
				var columnValue = [];
				$(panelSortableElement).each(function () {
					var targetSortId = $(this).attr('data-sortable-id');
					columnValue.push({ id: targetSortId });
				});
				newValue.push(columnValue);
			} else {
				newValue.push([]);
			}
			index++;
		})).done(function () {
			var targetPage = window.location.href;
			targetPage = targetPage.split('?');
			targetPage = targetPage[0];
			localStorage.setItem(targetPage, JSON.stringify(newValue));
			$(element).find('[data-id="title-spinner"]').delay(500).fadeOut(500, function () {
				$(this).remove();
			});
		});
	}
};


/* 14. Handle Draggable Panel Local Storage Function - added in V1.5
------------------------------------------------ */
var handleLocalStorage = function () {
	"use strict";
	try {
		if (typeof (Storage) !== 'undefined' && typeof (localStorage) !== 'undefined') {
			var targetPage = window.location.href;
			targetPage = targetPage.split('?');
			targetPage = targetPage[0];
			var panelPositionData = localStorage.getItem(targetPage);

			if (panelPositionData) {
				panelPositionData = JSON.parse(panelPositionData);
				var i = 0;
				$.when($('.panel:not([data-sortable="false"])').parent('[class*="col-"]').each(function () {
					var storageData = panelPositionData[i];
					var targetColumn = $(this);
					if (storageData) {
						$.each(storageData, function (index, data) {
							var targetId = $('[data-sortable-id="' + data.id + '"]').not('[data-init="true"]');
							if ($(targetId).length !== 0) {
								var targetHtml = $(targetId).clone();
								$(targetId).remove();
								$(targetColumn).append(targetHtml);
								$('[data-sortable-id="' + data.id + '"]').attr('data-init', 'true');
							}
						});
					}
					i++;
				})).done(function () {
					window.dispatchEvent(new CustomEvent('localstorage-position-loaded'));
				});
			}
		} else {
			alert('Your browser is not supported with the local storage');
		}
	} catch (error) {
		console.log(error);
	}
};


/* 15. Handle Reset Local Storage - added in V1.5
------------------------------------------------ */
var handleResetLocalStorage = function () {
	"use strict";
	$(document).on('click', '[data-click=reset-local-storage]', function (e) {
		e.preventDefault();

		var targetModalHtml = '' +
			'<div class="modal fade" data-modal-id="reset-local-storage-confirmation">' +
			'    <div class="modal-dialog">' +
			'        <div class="modal-content">' +
			'            <div class="modal-header">' +
			'                <h4 class="modal-title"><i class="fa fa-redo m-r-5"></i> Reset Local Storage Confirmation</h4>' +
			'                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' +
			'            </div>' +
			'            <div class="modal-body">' +
			'                <div class="alert alert-info m-b-0">Would you like to RESET all your saved widgets and clear Local Storage?</div>' +
			'            </div>' +
			'            <div class="modal-footer">' +
			'                <a href="javascript:;" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-times"></i> No</a>' +
			'                <a href="javascript:;" class="btn btn-sm btn-inverse" data-click="confirm-reset-local-storage"><i class="fa fa-check"></i> Yes</a>' +
			'            </div>' +
			'        </div>' +
			'    </div>' +
			'</div>';

		$('body').append(targetModalHtml);
		$('[data-modal-id="reset-local-storage-confirmation"]').modal('show');
	});
	$(document).on('hidden.bs.modal', '[data-modal-id="reset-local-storage-confirmation"]', function (e) {
		$('[data-modal-id="reset-local-storage-confirmation"]').remove();
	});
	$(document).on('click', '[data-click=confirm-reset-local-storage]', function (e) {
		e.preventDefault();
		var localStorageName = window.location.href;
		localStorageName = localStorageName.split('?');
		localStorageName = localStorageName[0];
		localStorage.removeItem(localStorageName);

		location.reload();
	});
};


/* 16. Handle IE Full Height Page Compatibility - added in V1.6
------------------------------------------------ */
var handleIEFullHeightContent = function () {
	var userAgent = window.navigator.userAgent;
	var msie = userAgent.indexOf("MSIE ");

	if (msie > 0) {
		$('.vertical-box-row [data-scrollbar="true"][data-height="100%"]').each(function () {
			var targetRow = $(this).closest('.vertical-box-row');
			var targetHeight = $(targetRow).height();
			$(targetRow).find('.vertical-box-cell').height(targetHeight);
		});
	}
};


/* 17. Handle Unlimited Nav Tabs - added in V1.6
------------------------------------------------ */
var handleUnlimitedTabsRender = function () {

	// function handle tab overflow scroll width 
	function handleTabOverflowScrollWidth(obj, animationSpeed) {
		var targetElm = 'li.active';

		if ($(obj).find('li').first().hasClass('nav-item')) {
			targetElm = $(obj).find('.nav-item .active').closest('li');
		}
		var targetCss = ($('body').css('direction') == 'rtl') ? 'margin-right' : 'margin-left';
		var marginLeft = parseInt($(obj).css(targetCss));
		var viewWidth = $(obj).width();
		var prevWidth = $(obj).find(targetElm).width();
		var speed = (animationSpeed > -1) ? animationSpeed : 150;
		var fullWidth = 0;

		$(obj).find(targetElm).prevAll().each(function () {
			prevWidth += $(this).width();
		});

		$(obj).find('li').each(function () {
			fullWidth += $(this).width();
		});

		if (prevWidth >= viewWidth) {
			var finalScrollWidth = prevWidth - viewWidth;
			if (fullWidth != prevWidth) {
				finalScrollWidth += 40;
			}
			if ($('body').css('direction') == 'rtl') {
				$(obj).find('.nav.nav-tabs').animate({ marginRight: '-' + finalScrollWidth + 'px' }, speed);
			} else {
				$(obj).find('.nav.nav-tabs').animate({ marginLeft: '-' + finalScrollWidth + 'px' }, speed);
			}
		}

		if (prevWidth != fullWidth && fullWidth >= viewWidth) {
			$(obj).addClass('overflow-right');
		} else {
			$(obj).removeClass('overflow-right');
		}

		if (prevWidth >= viewWidth && fullWidth >= viewWidth) {
			$(obj).addClass('overflow-left');
		} else {
			$(obj).removeClass('overflow-left');
		}
	}

	// function handle tab button action - next / prev
	function handleTabButtonAction(element, direction) {
		var obj = $(element).closest('.tab-overflow');
		var targetCss = ($('body').css('direction') == 'rtl') ? 'margin-right' : 'margin-left';
		var marginLeft = parseInt($(obj).find('.nav.nav-tabs').css(targetCss));
		var containerWidth = $(obj).width();
		var totalWidth = 0;
		var finalScrollWidth = 0;

		$(obj).find('li').each(function () {
			if (!$(this).hasClass('next-button') && !$(this).hasClass('prev-button')) {
				totalWidth += $(this).width();
			}
		});

		switch (direction) {
			case 'next':
				var widthLeft = totalWidth + marginLeft - containerWidth;
				if (widthLeft <= containerWidth) {
					finalScrollWidth = widthLeft - marginLeft;
					setTimeout(function () {
						$(obj).removeClass('overflow-right');
					}, 150);
				} else {
					finalScrollWidth = containerWidth - marginLeft - 80;
				}

				if (finalScrollWidth !== 0) {
					if ($('body').css('direction') != 'rtl') {
						$(obj).find('.nav.nav-tabs').animate({ marginLeft: '-' + finalScrollWidth + 'px' }, 150, function () {
							$(obj).addClass('overflow-left');
						});
					} else {
						$(obj).find('.nav.nav-tabs').animate({ marginRight: '-' + finalScrollWidth + 'px' }, 150, function () {
							$(obj).addClass('overflow-left');
						});
					}
				}
				break;
			case 'prev':
				var widthLeft = -marginLeft;

				if (widthLeft <= containerWidth) {
					$(obj).removeClass('overflow-left');
					finalScrollWidth = 0;
				} else {
					finalScrollWidth = widthLeft - containerWidth + 80;
				}
				if ($('body').css('direction') != 'rtl') {
					$(obj).find('.nav.nav-tabs').animate({ marginLeft: '-' + finalScrollWidth + 'px' }, 150, function () {
						$(obj).addClass('overflow-right');
					});
				} else {
					$(obj).find('.nav.nav-tabs').animate({ marginRight: '-' + finalScrollWidth + 'px' }, 150, function () {
						$(obj).addClass('overflow-right');
					});
				}
				break;
		}
	}

	// handle page load active tab focus
	function handlePageLoadTabFocus() {
		$('.tab-overflow').each(function () {
			handleTabOverflowScrollWidth(this, 0);
		});
	}

	// handle tab next button click action
	$('[data-click="next-tab"]').click(function (e) {
		e.preventDefault();
		handleTabButtonAction(this, 'next');
	});

	// handle tab prev button click action
	$('[data-click="prev-tab"]').click(function (e) {
		e.preventDefault();
		handleTabButtonAction(this, 'prev');
	});

	// handle unlimited tabs responsive setting
	$(window).resize(function () {
		$('.tab-overflow .nav.nav-tabs').removeAttr('style');
		handlePageLoadTabFocus();
	});

	handlePageLoadTabFocus();
};


/* 18. Handle Top Menu - Unlimited Top Menu Render - added in V1.9
------------------------------------------------ */
var handleUnlimitedTopMenuRender = function () {
	"use strict";
	// function handle menu button action - next / prev
	function handleMenuButtonAction(element, direction) {
		var obj = $(element).closest('.nav');
		var targetCss = ($('body').css('direction') == 'rtl') ? 'margin-right' : 'margin-left';
		var marginLeft = parseInt($(obj).css(targetCss));
		var containerWidth = $('.top-menu').width() - 88;
		var totalWidth = 0;
		var finalScrollWidth = 0;

		$(obj).find('li').each(function () {
			if (!$(this).hasClass('menu-control')) {
				totalWidth += $(this).width();
			}
		});

		switch (direction) {
			case 'next':
				var widthLeft = totalWidth + marginLeft - containerWidth;
				if (widthLeft <= containerWidth) {
					finalScrollWidth = widthLeft - marginLeft + 128;
					setTimeout(function () {
						$(obj).find('.menu-control.menu-control-right').removeClass('show');
					}, 150);
				} else {
					finalScrollWidth = containerWidth - marginLeft - 128;
				}

				if (finalScrollWidth !== 0) {
					if ($('body').css('direction') != 'rtl') {
						$(obj).animate({ marginLeft: '-' + finalScrollWidth + 'px' }, 150, function () {
							$(obj).find('.menu-control.menu-control-left').addClass('show');
						});
					} else {
						$(obj).animate({ marginRight: '-' + finalScrollWidth + 'px' }, 150, function () {
							$(obj).find('.menu-control.menu-control-left').addClass('show');
						});
					}
				}
				break;
			case 'prev':
				var widthLeft = -marginLeft;

				if (widthLeft <= containerWidth) {
					$(obj).find('.menu-control.menu-control-left').removeClass('show');
					finalScrollWidth = 0;
				} else {
					finalScrollWidth = widthLeft - containerWidth + 88;
				}
				if ($('body').css('direction') != 'rtl') {
					$(obj).animate({ marginLeft: '-' + finalScrollWidth + 'px' }, 150, function () {
						$(obj).find('.menu-control.menu-control-right').addClass('show');
					});
				} else {
					$(obj).animate({ marginRight: '-' + finalScrollWidth + 'px' }, 150, function () {
						$(obj).find('.menu-control.menu-control-right').addClass('show');
					});
				}
				break;
		}
	}

	// handle page load active menu focus
	function handlePageLoadMenuFocus() {
		var targetMenu = $('.top-menu .nav');
		var targetList = $('.top-menu .nav > li');
		var targetActiveList = $('.top-menu .nav > li.active');
		var targetContainer = $('.top-menu');
		var targetCss = ($('body').css('direction') == 'rtl') ? 'margin-right' : 'margin-left';
		var marginLeft = parseInt($(targetMenu).css(targetCss));
		var viewWidth = $(targetContainer).width() - 128;
		var prevWidth = $('.top-menu .nav > li.active').width();
		var speed = 0;
		var fullWidth = 0;

		$(targetActiveList).prevAll().each(function () {
			prevWidth += $(this).width();
		});

		$(targetList).each(function () {
			if (!$(this).hasClass('menu-control')) {
				fullWidth += $(this).width();
			}
		});

		if (prevWidth >= viewWidth) {
			var finalScrollWidth = prevWidth - viewWidth + 128;
			if ($('body').css('direction') != 'rtl') {
				$(targetMenu).animate({ marginLeft: '-' + finalScrollWidth + 'px' }, speed);
			} else {
				$(targetMenu).animate({ marginRight: '-' + finalScrollWidth + 'px' }, speed);
			}
		}

		if (prevWidth != fullWidth && fullWidth >= viewWidth) {
			$(targetMenu).find('.menu-control.menu-control-right').addClass('show');
		} else {
			$(targetMenu).find('.menu-control.menu-control-right').removeClass('show');
		}

		if (prevWidth >= viewWidth && fullWidth >= viewWidth) {
			$(targetMenu).find('.menu-control.menu-control-left').addClass('show');
		} else {
			$(targetMenu).find('.menu-control.menu-control-left').removeClass('show');
		}
	}

	// handle menu next button click action
	$('[data-click="next-menu"]').click(function (e) {
		e.preventDefault();
		handleMenuButtonAction(this, 'next');
	});

	// handle menu prev button click action
	$('[data-click="prev-menu"]').click(function (e) {
		e.preventDefault();
		handleMenuButtonAction(this, 'prev');
	});

	// handle unlimited menu responsive setting
	$(window).resize(function () {
		$('.top-menu .nav').removeAttr('style');
		handlePageLoadMenuFocus();
	});

	handlePageLoadMenuFocus();
};


/* 19. Handle Top Menu - Sub Menu Toggle - added in V1.9
------------------------------------------------ */
var handleTopMenuSubMenu = function () {
	"use strict";
	$(document).on('click', '.top-menu .sub-menu .has-sub > a', function () {
		var target = $(this).closest('li').find('.sub-menu').first();
		var otherMenu = $(this).closest('ul').find('.sub-menu').not(target);
		$(otherMenu).not(target).slideUp(250, function () {
			$(this).closest('li').removeClass('expand');
		});
		$(target).slideToggle(250, function () {
			var targetLi = $(this).closest('li');
			if ($(targetLi).hasClass('expand')) {
				$(targetLi).removeClass('expand');
			} else {
				$(targetLi).addClass('expand');
			}
		});
	});
};


/* 20. Handle Top Menu - Mobile Sub Menu Toggle - added in V1.9
------------------------------------------------ */
var handleMobileTopMenuSubMenu = function () {
	"use strict";
	$(document).on('click', '.top-menu .nav > li.has-sub > a', function () {
		if ($(window).width() <= 767) {
			var target = $(this).closest('li').find('.sub-menu').first();
			var otherMenu = $(this).closest('ul').find('.sub-menu').not(target);
			$(otherMenu).not(target).slideUp(250, function () {
				$(this).closest('li').removeClass('expand');
			});
			$(target).slideToggle(250, function () {
				var targetLi = $(this).closest('li');
				if ($(targetLi).hasClass('expand')) {
					$(targetLi).removeClass('expand');
				} else {
					$(targetLi).addClass('expand');
				}
			});
		}
	});
};


/* 21. Handle Top Menu - Mobile Top Menu Toggle - added in V1.9
------------------------------------------------ */
var handleTopMenuMobileToggle = function () {
	"use strict";
	$(document).on('click', '[data-click="top-menu-toggled"]', function () {
		$('.top-menu').slideToggle(250);
	});
};


/* 22. Handle Clear Sidebar Selection & Hide Mobile Menu - added in V1.9
------------------------------------------------ */
var handleClearSidebarSelection = function () {
	$('.sidebar .nav > li, .sidebar .nav .sub-menu').removeClass('expand').removeAttr('style');
};
var handleClearSidebarMobileSelection = function () {
	$('#page-container').removeClass('page-sidebar-toggled');
};


/* 23. Handle Check Bootstrap Version - added in V4.0
------------------------------------------------ */
var handleCheckBootstrapVersion = function () {
	return parseInt($.fn.tooltip.Constructor.VERSION);
};


/* 24. Handle Page Scroll Class - added in V4.0
------------------------------------------------ */
var handleCheckScrollClass = function () {
	if ($(window).scrollTop() > 0) {
		$('#page-container').addClass('has-scroll');
	} else {
		$('#page-container').removeClass('has-scroll');
	}
};
var handlePageScrollClass = function () {
	$(window).on('scroll', function () {
		handleCheckScrollClass();
	});
	handleCheckScrollClass();
};


/* 25. Handle Toggle Navbar Profile - added in V4.0
------------------------------------------------ */
var handleToggleNavProfile = function () {
	var expandTime = ($('.sidebar').attr('data-disable-slide-animation')) ? 0 : 250;

	$(document).on('click', '[data-toggle="nav-profile"]', function (e) {
		e.preventDefault();

		var targetLi = $(this).closest('li');
		var targetProfile = $('.sidebar .nav.nav-profile');
		var targetClass = 'active';
		var targetExpandingClass = 'expanding';
		var targetExpandClass = 'expand';
		var targetClosingClass = 'closing';
		var targetClosedClass = 'closed';

		if ($(targetProfile).is(':visible')) {
			$(targetLi).removeClass(targetClass);
			$(targetProfile).removeClass(targetClosingClass);
		} else {
			$(targetLi).addClass(targetClass);
			$(targetProfile).addClass(targetExpandingClass);
		}
		$(targetProfile).slideToggle(expandTime, function () {
			if (!$(targetProfile).is(':visible')) {
				$(targetProfile).addClass(targetClosedClass);
				$(targetProfile).removeClass(targetExpandClass);
			} else {
				$(targetProfile).addClass(targetExpandClass);
				$(targetProfile).removeClass(targetClosedClass);
			}
			$(targetProfile).removeClass(targetExpandingClass + ' ' + targetClosingClass);
		});
	});
};


/* 26. Handle Sidebar Scroll Memory - added in V4.0
------------------------------------------------ */
var handleSidebarScrollMemory = function () {
	if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
		try {
			if (typeof (Storage) !== 'undefined' && typeof (localStorage) !== 'undefined') {
				$('.sidebar [data-scrollbar="true"]').slimScroll().bind('slimscrolling', function (e, pos) {
					localStorage.setItem('sidebarScrollPosition', pos + 'px');
				});

				var defaultScroll = localStorage.getItem('sidebarScrollPosition');
				if (defaultScroll) {
					$('.sidebar [data-scrollbar="true"]').slimScroll({ scrollTo: defaultScroll });
				}
			}
		} catch (error) {
			console.log(error);
		}
	}
};


/* 27. Handle Sidebar Minify Sub Menu - added in V4.0
------------------------------------------------ */
var floatSubMenuTimeout;
var targetFloatMenu;
var handleMouseoverFloatSubMenu = function (elm) {
	clearTimeout(floatSubMenuTimeout);
	$('.sidebar-minify-btn').hide();
};
var handleMouseoutFloatSubMenu = function (elm) {
	floatSubMenuTimeout = setTimeout(function () {
		$('#float-sub-menu').remove();
		$('.sidebar-minify-btn').fadeIn();
	}, 150);
};

var showMiniMenu = function (element, self) {
	if ($('#page-container').hasClass('page-sidebar-minified')) {
		clearTimeout(floatSubMenuTimeout);
		var targetMenu = element.closest('li').find('.sub-menu').first();
		var menuHtml = element.closest('li').find('a > span').first();
		var menuHtmlText = $(menuHtml).html();
		var menuHtmlHref = element.closest('li').find('a').first().attr('href');
		if (targetFloatMenu == self && $('#float-sub-menu').length !== 0) {
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				hideMiniMenu(true);
				$('.sidebar-minify-btn').show();
				return;
			}
			return;
		} else {
			targetFloatMenu = self;
		}
		var targetMenuHtml = $(targetMenu).html();
		if (targetMenuHtml || menuHtmlText) {
			var sidebarOffset = $('#sidebar').offset();
			var sidebarWidth = parseInt($('#sidebar').width());
			var sidebarX = (!$('#page-container').hasClass('page-with-right-sidebar') && $('body').css('direction') != 'rtl') ? (sidebarOffset.left + sidebarWidth) : ($(window).width() - sidebarOffset.left);
			var targetHeight = $(targetMenu).height();
			var targetOffset = element.offset();
			var targetTop = targetOffset.top - $(window).scrollTop();
			var targetLeft = (!$('#page-container').hasClass('page-with-right-sidebar') && $('body').css('direction') != 'rtl') ? sidebarX : 'auto';
			var targetRight = (!$('#page-container').hasClass('page-with-right-sidebar') && $('body').css('direction') != 'rtl') ? 'auto' : sidebarX;
			var windowHeight = $(window).height();
			// console.log(targetMenuHtml)
			if ($('#float-sub-menu').length === 0) {
				if (targetMenuHtml) {
					targetMenuHtml = '' +
						'<div class="float-sub-menu-container" id="float-sub-menu" data-offset-top="' + targetTop + '" data-menu-offset-top="' + targetTop + '" onmouseover="handleMouseoverFloatSubMenu(this)" onmouseout="handleMouseoutFloatSubMenu(this)">' +
						'	<div class="float-sub-menu-arrow" id="float-sub-menu-arrow"></div>' +
						'	<div class="float-sub-menu-line" id="float-sub-menu-line"></div>' +
						'	<ul class="float-sub-menu"><li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>' + menuHtmlText + '</a>' +
						'	<ul class="sub-menu">' + targetMenuHtml + '</ul></li></ul>' +
						'</div>';
				}
				else {
					targetMenuHtml = '' +
						'<div class="float-sub-menu-container" id="float-sub-menu" data-offset-top="' + targetTop + '" data-menu-offset-top="' + targetTop + '" onmouseover="handleMouseoverFloatSubMenu(this)" onmouseout="handleMouseoutFloatSubMenu(this)">' +
						'	<div class="float-sub-menu-arrow" id="float-sub-menu-arrow"></div>' +
						'	<div class="float-sub-menu-line" id="float-sub-menu-line"></div>' +
						'	<ul class="float-sub-menu"><li class="has-sub"><a href="' + menuHtmlHref + '">' + menuHtmlText + '</a></li></ul>' +
						'</div>';
				}

				$('#page-container').append(targetMenuHtml);
			} else {
				$('#float-sub-menu').attr('data-offset-top', targetTop);
				$('#float-sub-menu').attr('data-menu-offset-top', targetTop);
				if (!targetMenuHtml) {
					$('.float-sub-menu').html('<li class="has-sub"><a href="' + menuHtmlHref + '">' + menuHtmlText + '</a></li>');
				}
				else {
					$('.float-sub-menu').html('<li class="has-sub"><a href="javascript:;"><b class="caret pull-right"></b>' + menuHtmlText + '</a>' +
						'	<ul class="sub-menu">' + targetMenuHtml + '</ul></li>');
				}

			}

			var targetHeight = $('#float-sub-menu').height();
			if ((windowHeight - targetTop) > targetHeight) {
				$('#float-sub-menu').css({
					'top': targetTop,
					'left': targetLeft,
					'bottom': 'auto',
					'right': targetRight
				});
				$('#float-sub-menu-arrow').css({ 'top': '20px', 'bottom': 'auto' });
				$('#float-sub-menu-line').css({ 'top': '20px', 'bottom': 'auto' });
			} else {
				$('#float-sub-menu').css({
					'bottom': 0,
					'top': 'auto',
					'left': targetLeft,
					'right': targetRight
				});
				var arrowBottom = (windowHeight - targetTop) - 21;
				$('#float-sub-menu-arrow').css({ 'top': 'auto', 'bottom': arrowBottom + 'px' });
				$('#float-sub-menu-line').css({ 'top': '20px', 'bottom': arrowBottom + 'px' });
			}
		} else {
			$('#float-sub-menu').remove();
			targetFloatMenu = '';
		}
		$('.sidebar-minify-btn').hide();
	}
}

var hideMiniMenu = function (withoutTimeOut) {
	if ($('#page-container').hasClass('page-sidebar-minified')) {
		if (withoutTimeOut) {
			$('#float-sub-menu').remove();
			targetFloatMenu = '';
		}
		else {
			floatSubMenuTimeout = setTimeout(function () {
				$('#float-sub-menu').remove();
				targetFloatMenu = '';
				$('.sidebar-minify-btn').show();
			}, 250);
		}
	}
}
var handleSidebarMinifyFloatMenu = function () {
	$(document).on('click', '#float-sub-menu li.has-sub > a', function (e) {
		var target = $(this).next('.sub-menu');
		var targetLi = $(target).closest('li');
		var close = false;
		var expand = false;
		if ($(target).is(':visible')) {
			$(targetLi).addClass('closing');
			close = true;
		} else {
			$(targetLi).addClass('expanding');
			expand = true;
		}
		$(target).slideToggle({
			duration: 250,
			progress: function () {
				var targetMenu = $('#float-sub-menu');
				var targetHeight = $(targetMenu).height();
				var targetOffset = $(targetMenu).offset();
				var targetOriTop = $(targetMenu).attr('data-offset-top');
				var targetMenuTop = $(targetMenu).attr('data-menu-offset-top');
				var targetTop = targetOffset.top - $(window).scrollTop();
				var windowHeight = $(window).height();
				if (close) {
					if (targetTop > targetOriTop) {
						targetTop = (targetTop > targetOriTop) ? targetOriTop : targetTop;
						$('#float-sub-menu').css({ 'top': targetTop + 'px', 'bottom': 'auto' });
						$('#float-sub-menu-arrow').css({ 'top': '20px', 'bottom': 'auto' });
						$('#float-sub-menu-line').css({ 'top': '20px', 'bottom': 'auto' });
					}
				}
				if (expand) {
					if ((windowHeight - targetTop) < targetHeight) {
						var arrowBottom = (windowHeight - targetMenuTop) - 22;
						$('#float-sub-menu').css({ 'top': 'auto', 'bottom': 0 });
						$('#float-sub-menu-arrow').css({ 'top': 'auto', 'bottom': arrowBottom + 'px' });
						$('#float-sub-menu-line').css({ 'top': '20px', 'bottom': arrowBottom + 'px' });
					}
				}
			},
			complete: function () {
				if ($(target).is(':visible')) {
					$(targetLi).addClass('expand');
					$(targetLi).removeClass('closed');
				} else {
					$(targetLi).addClass('closed');
					$(targetLi).removeClass('expand');
				}
				$(targetLi).removeClass('closing expanding');
			}
		});
	});

	$(document).on({
		mouseenter: function () {
			var element = $(this);
			var self = this;
			showMiniMenu(element, self);
			// $('.sidebar-minify-btn').hide();
		},
		mouseleave: function () {
			hideMiniMenu();
		},
		click: function () {
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				var element = $(this);
				var self = this;
				showMiniMenu(element, self);
			}
		}
	}, '.sidebar .nav > li > a');
};


/* 28. Handle Ajax Mode - added in V4.0
------------------------------------------------ */
var CLEAR_OPTION = '';
var handleAjaxMode = function (setting) {
	var emptyHtml = (setting.emptyHtml) ? setting.emptyHtml : '<div class="p-t-40 p-b-40 text-center f-s-20 content"><i class="fa fa-warning fa-lg text-muted m-r-5"></i> <span class="f-w-600 text-inverse">Error 404! Page not found.</span></div>';
	var defaultUrl = (setting.ajaxDefaultUrl) ? setting.ajaxDefaultUrl : '';
	defaultUrl = (window.location.hash) ? window.location.hash : defaultUrl;

	if (defaultUrl === '') {
		$('#content').html(emptyHtml);
	} else {
		renderAjax(defaultUrl, '', true);
	}

	function clearElement() {
		$('.jvectormap-label, .jvector-label, .AutoFill_border ,#gritter-notice-wrapper, .ui-autocomplete, .colorpicker, .FixedHeader_Header, .FixedHeader_Cloned .lightboxOverlay, .lightbox, .introjs-hints, .nvtooltip, #float-sub-menu').remove();
		if ($.fn.DataTable) {
			$('.dataTable').DataTable().destroy();
		}
		if ($('#page-container').hasClass('page-sidebar-toggled')) {
			$('#page-container').removeClass('page-sidebar-toggled');
		}
	}

	function checkSidebarActive(url) {
		var targetElm = '#sidebar [data-toggle="ajax"][href="' + url + '"]';
		if ($(targetElm).length !== 0) {
			$('#sidebar li').removeClass('active');
			$(targetElm).closest('li').addClass('active');
			$(targetElm).parents().addClass('active');
		}
	}

	function checkPushState(url) {
		var targetUrl = url.replace('#', '');
		var targetUserAgent = window.navigator.userAgent;
		var isIE = targetUserAgent.indexOf('MSIE ');

		if (isIE && (isIE > 0 && isIE < 9)) {
			window.location.href = targetUrl;
		} else {
			history.pushState('', '', '#' + targetUrl);
		}
	}

	function checkClearOption() {
		if (CLEAR_OPTION) {
			App.clearPageOption(CLEAR_OPTION);
			CLEAR_OPTION = '';
		}
	}

	function checkLoading(load) {
		if (!load) {
			if ($('#page-content-loader').length === 0) {
				$('body').addClass('page-content-loading');
				$('#content').append('<div id="page-content-loader"><span class="spinner"></span></div>');
			}
		} else {
			$('#page-content-loader').remove();
			$('body').removeClass('page-content-loading');
		}
	}

	function renderAjax(url, elm, disablePushState) {
		Pace.restart();

		checkLoading(false);
		clearElement();
		checkSidebarActive(url);
		checkClearOption();
		if (!disablePushState) {
			checkPushState(url);
		}

		var targetContainer = '#content';
		var targetUrl = url.replace('#', '');
		var targetType = (setting.ajaxType) ? setting.ajaxType : 'GET';
		var targetDataType = (setting.ajaxDataType) ? setting.ajaxDataType : 'html';
		if (elm) {
			targetDataType = ($(elm).attr('data-type')) ? $(elm).attr('data-type') : targetDataType;
			targetDataDataType = ($(elm).attr('data-data-type')) ? $(elm).attr('data-data-type') : targetDataType;
		}

		$.ajax({
			url: targetUrl,
			type: targetType,
			dataType: targetDataType,
			success: function (data) {
				$(targetContainer).html(data);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				$(targetContainer).html(emptyHtml);
			}
		}).done(function () {
			checkLoading(true);
			$('html, body').animate({ scrollTop: 0 }, 0);
			App.initComponent();
		});
	}

	$(window).on('hashchange', function () {
		if (window.location.hash) {
			renderAjax(window.location.hash, '', true);
		}
	});

	$(document).on('click', '[data-toggle="ajax"]', function (e) {
		e.preventDefault();
		renderAjax($(this).attr('href'), this);
	});
};
var handleSetPageOption = function (option) {
	if (option.pageContentFullHeight) {
		$('#page-container').addClass('page-content-full-height');
	}
	if (option.pageSidebarLight) {
		$('#page-container').addClass('page-with-light-sidebar');
	}
	if (option.pageSidebarRight) {
		$('#page-container').addClass('page-with-right-sidebar');
	}
	if (option.pageSidebarWide) {
		$('#page-container').addClass('page-with-wide-sidebar');
	}
	if (option.pageSidebarMinified) {
		$('#page-container').addClass('page-sidebar-minified');
	}
	if (option.pageSidebarTransparent) {
		$('#sidebar').addClass('sidebar-transparent');
	}
	if (option.pageContentFullWidth) {
		$('#content').addClass('content-full-width');
	}
	if (option.pageContentInverseMode) {
		$('#content').addClass('content-inverse-mode');
	}
	if (option.pageBoxedLayout) {
		$('body').addClass('boxed-layout');
	}
	if (option.clearOptionOnLeave) {
		CLEAR_OPTION = option;
	}
};
var handleClearPageOption = function (option) {
	if (option.pageContentFullHeight) {
		$('#page-container').removeClass('page-content-full-height');
	}
	if (option.pageSidebarLight) {
		$('#page-container').removeClass('page-with-light-sidebar');
	}
	if (option.pageSidebarRight) {
		$('#page-container').removeClass('page-with-right-sidebar');
	}
	if (option.pageSidebarWide) {
		$('#page-container').removeClass('page-with-wide-sidebar');
	}
	if (option.pageSidebarMinified) {
		$('#page-container').removeClass('page-sidebar-minified');
	}
	if (option.pageSidebarTransparent) {
		$('#sidebar').removeClass('sidebar-transparent');
	}
	if (option.pageContentFullWidth) {
		$('#content').removeClass('content-full-width');
	}
	if (option.pageContentInverseMode) {
		$('#content').removeClass('content-inverse-mode');
	}
	if (option.pageBoxedLayout) {
		$('body').removeClass('boxed-layout');
	}
};


/* 29. Handle Float Navbar Search - added in V4.0
------------------------------------------------ */
var handleToggleNavbarSearch = function () {
	$('[data-toggle="navbar-search"]').click(function (e) {
		e.preventDefault();
		$('.header').addClass('header-search-toggled');
	});

	$('[data-dismiss="navbar-search"]').click(function (e) {
		e.preventDefault();
		$('.header').removeClass('header-search-toggled');
	});
};

var convertNumberWithCommas = function (x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

var checkIsFloat = function (x) {
	return Number(x) === x && x % 1 !== 0;
};

var checkIsInt = function (x) {
	return Number(x) === x && x % 1 === 0;
};

var countDecimals = function (x) {
	var split = x.toString().split('.');

	return (split[1]) ? split[1].length : 0;
};

var handleAnimation = function () {
	$('[data-animation]').each(function () {
		var targetAnimate = $(this).attr('data-animation');
		var targetValue = $(this).attr('data-value');

		switch (targetAnimate) {
			case 'width':
				$(this).css('width', targetValue);
				break;
			case 'height':
				$(this).css('height', targetValue);
				break;
			case 'number':
				var targetElm = this;
				var decimal = countDecimals(targetValue);
				var divide = 1;
				var x = decimal;
				while (x > 0) {
					divide *= 10;
					x--;
				}

				$({ animateNumber: 0 }).animate({ animateNumber: targetValue }, {
					duration: 1000,
					easing: 'swing',
					step: function () {
						var number = (Math.ceil(this.animateNumber * divide) / divide).toFixed(decimal);
						var number = convertNumberWithCommas(number);
						$(targetElm).text(number);
					},
					done: function () {
						$(targetElm).text(convertNumberWithCommas(targetValue));
					}
				});
				break;
			case 'class':
				$(this).addClass(targetValue);
				break;
			default:
				break;

		}
	});
};

var handleSidebarSearch = function () {
	$(document).on('keyup', '[data-sidebar-search="true"]', function () {
		var targetValue = $(this).val();
		targetValue = targetValue.toLowerCase();

		if (targetValue) {
			$('.sidebar:not(.sidebar-right) .nav > li:not(.nav-profile):not(.nav-header):not(.nav-search), .sidebar:not(.sidebar-right) .sub-menu > li').addClass('d-none');
			$('.sidebar:not(.sidebar-right) .has-text').removeClass('has-text');
			$('.sidebar:not(.sidebar-right) .expand').removeClass('expand');
			$('.sidebar:not(.sidebar-right) .nav > li:not(.nav-profile):not(.nav-header):not(.nav-search) > a, .sidebar .sub-menu > li > a').each(function () {
				var targetText = $(this).text();
				targetText = targetText.toLowerCase();
				if (targetText.search(targetValue) > -1) {
					$(this).closest('li').removeClass('d-none');
					$(this).closest('li').addClass('has-text');

					if ($(this).closest('li.has-sub').length != 0) {
						$(this).closest('li.has-sub').find('.sub-menu li.d-none').removeClass('d-none');
					}
					if ($(this).closest('.sub-menu').length != 0) {
						$(this).closest('.sub-menu').css('display', 'block');
						$(this).closest('.has-sub').removeClass('d-none').addClass('expand');
						$(this).closest('.sub-menu').find('li:not(.has-text)').addClass('d-none');
					}
				}
			})
		} else {
			$('.sidebar:not(.sidebar-right) .nav > li:not(.nav-profile):not(.nav-header):not(.nav-search).has-sub .sub-menu').removeAttr('style');
			$('.sidebar:not(.sidebar-right) .nav > li:not(.nav-profile):not(.nav-header):not(.nav-search), .sidebar:not(.sidebar-right) .sub-menu > li').removeClass('d-none');
			$('.sidebar:not(.sidebar-right) .expand').removeClass('expand');
		}
	})
};

var handleToggleClass = function () {
	$(document).on('click', '[data-toggle-class]', function (e) {
		e.preventDefault();

		var target = ($(this).attr('data-target')) ? $(this).attr('data-target') : '';
		var targetClass = $(this).attr('data-toggle-class');

		if (target) {
			$(target).toggleClass(targetClass);
		}
	});
};

var handleDismissClass = function () {
	$(document).on('click', '[data-dismiss-class]', function (e) {
		e.preventDefault();

		var target = ($(this).attr('data-target')) ? $(this).attr('data-target') : '';
		var targetClass = $(this).attr('data-dismiss-class');

		if (target) {
			$(target).removeClass(targetClass);
		}
	});
};


/* Application Controller
------------------------------------------------ */
var App = function () {
	"use strict";

	var setting;

	return {
		//main function
		init: function (option) {
			if (option) {
				setting = option;
			}
			this.initLocalStorage();
			this.initSidebar();
			this.initTopMenu();
			this.initComponent();
			this.initThemePanel();
			this.initPageLoad();
			$(window).trigger('load');

			if (setting && setting.ajaxMode) {
				this.initAjax();
			}
		},
		settings: function (option) {
			if (option) {
				setting = option;
			}
		},
		initSidebar: function () {
			handleSidebarMenu();
			handleMobileSidebarToggle();
			handleSidebarMinify();
			handleSidebarMinifyFloatMenu();
			handleToggleNavProfile();
			handleToggleNavbarSearch();
			handleSidebarSearch();

			if (!setting || (setting && !setting.disableSidebarScrollMemory)) {
				handleSidebarScrollMemory();
			}
		},
		initSidebarSelection: function () {
			handleClearSidebarSelection();
		},
		initSidebarMobileSelection: function () {
			handleClearSidebarMobileSelection();
		},
		initTopMenu: function () {
			handleUnlimitedTopMenuRender();
			handleTopMenuSubMenu();
			handleMobileTopMenuSubMenu();
			handleTopMenuMobileToggle();
		},
		initPageLoad: function () {
			handlePageContentView();
		},
		initComponent: function () {
			if (!setting || (setting && !setting.disableDraggablePanel)) {
				handleDraggablePanel();
			}
			handleIEFullHeightContent();
			handleSlimScroll();
			handleUnlimitedTabsRender();
			handlePanelAction();
			handleScrollToTopButton();
			handleAfterPageLoadAddClass();
			handlePageScrollClass();
			handleAnimation();
			handleToggleClass();
			handleDismissClass();

			if ($(window).width() > 767) {
				handelTooltipPopoverActivation();
			}
		},
		initLocalStorage: function () {
			if (!setting || (setting && !setting.disableLocalStorage)) {
				handleLocalStorage();
			}
		},
		initThemePanel: function () {
			handleThemePageStructureControl();
			handleThemePanelExpand();
			handleResetLocalStorage();
		},
		initAjax: function () {
			handleAjaxMode(setting);
			$.ajaxSetup({
				cache: true
			});
		},
		setPageTitle: function (pageTitle) {
			document.title = pageTitle;
		},
		setPageOption: function (option) {
			handleSetPageOption(option);
		},
		clearPageOption: function (option) {
			handleClearPageOption(option);
		},
		restartGlobalFunction: function () {
			$('.jvectormap-tip, .daterangepicker').remove();
			this.initLocalStorage();
			this.initComponent();
		},
		scrollTop: function () {
			$('html, body').animate({
				scrollTop: $('body').offset().top
			}, 0);
		}
	};
}();

jQuery(function ($) {
	$(window).on('load', function () {
		// POS_LOAD scripts. Can use $
	});
	App.init({'disableDraggablePanel':true});
	// POS_READY scripts
});

var showedModal = [];
$(document).on('show.bs.modal', '.modal', function (e) {
	if (e.namespace === 'bs.modal') {
		showedModal.push(this);
	}
	if(showedModal.length > 1){
		for (let i = 0; i < showedModal.length-1; i++) {
			var modalToHide = $(showedModal[i]);
			var hasHideClass = modalToHide.hasClass('d-none');
			if(!hasHideClass){
				modalToHide.addClass('d-none');
			}
		}
	}
});
$(document).on('hidden.bs.modal', '.modal', function () {
	var showedModalLength = showedModal.length;
	var modalToShow = $(showedModal[showedModal.lastIndexOf(this)-1]);  
	showedModal.splice(showedModal.lastIndexOf(this), 1);              
	if(showedModalLength > 1){
		var hasHideClass = modalToShow.hasClass('d-none');
		if(hasHideClass){
			modalToShow.removeClass('d-none');
		}
	} 
	$('.modal:visible').length && $(document.body).addClass('modal-open');                         
});


document.addEventListener("reloadPage", () => { 
	location.reload();
});

document.addEventListener("errorAlert", () => { 
	alert("No data!");
});