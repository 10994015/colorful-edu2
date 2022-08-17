const leftItem = document.getElementsByClassName('leftItem');
const newsTypeBtn = document.getElementsByClassName('newsTypeBtn');
let newstimer = 0;
let newsTimerNumber = 0;
let seconds = 2000;

//日期去時間
const tailoffDate = document.getElementsByClassName('tailoffDate');

for(let i=0;i<tailoffDate.length;i++){
    tailoffDate[i].innerHTML = tailoffDate[i].innerHTML.split(" ")[0];
}

const newsListLast = document.getElementById('newsListLast');
const newsListCourse = document.getElementById('newsListCourse');
const newsListDaily = document.getElementById('newsListDaily');
const newsListTrain = document.getElementById('newsListTrain');

const newTypeBtnLast = document.getElementById('newTypeBtnLast');
const newTypeBtnCourse = document.getElementById('newTypeBtnCourse');
const newTypeBtnDaily = document.getElementById('newTypeBtnDaily');
const newTypeBtnTrain = document.getElementById('newTypeBtnTrain');

const clearToggleNewListFn = ()=>{
    newsListLast.style.display = "none";
    newsListCourse.style.display = "none";
    newsListDaily.style.display = "none";
    newsListTrain.style.display = "none";
}


newTypeBtnLast.addEventListener('click',()=>{clearToggleNewListFn();newsListLast.style.display = "flex"})
newTypeBtnCourse.addEventListener('click',()=>{clearToggleNewListFn();newsListCourse.style.display = "flex"})
newTypeBtnDaily.addEventListener('click',()=>{clearToggleNewListFn();newsListDaily.style.display = "flex"})
newTypeBtnTrain.addEventListener('click',()=>{clearToggleNewListFn();newsListTrain.style.display = "flex"})



setInterval(()=>{
    newstimer++;
    newsTimerNumber = newstimer *110;
    if(newstimer == ((leftItem.length/2) + 1)){
        newstimer = 0;
        newsTimerNumber = 0;
        let seconds = 1000;
        for(let i=0;i<=leftItem.length;i++){
            leftItem[i].style.transform = `translateY(0px)`;
            leftItem[i].style.transition = "0s";
        }
    }else{
        let seconds = 2000;
        for(let i=0;i<=leftItem.length;i++){
            leftItem[i].style.transform = `translateY(-${newsTimerNumber}px)`;
            leftItem[i].style.transition = ".5s";
    
        }
    }
},seconds)

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