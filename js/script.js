const leftItem = document.getElementsByClassName('leftItem');
let newstimer = 0;
let newsTimerNumber = 0;

const newsTypeBtn = document.getElementsByClassName('newsTypeBtn');
setInterval(()=>{
    newstimer++;
    newsTimerNumber = newstimer *110;
    if(newstimer == 11){
        newstimer = 0;
        newsTimerNumber = 0;
        for(let i=0;i<=leftItem.length;i++){
            leftItem[i].style.transform = `translateY(0px)`;
            leftItem[i].style.transition = "0s";
    
        }
    }else{
        for(let i=0;i<=leftItem.length;i++){
            leftItem[i].style.transform = `translateY(-${newsTimerNumber}px)`;
            leftItem[i].style.transition = ".5s";
    
        }
    }
},2000)

for(let i=0;i<newsTypeBtn.length;i++){
    newsTypeBtn[i].addEventListener('click',toggleNews)
}

function toggleNews(){
    clearFn();
    this.classList.add('focus');
    
}
function clearFn(){
    for(let i=0;i<newsTypeBtn.length;i++){
        newsTypeBtn[i].classList.remove('focus')
        
    }
}