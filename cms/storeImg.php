<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "COOPERATION";
try{
    $sql_str = "SELECT * FROM store_img ORDER BY id DESC";
    $RS_img = $conn -> query($sql_str);
    $total_RS_img = $RS_img -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="cooperateImg">
        <div class="title"><span class="icon"><i class="fa-solid fa-people-group"></i></span>Cooperate</div>
        <div class="cooperateImgDiv">
        <a href="javascript:;" id="createCooperateBtn">新增圖片 <i class="fa-solid fa-plus"></i></a>
            <h4>特約廠商</h4>
            <div class="cooperateList">
                <?php foreach($RS_img as $item){ ?>
                <div class="cooperateItem">
                    <img src="../images/cooperate/<?php echo $item['imgsrc']; ?>">
                    <p>編輯者:<?php echo $item['user']; ?></p>
                    <p>上傳時間:<br><span><?php echo $item['lastdate']; ?></span></p>
                    <div class="btnBox">
                        <a href="javascript:;" class="delete" onclick="deleteFn(<?php echo $item['id']; ?>)" >刪除</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <a href="./cooperate.php" class="backPage"><i class="fa-solid fa-arrow-left-long"></i></a>
        <div id="createModule">
            <div class="module">
                <div class="header">
                    <p>新增圖片</p>
                    <i class="fas fa-times" id="closeModule"></i>
                </div>
                <form name="uploadForm" enctype="multipart/form-data" method="POST" action="./chk_storeImg.php">
                    <input type="file" name="upload_file[]" multiple hidden="hidden" id="fileimgBtn">
                    <label for="fileimgBtn" class="chooseFile"><i class="fa-solid fa-image"></i>選擇圖片</label>
                    <span id="fileText">尚未選擇圖片</span>
                    <input type="submit" value="確定上傳">
                </form>
            </div>
        </div>

        <?php include('./footer.php'); ?>
    </main>

    <script src="../js/cms/header.js"></script>
    <script>
        const fileimgBtn = document.getElementById('fileimgBtn');
        const fileText = document.getElementById('fileText');
        const createCooperateBtn = document.getElementById('createCooperateBtn');
        const createModule = document.getElementById('createModule');
        const closeModule = document.getElementById('closeModule');
        fileimgBtn.addEventListener('change',()=>{
            if(fileimgBtn.value){
                fileText.innerHTML = fileimgBtn.value;
            }else{
                fileText.innerHTML = "尚未選擇圖片";
            }
        });
        createCooperateBtn.addEventListener('click',()=>{
            createModule.style.display = "flex";
        });
        closeModule.addEventListener('click',()=>{
            createModule.style.display = "none";
        });
        function deleteFn(id){
            let chk = confirm('確定要刪除嗎?');
            if(chk){
                window.location.href = `./delete_storeImg.php?id=${id}`;
                return;
            }
        }
    </script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>