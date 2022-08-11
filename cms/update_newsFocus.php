<?php
require_once('../config/conn.php');

if(isset($_POST['focusId'])){
    ini_set ( 'date.timezone' , 'Asia/Taipei' );  
    date_default_timezone_set('Asia/Taipei');
    try{
        $lastdate = date("Y-m-d H:i:s");

        $sql_str = "UPDATE news SET focus = '0' ";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
        $stmt->execute();

        $sql_str2 = "UPDATE news SET focus = '1', lastdate=:lastdate WHERE id  = :id ";
        //執行$conn物件中的prepare()預處理器
        $stmt2 = $conn->prepare($sql_str2);
        //接收表單輸入的資料
        $id      = $_POST['focusId'];
        $stmt2->bindParam(':id' ,$id);
        $stmt2->bindParam(':lastdate' ,$lastdate);
        $stmt2->execute();
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}