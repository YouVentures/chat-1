/*! owncloud-chat 2014-10-13 */
var Cache=function(){function time(){return parseInt((new Date).getTime()/1e3)}function init(){cache.storage=supportLocalstorage?{set:function(key,value){value=JSON.stringify(value),localStorage[key]=value},get:function(key){var value=localStorage[key];return void 0!==value?JSON.parse(value):void 0},remove:function(key){localStorage.removeItem(key)}}:{set:function(key,value){this[key]=value},get:function(key){return this[key]},remove:function(key){delete this[key]}}}function supportLocalstorage(){try{return"localStorage"in window&&null!==window.localStorage}catch(e){return!1}}var cache={};return cache.initialized=!1,cache.set=function(key,value,expire){if(void 0===expire)var date=0;else var date=time()+expire;key="cache"+key,cache.storage.set(key,{key:key,value:value,expire:date})},cache.get=function(key){var value=cache.storage.get("cache"+key);return void 0!==value?0===value.expire?value.value:value.expire-time()<=0?void cache.storage.remove("cache"+key):value.value:void 0},cache.day=function(count){return 86400*count},cache.hour=function(count){return 3600*count},cache.minute=function(count){return 60*count},cache.initialized||init(),cache}();