<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['name'])){
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