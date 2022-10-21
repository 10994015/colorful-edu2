<?php
require_once('../config/conn.php');
session_start();
$focusNav = "ABOUT";
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
    <main id="about">
        <div class="title"><span class="icon"><i class="fa-solid fa-address-card"></i></span>About</div>
        <div class="chooseDiv">
            <div class="chooseAdd">
                <h3>選擇編輯區域</h3>
                <p>select edit area</p>
                <a href="./companyIntro.php" class="btn1">公司介紹</a>
                <a href="./serviceContent.php" class="btn3">服務內容</a>
            </div>
        </div>

        <?php include('./footer.php'); ?>
    </main>

    <script src="../js/cms/header.js"></script>
</body>
</html>


<?php }else{
    header('Location:./noPermission.php');
} ?>