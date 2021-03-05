﻿!function(e){"use strict";function t(e,t,a){if(void 0===e.selectionStart){e.focus();var i=e.createTextRange();i.collapse(!0),i.moveEnd("character",a),i.moveStart("character",t),i.select()}else e.selectionStart=t,e.selectionEnd=a}function a(e,t){"string"==typeof e[t]&&(e[t]*=1)}function i(t,i){!function(t,a){e.each(a,function(e,i){"function"==typeof i?a[e]=i(t,a,e):"function"==typeof t.autoNumeric[i]&&(a[e]=t.autoNumeric[i](t,a,e))})}(t,i),i.tagList=["b","caption","cite","code","dd","del","div","dfn","dt","em","h1","h2","h3","h4","h5","h6","ins","kdb","label","li","output","p","q","s","sample","span","strong","td","th","u","var"];var n=i.vMax.toString().split("."),r=i.vMin||0===i.vMin?i.vMin.toString().split("."):[];if(a(i,"vMax"),a(i,"vMin"),a(i,"mDec"),i.mDec="CHF"===i.mRound?"2":i.mDec,i.allowLeading=!0,i.aNeg=i.vMin<0?"-":"",n[0]=n[0].replace("-",""),r[0]=r[0].replace("-",""),i.mInt=Math.max(n[0].length,r[0].length,1),null===i.mDec){var o=0,s=0;n[1]&&(o=n[1].length),r[1]&&(s=r[1].length),i.mDec=Math.max(o,s)}null===i.altDec&&i.mDec>0&&("."===i.aDec&&","!==i.aSep?i.altDec=",":","===i.aDec&&"."!==i.aSep&&(i.altDec="."));var u=i.aNeg?"([-\\"+i.aNeg+"]?)":"(-?)";i.aNegRegAutoStrip=u,i.skipFirstAutoStrip=new RegExp(u+"[^-"+(i.aNeg?"\\"+i.aNeg:"")+"\\"+i.aDec+"\\d].*?(\\d|\\"+i.aDec+"\\d)"),i.skipLastAutoStrip=new RegExp("(\\d\\"+i.aDec+"?)[^\\"+i.aDec+"\\d]\\D*$");var l="-"+i.aNum+"\\"+i.aDec;return i.allowedAutoStrip=new RegExp("[^"+l+"]","gi"),i.numRegAutoStrip=new RegExp(u+"(?:\\"+i.aDec+"?(\\d+\\"+i.aDec+"\\d+)|(\\d*(?:\\"+i.aDec+"\\d*)?))"),i}function n(e,t,a){if(t.aSign)for(;e.indexOf(t.aSign)>-1;)e=e.replace(t.aSign,"");e=(e=(e=e.replace(t.skipFirstAutoStrip,"$1$2")).replace(t.skipLastAutoStrip,"$1")).replace(t.allowedAutoStrip,""),t.altDec&&(e=e.replace(t.altDec,t.aDec));var i=e.match(t.numRegAutoStrip);if(e=i?[i[1],i[2],i[3]].join(""):"",("allow"===t.lZero||"keep"===t.lZero)&&"strip"!==a){var n=[],r="";-1!==(n=e.split(t.aDec))[0].indexOf("-")&&(r="-",n[0]=n[0].replace("-","")),n[0].length>t.mInt&&"0"===n[0].charAt(0)&&(n[0]=n[0].slice(1)),e=r+n.join(t.aDec)}if(a&&"deny"===t.lZero||a&&"allow"===t.lZero&&!1===t.allowLeading){var o="^"+t.aNegRegAutoStrip+"0*(\\d"+("leading"===a?")":"|$)");o=new RegExp(o),e=e.replace(o,"$1$2")}return e}function r(e,t){if("p"===t.pSign){var a=t.nBracket.split(",");t.hasFocus||t.removeBrackets?(t.hasFocus&&e.charAt(0)===a[0]||t.removeBrackets&&e.charAt(0)===a[0])&&(e=(e=e.replace(a[0],t.aNeg)).replace(a[1],"")):(e=e.replace(t.aNeg,""),e=a[0]+e+a[1])}return e}function o(e,t){if(e){var a=+e;if(a<1e-6&&a>-1)(e=+e)<1e-6&&e>0&&(e=(e=(e+10).toString()).substring(1)),e<0&&e>-1&&(e="-"+(e=(e-10).toString()).substring(2)),e=e.toString();else{var i=e.split(".");void 0!==i[1]&&(0==+i[1]?e=i[0]:(i[1]=i[1].replace(/0*$/,""),e=i.join(".")))}}return"keep"===t.lZero?e:e.replace(/^0*(\d)/,"$1")}function s(e,t,a){return t&&"."!==t&&(e=e.replace(t,".")),a&&"-"!==a&&(e=e.replace(a,"-")),e.match(/\d/)||(e+="0"),e}function u(e,t,a){return a&&"-"!==a&&(e=e.replace("-",a)),t&&"."!==t&&(e=e.replace(".",t)),e}function l(e,t,a){return""===e||e===t.aNeg?"zero"===t.wEmpty?e+"0":"sign"===t.wEmpty||a?e+t.aSign:e:null}function c(e,t){(NaN!==Number(e)&&"."===t.aDec||NaN!==Number(e)&&","===t.aDec)&&(e=n(e,t));var a=e.replace(",","."),i=l(e,t,!0);if(null!==i)return i;var o="";o=2===t.dGroup?/(\d)((\d)(\d{2}?)+)$/:4===t.dGroup?/(\d)((\d{4}?)+)$/:/(\d)((\d{3}?)+)$/;var s=e.split(t.aDec);t.altDec&&1===s.length&&(s=e.split(t.altDec));var u=s[0];if(t.aSep)for(;o.test(u);)u=u.replace(o,"$1"+t.aSep+"$2");if(0!==t.mDec&&s.length>1?(s[1].length>t.mDec&&(s[1]=s[1].substring(0,t.mDec)),e=u+t.aDec+s[1]):e=u,t.aSign){var c=-1!==e.indexOf(t.aNeg);e=e.replace(t.aNeg,""),e="p"===t.pSign?t.aSign+e:e+t.aSign,c&&(e=t.aNeg+e)}return a<0&&null!==t.nBracket&&(e=r(e,t)),e}function h(e,t){e=""===e?"0":e.toString(),a(t,"mDec"),"CHF"===t.mRound&&(e=(Math.round(20*e)/20).toString());var i="",n=0,r="",o="boolean"==typeof t.aPad||null===t.aPad?t.aPad?t.mDec:0:+t.aPad,s=function(e){var t=0===o?/(\.(?:\d*[1-9])?)0*$/:1===o?/(\.\d(?:\d*[1-9])?)0*$/:new RegExp("(\\.\\d{"+o+"}(?:\\d*[1-9])?)0*$");return e=e.replace(t,"$1"),0===o&&(e=e.replace(/\.$/,"")),e};"-"===e.charAt(0)&&(r="-",e=e.replace("-","")),e.match(/^\d/)||(e="0"+e),"-"===r&&0==+e&&(r=""),(+e>0&&"keep"!==t.lZero||e.length>0&&"allow"===t.lZero)&&(e=e.replace(/^0*(\d)/,"$1"));var u=e.lastIndexOf("."),l=-1===u?e.length-1:u,c=e.length-1-l;if(c<=t.mDec){if(i=e,c<o){-1===u&&(i+=".");for(var h="000000";c<o;)i+=h=h.substring(0,o-c),c+=h.length}else c>o?i=s(i):0===c&&0===o&&(i=i.replace(/\.$/,""));if("CHF"!==t.mRound)return 0==+i?i:r+i;"CHF"===t.mRound&&(u=i.lastIndexOf("."),e=i)}var p=u+t.mDec,g=+e.charAt(p+1),d=e.substring(0,p+1).split(""),f="."===e.charAt(p)?e.charAt(p-1)%2:e.charAt(p)%2,m=!0;if(1!==f&&(f=0===f&&e.substring(p+2,e.length)>0?1:0),g>4&&"S"===t.mRound||g>4&&"A"===t.mRound&&""===r||g>5&&"A"===t.mRound&&"-"===r||g>5&&"s"===t.mRound||g>5&&"a"===t.mRound&&""===r||g>4&&"a"===t.mRound&&"-"===r||g>5&&"B"===t.mRound||5===g&&"B"===t.mRound&&1===f||g>0&&"C"===t.mRound&&""===r||g>0&&"F"===t.mRound&&"-"===r||g>0&&"U"===t.mRound||"CHF"===t.mRound)for(n=d.length-1;n>=0;n-=1)if("."!==d[n]){if("CHF"===t.mRound&&d[n]<=2&&m){d[n]=0,m=!1;break}if("CHF"===t.mRound&&d[n]<=7&&m){d[n]=5,m=!1;break}if("CHF"===t.mRound&&m?(d[n]=10,m=!1):d[n]=+d[n]+1,d[n]<10)break;n>0&&(d[n]="0")}return 0==+(i=s((d=d.slice(0,p+1)).join("")))?i:r+i}function p(e,t,a){var i=t.aDec,n=t.mDec;if(e="paste"===a?h(e,t):e,i&&n){var r=e.split(i);r[1]&&r[1].length>n&&(n>0?(r[1]=r[1].substring(0,n),e=r.join(i)):e=r[0])}return e}function g(e,t){var a=+(e=s(e=p(e=n(e,t),t),t.aDec,t.aNeg));return a>=t.vMin&&a<=t.vMax}function d(t,a){this.settings=a,this.that=t,this.$that=e(t),this.formatted=!1,this.settingsClone=i(this.$that,this.settings),this.value=t.value}function f(t){return"string"==typeof t&&(t="#"+(t=t.replace(/\[/g,"\\[").replace(/\]/g,"\\]")).replace(/(:|\.)/g,"\\$1")),e(t)}function m(e,t,a){var i=e.data("autoNumeric");i||(i={},e.data("autoNumeric",i));var n=i.holder;return(void 0===n&&t||a)&&(n=new d(e.get(0),t),i.holder=n),n}d.prototype={init:function(e){this.value=this.that.value,this.settingsClone=i(this.$that,this.settings),this.ctrlKey=e.ctrlKey,this.cmdKey=e.metaKey,this.shiftKey=e.shiftKey,this.selection=function(e){var t={};if(void 0===e.selectionStart){e.focus();var a=document.selection.createRange();t.length=a.text.length,a.moveStart("character",-e.value.length),t.end=a.text.length,t.start=t.end-t.length}else t.start=e.selectionStart,t.end=e.selectionEnd,t.length=t.end-t.start;return t}(this.that),"keydown"!==e.type&&"keyup"!==e.type||(this.kdCode=e.keyCode),this.which=e.which,this.processed=!1,this.formatted=!1},setSelection:function(e,a,i){e=Math.max(e,0),a=Math.min(a,this.that.value.length),this.selection={start:e,end:a,length:a-e},(void 0===i||i)&&t(this.that,e,a)},setPosition:function(e,t){this.setSelection(e,e,t)},getBeforeAfter:function(){var e=this.value;return[e.substring(0,this.selection.start),e.substring(this.selection.end,e.length)]},getBeforeAfterStriped:function(){var e=this.getBeforeAfter();return e[0]=n(e[0],this.settingsClone),e[1]=n(e[1],this.settingsClone),e},normalizeParts:function(e,t){var a=this.settingsClone;""!==(e=n(e,a,!!(t=n(t,a)).match(/^\d/)||"leading"))&&e!==a.aNeg||"deny"!==a.lZero||t>""&&(t=t.replace(/^0*(\d)/,"$1"));var i=e+t;if(a.aDec){var r=i.match(new RegExp("^"+a.aNegRegAutoStrip+"\\"+a.aDec));r&&(i=(e=e.replace(r[1],r[1]+"0"))+t)}return"zero"!==a.wEmpty||i!==a.aNeg&&""!==i||(e+="0"),[e,t]},setValueParts:function(e,t,a){var i=this.settingsClone,n=this.normalizeParts(e,t),r=n.join(""),o=n[0].length;return!!g(r,i)&&(o>(r=p(r,i,a)).length&&(o=r.length),this.value=r,this.setPosition(o,!1),!0)},signPosition:function(){var e=this.settingsClone,t=e.aSign,a=this.that;if(t){var i=t.length;if("p"===e.pSign)return e.aNeg&&a.value&&a.value.charAt(0)===e.aNeg?[1,i+1]:[0,i];var n=a.value.length;return[n-i,n]}return[1e3,-1]},expandSelectionOnSign:function(e){var t=this.signPosition(),a=this.selection;a.start<t[1]&&a.end>t[0]&&((a.start<t[0]||a.end>t[1])&&this.value.substring(Math.max(a.start,t[0]),Math.min(a.end,t[1])).match(/^\s*$/)?a.start<t[0]?this.setSelection(a.start,t[0],e):this.setSelection(t[1],a.end,e):this.setSelection(Math.min(a.start,t[0]),Math.max(a.end,t[1]),e))},checkPaste:function(){if(void 0!==this.valuePartsBeforePaste){var e=this.getBeforeAfter(),t=this.valuePartsBeforePaste;delete this.valuePartsBeforePaste,e[0]=e[0].substr(0,t[0].length)+n(e[0].substr(t[0].length),this.settingsClone),this.setValueParts(e[0],e[1],"paste")||(this.value=t.join(""),this.setPosition(t[0].length,!1))}},skipAllways:function(e){var t=this.kdCode,a=this.which,i=this.ctrlKey,n=this.cmdKey,r=this.shiftKey;if((i||n)&&"keyup"===e.type&&void 0!==this.valuePartsBeforePaste||r&&45===t)return this.checkPaste(),!1;if(t>=112&&t<=123||t>=91&&t<=93||t>=9&&t<=31||t<8&&(0===a||a===t)||144===t||145===t||45===t||224===t)return!0;if((i||n)&&65===t)return!0;if((i||n)&&(67===t||86===t||88===t))return"keydown"===e.type&&this.expandSelectionOnSign(),86!==t&&45!==t||("keydown"===e.type||"keypress"===e.type?void 0===this.valuePartsBeforePaste&&(this.valuePartsBeforePaste=this.getBeforeAfter()):this.checkPaste()),"keydown"===e.type||"keypress"===e.type||67===t;if(i||n)return!0;if(37===t||39===t){var o=this.settingsClone.aSep,s=this.selection.start,u=this.that.value;return"keydown"===e.type&&o&&!this.shiftKey&&(37===t&&u.charAt(s-2)===o?this.setPosition(s-1):39===t&&u.charAt(s+1)===o&&this.setPosition(s+1)),!0}return t>=34&&t<=40},processAllways:function(){var e;return(8===this.kdCode||46===this.kdCode)&&(this.selection.length?(this.expandSelectionOnSign(!1),e=this.getBeforeAfterStriped(),this.setValueParts(e[0],e[1])):(e=this.getBeforeAfterStriped(),8===this.kdCode?e[0]=e[0].substring(0,e[0].length-1):e[1]=e[1].substring(1,e[1].length),this.setValueParts(e[0],e[1])),!0)},processKeypress:function(){var e=this.settingsClone,t=String.fromCharCode(this.which),a=this.getBeforeAfterStriped(),i=a[0],n=a[1];return t===e.aDec||e.altDec&&t===e.altDec||("."===t||","===t)&&110===this.kdCode?!e.mDec||!e.aDec||(!!(e.aNeg&&n.indexOf(e.aNeg)>-1)||(i.indexOf(e.aDec)>-1||(n.indexOf(e.aDec)>0||(0===n.indexOf(e.aDec)&&(n=n.substr(1)),this.setValueParts(i+e.aDec,n),!0)))):"-"===t||"+"===t?!e.aNeg||(""===i&&n.indexOf(e.aNeg)>-1&&(i=e.aNeg,n=n.substring(1,n.length)),i=i.charAt(0)===e.aNeg?i.substring(1,i.length):"-"===t?e.aNeg+i:i,this.setValueParts(i,n),!0):!(t>="0"&&t<="9")||(e.aNeg&&""===i&&n.indexOf(e.aNeg)>-1&&(i=e.aNeg,n=n.substring(1,n.length)),e.vMax<=0&&e.vMin<e.vMax&&-1===this.value.indexOf(e.aNeg)&&"0"!==t&&(i=e.aNeg+i),this.setValueParts(i+t,n),!0)},formatQuick:function(){var e=this.settingsClone,t=this.getBeforeAfterStriped(),a=this.value;if((""===e.aSep||""!==e.aSep&&-1===a.indexOf(e.aSep))&&(""===e.aSign||""!==e.aSign&&-1===a.indexOf(e.aSign))){var i=[],n="";(i=a.split(e.aDec))[0].indexOf("-")>-1&&(n="-",i[0]=i[0].replace("-",""),t[0]=t[0].replace("-","")),i[0].length>e.mInt&&"0"===t[0].charAt(0)&&(t[0]=t[0].slice(1)),t[0]=n+t[0]}var r=c(this.value,this.settingsClone),o=r.length;if(r){for(var s=t[0].split(""),u=0;u<s.length;u+=1)s[u].match("\\d")||(s[u]="\\"+s[u]);var l=new RegExp("^.*?"+s.join(".*?")),h=r.match(l);h?(0===(o=h[0].length)&&r.charAt(0)!==e.aNeg||1===o&&r.charAt(0)===e.aNeg)&&e.aSign&&"p"===e.pSign&&(o=this.settingsClone.aSign.length+("-"===r.charAt(0)?1:0)):e.aSign&&"s"===e.pSign&&(o-=e.aSign.length)}this.that.value=r,this.setPosition(o),this.formatted=!0}};var v={init:function(a){return this.each(function(){var i=e(this),o=i.data("autoNumeric"),p=i.data(),d=i.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])");if("object"==typeof o)return this;(o=e.extend({},e.fn.autoNumeric.defaults,p,a,{aNum:"0123456789",hasFocus:!1,removeBrackets:!1,runOnce:!1,tagList:["b","caption","cite","code","dd","del","div","dfn","dt","em","h1","h2","h3","h4","h5","h6","ins","kdb","label","li","output","p","q","s","sample","span","strong","td","th","u","var"]})).aDec===o.aSep&&e.error("autoNumeric will not function properly when the decimal character aDec: '"+o.aDec+"' and thousand separator aSep: '"+o.aSep+"' are the same character"),i.data("autoNumeric",o);var f=m(i,o);if(d||"input"!==i.prop("tagName").toLowerCase()||e.error('The input type "'+i.prop("type")+'" is not supported by autoNumeric()'),-1===e.inArray(i.prop("tagName").toLowerCase(),o.tagList)&&"input"!==i.prop("tagName").toLowerCase()&&e.error("The <"+i.prop("tagName").toLowerCase()+"> is not supported by autoNumeric()"),!1===o.runOnce&&o.aForm){if(d){var v=!0;""===i[0].value&&"empty"===o.wEmpty&&(i[0].value="",v=!1),""===i[0].value&&"sign"===o.wEmpty&&(i[0].value=o.aSign,v=!1),v&&""!==i.val()&&(null===o.anDefault&&i[0].value===i.prop("defaultValue")||null!==o.anDefault&&o.anDefault.toString()===i.val())&&i.autoNumeric("set",i.val())}-1!==e.inArray(i.prop("tagName").toLowerCase(),o.tagList)&&""!==i.text()&&i.autoNumeric("set",i.text())}o.runOnce=!0,i.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])")&&(i.on("keydown.autoNumeric",function(t){return(f=m(i)).settings.aDec===f.settings.aSep&&e.error("autoNumeric will not function properly when the decimal character aDec: '"+f.settings.aDec+"' and thousand separator aSep: '"+f.settings.aSep+"' are the same character"),f.that.readOnly?(f.processed=!0,!0):(f.init(t),f.skipAllways(t)?(f.processed=!0,!0):f.processAllways()?(f.processed=!0,f.formatQuick(),t.preventDefault(),!1):(f.formatted=!1,!0))}),i.on("keypress.autoNumeric",function(e){var t=(f=m(i)).processed;return f.init(e),!!f.skipAllways(e)||(t?(e.preventDefault(),!1):f.processAllways()||f.processKeypress()?(f.formatQuick(),e.preventDefault(),!1):void(f.formatted=!1))}),i.on("keyup.autoNumeric",function(e){(f=m(i)).init(e);var a=f.skipAllways(e);return f.kdCode=0,delete f.valuePartsBeforePaste,i[0].value===f.settings.aSign&&("s"===f.settings.pSign?t(this,0,0):t(this,f.settings.aSign.length,f.settings.aSign.length)),!!a||(""===this.value||void(f.formatted||f.formatQuick()))}),i.on("focusin.autoNumeric",function(){var e=(f=m(i)).settingsClone;if(e.hasFocus=!0,null!==e.nBracket){var t=i.val();i.val(r(t,e))}f.inVal=i.val();var a=l(f.inVal,e,!0);null!==a&&""!==a&&i.val(a)}),i.on("focusout.autoNumeric",function(){var e=(f=m(i)).settingsClone,t=i.val(),a=t;e.hasFocus=!1;var r="";"allow"===e.lZero&&(e.allowLeading=!1,r="leading"),""!==t&&(t=null===l(t=n(t,e,r),e)&&g(t,e,i[0])?u(t=h(t=s(t,e.aDec,e.aNeg),e),e.aDec,e.aNeg):"");var o=l(t,e,!1);null===o&&(o=c(t,e)),o===f.inVal&&o===a||(i.val(o),i.change(),delete f.inVal)}))})},destroy:function(){return e(this).each(function(){var t=e(this);t.off(".autoNumeric"),t.removeData("autoNumeric")})},update:function(t){return e(this).each(function(){var a=f(e(this)),i=a.data("autoNumeric");"object"!=typeof i&&e.error("You must initialize autoNumeric('init', {options}) prior to calling the 'update' method");var n=a.autoNumeric("get");if(m(a,i=e.extend(i,t),!0),i.aDec===i.aSep&&e.error("autoNumeric will not function properly when the decimal character aDec: '"+i.aDec+"' and thousand separator aSep: '"+i.aSep+"' are the same character"),a.data("autoNumeric",i),""!==a.val()||""!==a.text())return a.autoNumeric("set",n)})},set:function(t){if(null!==t)return e(this).each(function(){var a=f(e(this)),i=a.data("autoNumeric"),n=t.toString(),r=t.toString(),s=a.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])");return"object"!=typeof i&&e.error("You must initialize autoNumeric('init', {options}) prior to calling the 'set' method"),r!==a.attr("value")&&r!==a.text()||!1!==i.runOnce||(n=n.replace(",",".")),e.isNumeric(+n)||e.error("The value ("+n+") being 'set' is not numeric and has caused a error to be thrown"),n=o(n,i),i.setEvent=!0,n.toString(),""!==n&&(n=h(n,i)),g(n=u(n,i.aDec,i.aNeg),i)||(n=h("",i)),n=c(n,i),s?a.val(n):-1!==e.inArray(a.prop("tagName").toLowerCase(),i.tagList)&&a.text(n)})},get:function(){var t=f(e(this)),a=t.data("autoNumeric");"object"!=typeof a&&e.error("You must initialize autoNumeric('init', {options}) prior to calling the 'get' method");var i="";return t.is("input[type=text], input[type=hidden], input[type=tel], input:not([type])")?i=t.eq(0).val():-1!==e.inArray(t.prop("tagName").toLowerCase(),a.tagList)?i=t.eq(0).text():e.error("The <"+t.prop("tagName").toLowerCase()+"> is not supported by autoNumeric()"),""===i&&"empty"===a.wEmpty||i===a.aSign&&("sign"===a.wEmpty||"empty"===a.wEmpty)?"":(""!==i&&null!==a.nBracket&&(a.removeBrackets=!0,i=r(i,a),a.removeBrackets=!1),(a.runOnce||!1===a.aForm)&&(i=n(i,a)),0==+(i=s(i,a.aDec,a.aNeg))&&"keep"!==a.lZero&&(i="0"),"keep"===a.lZero?i:i=o(i,a))},getString:function(){var t=!1,a=f(e(this)),i=a.serialize().split("&"),n=e("form").index(a),r=e("form:eq("+n+")"),o=[],s=[],u=/^(?:submit|button|image|reset|file)$/i,l=/^(?:input|select|textarea|keygen)/i,c=/^(?:checkbox|radio)$/i,h=/^(?:button|checkbox|color|date|datetime|datetime-local|email|file|image|month|number|password|radio|range|reset|search|submit|time|url|week)/i,p=0;return e.each(r[0],function(e,t){""===t.name||!l.test(t.localName)||u.test(t.type)||t.disabled||!t.checked&&c.test(t.type)?s.push(-1):(s.push(p),p+=1)}),p=0,e.each(r[0],function(e,t){"input"!==t.localName||""!==t.type&&"text"!==t.type&&"hidden"!==t.type&&"tel"!==t.type?(o.push(-1),"input"===t.localName&&h.test(t.type)&&(p+=1)):(o.push(p),p+=1)}),e.each(i,function(a,r){r=i[a].split("=");var u=e.inArray(a,s);u>-1&&o[u]>-1&&("object"==typeof e("form:eq("+n+") input:eq("+o[u]+")").data("autoNumeric")&&null!==r[1]&&(r[1]=e("form:eq("+n+") input:eq("+o[u]+")").autoNumeric("get").toString(),i[a]=r.join("="),t=!0))}),t||e.error("You must initialize autoNumeric('init', {options}) prior to calling the 'getString' method"),i.join("&")},getArray:function(){var t=!1,a=f(e(this)),i=a.serializeArray(),n=e("form").index(a),r=e("form:eq("+n+")"),o=[],s=[],u=/^(?:submit|button|image|reset|file)$/i,l=/^(?:input|select|textarea|keygen)/i,c=/^(?:checkbox|radio)$/i,h=/^(?:button|checkbox|color|date|datetime|datetime-local|email|file|image|month|number|password|radio|range|reset|search|submit|time|url|week)/i,p=0;return e.each(r[0],function(e,t){""===t.name||!l.test(t.localName)||u.test(t.type)||t.disabled||!t.checked&&c.test(t.type)?s.push(-1):(s.push(p),p+=1)}),p=0,e.each(r[0],function(e,t){"input"!==t.localName||""!==t.type&&"text"!==t.type&&"hidden"!==t.type&&"tel"!==t.type?(o.push(-1),"input"===t.localName&&h.test(t.type)&&(p+=1)):(o.push(p),p+=1)}),e.each(i,function(a,i){var r=e.inArray(a,s);r>-1&&o[r]>-1&&("object"==typeof e("form:eq("+n+") input:eq("+o[r]+")").data("autoNumeric")&&(i.value=e("form:eq("+n+") input:eq("+o[r]+")").autoNumeric("get").toString(),t=!0))}),t||e.error("None of the successful form inputs are initialized by autoNumeric."),i},getSettings:function(){return f(e(this)).eq(0).data("autoNumeric")}};e.fn.autoNumeric=function(t){return v[t]?v[t].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof t&&t?void e.error('Method "'+t+'" is not supported by autoNumeric()'):v.init.apply(this,arguments)},e.fn.autoNumeric.defaults={aSep:",",dGroup:"3",aDec:".",altDec:null,aSign:"",pSign:"p",vMax:"9999999999999.99",vMin:"-9999999999999.99",mDec:null,mRound:"S",aPad:!0,nBracket:null,wEmpty:"empty",lZero:"allow",sNumber:!0,aForm:!0,anDefault:null}}(jQuery);