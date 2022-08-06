const toTop = document.getElementById('toTop');
window.addEventListener("scroll",()=>{
    if(this.scrollY > 160){
        toTop.classList.add('fadein');
    }else{
        toTop.classList.remove('fadein');
    }
    
})
toTop.addEventListener('click',()=>{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
})