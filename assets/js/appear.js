!function(p){var n=[],o=!1,f=!1,s={interval:250,force_process:!1},u=p(window),c=[];function d(){f=!1;for(var e=0,r=n.length;e<r;e++){var t=(i=n[e],p(i).filter(function(){return p(this).is(":appeared")}));if(t.trigger("appear",[t]),c[e]){var a=c[e].not(t);a.trigger("disappear",[a])}c[e]=t}var i}p.expr[":"].appeared=function(e){var r=p(e);if(!r.is(":visible"))return!1;var t=u.scrollLeft(),a=u.scrollTop(),i=r.offset(),n=i.left,o=i.top;return o+r.height()>=a&&o-(r.data("appear-top-offset")||0)<=a+u.height()&&n+r.width()>=t&&n-(r.data("appear-left-offset")||0)<=t+u.width()},p.fn.extend({appear:function(e,r){return p.appear(this,r),this}}),p.extend({appear:function(e,r){var t,a=p.extend({},s,r||{});if(!o){var i=function(){f||(f=!0,setTimeout(d,a.interval))};p(window).scroll(i).resize(i),o=!0}a.force_process&&setTimeout(d,a.interval),t=e,n.push(t),c.push()},force_appear:function(){return!!o&&(d(),!0)}})}("undefined"!=typeof module?require("jquery"):jQuery);