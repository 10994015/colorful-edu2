<?php

require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['title']) && $_POST['title']!=""){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $icon = $_POST['icon'];
    $color = $_POST['color'];
    $lastdate = date("Y-m-d H:i:s");
    $user = $_SESSION['username'];

    $sql_str = "UPDATE service SET title=:title, content=:content, icon=:icon, color=:color, lastdate=:lastdate, user=:user WHERE id =:id";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":title", $title);
    $stmt -> bindParam(":content", $content);
    $stmt -> bindParam(":icon", $icon);
    $stmt -> bindParam(":color", $color);
    $stmt -> bindParam(":lastdate", $lastdate);
    $stmt -> bindParam(":user", $user);
    $stmt -> execute();
    
    echo "<script>alert('編輯成功!');window.location.href = './serviceContent.php' </script>";
    

}