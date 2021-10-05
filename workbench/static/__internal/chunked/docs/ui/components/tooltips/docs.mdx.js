var SLDS="object"==typeof SLDS?SLDS:{};SLDS["__internal/chunked/docs/./ui/components/tooltips/docs.mdx.js"]=function(e){function t(t){for(var o,r,a=t[0],c=t[1],s=t[2],b=0,d=[];b<a.length;b++)r=a[b],Object.prototype.hasOwnProperty.call(i,r)&&i[r]&&d.push(i[r][0]),i[r]=0;for(o in c)Object.prototype.hasOwnProperty.call(c,o)&&(e[o]=c[o]);for(u&&u(t);d.length;)d.shift()();return l.push.apply(l,s||[]),n()}function n(){for(var e,t=0;t<l.length;t++){for(var n=l[t],o=!0,a=1;a<n.length;a++){var c=n[a];0!==i[c]&&(o=!1)}o&&(l.splice(t--,1),e=r(r.s=n[0]))}return e}var o={},i={78:0},l=[];function r(t){if(o[t])return o[t].exports;var n=o[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=e,r.c=o,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/assets/scripts/bundle/";var a=this.webpackJsonpSLDS___internal_chunked_docs=this.webpackJsonpSLDS___internal_chunked_docs||[],c=a.push.bind(a);a.push=t,a=a.slice();for(var s=0;s<a.length;s++)t(a[s]);var u=c;return l.push([580,0]),n()}({0:function(e,t){e.exports=React},19:function(e,t){e.exports=ReactDOM},20:function(e,t){e.exports=JSBeautify},580:function(e,t,n){"use strict";n.r(t),n.d(t,"getElement",(function(){return h})),n.d(t,"getContents",(function(){return g}));var o=n(0),i=n(4),l=n(2),r=n(27),a=n(46),c=(n(15),n(37)),s=n(54),u=n(1),b=i.c.a,d=i.c.code,p=i.c.h2,f=i.c.h3,m=i.c.p,h=function(){return Object(o.createElement)(i.b,{},Object(o.createElement)("div",{className:"doc lead"},"A Tooltip is a small piece of contextual information about an element on the screen, which is displayed when a user hovers or focuses on the element it is describing. It is not focusable and cannot contain focusable content."),Object(o.createElement)(l.a,{exampleOnly:!0,demoStyles:" padding-left: 1rem; padding-top: 1rem; position: relative; "},Object(u.f)(s.c,"button-icon")),p({id:"About-Tooltips"},"About Tooltips"),m({},"Nubbins are indicators that inform the user of the direction of the content associated with the tooltip. A tooltip can accept the following nubbin position classes, ",d({},".slds-nubbin_left"),", ",d({},".slds-nubbin_left-top"),", ",d({},".slds-nubbin_left-bottom"),", ",d({},".slds-nubbin_top-left"),", ",d({},".slds-nubbin_top-right"),", ",d({},".slds-nubbin_right-top"),", ",d({},".slds-nubbin_right-bottom"),", ",d({},".slds-nubbin_bottom-left"),", ",d({},".slds-nubbin_bottom-right"),"."),m({},"Learn more about how to use them at the ",b({href:"/components/popovers/#flavor-nubbins"},"Nubbins documentation"),"."),f({id:"Accessibility"},"Accessibility"),m({},"Showing the tooltip on hover or on keyboard focus of a focusable element ensures that all users can access it, even if they aren’t using a mouse. Examples of focusable elements include links, buttons, and inputs. Give the tooltip an ID and use that as the value of the ",d({},"aria-describedby")," attribute of the DOM element it describes. This helps users of assistive technology read the tooltip content."),m({},"When using a link as the focusable element to show a tooltip, add a ",d({},"<div>")," at the bottom of the tooltip bubble that includes a description of where the link will take the user. Add ",d({},"aria-hidden='true'")," to this element, and ensure that the link text itself matches the text within this ",d({},"<div>"),"."),p({id:"Base"},"Base"),Object(o.createElement)(l.a,{demoStyles:" padding-left: 2rem; padding-top: 5rem; position: relative; "},Object(u.f)(s.b)),p({id:"Examples"},"Examples"),f({id:"As-an-icon-link"},"As an icon link"),Object(o.createElement)(l.a,{demoStyles:" padding-left: 2rem; padding-top: 6.75rem; position: relative; "},Object(u.f)(s.c,"link")),f({id:"As-a-Button-Icon"},"As a Button Icon"),Object(o.createElement)(l.a,{demoStyles:" padding-left: 2rem; padding-top: 5rem; position: relative; "},Object(u.f)(s.c,"button-icon")),f({id:"As-a-Button"},"As a Button"),Object(o.createElement)(l.a,{demoStyles:" padding-left: 2rem; padding-top: 5rem; position: relative; "},Object(u.f)(s.c,"button")),p({id:"Modifiers"},"Modifiers"),f({id:"Motion"},"Motion"),Object(o.createElement)(a.a,null,Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Bottom To Top"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"bottom-to-top"))),Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Top To Bottom"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"top-to-bottom"))),Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Right To Left"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"right-to-left"))),Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Left To Right"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"left-to-right")))),f({id:"Toggle"},"Toggle"),Object(o.createElement)(a.a,null,Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Rise"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"rise"))),Object(o.createElement)(r.a,null,Object(o.createElement)("strong",null,"Fall"),Object(o.createElement)(l.a,{toggleCode:!1},Object(u.f)(s.c,"fall")))),p({id:"Styling-Hooks-Overview"},"Styling Hooks Overview"),Object(o.createElement)(c.a,{name:"tooltips",type:"component"}))},g=function(){return Object(i.a)(h())}}});