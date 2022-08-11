<?php 
require_once('../config/conn.php');
session_start();

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登入</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/cms.css">
    <style>
    body{
        padding-top: 0;
    }
    </style>
</head>
<body>
    <div id="login">
        <form action="./chk_login.php" class="loginForm" method="POST">
            <h2><i class="fa-solid fa-cube"></i><p id="logotext">CMS</p></h2>
            <p>登入您的後台帳號</p>
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="hidden" name="member">
            <input type="submit" value="SIGN IN">
            <?php if(isset($_GET['msg']) && $_GET['msg']=="1"){ ?>
                <small class="error">帳號或密碼錯誤!</small>
            <?php } ?>
        </form>
    </div>
</body>
</html>