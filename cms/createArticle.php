<?php require_once('../config/conn.php'); ?>
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
    <?php include_once('./header.php');  ?>
    <main id="createArticle">
        <div class="title"><span class="icon"><i class="fa-solid fa-file-lines"></i></span>Create article</div>
        <form action="./chk_createArticle.php" class="createArticleForm" method="POST">
           <div class="formContent">
            <div class="basic">
                    <h4>新增文章</h4>
                    <input type="file" name="imgsrc"  id="fileimgBtn">
                    
                    <label for="">
                        <label for="fileimgBtn" class="chooseFile">
                            <i class="fa-solid fa-image"></i>選擇封面照
                        </label>
                        <span id="fileText">尚未選擇圖片</span>
                    </label>
                
                    <label for="">
                        <p>文章標題</p>
                        <input type="text" name="title" placeholder="文章標題...">
                    </label>
                    <label for="">
                        <p>文章內容</p>
                        <textarea name="content" placeholder="文章內容..." id="content"></textarea>
                    </label>
                </div>
                <div class="advanced">
                    <h4>進階選項</h4>
                    <label for="">
                        <p>顯示至前台</p>
                        <input type="checkbox" name="isshow" checked>
                    </label>
                    <label for="">
                        <p>焦點文章</p>
                        <input type="checkbox" name="isshow" >
                    </label>
                    <label for="">
                        <p>熱門文章</p>
                        <input type="checkbox" name="isshow" checked>
                    </label>
                    <label for="">
                        <p>選擇標籤</p>
                        <div class="articleType">
                            <div class="group"><input type="checkbox" id="typeCourse" name="course"><label for="typeCourse"><i class="fa-solid fa-check"></i> 課程</label></div>
                            <div class="group"><input type="checkbox" id="typeDaily" name="daily"><label for="typeDaily"><i class="fa-solid fa-check"></i>日常</label> </div>
                            <div class="group"><input type="checkbox" id="typeTrain" name="train"><label for="typeTrain"> <i class="fa-solid fa-check"></i>培訓</label></div>
                        </div>
                    </label>
                </div>
           </div>
           <input type="submit" value="新增" id="createArticleBtn">
        </form>
    </main>
<script src="../shared/ckeditor4/ckeditor.js"></script>
<script src="../js/cms/header.js"></script>

<script>
const fileimgBtn = document.getElementById('fileimgBtn');
const fileText = document.getElementById('fileText');
fileimgBtn.addEventListener('change',()=>{
    if(fileimgBtn.value){
        fileText.innerHTML = fileimgBtn.value;
    }else{
        fileText.innerHTML = "尚未選擇圖片";
    }
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