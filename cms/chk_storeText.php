<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['name'])){
    $record_lastdate = date("Y-m-d H:i:s");
    $record_user = $_SESSION['username'];
    $record_type_name = "特約廠商文字";
    $record_action = "新增";
    $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
    
    $stmt_record = $conn -> prepare($sql_record);
    $stmt_record -> bindParam(':record_user' ,$record_user);
    $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
    $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
    $stmt_record -> bindParam(':record_action' ,$record_action);
    $stmt_record -> execute();


    $name = $_POST['name'];
    $user = $_SESSION['name'];
    $lastdate = date("Y-m-d H:i:s");
    $name = explode(',',$name);  
    foreach($name as $item){
        if($item!=""){
            $sql_str = "INSERT INTO store_text (name,user,lastdate) VALUES (:item,:user,:lastdate)";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':item' ,$item);
            $stmt -> bindParam(':user' ,$user);
            $stmt -> bindParam(':lastdate' ,$lastdate);
            $stmt ->execute();
        }
    }
   
}

?>