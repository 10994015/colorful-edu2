<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if(isset($_POST['member'])){
    $lastdate = date("Y-m-d H:i:s");
    $loginNum = -1;
    try {
        $sql_str = "SELECT * FROM user
                    WHERE username=:username AND password=:password AND level >= 9";
        $RS = $conn -> prepare($sql_str);
       
        $username = $_POST['username'];  //接收登入的帳號
        $password  = $_POST['password'];   //接收登入的密碼  
       
        $RS -> bindParam(':username', $username);
        $RS -> bindParam(':password', $password);
       
        $RS -> execute();
        $total = $RS -> rowCount();
        


        //$total是資料集的筆數, 如果>=1表示有查詢到資料，是符合登入的會員
        if( $total >= 1 ){
          $row_RS = $RS -> fetch(PDO::FETCH_ASSOC);
          $_SESSION['username']  = $row_RS['username'];   //將會員名稱記錄到SESSION系統變數
          $_SESSION['name']  = $row_RS['name'];   //將會員名稱記錄到SESSION系統變數
          $_SESSION['imgsrc']  = $row_RS['imgsrc'];   //將會員名稱記錄到SESSION系統變數
          $url = './';  //登入成功要前往的位址
          $id = $row_RS['id'];
          $sql_str = "UPDATE user SET lastdate = :lastdate WHERE id  = :id";
          //執行$conn物件中的prepare()預處理器
          $stmt = $conn->prepare($sql_str);
          $stmt->bindParam(':id' ,$id);
          $stmt->bindParam(':lastdate' ,$lastdate);
          $stmt->execute();

          $loginNum = 1;
        }else{
          //登入失敗..............登入失敗要前往的位址，並加上msg參數
          $url = './login.php?msg=1';
          $loginNum = 0;
        }
        if($loginNum == 1){
            echo "<script> function loginFn(){alert('登入成功!');window.location.href = './'; } loginFn();</script>";
          }else{
            echo "<script> function loginFn(){alert('登入失敗!');window.location.href = './login.php?msg=1'; }loginFn();</script>";
          }
        // header('Location:'.$url);  
      } 
      catch ( PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
      }
     
} 
?>