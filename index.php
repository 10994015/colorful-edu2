<?php 
require_once('./config/conn.php');
$page = '';
if( isset($_GET['page']) && $_GET['page']!='' ){
  $page =$_GET['page'];
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon" / >
    <meta name="description" content="新竹市私立冰芬美語文理短期補習班。位於新竹市東區的冰芬美語，幫助您進行課程規劃、人才培育與場地租借的服務，一起加入冰芬美語!" />
    <title>冰芬文教</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
</head>
<body>
    <h1 class="hidden">新竹市補習班</h1>
    <h2 class="hidden">新竹市私立美語補習班</h2>
    <h2 class="hidden">新竹市安親班</h2>
    <?php include_once('./shared/header.php'); ?>
    

    <main>
      <?php
        if($page==''){
          include('./webpage/index_content.php');
        }else{
          include('./webpage/'.$page.'.php');
        }
      ?>
    </main>

    <?php include_once('./shared/footer.php'); ?>
    
    <script src="./js/script.js"></script>
    <script src="./js/header.js"></script>
    <style>
      .hidden{
        position: absolute;
        top: -99999999999999px;
        left:-99999999999999px;
        opacity: 0;
        z-index: -999999999999;
      }
    </style>
</body>
</html>