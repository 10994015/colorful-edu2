<?php 
require_once('./config/conn.php');
$page = '';
$sql_str = "SELECT * FROM web_information ORDER BY lastdate DESC";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_infor = $stmt -> fetch(PDO::FETCH_ASSOC);

$sql_str = "SELECT * FROM web_contact ORDER BY lastdate DESC";
$stmt2 = $conn -> prepare($sql_str);
$stmt2 -> execute();
$RS_contact = $stmt2 -> fetch(PDO::FETCH_ASSOC);

$sql_str = "SELECT * FROM cooperate_img ORDER BY id DESC";
$cooperate_img = $conn -> query($sql_str);

$sql_str = "SELECT * FROM store_img ORDER BY id DESC";
$store_img = $conn -> query($sql_str);

$sql_str = "SELECT * FROM store_text ORDER BY id DESC";
$store_text = $conn -> query($sql_str);

$sql_str = "SELECT * FROM about ORDER BY id DESC";
$stmt_about = $conn->prepare($sql_str);
$stmt_about -> execute();
$RS_about =  $stmt_about->fetch(PDO::FETCH_ASSOC);

$sql_str = "SELECT * FROM service ORDER BY id ASC";
$RS_service = $conn -> query($sql_str);
if( isset($_GET['page']) && $_GET['page']!='' ){
  $page =$_GET['page'];
  $path = './webpage/'.$page.".php";
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" / >
    <meta name="description" content="<?php echo $RS_infor['intro']; ?>" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    </head>
<body>
    <?php include_once('./shared/header.php'); ?>
   
    <div id="toTop"><i class="fa-solid fa-chevron-up"></i></div>
    <main>
      <?php
        if($page==''){
          include('./webpage/index_content.php');
        }else{
          if(file_exists($path)){
            include('./webpage/'.$page.'.php');
          }else{
            include('./webpage/notfound.php');
            // header("Location:./webpage/notfound.php");
          }
        }
      ?>
    </main>

    <?php include_once('./shared/footer.php'); ?>
   
    <script src="./js/header.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/toTop.js"></script>
    <script src="./js/about.php"></script>
</body>
</html>