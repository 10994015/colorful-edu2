<?php 
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
// if(isset($_FILES['imgsrc']) && $_FILES['imgsrc']!=""){

//     $isshow = (empty($_POST['isshow'])) ? '0' : '1';    
//     $focus = (empty($_POST['focus'])) ? '0' : '1';    
//     $hot = (empty($_POST['hot'])) ? '0' : '1';    
//     $course = (empty($_POST['course'])) ? '0' : '1';    
//     $daily = (empty($_POST['daily'])) ? '0' : '1';    
//     $train = (empty($_POST['train'])) ? '0' : '1';    
//     $dash = "--------------<br>";
//     echo $isshow.$dash;
//     echo $focus.$dash;
//     echo $hot.$dash;
//     echo $course.$dash;
//     echo $daily.$dash;
//     echo $train.$dash;
  
// }
if(isset($_FILES['imgsrc']) && $_FILES['imgsrc']!=""){
    $rand = strval(rand(1000,1000000));
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $lastdate = date("Y-m-d H:i:s");

    $course = (empty($_POST['course'])) ? '0' : '1';    
    $daily = (empty($_POST['daily'])) ? '0' : '1';    
    $train = (empty($_POST['train'])) ? '0' : '1';  
    $isshow = (empty($_POST['isshow'])) ? '0' : '1';    
    $focus = (empty($_POST['focus'])) ? '0' : '1';    
    $hot = (empty($_POST['hot'])) ? '0' : '1';    

    $user = $_POST['user'];
  
    if($focus == 1){
        $init_focus = "UPDATE news SET focus = '0'";
        $stmt0 = $conn->prepare($init_focus);
        $stmt0->execute();
    }
    
    $file      = $_FILES['imgsrc'];       //上傳檔案信息
    $file_name = $file['name'];                //上傳檔案的原來檔案名稱
    $file_type = $file['type'];                //上傳檔案的類型(副檔名)
    $tmp_name  = $file['tmp_name'];            //上傳到暫存空間的路徑/檔名
    $file_size = $file['size'];                //上傳檔案的檔案大小(容量)
    $error     = $file['error'];   
    $imgsrc = $rand.$file_name;

   
    $sql_str = "INSERT INTO news (title,content,lastdate,imgsrc,course,daily,train,isshow,focus,hot,user) VALUES
                                 (:title,:content,:lastdate,:imgsrc,:course,:daily,:train,:isshow,:focus,:hot,:user)";
    $stmt = $conn -> prepare($sql_str);
    
    $stmt -> bindParam(':title' ,$title);
    $stmt -> bindParam(':content' ,$content);
    $stmt -> bindParam(':lastdate' ,$lastdate);
    $stmt -> bindParam(':imgsrc' ,$imgsrc);
    $stmt -> bindParam(':course' ,$course);
    $stmt -> bindParam(':daily' ,$daily);
    $stmt -> bindParam(':train' ,$train);
    $stmt -> bindParam(':isshow' ,$isshow);
    $stmt -> bindParam(':focus' ,$focus);
    $stmt -> bindParam(':hot' ,$hot);
    $stmt -> bindParam(':user' ,$user);
    $stmt ->execute();


    $allow_ext = array('jpeg', 'jpg', 'png', 'gif','JPG','JPEG','PNG','GIF');
    //設定上傳位置
    $path = '../images/img_upload/';
    if (!file_exists($path)) { mkdir($path); }
    // $path2 = '../images/img_upload2/';
    // if (!file_exists($path2)) { mkdir($path2); }
   
    //2.判斷上傳沒有錯誤時 => 檢查限制的條件 =============================================
    if ($error == 0) {
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    //in_array($ext, $allow_ext) 判斷 $ext變數的值 是否在 $allow_ext 這個陣列變數中
    if (!in_array($ext, $allow_ext)) {
        exit('檔案類型不符合，請選擇 jpeg, jpg, png, gif 檔案');
    }
      //搬移檔案
      $result = move_uploaded_file($tmp_name, $path.$file_name);
      // echo '<br>---------檔案傳送' . $result;
    
      if (file_exists($path.$file_name)) {
        //拷貝檔案
        $result = copy($path.$file_name, $path.$rand.$file_name);
        // echo '<br>---------檔案拷貝' . $result;
        //刪除檔案
        $result = unlink($path.$file_name);
        // echo '<br>---------檔案刪除' . $result;
      }
      // header('Location:newsCreate.php');
      echo "<script>alert('上傳成功!');window.location.href = ./news.php' </script>";
   
    } else {
      //這裡表示上傳有錯誤, 匹配錯誤編號顯示對應的訊息
      switch ($error) {
        case 1:  echo '上傳檔案超過 upload_max_filesize 容量最大值';  break;
        case 2:  echo '上傳檔案超過 post_max_size 總容量最大值';  break;
        case 3:  echo '檔案只有部份被上傳';  break;
        case 4:  echo '沒有檔案被上傳';  break;
        case 6:  echo '找不到主機端暫存檔案的目錄位置';  break;
        case 7:  echo '檔案寫入失敗';  break;
        case 8:  echo '上傳檔案被PHP程式中斷，表示主機端系統錯誤';  break;
      }
    }
    
    echo "<script>alert('新增成功!');window.location.href = './news.php' </script>";
}