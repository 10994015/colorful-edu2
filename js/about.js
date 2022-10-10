const send = document.getElementById('send');
const name = document.getElementById('name');
const email = document.getElementById('email');
const title = document.getElementById('title');
const content = document.getElementById('content');
const submit = document.getElementById('submit');

send.addEventListener('click',sendLetter)
function sendLetter (){
    if(name.value === ""){
        alert('請輸入姓名！');
        return
    }
    if(email.value === ""){
        alert('請輸入Email！');
        return
    }
    if(title.value === ""){
        alert('請輸入主旨！');
        return
    }
    if(content.value === ""){
        alert('請輸入內容！');
        return
    }
    submit.click();
}