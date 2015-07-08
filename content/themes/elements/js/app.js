(function(){function t(t){var e=document.getElementById(t).innerHTML,n=document.body.innerHTML;document.body.innerHTML=e,window.print(),document.body.innerHTML=n}(function(){var t,e,n,r,s,o,i,a,u,c,l,h,p,d,f,g,m,y,v,w,b,k,S,L,T,q,x,P,R,M,E,j,A,C,N,O,_,F,H,U,W,X,I,z,D,B,G,J,K,Q=[].slice,V={}.hasOwnProperty,Y=function(t,e){function n(){this.constructor=t}for(var r in e)V.call(e,r)&&(t[r]=e[r]);return n.prototype=e.prototype,t.prototype=new n,t.__super__=e.prototype,t},$=[].indexOf||function(t){for(var e=0,n=this.length;n>e;e++)if(e in this&&this[e]===t)return e;return-1};for(b={catchupTime:100,initialRate:.03,minTime:250,ghostTime:100,maxProgressPerFrame:20,easeFactor:1.25,startOnPageLoad:!0,restartOnPushState:!0,restartOnRequestAfter:500,target:"body",elements:{checkInterval:100,selectors:["body"]},eventLag:{minSamples:10,sampleCount:3,lagThreshold:3},ajax:{trackMethods:["GET"],trackWebSockets:!0,ignoreURLs:[]}},R=function(){var t;return null!=(t="undefined"!=typeof performance&&null!==performance&&"function"==typeof performance.now?performance.now():void 0)?t:+new Date},E=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame,w=window.cancelAnimationFrame||window.mozCancelAnimationFrame,null==E&&(E=function(t){return setTimeout(t,50)},w=function(t){return clearTimeout(t)}),A=function(t){var e,n;return e=R(),(n=function(){var r;return r=R()-e,r>=33?(e=R(),t(r,function(){return E(n)})):setTimeout(n,33-r)})()},j=function(){var t,e,n;return n=arguments[0],e=arguments[1],t=3<=arguments.length?Q.call(arguments,2):[],"function"==typeof n[e]?n[e].apply(n,t):n[e]},k=function(){var t,e,n,r,s,o,i;for(e=arguments[0],r=2<=arguments.length?Q.call(arguments,1):[],o=0,i=r.length;i>o;o++)if(n=r[o])for(t in n)V.call(n,t)&&(s=n[t],null!=e[t]&&"object"==typeof e[t]&&null!=s&&"object"==typeof s?k(e[t],s):e[t]=s);return e},m=function(t){var e,n,r,s,o;for(n=e=0,s=0,o=t.length;o>s;s++)r=t[s],n+=Math.abs(r),e++;return n/e},L=function(t,e){var n,r,s;if(null==t&&(t="options"),null==e&&(e=!0),s=document.querySelector("[data-pace-"+t+"]")){if(n=s.getAttribute("data-pace-"+t),!e)return n;try{return JSON.parse(n)}catch(o){return r=o,"undefined"!=typeof console&&null!==console?console.error("Error parsing inline pace options",r):void 0}}},i=function(){function t(){}return t.prototype.on=function(t,e,n,r){var s;return null==r&&(r=!1),null==this.bindings&&(this.bindings={}),null==(s=this.bindings)[t]&&(s[t]=[]),this.bindings[t].push({handler:e,ctx:n,once:r})},t.prototype.once=function(t,e,n){return this.on(t,e,n,!0)},t.prototype.off=function(t,e){var n,r,s;if(null!=(null!=(r=this.bindings)?r[t]:void 0)){if(null==e)return delete this.bindings[t];for(n=0,s=[];n<this.bindings[t].length;)s.push(this.bindings[t][n].handler===e?this.bindings[t].splice(n,1):n++);return s}},t.prototype.trigger=function(){var t,e,n,r,s,o,i,a,u;if(n=arguments[0],t=2<=arguments.length?Q.call(arguments,1):[],null!=(i=this.bindings)?i[n]:void 0){for(s=0,u=[];s<this.bindings[n].length;)a=this.bindings[n][s],r=a.handler,e=a.ctx,o=a.once,r.apply(null!=e?e:this,t),u.push(o?this.bindings[n].splice(s,1):s++);return u}},t}(),c=window.Pace||{},window.Pace=c,k(c,i.prototype),M=c.options=k({},b,window.paceOptions,L()),G=["ajax","document","eventLag","elements"],I=0,D=G.length;D>I;I++)_=G[I],M[_]===!0&&(M[_]=b[_]);u=function(t){function e(){return J=e.__super__.constructor.apply(this,arguments)}return Y(e,t),e}(Error),e=function(){function t(){this.progress=0}return t.prototype.getElement=function(){var t;if(null==this.el){if(t=document.querySelector(M.target),!t)throw new u;this.el=document.createElement("div"),this.el.className="pace pace-active",document.body.className=document.body.className.replace(/pace-done/g,""),document.body.className+=" pace-running",this.el.innerHTML='<div class="pace-progress">\n  <div class="pace-progress-inner"></div>\n</div>\n<div class="pace-activity"></div>',null!=t.firstChild?t.insertBefore(this.el,t.firstChild):t.appendChild(this.el)}return this.el},t.prototype.finish=function(){var t;return t=this.getElement(),t.className=t.className.replace("pace-active",""),t.className+=" pace-inactive",document.body.className=document.body.className.replace("pace-running",""),document.body.className+=" pace-done"},t.prototype.update=function(t){return this.progress=t,this.render()},t.prototype.destroy=function(){try{this.getElement().parentNode.removeChild(this.getElement())}catch(t){u=t}return this.el=void 0},t.prototype.render=function(){var t,e,n,r,s,o,i;if(null==document.querySelector(M.target))return!1;for(t=this.getElement(),r="translate3d("+this.progress+"%, 0, 0)",i=["webkitTransform","msTransform","transform"],s=0,o=i.length;o>s;s++)e=i[s],t.children[0].style[e]=r;return(!this.lastRenderedProgress||this.lastRenderedProgress|0!==this.progress|0)&&(t.children[0].setAttribute("data-progress-text",""+(0|this.progress)+"%"),this.progress>=100?n="99":(n=this.progress<10?"0":"",n+=0|this.progress),t.children[0].setAttribute("data-progress",""+n)),this.lastRenderedProgress=this.progress},t.prototype.done=function(){return this.progress>=100},t}(),a=function(){function t(){this.bindings={}}return t.prototype.trigger=function(t,e){var n,r,s,o,i;if(null!=this.bindings[t]){for(o=this.bindings[t],i=[],r=0,s=o.length;s>r;r++)n=o[r],i.push(n.call(this,e));return i}},t.prototype.on=function(t,e){var n;return null==(n=this.bindings)[t]&&(n[t]=[]),this.bindings[t].push(e)},t}(),X=window.XMLHttpRequest,W=window.XDomainRequest,U=window.WebSocket,S=function(t,e){var n,r,s,o;o=[];for(r in e.prototype)try{s=e.prototype[r],o.push(null==t[r]&&"function"!=typeof s?t[r]=s:void 0)}catch(i){n=i}return o},x=[],c.ignore=function(){var t,e,n;return e=arguments[0],t=2<=arguments.length?Q.call(arguments,1):[],x.unshift("ignore"),n=e.apply(null,t),x.shift(),n},c.track=function(){var t,e,n;return e=arguments[0],t=2<=arguments.length?Q.call(arguments,1):[],x.unshift("track"),n=e.apply(null,t),x.shift(),n},O=function(t){var e;if(null==t&&(t="GET"),"track"===x[0])return"force";if(!x.length&&M.ajax){if("socket"===t&&M.ajax.trackWebSockets)return!0;if(e=t.toUpperCase(),$.call(M.ajax.trackMethods,e)>=0)return!0}return!1},l=function(t){function e(){var t,n=this;e.__super__.constructor.apply(this,arguments),t=function(t){var e;return e=t.open,t.open=function(r,s){return O(r)&&n.trigger("request",{type:r,url:s,request:t}),e.apply(t,arguments)}},window.XMLHttpRequest=function(e){var n;return n=new X(e),t(n),n};try{S(window.XMLHttpRequest,X)}catch(r){}if(null!=W){window.XDomainRequest=function(){var e;return e=new W,t(e),e};try{S(window.XDomainRequest,W)}catch(r){}}if(null!=U&&M.ajax.trackWebSockets){window.WebSocket=function(t,e){var r;return r=null!=e?new U(t,e):new U(t),O("socket")&&n.trigger("request",{type:"socket",url:t,protocols:e,request:r}),r};try{S(window.WebSocket,U)}catch(r){}}}return Y(e,t),e}(a),z=null,T=function(){return null==z&&(z=new l),z},N=function(t){var e,n,r,s;for(s=M.ajax.ignoreURLs,n=0,r=s.length;r>n;n++)if(e=s[n],"string"==typeof e){if(-1!==t.indexOf(e))return!0}else if(e.test(t))return!0;return!1},T().on("request",function(e){var n,r,s,o,i;return o=e.type,s=e.request,i=e.url,N(i)?void 0:c.running||M.restartOnRequestAfter===!1&&"force"!==O(o)?void 0:(r=arguments,n=M.restartOnRequestAfter||0,"boolean"==typeof n&&(n=0),setTimeout(function(){var e,n,i,a,u,l;if(e="socket"===o?s.readyState<2:0<(a=s.readyState)&&4>a){for(c.restart(),u=c.sources,l=[],n=0,i=u.length;i>n;n++){if(_=u[n],_ instanceof t){_.watch.apply(_,r);break}l.push(void 0)}return l}},n))}),t=function(){function t(){var t=this;this.elements=[],T().on("request",function(){return t.watch.apply(t,arguments)})}return t.prototype.watch=function(t){var e,n,r,s;return r=t.type,e=t.request,s=t.url,N(s)?void 0:(n="socket"===r?new d(e):new f(e),this.elements.push(n))},t}(),f=function(){function t(t){var e,n,r,s,o,i,a=this;if(this.progress=0,null!=window.ProgressEvent)for(n=null,t.addEventListener("progress",function(t){return a.progress=t.lengthComputable?100*t.loaded/t.total:a.progress+(100-a.progress)/2},!1),i=["load","abort","timeout","error"],r=0,s=i.length;s>r;r++)e=i[r],t.addEventListener(e,function(){return a.progress=100},!1);else o=t.onreadystatechange,t.onreadystatechange=function(){var e;return 0===(e=t.readyState)||4===e?a.progress=100:3===t.readyState&&(a.progress=50),"function"==typeof o?o.apply(null,arguments):void 0}}return t}(),d=function(){function t(t){var e,n,r,s,o=this;for(this.progress=0,s=["error","open"],n=0,r=s.length;r>n;n++)e=s[n],t.addEventListener(e,function(){return o.progress=100},!1)}return t}(),r=function(){function t(t){var e,n,r,o;for(null==t&&(t={}),this.elements=[],null==t.selectors&&(t.selectors=[]),o=t.selectors,n=0,r=o.length;r>n;n++)e=o[n],this.elements.push(new s(e))}return t}(),s=function(){function t(t){this.selector=t,this.progress=0,this.check()}return t.prototype.check=function(){var t=this;return document.querySelector(this.selector)?this.done():setTimeout(function(){return t.check()},M.elements.checkInterval)},t.prototype.done=function(){return this.progress=100},t}(),n=function(){function t(){var t,e,n=this;this.progress=null!=(e=this.states[document.readyState])?e:100,t=document.onreadystatechange,document.onreadystatechange=function(){return null!=n.states[document.readyState]&&(n.progress=n.states[document.readyState]),"function"==typeof t?t.apply(null,arguments):void 0}}return t.prototype.states={loading:0,interactive:50,complete:100},t}(),o=function(){function t(){var t,e,n,r,s,o=this;this.progress=0,t=0,s=[],r=0,n=R(),e=setInterval(function(){var i;return i=R()-n-50,n=R(),s.push(i),s.length>M.eventLag.sampleCount&&s.shift(),t=m(s),++r>=M.eventLag.minSamples&&t<M.eventLag.lagThreshold?(o.progress=100,clearInterval(e)):o.progress=100*(3/(t+3))},50)}return t}(),p=function(){function t(t){this.source=t,this.last=this.sinceLastUpdate=0,this.rate=M.initialRate,this.catchup=0,this.progress=this.lastProgress=0,null!=this.source&&(this.progress=j(this.source,"progress"))}return t.prototype.tick=function(t,e){var n;return null==e&&(e=j(this.source,"progress")),e>=100&&(this.done=!0),e===this.last?this.sinceLastUpdate+=t:(this.sinceLastUpdate&&(this.rate=(e-this.last)/this.sinceLastUpdate),this.catchup=(e-this.progress)/M.catchupTime,this.sinceLastUpdate=0,this.last=e),e>this.progress&&(this.progress+=this.catchup*t),n=1-Math.pow(this.progress/100,M.easeFactor),this.progress+=n*this.rate*t,this.progress=Math.min(this.lastProgress+M.maxProgressPerFrame,this.progress),this.progress=Math.max(0,this.progress),this.progress=Math.min(100,this.progress),this.lastProgress=this.progress,this.progress},t}(),F=null,C=null,y=null,H=null,g=null,v=null,c.running=!1,q=function(){return M.restartOnPushState?c.restart():void 0},null!=window.history.pushState&&(B=window.history.pushState,window.history.pushState=function(){return q(),B.apply(window.history,arguments)}),null!=window.history.replaceState&&(K=window.history.replaceState,window.history.replaceState=function(){return q(),K.apply(window.history,arguments)}),h={ajax:t,elements:r,document:n,eventLag:o},(P=function(){var t,n,r,s,o,i,a,u;for(c.sources=F=[],i=["ajax","elements","document","eventLag"],n=0,s=i.length;s>n;n++)t=i[n],M[t]!==!1&&F.push(new h[t](M[t]));for(u=null!=(a=M.extraSources)?a:[],r=0,o=u.length;o>r;r++)_=u[r],F.push(new _(M));return c.bar=y=new e,C=[],H=new p})(),c.stop=function(){return c.trigger("stop"),c.running=!1,y.destroy(),v=!0,null!=g&&("function"==typeof w&&w(g),g=null),P()},c.restart=function(){return c.trigger("restart"),c.stop(),c.start()},c.go=function(){var t;return c.running=!0,y.render(),t=R(),v=!1,g=A(function(e,n){var r,s,o,i,a,u,l,h,d,f,g,m,w,b,k,S;for(h=100-y.progress,s=g=0,o=!0,u=m=0,b=F.length;b>m;u=++m)for(_=F[u],f=null!=C[u]?C[u]:C[u]=[],a=null!=(S=_.elements)?S:[_],l=w=0,k=a.length;k>w;l=++w)i=a[l],d=null!=f[l]?f[l]:f[l]=new p(i),o&=d.done,d.done||(s++,g+=d.tick(e));return r=g/s,y.update(H.tick(e,r)),y.done()||o||v?(y.update(100),c.trigger("done"),setTimeout(function(){return y.finish(),c.running=!1,c.trigger("hide")},Math.max(M.ghostTime,Math.max(M.minTime-(R()-t),0)))):n()})},c.start=function(t){k(M,t),c.running=!0;try{y.render()}catch(e){u=e}return document.querySelector(".pace")?(c.trigger("start"),c.go()):setTimeout(c.start,50)},"function"==typeof define&&define.amd?define(function(){return c}):"object"==typeof exports?module.exports=c:M.startOnPageLoad&&c.start()}).call(this),$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);if(t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length)return $("html,body").animate({scrollTop:t.offset().top},500),!1}})});var e,n;$(function(){return Pace.on("done",function(){$("body").removeClass("is-loading"),$(".pace").remove()})}),e=$("body"),n=void 0,$(window).resize(function(){return e.addClass("is-loading")}),$(window).on("resize",function(t){clearTimeout(n),n=setTimeout(function(){e.removeClass("is-loading")},500)})}).call(this);