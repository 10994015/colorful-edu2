<?php
require_once('../config/conn.php');
session_start();
$focusNav = "CMS";
$sql_str = "SELECT * FROM web_contact ORDER BY lastdate DESC";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_contact = $stmt -> fetch(PDO::FETCH_ASSOC);
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="webInformation">
        <div class="title"><span class="icon"><i class="fa-solid fa-cube"></i></span>CMS</div>
        <div class="information">
            <h4>聯絡資訊</h4>
            <form action="./chk_createContact.php" method="POST">
                <label for="">
                    <p>商家名稱:</p>
                    <input type="text" placeholder="商家名稱..." value="<?php echo $RS_contact['name']; ?>" name="name" id="name">
                </label>
                <label for="">
                    <p>電話:</p>
                    <input type="text" placeholder="電話..." value="<?php echo $RS_contact['phone']; ?>" name="phone" id="phone">
                </label>
                <label for="">
                    <p>Email:</p>
                    <input type="text" placeholder="Email..." value="<?php echo $RS_contact['email']; ?>" name="email" id="email">
                </label>
                <label for="">
                    <p>地址:</p>
                    <input type="text" placeholder="地址..." value="<?php echo $RS_contact['address']; ?>" name="address" id="address">
                </label>
                <label for="">
                    <p>Line連結:</p>
                    <input type="text" placeholder="Line連結..." value="<?php echo $RS_contact['line']; ?>" name="line" id="line">
                </label>
                <label for="">
                    <p>Facebook連結:</p>
                    <input type="text" placeholder="Facebook連結..." value="<?php echo $RS_contact['fb']; ?>" name="fb" id="fb">
                </label>
                <label for="">
                    <p>Instagram連結:</p>
                    <input type="text" placeholder="Instagram連結..." value="<?php echo $RS_contact['ig']; ?>" name="ig" id="ig">
                </label>
                <input type="submit" value="送出" id="submit" hidden>
                <a href="javascript:;" id="send" onclick="sendFn()">編輯</a>
            </form>
        </div>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
        const submit = document.getElementById('submit');
        const name = document.getElementById('name');
        const phone = document.getElementById('phone');
        const email = document.getElementById('email');
        const address = document.getElementById('address');
        const line = document.getElementById('line');
        const fb = document.getElementById('fb');
        const ig = document.getElementById('ig');

        function sendFn(){
            if(name.value==""){
                alert('請輸入廠商名稱！');
                return;
            }
            if(phone.value==""){
                alert('請輸入電話！');
                return;
            }
            if(email.value==""){
                alert('請輸入email！');
                return;
            }
            if(address.value==""){
                alert('請輸入地址！');
                return;
            }
            if(line.value==""){
                alert('請輸入Line連結！');
                return;
            }
            if(fb.value==""){
                alert('請輸入Facebook連結！');
                return;
            }
            if(ig.value==""){
                alert('請輸入Instagram連結！');
                return;
            }
            submit.click();
        }
    </script>
</body>
</html>
<?php }else{
    header('Location:./noPermission.php');
} ?>