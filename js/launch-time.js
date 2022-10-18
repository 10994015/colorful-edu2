const comngSoonDay = document.getElementById('comngSoonDay').innerText.replace(/-/g,'/');
document.getElementById('comngSoonDay').innerHTML = comngSoonDay;
const courseing = document.getElementById('courseing');
var countDownDate = new Date(`${comngSoonDay} 00:00:00`).getTime();
　var today=new Date();
let = today.getFullYear + "-" + today.getMonth + "-" + today.getDate
console.log(today.getTime());
console.log(countDownDate);
console.log(countDownDate<today.getTime());
const launchTime = document.getElementsByClassName('launch-time');
if(countDownDate > today.getTime()){
    var x = setInterval(()=>{
        var now = new Date().getTime();
        var distance = countDownDate - now;
    
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
        document.getElementById('days').innerHTML = days;
        document.getElementById('hours').innerHTML = hours;
        document.getElementById('minutes').innerHTML = minutes;
        document.getElementById('seconds').innerHTML = seconds;
    },1000)
}else{
    courseing.innerHTML = "課程進行中";
    for(let i=0;i<launchTime.length;i++){
        launchTime[i].style.display = "none";
    }
    
}
