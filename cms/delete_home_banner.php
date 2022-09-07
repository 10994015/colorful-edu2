<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $record_lastdate = date("Y-m-d H:i:s");
        $record_user = $_SESSION['username'];
        $record_type_name = "首頁輪播圖";
        $record_action = "刪除";
        $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
        
        $stmt_record = $conn -> prepare($sql_record);
        $stmt_record -> bindParam(':record_user' ,$record_user);
        $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
        $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
        $stmt_record -> bindParam(':record_action' ,$record_action);
        $stmt_record -> execute();

        $id = $_GET['id'];
        $sql_str = "DELETE FROM home_banner WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();

        ?>
        <script>
            alertFn();
            function alertFn(){
                alert('刪除成功!'); window.location.href='./home_banner.php';
            }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }

}