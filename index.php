<?php 
require_once('./config/conn.php');
$page = '';
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
    <meta name="description" content="新竹市冰芬美語文理短期補習班。位於新竹市東區的補習班，希望透過多元跨領域教學,及加強互動性與參與感,創造沈浸式教學環境,提升孩子對於學習的興趣!" />
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
    
    <script src="./js/script.js"></script>
    <script src="./js/header.js"></script>
    <script src="./js/toTop.js"></script>
</body>
</html>