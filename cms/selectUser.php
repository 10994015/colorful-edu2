<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_GET['id']) && $_GET['id']!=""){
    $id = $_GET['id'];
    $sql_str = "SELECT * FROM user WHERE id = :id";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $RS_user = $stmt -> fetch(PDO::FETCH_ASSOC);

    echo json_encode($RS_user);
}