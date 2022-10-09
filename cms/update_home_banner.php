<?php
require_once('../config/conn.php');
session_start();
$focusNav = "HOME";
if(isset($_SESSION['username'])){
    if(isset($_GET['id']) && $_GET['id'] != ""){
        try{
            $id = $_GET['id'];
            $sql_str = "SELECT * FROM home_banner WHERE id = :id";
            $stmt = $conn->prepare($sql_str);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $row_RS_banner = $stmt->fetch(PDO::FETCH_ASSOC);
        }catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>編輯Banner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php'); ?>
    <main id="update_home_banner">
        <div class="title"><span class="icon"><i class="fa-solid fa-file-lines"></i></span>Update banner</div>
        <form action="./chk_update_home_banner.php" class="updateBannerForm" method="POST" enctype="multipart/form-data">
            <div class="formContent">
            <div class="basic">
                <h4>編輯文章</h4>
                <input type="file" name="imgsrc"  id="fileimgBtn">
                
                <label for="">
                    <label for="fileimgBtn" class="chooseFile">
                        <i class="fa-solid fa-image"></i>選擇封面照
                    </label>
                    <span id="fileText">目前使用圖片</span>
                </label>
                <img src="../images/img_upload/<?php echo $row_RS_banner['imgsrc']; ?>" class="previewImg" id="previewImg">
                <!-- <img src="" class="previewImg" id="previewImg"> -->
                <label for="">
                    <p>圖片連結(無連結請空白)</p>
                    <?php if($row_RS_banner['link'] == "javascript:;"){ ?>
                        <input type="text" name="title" placeholder="圖片連結..." value="">
                    <?php }else{ ?>
                        <input type="text" name="title" placeholder="圖片連結..." value="<?php $row_RS_banner['link']; ?>">
                    <?php } ?>
                </label>
            </div>
            <div class="advanced">
                <h4>進階選項</h4>
                <label for="">
                    <p>顯示至前台</p>
                    <input type="checkbox" name="isshow"  <?php if($row_RS_banner['isshow'] == 1){echo 'checked'; } ?>>
                </label>
                <label for="">
                    <p>SEO文字(選填)</p>
                    <input type="text" name="seo" value="<?php echo $row_RS_banner['seo']; ?>">
                </label>
                <input type="hidden" name="id" value="<?php echo $row_RS_banner['id']; ?>">
                <input type="submit" value="更新" id="updateBannerBtn">
                
            </div>
            </div>
        </form>

        <?php include('./footer.php'); ?>
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