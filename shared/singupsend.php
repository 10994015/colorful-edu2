<?php
require_once('../config/conn.php');
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['name'])){
    try{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $courseSelect = $_POST['courseSelect'];
        $age = $_POST['age'];
        $send_time = date("Y-m-d H:i:s");
        $sql_str = "INSERT INTO signup (name, email, phone, course, age, send_time) VALUES (:name, :email, :phone, :courseSelect, :age, :send_time)";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(":name", $name);
        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":phone", $phone);
        $stmt -> bindParam(":courseSelect", $courseSelect);
        $stmt -> bindParam(":age", $age);
        $stmt -> bindParam(":send_time", $send_time);
        $stmt -> execute();
        
        $result2 = 1;

        $result2 = sendMail($name,$email,$phone,$age, $courseSelect);
        if($result2 == 1){
            // echo "<script> alert('發送成功\n我們會盡快回復您!'); location.href='../?page=contact'</script>";
            // header('Location:../?page=contact');
            ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送成功！我們將盡快與您聯絡！');
                    
                    window.location.href = '../?page=formPage';
                }
            }
            </script>
            <?php
        }else{
            ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送成功！我們將盡快與您聯絡！');
                    window.location.href = '../?page=formPage';
                }
            }
            </script>
            <?php ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送失敗`!訊息格式錯誤或伺服器錯誤');
                    
                    window.location.href = '../?page=formPage';
                }
            }
            </script>
            <?php
        }

    }catch(PDOException $e){
        die("Error!:發送失敗.....".$e->getMessage());
    }
}

function sendMail($name,$email,$phone,$age, $courseSelect){
    $subject = "=?UTF-8?B?".base64_encode('冰芬文教課程報名通知')."?=";
    $text = '姓名:'.$name.'<br>'
                .'報名者信箱:'.$email .'<br>'
                .'報名者手機:'.$phone.'<br>'
                .'出生年月日:'.$age.'<br>'
                .'報名課程:'.$courseSelect;
                

    // $header = "From: a0938599191@gmail.com\r\n";
    $header = "From: service@ice-finland.pro\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    // $result = mail('a0938599191@gmail.com', $subject, $text, $header);
    $result = mail('service@ice-finland.pro', $subject, $text, $header);
    echo $result;
    return $result;
}