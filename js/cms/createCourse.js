const fileimgBtn = document.getElementById('fileimgBtn');
const fileText = document.getElementById('fileText');
const previewImg = document.getElementById('previewImg');
const start_age = document.getElementById('start_age');
const start_decrement = document.getElementById('start_decrement');
const start_increment = document.getElementById('start_increment');
const end_decrement = document.getElementById('end_decrement');
const end_age = document.getElementById('end_age');
const end_increment = document.getElementById('end_increment');
const createCourseBtn = document.getElementById('createCourseBtn');
const week = document.getElementById('week');
const weekText= document.getElementById('weekText');
const week1 = document.getElementById('week1');
const week2 = document.getElementById('week2');
const week3 = document.getElementById('week3');
const week4 = document.getElementById('week4');
const week5 = document.getElementById('week5');
const week6 = document.getElementById('week6');
const week7 = document.getElementById('week7');
const week8 = document.getElementById('week8');
const weekBox = document.getElementsByClassName('weekBox');
const weekLabel = document.getElementsByClassName('weekLabel');
const weekInput = document.getElementsByClassName('weekInput');
let weekArr = [];

const focus = document.getElementById('focus');
const focusLabel = document.getElementById('focusLabel');
focus.addEventListener('change',()=>{
    if(focus.checked){
        focusLabel.classList.add('open');
        focusLabel.classList.remove('close');
    }else{
        focusLabel.classList.remove('open');
        focusLabel.classList.add('close');
    }
})

for(let i=0;i<weekInput.length;i++){
    weekInput[i].addEventListener('change',()=>{
        weekArr = [];
        if(week1.checked){
            weekArr.push('1');
        }
        if(week2.checked){
            weekArr.push('2');
        }
        if(week3.checked){
            weekArr.push('3');
        }
        if(week4.checked){
            weekArr.push('4');
        }
        if(week5.checked){
            weekArr.push('5');
        }
        if(week6.checked){
            weekArr.push('6');
        }
        if(week7.checked){
            weekArr.push('7');
        }
        if(week8.checked){
            weekArr.push('8');
        }
        week.value = weekArr;
    })
}
week8.addEventListener('click',()=>{
    for(let i=0;i<weekBox.length;i++){
        weekBox[i].checked = false;
    }
    if(week8.checked){
        weekText.style.display = "block";
        for(let i=0;i<weekLabel.length;i++){
            weekLabel[i].classList.add('disabled');
            weekLabel[i].removeAttribute('for');
        }
    }else{
        weekText.style.display = "none";
        for(let i=0;i<weekLabel.length;i++){
            weekLabel[i].setAttribute('for',`week${i+1}`);
            weekLabel[i].classList.remove('disabled');
        }
    }
    
    
})
start_increment.addEventListener('click',()=>{
    if(start_age.value<100){
        start_age.value++;
    }
})
start_decrement.addEventListener('click',()=>{
    if(start_age.value>3){
        start_age.value--;
    }
})
end_increment.addEventListener('click',()=>{
    if(end_age.value<100){
        end_age.value++;
    }
})
end_decrement.addEventListener('click',()=>{
    if(end_age.value>3){
        end_age.value--;
    }
})
fileimgBtn.addEventListener('change',()=>{
    if(fileimgBtn.value){
        fileText.innerHTML = fileimgBtn.value;
    }else{
        fileText.innerHTML = "尚未選擇圖片";
    }
    const file = fileimgBtn.files[0];
    const reader = new FileReader;
    reader.onload = function(e) {
        previewImg.src = e.target.result;
    };
    reader.readAsDataURL(file);


});

CKEDITOR.replace('content',{
    extraplugins:'filebrowser',
    height:300,
    width:'100%',
    filebrowserUploadMethod:"form",
    filebrowserUploadUrl:"./ckeditor_upload.php"
});