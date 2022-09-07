<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "NEWS";
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
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="createHomeBanner">
        <div class="title"><span class="icon"><i class="fa-solid fa-house"></i></span>Home Banner</div>
        <form action="./chk_createHomeBanner.php" class="createBannerForm" method="POST" enctype="multipart/form-data">
            <div class="formContent">
                <div class="basic">
                    <h4>新增圖片</h4>
                    <input type="file" name="imgsrc"  id="fileimgBtn">
                    
                    <label for="">
                        <label for="fileimgBtn" class="chooseFile">
                            <i class="fa-solid fa-image"></i>選擇封面照
                        </label>
                        <span id="fileText">尚未選擇圖片</span>
                    </label>
                    <!-- <img src="../images/004.png" class="previewImg"> -->
                    <img src="" class="previewImg" id="previewImg">
                    <label for="">
                        <p>圖片連結(無連結請空白)</p>
                        <input type="text" name="link"" placeholder="圖片連結..">
                    </label>
                </div>
                <div class="advanced">
                    <h4>進階選項</h4>
                    <label for="">
                        <p>顯示至前台</p>
                        <input type="checkbox" name="isshow" checked>
                    </label>
                    <label for="">
                        <p>SEO文字(選填)</p>
                        <input type="text" name="seo">
                    </label>
                    <input type="submit" value="發佈文章" id="createBannerBtn">
                    
                </div>
           </div>
        </form>
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

 
</script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>