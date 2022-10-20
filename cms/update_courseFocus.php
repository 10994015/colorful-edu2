<?php
require_once('../config/conn.php');
session_start();
if(isset($_POST['focusId'])){
    ini_set ( 'date.timezone' , 'Asia/Taipei' );  
    date_default_timezone_set('Asia/Taipei');
    try{
        $record_lastdate = date("Y-m-d H:i:s");
        $record_user = $_SESSION['username'];
        $record_type_name = "課程焦點";
        $record_action = "編輯";
        $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
        
        $stmt_record = $conn -> prepare($sql_record);
        $stmt_record -> bindParam(':record_user' ,$record_user);
        $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
        $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
        $stmt_record -> bindParam(':record_action' ,$record_action);
        $stmt_record -> execute();

        $lastdate = date("Y-m-d H:i:s");

        $sql_str = "UPDATE course SET focus = '0' ";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
        $stmt->execute();

        $sql_str2 = "UPDATE course SET focus = '1', lastdate=:lastdate WHERE id  = :id ";
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