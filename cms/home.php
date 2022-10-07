<?php
require_once('../config/conn.php');
session_start();
$focusNav = "HOME";
if(isset($_SESSION['username'])){
 ?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
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
    <main id="home">
        <div class="title"><span class="icon"><i class="fa-solid fa-house"></i></span>Home</div>
        <div class="chooseDiv">
            <div class="chooseAdd">
                <h3>選擇管理區塊</h3>
                <p>Choose management block</p>
                <a href="./home_banner.php" class="btn1">BANNER</a>
            </div>
        </div>
    </main>
    <script src="../js/cms/header.js"></script>
</body>
<?php }else{
    header('Location:./noPermission.php');
} ?>