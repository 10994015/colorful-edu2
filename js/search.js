const searchBtn = document.getElementById('searchBtn');
const searchBar = document.getElementById('searchBar');
const rwd_searchBtn = document.getElementById('rwd_searchBtn');
const rwd_searchBar = document.getElementById('rwd_searchBar');
let keyword = "";
const loading = document.getElementById('loading');
loading.classList.remove('open');
const searchText = document.getElementsByClassName('searchText');
searchBtn.addEventListener('click',()=>{
    loadingShow();
    if(searchBar.value=="") {
        window.location.href = `?page=news`;
        return;
    };
    keyword = searchBar.value;
    window.location.href = `?page=news&search=${keyword}`;
});
rwd_searchBtn.addEventListener('click',()=>{
    loadingShow();
    if(rwd_searchBar.value=="") {
        window.location.href = `?page=news`;
        return;
    };
    keyword = rwd_searchBar.value;
    window.location.href = `?page=news&search=${keyword}`;
});
searchBar.addEventListener('keyup',(e)=>{
    if(e.keyCode != 13) return;
    loadingShow();
    if(searchBar.value=="") {
        window.location.href = `?page=news`;
        return;
    };
    keyword = searchBar.value;
    window.location.href = `?page=news&search=${keyword}`;
});
rwd_searchBar.addEventListener('keyup',(e)=>{
    if(e.keyCode != 13) return;
    loadingShow();
    if(rwd_searchBar.value=="") {
        window.location.href = `?page=news`;
        return;
    };
    keyword = rwd_searchBar.value;
    window.location.href = `?page=news&search=${keyword}`;
});


for(let i=0;i<searchText.length;i++){
    searchText[i].addEventListener('click',searchTextFn)
}

function loadingShow(){
    loading.classList.add('open');
}

function searchTextFn(){
    keyword = this.classList[1];
    console.log(this.classList[1]);
    
    window.location.href = `?page=news&tag=${keyword}`;
}