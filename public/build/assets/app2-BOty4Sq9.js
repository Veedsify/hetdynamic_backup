import{Y as u,j as t,o as f,c as p,B as h,f as g,u as j,r}from"./index-DRN0gJk9.js";const x=({contents:e})=>{const s=u({initialContent:JSON.parse(e)});return t.jsx(f,{editor:s,editable:!1})},m=()=>{const e=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),{pathname:s}=j(),a=s.replace("/blog/",""),[n,i]=r.useState(null),[l,c]=r.useState(!0);return r.useEffect(()=>{(async()=>{c(!0);try{const o=await fetch("/blog/block/",{method:"POST",headers:{"Content-Type":"application/json","CSRF-Token":e},body:JSON.stringify({_token:e,slug:a})});if(o.ok){const d=await o.json();i(d.blocks||[])}else console.error("Failed to fetch data:",o.statusText)}catch(o){console.error("Error fetching data:",o)}finally{c(!1)}})()},[a,e]),l?t.jsx("div",{children:"Loading..."}):!n||!n.length?t.jsx("div",{children:"No content found."}):t.jsx(x,{contents:n})};p(document.getElementById("app2")).render(t.jsxs(h,{children:[t.jsx(g,{richColors:!0,position:"top-center"}),t.jsx(m,{})]}));
