const user = document.getElementById('user');
const userUl = document.getElementById('userUl');
const menuBtn = document.getElementById('menuBtn');
const logo = document.getElementById('logo');
const logotext  = document.getElementById('logotext');
const nav = document.getElementById('nav');
const navUser = document.getElementById('navUser');
const newsListText = document.getElementsByClassName('newsListText');
const newsItem = document.getElementsByClassName('newsItem');
const createArticle = document.getElementById('createArticle');
user.addEventListener('click',()=>{
    userUl.classList.toggle('open');
})

menuBtn.addEventListener('click',()=>{
    logotext.classList.toggle('close');
    logo.classList.toggle('close');
    nav.classList.toggle('close');
    navUser.classList.toggle('close');
    createArticle.classList.toggle('close');
    for(let i=0;i<newsListText.length;i++){
        newsListText[i].classList.toggle('close');
    }
    for(let i=0;i<newsItem.length;i++){
        newsItem[i].classList.toggle('close');
    }
})