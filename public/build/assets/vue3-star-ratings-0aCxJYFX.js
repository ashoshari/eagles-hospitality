import{au as R,c as f,h as x,av as z,b as B,V,o as s,e as c,f as g,F as m,p as b,a as h,af as _,aw as E}from"./vendor--mdjztg5.js";(function(){try{if(typeof document<"u"){var n=document.createElement("style");n.appendChild(document.createTextNode(".vue3-star-ratings[data-v-7fab3f62]{width:fit-content;overflow:hidden;position:relative;white-space:nowrap}.vue3-star-ratings *[data-v-7fab3f62]{box-sizing:border-box;margin:0;padding:0;line-height:1}.vue3-star-ratings__inner[data-v-7fab3f62],.vue3-star-ratings__outer[data-v-7fab3f62]{height:inherit}.vue3-star-ratings__outer[data-v-7fab3f62]{position:absolute;top:0;left:0;width:var(--vue3StarRatingOuterWidth);max-width:100%;overflow:hidden;color:var(--vue3StarRatingsOuterColor);transition:width .32s cubic-bezier(.075,.82,.165,1)}.vue3-star-ratings__inner[data-v-7fab3f62]{color:var(--vue3StarRatingsInnerColor)}.vue3-star-ratings__icon[data-v-7fab3f62]{fill:currentColor;width:var(--vue3StarRatingIconSize);aspect-ratio:1;cursor:pointer;display:inline-block}")),document.head.appendChild(n)}}catch(o){console.error("vite-plugin-css-injected-by-js",o)}})();const C=(n,o)=>{const t=n.__vccOpts||n;for(const[i,d]of o)t[i]=d;return t},I={},M={xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 512.002 512.002"},j=g("path",{d:"M511.267 197.258a14.995 14.995 0 00-12.107-10.209l-158.723-23.065-70.985-143.827a14.998 14.998 0 00-26.901 0l-70.988 143.827-158.72 23.065a14.998 14.998 0 00-8.312 25.585l114.848 111.954-27.108 158.083a14.999 14.999 0 0021.763 15.812l141.967-74.638 141.961 74.637a15 15 0 0021.766-15.813l-27.117-158.081 114.861-111.955a14.994 14.994 0 003.795-15.375z"},null,-1),L=[j];function N(n,o){return s(),c("svg",M,L)}const S=C(I,[["render",N]]),W={class:"vue3-star-ratings__outer"},$={class:"vue3-star-ratings__inner"},D=R({__name:"Vue3StarRatings",props:{modelValue:{default:0},numberOfStars:{default:5},starColor:{default:"#ff9800"},inactiveColor:{default:"#333333"},starSize:{default:24},disableClick:{type:Boolean},customSvg:{default:S}},emits:["update:modelValue"],setup(n,{emit:o}){const t=n,i=f(()=>t.customSvg||S),d={rounded(e,r){const a=Math.pow(10,r);return Math.round(e*a)/a}},l=x(),u=f({get(){return t.modelValue},set(e){const r=d.rounded(e,1);o("update:modelValue",r)}});function p(e){if(t.disableClick)return;const r=this.getBoundingClientRect(),{pageX:a}=e,v=a-r.left,y=r.width,O=t.numberOfStars,k=v/y*O;u.value=k}const w=f(()=>(u.value<0?0:u.value>t.numberOfStars?t.numberOfStars:u.value)/t.numberOfStars*100);return z(()=>{var e;const r={"--vue3StarRatingsInnerColor":t.inactiveColor,"--vue3StarRatingsOuterColor":t.starColor,"--vue3StarRatingOuterWidth":`${w.value}%`,"--vue3StarRatingIconSize":`${t.starSize}px`};for(const[a,v]of Object.entries(r))(e=l.value)==null||e.style.setProperty(a,v)}),B(()=>{var e;(e=l.value)==null||e.addEventListener("click",p)}),V(()=>{var e;(e=l.value)==null||e.removeEventListener("click",p)}),(e,r)=>(s(),c("div",{class:"vue3-star-ratings",ref_key:"starsContainer",ref:l,style:E({pointerEvents:e.disableClick?"none":"auto"})},[g("div",W,[(s(!0),c(m,null,b(e.numberOfStars,a=>(s(),h(_(i.value),{key:a,class:"vue3-star-ratings__icon"}))),128))]),g("div",$,[(s(!0),c(m,null,b(e.numberOfStars,a=>(s(),h(_(i.value),{key:a,class:"vue3-star-ratings__icon"}))),128))])],4))}}),X=C(D,[["__scopeId","data-v-7fab3f62"]]);export{X as N};
