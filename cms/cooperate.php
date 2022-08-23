<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "COOPERATE";
try{
    $sql_str = "SELECT * FROM news ORDER BY id DESC";
    $RS_news = $conn -> query($sql_str);
    $total_RS_news = $RS_news -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="cooperate">
        <div class="title"><span class="icon"><i class="fa-solid fa-people-group"></i></span>Cooperate</div>
        <div class="chooseDiv">
            <div class="chooseAdd">
                <h3>選擇管理頁面</h3>
                <p>Choose management page</p>
                <a href="./cooperateImg.php" class="btn1">企業合作圖片</a>
                <a href="./storeImg.php" class="btn2">特約廠商圖片</a>
                <a href="./storeText.php" class="btn3">特約廠商文字</a>
            </div>
        </div>
    </main>

    <script src="../js/cms/header.js"></script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>