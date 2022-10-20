<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "COOPERATION";
try{
    $sql_str = "SELECT * FROM cooperate_img ORDER BY id DESC";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> execute();
    $RS_img = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    $total_RS_img = $stmt -> rowCount();
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
        <a href="javascript:;" id="createCooperateBtn">新增廠商 <i class="fa-solid fa-plus"></i></a>
            <h4>企業合作</h4>
            <div class="cooperateList">
                <?php foreach($RS_img as $item){ ?>
                <div class="cooperateItem">
                    <img src="../images/cooperate/<?php echo $item['imgsrc']; ?>">
                    <p>廠商:<?php echo $item['name']; ?></p>
                    <p>連結:<br><span><?php echo $item['url']; ?></span></p>
                    <p>編輯者:<?php echo $item['user']; ?></p>
                    <p>上次修改時間:<br><span><?php echo $item['lastdate']; ?></span></p>
                    <div class="btnBox">
                        <a href="javascript:;" class="update" onclick="updateFn(<?php echo $item['id']; ?>, '<?php echo $item['url']; ?>','<?php echo $item['name']; ?>')" >編輯</a>
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
                    <p>新增廠商</p>
                    <i class="fas fa-times" id="closeCreateModule"></i>
                </div>
                <form name="uploadForm" enctype="multipart/form-data" method="POST" action="./chk_cooperateImg.php">
                    <input type="file" name="imgsrc"  hidden="hidden" id="fileimgBtn">
                    <label for="fileimgBtn" class="chooseFile"><i class="fa-solid fa-image"></i>選擇封面照</label>
                    <span id="fileText">尚未選擇圖片</span>
                    <input type="text" placeholder="連結..." name="url" class="url" id="createURL">
                    <input type="text" placeholder="廠商名稱" name="name" class="url" id="createName">
                    <input type="submit" value="確定上傳" hidden id="createSubmit"> 
                    <a href="javascript:;" id="createSubmitBtn">確定上傳</a>
                </form>
            </div>
        </div>
        <div id="updateModule">
            <div class="module">
                <div class="header">
                    <p>編輯</p>
                    <i class="fas fa-times" id="closeUpdateModule"></i>
                </div>
                <form name="uploadForm" method="POST" action="update_cooperateImg.php">
                    <input type="text" placeholder="連結..." name="url" class="url" id="updateUrl">
                    <input type="text" placeholder="廠商名稱..." name="name" class="url" id="updateName">
                    <input type="hidden" name="id" value="" id="updateId">
                    <input type="submit" value="編輯" hidden id="updateSubmit">
                    <a href="javascript:;" id="updateSubmitBtn">編輯</a>
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
        const closeCreateModule = document.getElementById('closeCreateModule');
        const updateUrl = document.getElementById('updateUrl');
        const updateId = document.getElementById('updateId');
        const closeUpdateModule = document.getElementById('closeUpdateModule');
        const updateModule = document.getElementById('updateModule');
        const createSubmit = document.getElementById('createSubmit');
        const createSubmitBtn = document.getElementById('createSubmitBtn');
        const createName = document.getElementById('createName');
        const updateSubmitBtn = document.getElementById('updateSubmitBtn');
        const updateName = document.getElementById('updateName');
        const updateSubmit = document.getElementById('updateSubmit');
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
        closeCreateModule.addEventListener('click',()=>{
            createModule.style.display = "none";
        });
        function deleteFn(id){
            let chk = confirm('確定要刪除嗎?');
            if(chk){
                window.location.href = `./delete_cooperateImg.php?id=${id}`;
                return;
            }
        }
        closeUpdateModule.addEventListener('click',()=>{
            updateModule.style.display = "none";
            updateUrl.value = "";
            updateId.value = "";
        })
        function updateFn(id, url, name){
            updateModule.style.display = "flex";
            updateUrl.value = url;
            updateId.value = id;
            updateName.value = name;
        }
        createSubmitBtn.addEventListener('click',()=>{
            if(fileimgBtn.value == ""){
                alert('請選擇圖片！');
                return;
            }
            if(createName.value == ""){
                alert('請輸入廠商名稱！');
                return;
            }

            createSubmit.click();
        });
        updateSubmitBtn.addEventListener('click',()=>{
            if(updateName.value==""){
                alert('請輸入廠商名稱！')
                return;
            }
            updateSubmit.click();
        });
    </script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>