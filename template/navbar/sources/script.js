"use strict";

const pseudo = document.querySelector('.profile-nav a');
const nav = document.querySelector('.hidden-nav');
pseudo.textContent = pseudo.textContent.toUpperCase();
pseudo.addEventListener("click", ()=>{
    nav.classList.toggle("position");
})
console.log(nav);
console.log(pseudo);