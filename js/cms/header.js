const user = document.getElementById('user');
const userUl = document.getElementById('userUl');
const menuBtn = document.getElementById('menuBtn');
const logo = document.getElementById('logo');
const logotext  = document.getElementById('logotext');
const nav = document.getElementById('nav');
const navUser = document.getElementById('navUser');
const newsListText = document.getElementsByClassName('newsListText');
const newsItem = document.getElementsByClassName('newsItem');
const mainDiv = document.querySelector('main');

const fullScreen = document.getElementById('fullScreen');
const docElm = document.documentElement;

user.addEventListener('click',()=>{
    userUl.classList.toggle('open');
})

menuBtn.addEventListener('click',()=>{
    logotext.classList.toggle('close');
    logo.classList.toggle('close');
    nav.classList.toggle('close');
    navUser.classList.toggle('close');
    mainDiv.classList.toggle('close');
    for(let i=0;i<newsListText.length;i++){
        newsListText[i].classList.toggle('close');
    }
    for(let i=0;i<newsItem.length;i++){
        newsItem[i].classList.toggle('close');
    }
})

fullScreen.addEventListener('click',()=>{
    if (!document.fullscreenElement &&    
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
        if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
        document.exitFullscreen();
        } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
        }
    }
      
})