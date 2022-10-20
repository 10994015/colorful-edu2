<?php

require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['name']) && $_POST['name']!=""){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $line = $_POST['line'];
    $fb = $_POST['fb'];
    $ig = $_POST['ig'];
    $lastdate = date("Y-m-d H:i:s");
    $user = $_SESSION['username'];

    $sql_str = "INSERT INTO web_contact (name, phone, email, address, line, fb, ig, lastdate, user) VALUES (:name, :phone, :email, :address, :line, :fb, :ig, :lastdate, :user)";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(":name", $name);
    $stmt -> bindParam(":phone", $phone);
    $stmt -> bindParam(":email", $email);
    $stmt -> bindParam(":address", $address);
    $stmt -> bindParam(":line", $line);
    $stmt -> bindParam(":fb", $fb);
    $stmt -> bindParam(":ig", $ig);
    $stmt -> bindParam(":lastdate", $lastdate);
    $stmt -> bindParam(":user", $user);
    $stmt -> execute();
    
    echo "<script>alert('新增成功!');window.location.href = './webContact.php' </script>";
    

}