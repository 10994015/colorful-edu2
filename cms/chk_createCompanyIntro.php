<?php

require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['intro']) && $_POST['intro']!=""){
    $intro = $_POST['intro'];
    $service = $_POST['service'];
    $lastdate = date("Y-m-d H:i:s");
    $user = $_SESSION['username'];

    $sql_str = "INSERT INTO about (intro, service, lastdate, user) VALUES (:intro, :service, :lastdate, :user)";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(":intro", $intro);
    $stmt -> bindParam(":service", $service);
    $stmt -> bindParam(":lastdate", $lastdate);
    $stmt -> bindParam(":user", $user);
    $stmt -> execute();
    
    echo "<script>alert('編輯成功!');window.location.href = './companyIntro.php' </script>";
    

}