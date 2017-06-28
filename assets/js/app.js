jQuery(document).ready(function($) {

$(document).foundation();

});


// Browser Update Notification
// < IE 9 or 6 Months out of date
var $buoop = {vs:{i:9,f:-4,o:-4,s:8,c:-4},api:4};
function $buo_f(){
 var e = document.createElement("script");
 e.src = "//browser-update.org/update.min.js";
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
