<?php
include_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
$username = $_SESSION['username'];
$lastdate = date("Y-m-d H:i:s");
$sql_str = "UPDATE user SET lastdate = :lastdate WHERE username  = :username";
//執行$conn物件中的prepare()預處理器
$stmt = $conn->prepare($sql_str);
$stmt->bindParam(':username' ,$username);
$stmt->bindParam(':lastdate' ,$lastdate);
$stmt->execute();


$_SESSION['username']  ='';    //將會員名稱記錄到SESSION系統變數
$_SESSION['name']  ='';    //將會員名稱記錄到SESSION系統變數
unset($_SESSION['username']);
unset($_SESSION['name']);
echo "<script> function logoutFn(){ alert('登出成功!'); window.location.href='./'; } logoutFn(); </script>";
// header('Location:./');
?>