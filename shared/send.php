<?php
require_once('../config/conn.php');
// ini_set ( 'date.timezone' , 'Asia/Taipei' );  
// date_default_timezone_set('Asia/Taipei');

if(isset($_POST['name'])){
    try{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $send_time = date("Y-m-d H:i:s");
        $sql_str = "INSERT INTO letter (name, email, title, content, send_time) VALUES (:name, :email, :title, :content, :send_time)";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(":name", $name);
        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":title", $title);
        $stmt -> bindParam(":content", $content);
        $stmt -> bindParam(":send_time", $send_time);
        $stmt -> execute();
        
        $result2 = 1;

        $result2 = sendMail($name,$email,$title,$content);
        if($result2 == 1){
            // echo "<script> alert('發送成功\n我們會盡快回復您!'); location.href='../?page=contact'</script>";
            // header('Location:../?page=contact');
            ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送成功!我們將盡快與您聯絡!');
                    window.location.href = '../?page=about';
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
                    alert('發送成功!我們將盡快與您聯絡!');
                    window.location.href = '../?page=about';
                }
            }
            </script>
            <?php ?>
            <script>
            window.onload = ()=>{
                alertFn();
                function alertFn(){
                    alert('發送失敗!訊息格式錯誤或伺服器錯誤!');
                    window.location.href = '../?page=about';
                }
            }
            </script>
            <?php
        }

    }catch(PDOException $e){
        die("Error!:發送失敗.....".$e->getMessage());
    }
}

function sendMail($name,$email,$title,$content){
    $subject = "=?UTF-8?B?".base64_encode('冰芬美語訊息通知')."?=";
    $text = '姓名:'.$name.'<br>'
                .'發送者信箱:'.$email
                .'主旨:'.$title
                .'訊息:<br>'.$content;
                

    // $header = "From: a0938599191@gmail.com\r\n";
    $header = "From: service@ice-finland.pro\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    // $result = mail('a0938599191@gmail.com', $subject, $text, $header);
    $result = mail('service@ice-finland.pro', $subject, $text, $header);
    echo $result;
    return $result;
}