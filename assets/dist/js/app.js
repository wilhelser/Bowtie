/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/wp-content/themes/bowtie/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


__webpack_require__(1);

__webpack_require__(2);

__webpack_require__(3);

// Open and Close Menu
var menu = document.querySelector('[data-menu]'); //import './foundation.js'

if (menu) {
  menu.addEventListener('click', function (e) {
    e.preventDefault();
    document.body.classList.toggle('menu-open');
  });
}

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function sniff() {
  this.version = "1.3", this.browserType, this.browserVersion, this.mobile, this.browserVersionExtended = null;for (var e, i = !1, s = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/iPhone|iPad|iPod/i) || navigator.userAgent.match(/Opera Mini/i) || navigator.userAgent.match(/IEMobile/i) || null, o = navigator.appName, n = navigator.userAgent, t = n.match(/(opera|chrome|safari|firefox|msie|trident|edge)\/?\s*(\.?\d+(\.\d+)*)/i), r = n.match(/(opera|chrome|safari|firefox|msie|trident|edge)\/?\s*(\.?\d+(\.\d+)*)/gi), a = 0; a < r.length; a++) {
    if (r[a].toLowerCase().indexOf("edge") >= 0) {
      var d = r[a].split("/"),
          m = d[0].toLowerCase(),
          f = d[1];i = !0, console.log("so qui");
    }
  }if (!i) {
    t && null != (e = n.match(/version\/([\.\d]+)/i)) && (t[2] = e[1]), t = t ? [t[1], t[2]] : [o, navigator.appVersion, "-?"];var m = t[0].toLowerCase(),
        f = t[1];if ("trident" == t[0].toLowerCase()) {
      m = "msie", console.log(n), f = n.match(/(rv)\:?(\.?\d+(\.\d+)*)/i);for (var l = 0; l < f.length; l++) {
        if (!isNaN(parseInt(f[l]))) {
          f = f[l];break;
        }
      }
    }
  }this.mobile = s, this.browserType = m, this.browserVersion = parseInt(f), this.browserVersionExtended = f;
}var sniff = new sniff();"undefined" != typeof document.documentElement.classList ? (document.documentElement.classList.add(sniff.browserType), document.documentElement.classList.add("v" + sniff.browserVersion), null != sniff.mobile && document.documentElement.classList.add(sniff.mobile.toString().toLowerCase())) : (document.documentElement.className += " " + sniff.browserType + " v" + sniff.browserVersion, null != sniff.mobile && (document.documentElement.className += " " + sniff.mobile.toString().toLowerCase()));

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// Browser Update Notification
// < IE 9 or 6 Months out of date
var $buoop = { vs: { i: 9, f: -4, o: -4, s: 8, c: -4 }, api: 4 };
function $buo_f() {
  var e = document.createElement("script");
  e.src = "//browser-update.org/update.min.js";
  document.body.appendChild(e);
};
try {
  document.addEventListener("DOMContentLoaded", $buo_f, false);
} catch (e) {
  window.attachEvent("onload", $buo_f);
}

/***/ }),
/* 3 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);
//# sourceMappingURL=app.js.map