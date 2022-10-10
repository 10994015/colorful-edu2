const header = document.getElementById('header');
const menu = document.getElementById('menu');
const mobileNav = document.getElementById('mobile-nav');
const menuIcon = menu.querySelector('i');
let query = null;
if(window.location.search != "") {
    query = window.location.search.split('page=')[1].split('&')[0].trim();
}
activeFn();
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

function activeFn(){
    if(query == null){
        header.getElementsByClassName('home')[0].classList.add('active');
        mobileNav.getElementsByClassName('home')[0].classList.add('active');
    }
    else if(query == "course"){
        header.getElementsByClassName('course')[0].classList.add('active');
        mobileNav.getElementsByClassName('course')[0].classList.add('active');
    }
    else if(query == "news"){
        header.getElementsByClassName('news')[0].classList.add('active');
        mobileNav.getElementsByClassName('news')[0].classList.add('active');
    }
    else if(query == "cooperate"){
        header.getElementsByClassName('cooperation')[0].classList.add('active');
        mobileNav.getElementsByClassName('cooperation')[0].classList.add('active');
    }
    else if(query == "about"){
        header.getElementsByClassName('about')[0].classList.add('active');
        mobileNav.getElementsByClassName('about')[0].classList.add('active');
    }
    
}
