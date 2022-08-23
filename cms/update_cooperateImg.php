<?php
require_once('../config/conn.php');
session_start();
if(isset($_POST['id'])){
    ini_set ( 'date.timezone' , 'Asia/Taipei' );  
    date_default_timezone_set('Asia/Taipei');
    try{
        $lastdate = date("Y-m-d H:i:s");
        $sql_str = "UPDATE cooperate_img SET url=:url,lastdate=:lastdate,user=:user WHERE id = :id ";
        //執行$conn物件中的prepare()預處理器
        $stmt = $conn->prepare($sql_str);
        //接收表單輸入的資料
        $id      = $_POST['id'];
        $url = $_POST['url'];
        $user = $_SESSION['name'];
        $stmt->bindParam(':id' ,$id);
        $stmt->bindParam(':url' ,$url);
        $stmt->bindParam(':lastdate' ,$lastdate);
        $stmt->bindParam(':user' ,$user);
        $stmt->execute();
        ?>
        <script>
            alertFn();
            function alertFn(){
                alert('編輯成功!'); window.location.href='./cooperateImg.php';
            }
        </script>
        <?php
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
}