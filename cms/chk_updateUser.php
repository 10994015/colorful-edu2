<?php
require_once('../config/conn.php');
session_start();
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');

if($_FILES['imgsrc']['name']!=""){
    if(isset($_POST['id']) && $_POST['id']!=""){
        try{
            $record_lastdate = date("Y-m-d H:i:s");
            $record_user = $_SESSION['username'];
            $record_type_name = "使用者資料";
            $record_action = "編輯";
            $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
            
            $stmt_record = $conn -> prepare($sql_record);
            $stmt_record -> bindParam(':record_user' ,$record_user);
            $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
            $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
            $stmt_record -> bindParam(':record_action' ,$record_action);
            $stmt_record -> execute();


            $rand = strval(rand(1000,1000000));
            $id = $_POST['id'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $level = $_POST['level'];

            $file      = $_FILES['imgsrc'];      
            $file_name = $file['name'];              
            $file_type = $file['type'];               
            $tmp_name  = $file['tmp_name'];            
            $file_size = $file['size'];                
            $error     = $file['error'];   
            $imgsrc = $rand.$file_name;

            $sql_str = "UPDATE user SET password=:password, name=:name, level=:level, imgsrc=:imgsrc WHERE id=:id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':id', $id);
            $stmt -> bindParam(':password', $password);
            $stmt -> bindParam(':name', $name);
            $stmt -> bindParam(':level', $level);
            $stmt -> bindParam(':imgsrc', $imgsrc);
            $stmt -> execute();

            $allow_ext = array('jpeg', 'jpg', 'png', 'gif','JPG','JPEG','PNG','GIF');
            //設定上傳位置
            $path = '../images/cms/';
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
            echo "<script>alert('修改成功!');window.location.href = './' </script>";
        }
        catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
}else{
    if(isset($_POST['id']) && $_POST['id']!=""){
        try{

            $record_lastdate = date("Y-m-d H:i:s");
            $record_user = $_SESSION['username'];
            $record_type_name = "使用者資料";
            $record_action = "編輯";
            $sql_record = "INSERT INTO record (user,lastdate,type_name,action) VALUES (:record_user,:record_lastdate,:record_type_name,:record_action)";
            
            $stmt_record = $conn -> prepare($sql_record);
            $stmt_record -> bindParam(':record_user' ,$record_user);
            $stmt_record -> bindParam(':record_type_name' ,$record_type_name);
            $stmt_record -> bindParam(':record_lastdate' ,$record_lastdate);
            $stmt_record -> bindParam(':record_action' ,$record_action);
            $stmt_record -> execute();

            $id = $_POST['id'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $level = $_POST['level'];

            $sql_str = "UPDATE user SET password=:password, name=:name, level=:level WHERE id=:id";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':id', $id);
            $stmt -> bindParam(':password', $password);
            $stmt -> bindParam(':name', $name);
            $stmt -> bindParam(':level', $level);

            $stmt -> execute();

            echo "<script>alert('修改成功!');window.location.href = './' </script>";

        }
        catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
}