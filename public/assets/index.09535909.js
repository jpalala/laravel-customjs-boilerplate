const I=function(){const t=document.createElement("link").relList;if(t&&t.supports&&t.supports("modulepreload"))return;for(const r of document.querySelectorAll('link[rel="modulepreload"]'))l(r);new MutationObserver(r=>{for(const o of r)if(o.type==="childList")for(const s of o.addedNodes)s.tagName==="LINK"&&s.rel==="modulepreload"&&l(s)}).observe(document,{childList:!0,subtree:!0});function n(r){const o={};return r.integrity&&(o.integrity=r.integrity),r.referrerpolicy&&(o.referrerPolicy=r.referrerpolicy),r.crossorigin==="use-credentials"?o.credentials="include":r.crossorigin==="anonymous"?o.credentials="omit":o.credentials="same-origin",o}function l(r){if(r.ep)return;r.ep=!0;const o=n(r);fetch(r.href,o)}};I();function h(){}function q(e){return e()}function S(){return Object.create(null)}function $(e){e.forEach(q)}function M(e){return typeof e=="function"}function P(e,t){return e!=e?t==t:e!==t||e&&typeof e=="object"||typeof e=="function"}let g;function F(e,t){return g||(g=document.createElement("a")),g.href=t,e===g.href}function U(e){return Object.keys(e).length===0}function d(e,t){e.appendChild(t)}function H(e,t,n){e.insertBefore(t,n||null)}function z(e){e.parentNode.removeChild(e)}function _(e){return document.createElement(e)}function K(e){return document.createTextNode(e)}function N(){return K(" ")}function f(e,t,n){n==null?e.removeAttribute(t):e.getAttribute(t)!==n&&e.setAttribute(t,n)}function R(e){return Array.from(e.childNodes)}let w;function p(e){w=e}const m=[],C=[],x=[],j=[],T=Promise.resolve();let v=!1;function D(){v||(v=!0,T.then(B))}function k(e){x.push(e)}const b=new Set;let y=0;function B(){const e=w;do{for(;y<m.length;){const t=m[y];y++,p(t),G(t.$$)}for(p(null),m.length=0,y=0;C.length;)C.pop()();for(let t=0;t<x.length;t+=1){const n=x[t];b.has(n)||(b.add(n),n())}x.length=0}while(m.length);for(;j.length;)j.pop()();v=!1,b.clear(),p(e)}function G(e){if(e.fragment!==null){e.update(),$(e.before_update);const t=e.dirty;e.dirty=[-1],e.fragment&&e.fragment.p(e.ctx,t),e.after_update.forEach(k)}}const J=new Set;function Q(e,t){e&&e.i&&(J.delete(e),e.i(t))}function V(e,t,n,l){const{fragment:r,on_mount:o,on_destroy:s,after_update:a}=e.$$;r&&r.m(t,n),l||k(()=>{const c=o.map(q).filter(M);s?s.push(...c):$(c),e.$$.on_mount=[]}),a.forEach(k)}function W(e,t){const n=e.$$;n.fragment!==null&&($(n.on_destroy),n.fragment&&n.fragment.d(t),n.on_destroy=n.fragment=null,n.ctx=[])}function X(e,t){e.$$.dirty[0]===-1&&(m.push(e),D(),e.$$.dirty.fill(0)),e.$$.dirty[t/31|0]|=1<<t%31}function Y(e,t,n,l,r,o,s,a=[-1]){const c=w;p(e);const i=e.$$={fragment:null,ctx:null,props:o,update:h,not_equal:r,bound:S(),on_mount:[],on_destroy:[],on_disconnect:[],before_update:[],after_update:[],context:new Map(t.context||(c?c.$$.context:[])),callbacks:S(),dirty:a,skip_bound:!1,root:t.target||c.$$.root};s&&s(i.root);let E=!1;if(i.ctx=n?n(e,t.props||{},(u,O,...A)=>{const L=A.length?A[0]:O;return i.ctx&&r(i.ctx[u],i.ctx[u]=L)&&(!i.skip_bound&&i.bound[u]&&i.bound[u](L),E&&X(e,u)),O}):[],i.update(),E=!0,$(i.before_update),i.fragment=l?l(i.ctx):!1,t.target){if(t.hydrate){const u=R(t.target);i.fragment&&i.fragment.l(u),u.forEach(z)}else i.fragment&&i.fragment.c();t.intro&&Q(e.$$.fragment),V(e,t.target,t.anchor,t.customElement),B()}p(c)}class Z{$destroy(){W(this,1),this.$destroy=h}$on(t,n){const l=this.$$.callbacks[t]||(this.$$.callbacks[t]=[]);return l.push(n),()=>{const r=l.indexOf(n);r!==-1&&l.splice(r,1)}}$set(t){this.$$set&&!U(t)&&(this.$$.skip_bound=!0,this.$$set(t),this.$$.skip_bound=!1)}}var ee="/assets/svelte.d72399d3.png";function te(e){let t,n,l,r,o,s,a;return{c(){t=_("main"),n=_("img"),r=N(),o=_("h1"),o.textContent="Lets Login!",s=N(),a=_("p"),a.textContent=`Authorized: ${ne}`,F(n.src,l=ee)||f(n,"src",l),f(n,"alt","Svelte Logo"),f(n,"class","svelte-1fm71xa"),f(o,"class","svelte-1fm71xa"),f(a,"class","svelte-1fm71xa"),f(t,"class","svelte-1fm71xa")},m(c,i){H(c,t,i),d(t,n),d(t,r),d(t,o),d(t,s),d(t,a)},p:h,i:h,o:h,d(c){c&&z(t)}}}let ne=!1;function re(e){return document.cookie.includes("auth-token")&&alert(document.cookie),[]}class oe extends Z{constructor(t){super(),Y(this,t,re,te,P,{})}}new oe({target:document.getElementById("app")});
