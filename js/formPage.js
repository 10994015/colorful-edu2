const name = document.getElementById('name');
const phone = document.getElementById('phone');
const email = document.getElementById('email');
const age = document.getElementById('age');
const courseSelect = document.getElementById('courseSelect');
const send = document.getElementById('send');
const submit = document.getElementById('submit');

send.addEventListener('click',()=>{
    if(name.value ==""){
        Swal.fire({
            title: 'Error',
            text: "姓名不得為空",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return;
    }
    if(phone.value ==""){
        Swal.fire({
            title: 'Error',
            text: "電話不得為空",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        
        return;
    }
    var reg = /^0[9]\d{8}$/;
    if(!reg.test(phone.value)){
      Swal.fire({
            title: 'Error',
            text: "手機格式錯誤！",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return;
    }
    if(email.value ==""){
        Swal.fire({
            title: 'Error',
            text: "Email不得為空",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return;
    }
    if(courseSelect.value ==""){
        Swal.fire({
            title: 'Error',
            text: "請選擇報名課程",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return;
    }
    
    submit.click();
})