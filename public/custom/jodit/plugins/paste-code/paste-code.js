((e,t)=>{if("object"==typeof exports&&"object"==typeof module)module.exports=t();else if("function"==typeof define&&define.amd)define([],t);else{var a=t();for(var s in a)("object"==typeof exports?exports:e)[s]=a[s]}})(self,(function(){return(self.webpackChunkjodit_pro=self.webpackChunkjodit_pro||[]).push([[535],{76935(e,t,a){"use strict";a.r(t),a.d(t,{pasteCode(){return p}});var s=a(70655),o=a(43854),i=a(47643);o.D.prototype.controls.pasteCode={icon:a(11920),tooltip:"Paste code",command:"pasteCode"},o.D.prototype.pasteCode={globalHighlightLib:!1,canonicalLanguageCode(e){switch(e){case"ts":return"typescript";case"js":return"javascript";case"markup":return"html"}return e},highlightLib:{highlight:(e,t)=>Prism.highlight(e,Prism.languages[t]||Prism.languages.plain,t),isLangLoaded:e=>!!Prism.languages[e],js:["https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"],langUrl(e){return`https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-${e}.min.js`},css:["https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css"]},defaultLanguage:"html",insertTemplate(e,t,a){return`<pre class="language-${t}">${(0,i.htmlspecialchars)(a)}</pre>`},languages:[{value:"html",text:"HTML/XML"},{value:"plaintext",text:"Plain"},{value:"bash",text:"Bash"},{value:"javascript",text:"JavaScript"},{value:"css",text:"CSS"},{value:"php",text:"PHP"},{value:"ruby",text:"Ruby"},{value:"python",text:"Python"},{value:"java",text:"Java"},{value:"c",text:"C"},{value:"csharp",text:"C#"},{value:"cpp",text:"C++"}],dialog:{width:700,height:600}};var l=a(10818),r=a(86673),n=a(51663),c=a(1120),d=a(6293);let p=class e extends l.S{constructor(){super(...arguments),this.requires=["license"],this.buttons=[{name:"pasteCode",group:"clipboard"}],this.prismJSIsLoaded=!1}afterInit(e){e.registerCommand("pasteCode",(()=>this.openCodeEditDialog()))}openCodeEditDialog(e,t,a){const s=this.j,o=this.createForm(),{code:l,language:r}=(0,i.refs)(o);e&&(r.value=e),t&&(l.value=t),s.async.requestIdleCallback((()=>{l.focus()})),s.s.save(),this.createDialog((()=>{if(!o.validate())return!1;{s.s.restore();const e=s.createInside.fromHTML(s.o.pasteCode.insertTemplate(s,r.value,l.value));if(a)d.Dom.replace(a,e,s.createInside,!1,!0);else{const t=s.s.current(),a=d.Dom.up(t,d.Dom.isBlock,s.editor);a?d.Dom.after(a,e):s.s.insertNode(e)}this.onChange()}}),(()=>{s.s.restore()})).setContent(o.container).open(!0)}beforeDestruct(e){}createForm(){const{jodit:e}=this;return new r.x4(e,[new r.Cj(e,{name:"language",label:"Language",value:e.o.pasteCode.defaultLanguage,options:e.o.pasteCode.languages,required:!0}),new r.GJ(e,{label:"Code view",resizable:!1,name:"code",required:!0,className:"jodit-paste-code__textarea"})],{className:"jodit-paste-code"})}createDialog(e,t){const a=new d.Dialog({language:this.j.o.language});return a.setHeader("Insert/Edit Code Sample").setSize(this.j.o.pasteCode.dialog.width,this.j.o.pasteCode.dialog.height).setFooter([(0,r.zx)(a,"","Cancel","default").onAction((()=>{a.close(),t()})),(0,r.zx)(a,"save","Save","primary").onAction((()=>{a.close(),e()}))]),a}onChange(){(0,i.$$)("pre",this.j.editor).forEach((e=>{(0,i.attr)(e,"contenteditable")||((0,i.attr)(e,"contenteditable",!1),this.highlightCode(e))}))}async highlightCode(e){const{globalHighlightLib:t,highlightLib:{css:a,js:s,langUrl:o,highlight:l,isLangLoaded:r}}=this.j.o.pasteCode;this.prismJSIsLoaded||t||(await Promise.all([(0,i.loadNextStyle)(this.jodit,a),(0,i.loadNext)(this.jodit,s)]),this.prismJSIsLoaded=!0);const n=this.parseLanguage(e);r(n)||t||await(0,i.appendScriptAsync)(this.jodit,o(n)).catch((()=>null));let c=e;e.firstElementChild===e.lastElementChild&&d.Dom.isTag(e.firstElementChild,"code")&&(c=e.firstElementChild),c.innerHTML=l(c.innerText,n)}onPreEdit(e){const t=d.Dom.isNode(e)&&d.Dom.isTag(e,"pre")?e:d.Dom.closest(e.target,"pre",this.j.editor);if(t){const e=this.parseLanguage(t);this.openCodeEditDialog(e,t.innerText,t)}}parseLanguage(e){let t=null;const a=e=>e.classList.forEach((e=>{if(/language-/.test(e)){const a=/language-(.*)/.exec(e);a&&a[1]&&(t=a[1])}}));return a(e),null==t&&e.firstElementChild===e.lastElementChild&&d.Dom.isTag(e.firstElementChild,"code")&&a(e.firstElementChild),this.jodit.o.pasteCode.canonicalLanguageCode(t||"html")}onAfterGetValueFromEditor(e){e.value=e.value.replace(/(<pre[^>]*)contenteditable\s*=\s*(['"]?)false\2([^>]*>\s*<code[^>]*>)(.*?)(<\/code>\s*<\/pre>)/gis,((e,t,a,s,o,l)=>`${t}${s}${(0,i.htmlspecialchars)((0,i.stripTags)(o))}${l}`)).replace(/(<pre[^>]*)contenteditable\s*=\s*(['"]?)false\2([^>]*>)(.*?)(<\/pre>)/gis,((e,t,a,s,o,l)=>`${t}${s}${(0,i.htmlspecialchars)((0,i.stripTags)(o))}${l}`))}};(0,s.gn)([n.autobind],p.prototype,"openCodeEditDialog",null),(0,s.gn)([(0,n.watch)("?:change"),(0,n.debounce)()],p.prototype,"onChange",null),(0,s.gn)([(0,n.watch)(["?:dblclick","?:editPreInPasteCode"])],p.prototype,"onPreEdit",null),(0,s.gn)([(0,n.watch)("?:afterGetValueFromEditor")],p.prototype,"onAfterGetValueFromEditor",null),p=(0,s.gn)([n.component],p),c.Jodit.plugins.add("paste-code",p)},70655(e,t,a){"use strict";function s(e,t,a,s){var o,i=arguments.length,l=3>i?t:null===s?s=Object.getOwnPropertyDescriptor(t,a):s;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)l=Reflect.decorate(e,t,a,s);else for(var r=e.length-1;r>=0;r--)(o=e[r])&&(l=(3>i?o(l):i>3?o(t,a,l):o(t,a))||l);return i>3&&l&&Object.defineProperty(t,a,l),l}a.d(t,{gn(){return s}})},11920(e){e.exports='<svg viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"> <path d="M2.5244141,23.5h18.9511719c0.4140625,0,0.75-0.3359375,0.75-0.75V4.9208984 c0-0.1992188-0.0795898-0.390625-0.2207031-0.53125L18.3198242,0.71875C18.1791992,0.5786133,17.9887695,0.5,17.7905273,0.5 H2.5244141c-0.4140625,0-0.75,0.3359375-0.75,0.75v21.5C1.7744141,23.1640625,2.1103516,23.5,2.5244141,23.5z M20.7128296,5.2197266 h-2.6986694V2.531189L20.7128296,5.2197266z M3.2744141,2h13.2397461v3.9697266c0,0.4140625,0.3359375,0.75,0.75,0.75h3.4614258V22 H3.2744141V2z" fill="#1D1D1D"/> <path d="M8.75,10.25h1.75c0.4140625,0,0.75-0.3359375,0.75-0.75s-0.3359375-0.75-0.75-0.75H8 c-0.4140625,0-0.75,0.3359375-0.75,0.75v2.75H6c-0.4140625,0-0.75,0.3359375-0.75,0.75S5.5859375,13.75,6,13.75h1.25v2.75 c0,0.4140625,0.3359375,0.75,0.75,0.75h2.5c0.4140625,0,0.75-0.3359375,0.75-0.75s-0.3359375-0.75-0.75-0.75H8.75V10.25z" fill="#1D1D1D"/> <path d="M18.5,12.25h-1.25V9.5c0-0.4140625-0.3359375-0.75-0.75-0.75H14c-0.4140625,0-0.75,0.3359375-0.75,0.75 s0.3359375,0.75,0.75,0.75h1.75v5.5H14c-0.4140625,0-0.75,0.3359375-0.75,0.75s0.3359375,0.75,0.75,0.75h2.5 c0.4140625,0,0.75-0.3359375,0.75-0.75v-2.75h1.25c0.4140625,0,0.75-0.3359375,0.75-0.75S18.9140625,12.25,18.5,12.25z" fill="#1D1D1D"/></svg>'}},e=>e(e.s=76935)])}));