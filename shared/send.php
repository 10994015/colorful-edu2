<?php
if(isset($_POST['name'])){
    try{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['title'];
        $content = $_POST['content'];
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
                

    // $header = "From: service@ice-finland.pro\r\n";
    $header = "From: service@ice-finland.pro\r\n";
    $header .= "Content-type: text/html; charset=utf8";

    //mail(收件者,信件主旨,信件內容,信件檔頭資訊)
    $result = mail('service@ice-finland.pro', $subject, $text, $header);
    echo $result;
    return $result;
}