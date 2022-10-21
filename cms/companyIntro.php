<?php
require_once('../config/conn.php');
session_start();
$focusNav = "ABOUT";
$sql_str = "SELECT * FROM about ORDER BY lastdate DESC";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_about = $stmt -> fetch(PDO::FETCH_ASSOC);
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
    <main id="companyIntro">
        <div class="title"><span class="icon"><i class="fa-solid fa-address-card"></i></span>ABOUT</div>
        <div class="information">
            <h4>公司介紹</h4>
            <form action="./chk_createCompanyIntro.php" method="POST">
                <label for="">
                    <p>公司簡介:</p>
                    <textarea name="intro" cols="30" rows="10" id="intro"><?php echo $RS_about['intro']; ?></textarea>
                </label>
                <label for="">
                    <p>服務內容說明:</p>
                    <textarea name="service" cols="30" rows="10" id="service"><?php echo $RS_about['service']; ?></textarea>
                </label>
                <input type="submit" value="送出" id="submit" hidden>
                <a href="javascript:;" id="send" onclick="sendFn()">編輯</a>
            </form>
        </div>

        <?php include('footer.php'); ?>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
        const intro = document.getElementById('intro')
        const service = document.getElementById('service')
        const submit = document.getElementById('submit')
        function sendFn(){
            
            if(intro.value == ""){
                alert('公司簡介請勿空白！');
                return;
            }
            if(service.value == ""){
                alert('服務內容請勿空白！');
                return;
            }
            submit.click();
        }
    </script>
</body>
</html>
<?php }else{
    header('Location:./noPermission.php');
} ?>