const textList = document.getElementsByClassName('textList');
const searchBox = document.getElementById('searchBox');
const searchBtn = document.getElementById('searchBtn');
const allBtn = document.getElementById('allBtn');
searchBtn.addEventListener('click',searchFn);
allBtn.addEventListener('click',showFn);
function searchFn(){
    clearListFn();
    for(let i=0;i<textList.length;i++){
        if(textList[i].innerHTML.includes(searchBox.value)){
            textList[i].style.display = "block";
        }
    }
}

function clearListFn(){
    for(let i=0;i<textList.length;i++){
        textList[i].style.display = "none";
    }
}

function showFn(){
    for(let i=0;i<textList.length;i++){
        textList[i].style.display = "block";
    }
    searchBox.value = "";
}