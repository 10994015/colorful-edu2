const header = document.getElementById('header');
const menu = document.getElementById('menu');
const mobileNav = document.getElementById('mobile-nav');
const menuIcon = menu.querySelector('i');

window.addEventListener("scroll",()=>{
    if(this.scrollY > 80){
        header.classList.add('close');
        header.classList.remove('open');
    }else{
        header.classList.add('open');
        header.classList.remove('close');
    }
    
})

menu.addEventListener('click',()=>{
    mobileNav.classList.toggle('open');
    menuIcon.classList.toggle('fa-times');
    menuIcon.classList.toggle('open');
})