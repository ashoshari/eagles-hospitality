import{X as _,h as f,j as g,b as v,c as b,e as n,q as i,u as d,f as t,m as w,y as x,F as u,p as y,o as r,Z as M,w as V,i as k,t as m}from"./vendor--mdjztg5.js";const B={class:"container py-5 marginTopHalf"},L={class:"container-fluid py-5"},j={class:"row mb-5 justify-content-center"},C={class:"col-12 col-md-6"},S={class:"input-group"},A=["placeholder"],D={class:"row g-4"},E={class:"col-12 col-md-6 col-xl-4 text-center"},F=["src","alt"],I={class:"p-4 border border-top-0 rounded-bottom"},N={class:"colorBlueish text-center text-break"},P={class:"text-break"},U={__name:"Mattresses",props:_({products:Object},{modelValue:{},modelModifiers:{}}),emits:["update:modelValue"],setup(c){const o=f(localStorage.getItem("locale")),a=g(c,"modelValue");v(()=>{window.addEventListener("locale-changed",s=>{o.value=s.detail.storage})});const h=c,p=b(()=>h.products.filter(s=>{var l,e;return(e=s==null?void 0:s.name)==null?void 0:e.toLowerCase().includes(((l=a==null?void 0:a.value)==null?void 0:l.toLowerCase())||"")}));return(s,l)=>(r(),n(u,null,[i(d(M),{title:o.value=="en"?"Mattresses":"المفارش"},null,8,["title"]),t("section",B,[t("section",L,[t("form",j,[t("p",C,[t("div",S,[w(t("input",{class:"form-control border-end-0 border rounded-pill",type:"search",placeholder:o.value=="en"?"Search a product..":"إبحث عن منتج..",id:"example-search-input","onUpdate:modelValue":l[0]||(l[0]=e=>a.value=e)},null,8,A),[[x,a.value]])])])]),t("section",D,[(r(!0),n(u,null,y(p.value,e=>(r(),n("section",E,[i(d(k),{type:"button",as:"button",href:s.$route("product",e.name)},{default:V(()=>[t("img",{width:"400",height:"350",loading:"lazy",src:e.imageUrl,alt:o.value=="en"?"Product image":"صورة المنتج",class:"shopImg"},null,8,F)]),_:2},1032,["href"]),t("div",I,[t("h4",N,m(o.value==="en"?e.name:e.nameAr),1),t("p",P,m(o.value==="en"?e.description:e.descriptionAr),1)])]))),256))])])])],64))}};export{U as default};
