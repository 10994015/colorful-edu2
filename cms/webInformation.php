<?php
require_once('../config/conn.php');
session_start();
$focusNav = "CMS";
$sql_str = "SELECT * FROM web_information ORDER BY lastdate DESC";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_infor = $stmt -> fetch(PDO::FETCH_ASSOC);
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
    <main id="webInformation">
        <div class="title"><span class="icon"><i class="fa-solid fa-cube"></i></span>CMS</div>
        <div class="information">
            <h4>網站基本資訊</h4>
            <form action="./chk_createInformation.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="imgsrc"  id="fileimgBtn">
                <label for="">
                    <label for="fileimgBtn" class="chooseFile">
                        <i class="fa-solid fa-image"></i>LOGO上傳
                    </label>
                    <span id="fileText">尚未選擇圖片</span>
                </label>
                <img src="../images/cms/<?php echo $RS_infor['logo']; ?>" class="previewImg" id="previewImg">
                <label for="">
                    <p>LOGO文字(SEO用途):</p>
                    <input type="text" placeholder="Logo文字..." value="<?php echo $RS_infor['seo']; ?>" name="seo" id="seo">
                </label>
                <label for="">
                    <p>網站標題:</p>
                    <input type="text" placeholder="網站標題..." value="<?php echo $RS_infor['web_name']; ?>" name="title" id="title">
                </label>
                <label for="">
                    <p>網站簡介:</p>
                    <textarea name="intro" id="intro" cols="30" rows="10" placeholder="網站簡介"><?php echo $RS_infor['intro']; ?></textarea>
                </label>
                <input type="submit" value="送出" id="submit" hidden>
                <a href="javascript:;" id="send" onclick="sendFn()">送出</a>
            </form>
        </div>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
        const fileimgBtn = document.getElementById('fileimgBtn');
        const fileText = document.getElementById('fileText');
        const previewImg = document.getElementById('previewImg');
        fileimgBtn.addEventListener('change',()=>{
            if(fileimgBtn.value){
                fileText.innerHTML = fileimgBtn.value;
            }else{
                fileText.innerHTML = "尚未選擇圖片";
            }
            const file = fileimgBtn.files[0];
            const reader = new FileReader;
            reader.onload = function(e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);


        });
        const title = document.getElementById('title');
        const intro = document.getElementById('intro');
        const submit = document.getElementById('submit');
        function sendFn(){
            if(previewImg.src == ""){
                alert('尚未選擇圖片！');
                return;
            }
            if(title.value == ""){
                alert('標題不得為空！')
                return;
            }
            if(intro.value == ""){
                alert('網站簡介不得為空！')
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