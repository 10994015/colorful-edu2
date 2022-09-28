<?php
require_once('../config/conn.php');
session_start();
if(isset($_POST['bannerLength']) && $_POST['bannerLength'] != ""){
    ini_set ( 'date.timezone' , 'Asia/Taipei' );  
    date_default_timezone_set('Asia/Taipei');

    
    try{
        $record_lastdate = date("Y-m-d H:i:s");
        $record_user = $_SESSION['name'];
        $record_type_name = "首頁輪播圖";
        $record_action = "編輯排序";
        $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
        $stmt_record = $conn -> prepare($sql_record);
        $stmt_record -> bindParam(':record_user' ,$record_user);
        $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
        $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
        $stmt_record -> bindParam(':record_action' ,$record_action);
        $stmt_record -> execute();

        $lastdate = date("Y-m-d H:i:s");
        $bannerLength = intval($_POST['bannerLength']);
        $sortId = $_POST['sortId'];
        $sortIdArr = explode(',', $sortId);
       
        foreach($sortIdArr as $key => $item){
            $sql_str = "UPDATE home_banner SET sort=:sort, user=:user,lastdate=:lastdate WHERE id = :id ";
            $stmt = $conn->prepare($sql_str);

            $id      = $item;
            $sort = $key + 1;
            $user = $_SESSION['name'];
            $stmt->bindParam(':id' ,$id);
            $stmt->bindParam(':sort' ,$sort);
            $stmt->bindParam(':user' ,$user);
            $stmt->bindParam(':lastdate' ,$lastdate);
            $stmt->execute();
        }
        
        ?>
        <script>
            alertFn();
            function alertFn(){
                alert('編輯成功!'); window.location.href='./home_banner.php';
            }
        </script>
        <?php
    }
    catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
    }
}