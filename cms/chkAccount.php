<?php 
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['username']) && $_POST['username'] !=""){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_str = "SELECT * FROM user WHERE username = :username AND password=:password AND level>=10";
    $stmt  = $conn -> prepare($sql_str);
    $stmt -> bindParam(':username', $username);
    $stmt -> bindParam(':password', $password);
    $stmt -> execute();
    $total = $stmt -> rowCount();

    if($total >= 1){
        $row =  $stmt -> fetch(PDO::FETCH_ASSOC);
        $chkArr = ["chk"=>1];
        
        echo json_encode($chkArr);
    }
    else{
        $chkArr = ["chk"=>0];
        echo json_encode($chkArr);
    }
}