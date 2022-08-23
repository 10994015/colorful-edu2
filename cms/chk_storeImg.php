<?php 

require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
//1.判斷接收到上傳檔案 => 通過 $_FILES 檔案上傳變數接收上傳檔案信息 ======================
if (isset($_FILES['upload_file'])) {
    $files = $_FILES['upload_file'];
    $user = $_SESSION['name'];
    $lastdate = date("Y-m-d H:i:s");

      foreach( $files as $file ){
          $i = 0;  //新陣列的索引編號
          foreach( $file as $key => $val ){
              $new_array[$i]['name']     = $files['name'][$key];
              $new_array[$i]['type']     = $files['type'][$key];
              $new_array[$i]['tmp_name'] = $files['tmp_name'][$key];
              $new_array[$i]['error']    = $files['error'][$key];
              $new_array[$i]['size']     = $files['size'][$key];
              $i++;
              } //foreach 第2層 end
          } //foreach 第1層 end
        //   print_r( $new_array );
        //   echo '<hr><br><br><br>';
          //檔案限制條件
      $max_size  = 4096*4096;                     //設定允許上傳檔案容量的最大值(1M)
      $allow_ext = array('jpeg', 'jpg', 'png','JPG','JPEG','PNG','GIF');   //設定允許上傳檔案的類型
      $path      = '../images/cooperate/';
      if (!file_exists($path)) { mkdir($path); }
      include('./fn_upload_chk.php');
      include('./fn_thumbnail.php');
      $msg_result = '';  //負責接收所有檔案檢測後的回傳訊息
      
      //依新陣列的檔案資訊逐項進行限制檢查
      foreach( $new_array as $key => $file ){
      $randNum = rand(1000,10000000);
      $file_name = $randNum.$file['name'];
      $msg = upload_chk( $file,$path, $max_size, $allow_ext,  $file_name );
      if($msg==1){ 
          $msg = '檔案傳送成功！';
          $sql_str = "INSERT INTO store_img (imgsrc,user,lastdate) VALUES (:imgname,:user,:lastdate)";
          $stmt = $conn -> prepare($sql_str);
          $stmt -> bindParam(':imgname' ,$file_name);
          $stmt -> bindParam(':user' ,$user);
          $stmt -> bindParam(':lastdate' ,$lastdate);
          $stmt ->execute();
       }
      $msg_result .= '第' . ($key+1) . '個上傳檔案的結果：' . $msg . '<br/>';
      $src_name = $path.$file['name'];
      if( file_exists($src_name) ){
          $extname  = pathinfo($src_name, PATHINFO_EXTENSION);  //副檔名部份
          $basename = basename($src_name, '.'.$extname);        //主檔名部份
      }
      }
      
    //   echo $msg_result;
      echo "<script>alert('上傳成功!');window.location.href = 'storeImg.php?upload=ok' </script>";
      }

?>