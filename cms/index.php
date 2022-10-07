<?php
require_once('../config/conn.php');
session_start();
$focusNav = "CMS";
$levelArr  = ['10'=>'最高管理者', '9'=>'一般管理者']; 
try{
    $sql_str = "SELECT * FROM user";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> execute();
    $RS_user = $stmt -> fetchAll(PDO::FETCH_ASSOC);
 
 
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="index">
        <div class="title"><span class="icon"><i class="fa-solid fa-cube"></i></span>CMS</div>
        <div></div>
        <div class="userList">
            <?php if($_SESSION['level'] >= 10){ ?>
            <a href="javascript:;" id="createUserBtn">新增使用者 <i class="fa-solid fa-plus"></i></a>
            <?php } ?>
            <h4>使用者列表</h4>
            <div class="userItem userItemTitle">
                <strong class="img"">頭像</strong>  
                <strong class="username"">帳號</strong>  
                <strong class="name">使用者名稱</strong>
                <strong class="lastdate">最後上線時間</strong>
                <strong class="level">權限</strong>
                <strong class="active">活動紀錄</strong>
                <strong class="update">編輯</strong>
                <strong class="delete">刪除</strong>
            </div>
            <?php foreach($RS_user as $item){ ?>
            <div class="userItem">
                <strong class="img"> <img src="../images/cms/<?php echo $item['imgsrc']; ?>" alt=""></strong>  
                <strong class="username"> <span><?php echo $item['username']; ?></span></strong>  
                <strong class="name"><span><?php echo $item['name']; ?></span></strong>
                <strong class="lastdate"><span><?php echo $item['lastdate']; ?></span></strong>
                <strong class="level"><?php echo $levelArr[$item['level']]; ?></strong>
                <strong class="active"><a href="javascript:;" class="activeBtn">活動紀錄</a></strong>
                <strong class="update"><a href="javascript:;">編輯</a></strong>
                <strong class="delete"><a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a></strong>
            </div>
            <?php } ?>
        </div>

        <div id="createUser">
            <form action="./chk_createUser.php" method="post" enctype="multipart/form-data">
                <div class="header"> <p>新增使用者</p> <i class="fas fa-times" id="closeCreateUser"></i> </div>
                <input type="file" name="imgsrc"  id="fileimgBtn">
                <label for="">
                    <label for="fileimgBtn" class="chooseFile">
                        <i class="fa-solid fa-image"></i>選擇頭像
                    </label>
                    <span id="fileText">尚未選擇圖片</span>
                </label>
                <img src="" class="previewImg" id="previewImg">
                <label for="">請輸入帳號:<input type="text" name="username" id="create_username"></label>
                <label for="">請輸入密碼:<input type="text" name="password" id="create_password"></label>
                <label for="">請輸入管理者姓名:<input type="text" name="name" id="create_name"></label>
                <select name="level"" id="" >
                    <option value="0" disabled>選擇權限</option>
                    <option value="9">管理者</option>
                    <option value="10">最高管理者</option>
                </select>
                <input type="submit" value="新增" hidden id="formUserBtn">
                <a href="javascript:;" class="createBtn" onclick="postUserData()">新增使用者 </a>
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

    const createUserBtn = document.getElementById('createUserBtn');
    const createUser = document.getElementById('createUser');
    let isOpenCreateUser = false;
    const closeCreateUser = document.getElementById('closeCreateUser');
    createUserBtn.addEventListener('click',()=>{
        isOpenCreateUser = true;
        chkOpenCreateUser();
    });
    closeCreateUser.addEventListener('click',()=>{
        isOpenCreateUser = false;
        chkOpenCreateUser();
    })
    function chkOpenCreateUser(){
        if(isOpenCreateUser){
            createUser.style.display = "flex";
        }else{
            createUser.style.display = "none";
        }
    }
    const create_username = document.getElementById('create_username');
    const create_password = document.getElementById('create_password');
    const create_name = document.getElementById('create_name');
    const formUserBtn = document.getElementById('formUserBtn');
    function postUserData(){
        if(create_username.value == ""){
            alert('請輸入帳號!');
            return;
        }
        if(create_password.value == ""){
            alert('請輸入帳號!');
            return;
        }
        if(create_name.value == ""){
            alert('請輸入帳號!');
            return;
        }

        formUserBtn.click();

    }

    function deleteFn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk) {
            window.location.href = `./deleteUser.php?id=${id}`;
            alert('刪除成功!');
        }
    }
</script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>