<?php
require_once('../config/conn.php');
session_start();
$focusNav = "CMS";
$id = -1;
$id = $_GET['id'];
$sql_str = "SELECT * FROM pagebg WHERE id = :id";
$stmt = $conn -> prepare($sql_str);
$stmt -> bindParam('id', $id);
$stmt -> execute();
$RS_bg = $stmt -> fetch(PDO::FETCH_ASSOC);
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
            <h4>編輯封面圖</h4>
            <form action="./chk_updatePageBg.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="imgsrc"  id="fileimgBtn" >
                <label for="">
                    <label for="fileimgBtn" class="chooseFile">
                        <i class="fa-solid fa-image"></i>圖片上傳
                    </label>
                    <span id="fileText">尚未選擇圖片</span>
                </label>
                
                <img src="../images/cms/<?php echo $RS_bg['imgsrc']; ?>" class="previewImg" id="previewImg">
                <label for="">
                    <p>顯示封面</p>
                    <input type="checkbox" name="isshow" <?php if($RS_bg['isshow']==1){echo "checked";} ?>>
                </label>
                <input type="hidden" name="id" value="<?php echo $RS_bg['id']; ?>">
                <input type="hidden" name="isimg" value="<?php echo $RS_bg['imgsrc']; ?>" id="isimg">
                <input type="submit" value="送出" id="submit" hidden>
                <a href="javascript:;" id="send" onclick="sendFn()">送出</a>
            </form>
        </div>
        <a href="./pageBg.php" class="backPage"><i class="fa-solid fa-arrow-left-long"></i></a>
        
        <?php include('footer.php'); ?>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
        const fileimgBtn = document.getElementById('fileimgBtn');
        const fileText = document.getElementById('fileText');
        const previewImg = document.getElementById('previewImg');
        console.log(isimg.value);
        
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
        function sendFn(){
           document.getElementById('submit').click(); 
        }
    </script>
</body>
</html>
<?php }else{
    header('Location:./noPermission.php');
} ?>