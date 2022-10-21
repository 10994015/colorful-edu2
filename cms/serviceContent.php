<?php
require_once('../config/conn.php');
session_start();
$focusNav = "ABOUT";
$sql_str = "SELECT * FROM service ORDER BY lastdate DESC";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_service = $stmt -> fetchAll(PDO::FETCH_ASSOC);
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="ServiceContent">
        <div class="title"><span class="icon"><i class="fa-solid fa-address-card"></i></span>ABOUT</div>
        <div class="serviceList">
            <a href="./createService.php" id="createServiceBtn">新增服務 <i class="fa-solid fa-plus"></i></a>
            <h4>服務列表</h4>
            <div class="newsItem newsItemTitle">
                <strong class="title">服務名稱</strong>  
                <strong class="content">服務介紹</strong>
                <strong class="color">顏色</strong>
                <strong class="latest-update">最後更新時間</strong>
                <strong class="user">編輯者</strong>
                <strong class="update">編輯</strong>
                <strong class="delete">刪除</strong>
            </div>
            <?php foreach($RS_service as $item){ ?>
            <div class="newsItem">
                <strong class="title"><span><?php echo $item['title']; ?></span></strong>  
                <strong class="content"><span><?php echo $item['content']; ?></span></strong>
                <strong class="color"><span style="background:<?php echo $item['color']; ?>"></span></strong>
                <strong class="latest-update"><span><?php echo $item['lastdate']; ?></span></strong>
                <strong class="user"><?php echo $item['user']; ?></strong>
                <strong class="update"><a href="./updateService.php?id=<?php echo $item['id']; ?>">編輯</a></strong>
                <strong class="delete"><a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a></strong>
            </div>
            <?php } ?>
        </div>

        <?php include('footer.php'); ?>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
    function deleteFn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./deleteService.php?id=${id}`;
        }
    }
    </script>
</body>
</html>
<?php }else{
    header('Location:./noPermission.php');
} ?>