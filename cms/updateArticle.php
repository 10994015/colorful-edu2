<?php
require_once('../config/conn.php');
session_start();
$focusNav = "NEWS";
if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $id = $_GET['id'];
        $sql_str = "SELECT * FROM news WHERE id = :id";
        $stmt = $conn->prepare($sql_str);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $row_RS_mb = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <title>編輯文章</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php'); ?>
    <main id="updateArticle">
        <div class="title"><span class="icon"><i class="fa-solid fa-file-lines"></i></span>Update article</div>
        <form action="./chk_updateArticle.php" class="updateArticleForm" method="POST" enctype="multipart/form-data">
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
                        <img src="../images/img_upload/<?php echo $row_RS_mb['imgsrc']; ?>" class="previewImg" id="previewImg">
                        <!-- <img src="" class="previewImg" id="previewImg"> -->
                        <label for="">
                            <p>文章標題</p>
                            <input type="text" name="title" placeholder="文章標題..." value="<?php echo $row_RS_mb['title']; ?>">
                        </label>
                        <label for="">
                            <p>文章內容</p>
                            <textarea name="content" placeholder="文章內容..." id="content"><?php echo $row_RS_mb['content']; ?></textarea>
                        </label>
                    </div>
                    <div class="advanced">
                        <h4>進階選項</h4>
                        <label for="">
                            <p>顯示至前台</p>
                            <input type="checkbox" name="isshow"  <?php if($row_RS_mb['isshow'] == 1){echo 'checked'; } ?>>
                        </label>
                        <label for="">
                            <p>焦點文章</p>
                            <input type="checkbox" name="focus" <?php if($row_RS_mb['focus'] == 1){echo 'checked'; } ?>>
                        </label>
                        <label for="">
                            <p>熱門文章</p>
                            <input type="checkbox" name="hot" <?php if($row_RS_mb['hot'] == 1){echo 'checked'; } ?>>
                        </label>
                        <label for="">
                            <p>選擇標籤</p>
                            <div class="articleType">
                                <div class="group"><input type="checkbox" id="typeCourse" name="course" <?php if($row_RS_mb['course'] == 1){echo 'checked'; } ?> ><label for="typeCourse"><i class="fa-solid fa-check"></i> 課程</label></div>
                                <div class="group"><input type="checkbox" id="typeDaily" name="daily" <?php if($row_RS_mb['daily'] == 1){echo 'checked'; } ?> ><label for="typeDaily"><i class="fa-solid fa-check"></i>日常</label> </div>
                                <div class="group"><input type="checkbox" id="typeTrain" name="train" <?php if($row_RS_mb['train'] == 1){echo 'checked'; } ?> ><label for="typeTrain"> <i class="fa-solid fa-check"></i>培訓</label></div>
                            </div>
                        </label>
                        <input type="submit" value="更新" id="updateArticleBtn">
                        
                    </div>
            </div>
           <input type="hidden" name="user" value="<?php echo $_SESSION['name'];  ?>">
           <input type="hidden" name="id" value="<?php echo $row_RS_mb['id'];  ?>">
        </form>
    </main>
<script src="../shared/ckeditor4/ckeditor.js"></script>
<script src="../js/cms/header.js"></script>
<script>
    const fileimgBtn = document.getElementById('fileimgBtn');
    const fileText = document.getElementById('fileText');
    const previewImg = document.getElementById('previewImg');
    fileimgBtn.addEventListener('change',()=>{
        if(fileimgBtn.value){
            fileText.innerHTML = fileimgBtn.value;
        }else{
            fileText.innerHTML = "目前使用圖片";
        }
        const file = fileimgBtn.files[0];
        const reader = new FileReader;
        reader.onload = function(e) {
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    CKEDITOR.replace('content',{
            extraplugins:'filebrowser',
            height:300,
            width:'100%',
            filebrowserUploadMethod:"form",
            filebrowserUploadUrl:"./ckeditor_upload.php"
        });
</script>
</body>
</html>