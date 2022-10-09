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
    <input type="hidden" value="<?php echo $_SESSION['username']; ?>" id="account">
    <?php include_once('./header.php');  ?>
    <main id="index">
        <div class="title"><span class="icon"><i class="fa-solid fa-cube"></i></span>CMS</div>
        <div class="webInformationList">
            <div class="webInformation"></div>
            <div class="header"></div>
            <div class="footer"></div>
        </div>
        <div class="webInformations">
            <div class="webData">
                <h3>網頁基本資料</h3>
                <p>LOGO、網站名稱、頁面...</p>
                <a href="javascript:;">前往編輯</a>
            </div>
            <div class="webFooter">
                <h3>網頁Footer設定</h3>
                <p>Footer文字、聯絡資訊...</p>
                <a href="javascript:;">前往編輯</a>
            </div>
            <div class="webColor">
                <h3>網頁顏色設定</h3>
                <p>網站主顏色...</p>
                <a href="javascript:;">前往編輯</a>
            </div>
        </div>
        <div class="userList">
            <?php if($_SESSION['level'] >= 10){ ?>
            <a href="javascript:;" id="createUserBtn">新增管理者 <i class="fa-solid fa-plus"></i></a>
            <?php } ?>
            <h4>使用者列表</h4>
            <div class="userItem userItemTitle">
                <?php  if($_SESSION['level'] < 10){ ?>
                    <strong class="img notTop">頭像</strong>  
                    <strong class="username notTop">帳號</strong>  
                    <strong class="name notTop">使用者名稱</strong>
                    <strong class="lastdate notTop">最後上線時間</strong>
                    <strong class="level notTop">權限</strong>
                <?php }else{ ?>
                    <strong class="img">頭像</strong>  
                    <strong class="username">帳號</strong>  
                    <strong class="name">使用者名稱</strong>
                    <strong class="lastdate">最後上線時間</strong>
                    <strong class="level">權限</strong>
                <?php } ?>
                <?php if($_SESSION['level'] >=10){ ?>
                    <strong class="active">活動紀錄</strong>
                    <strong class="update">查詢</strong>
                <?php } ?>
            </div>
            <?php foreach($RS_user as $item){ if($_SESSION['level'] >= $item['level']){ ?>
                
            <div class="userItem">
                <?php  if($_SESSION['level'] < 10){ ?>
                    <strong class="img notTop"> <img src="../images/cms/<?php echo $item['imgsrc']; ?>" alt=""></strong>  
                    <strong class="username notTop"> <span><?php echo $item['username']; ?></span></strong>  
                    <strong class="name notTop"><span><?php echo $item['name']; ?></span></strong>
                    <strong class="lastdate notTop"><span><?php echo $item['lastdate']; ?></span></strong>
                    <strong class="level notTop"><?php echo $levelArr[$item['level']]; ?></strong>
                <?php } else{ ?>
                    <strong class="img"> <img src="../images/cms/<?php echo $item['imgsrc']; ?>" alt=""></strong>  
                    <strong class="username"> <span><?php echo $item['username']; ?></span></strong>  
                    <strong class="name"><span><?php echo $item['name']; ?></span></strong>
                    <strong class="lastdate"><span><?php echo $item['lastdate']; ?></span></strong>
                    <strong class="level"><?php echo $levelArr[$item['level']]; ?></strong>
                <?php } ?>
                <?php if($_SESSION['level'] >=10){ ?>
                    <strong class="active"><a href="./activtiy.php?user=<?php echo $item['username']; ?>" class="activeBtn">活動紀錄</a></strong>
                    <strong class="update"><a href="javascript:;" onclick="updateUserFn(<?php echo $item['id']; ?>)">查詢</a></strong>
                <?php } ?>
            </div>
            <?php } } ?>
        </div>
        <?php if($_SESSION['level'] >= 10){ ?>
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
            <div id="updateUser">
                <form action="./chk_updateUser.php" method="post" enctype="multipart/form-data">
                    <div class="header"> <p>編輯</p> <i class="fas fa-times" id="closeUpdateUser"></i> </div>
                    <input type="file" name="imgsrc"  id="fileimgBtn_update">
                    <label for="">
                        <label for="fileimgBtn_update" class="chooseFile">
                            <i class="fa-solid fa-image"></i>選擇頭像
                        </label>
                        <span id="fileText_update">尚未選擇圖片</span>
                    </label>
                    <img src="" class="previewImg" id="previewImg_update">
                    <!-- <label for="">請輸入帳號:<input type="text" name="username" id="create_username"></label> -->
                    <label for="">更改密碼:<input type="text" name="password" id="update_password"></label>
                    <label for="">更改姓名:<input type="text" name="name" id="update_name"></label>
                    <select name="level"" id="update_level" >
                        <option value="9" class="update_option">管理者</option>
                        <option value="10" class="update_option">最高管理者</option>
                    </select>
                    <input type="submit" value="新增" hidden id="formUserBtn_update">
                    <input type="hidden" value="" name="id" id="update_id">
                    <a href="javascript:;" class="createBtn" onclick="postUpdateUserData()">編輯使用者 </a>
                </form>
            </div>
            <div id="chkUser">
                <div class="inputPwd">
                    <div class="header"> <p>資料驗證</p> <i class="fas fa-times" id="closeChkUser"></i></div>
                    <h3>請先輸入您的密碼</h3>
                    <p>Please enter your password first.</p>
                    <input type="password" placeholder="請輸入密碼..." id="chkpwd">
                    <input type="hidden" id="chkId">
                    <input type="hidden" value="" id="operate">
                    <button id="chkUserBtn" onclick="chkAccountFn('<?php echo $_SESSION['username']; ?>')">確認</button>
                </div>
            </div>
        <?php } ?>

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


    const chkUser = document.getElementById('chkUser');
    const chkUserBtn = document.getElementById('chkUserBtn');
    const closeChkUser = document.getElementById('closeChkUser');
    const operate = document.getElementById('operate');
    closeChkUser.addEventListener('click',()=>{
        chkUser.style.display = "none";
    })
    chkpwd.addEventListener('keyup',(e)=>{
        if(e.keyCode == 13){
            chkAccountFn(`${document.getElementById('account').value}`);
        }
    })
     function chkAccountFn(username){
        let params = new URLSearchParams()
        let chkpwd = document.getElementById('chkpwd').value;
        params.append('username',username );
        params.append('password',chkpwd );
         axios.post('./chkAccount.php',params).then(res=>{
            if(res.data.chk == 1){
                chkUser.style.display = "none";
                if(operate.value == "create"){
                    createUser.style.display = "flex";
                }
                if(operate.value == "update"){
                    openUpdateFn(chkId.value);
                }
                operate.value = "";
            }
            else{
                alert('密碼輸入錯誤!');
            }
            // let chkAccountCode = res.data;
        })
        
        
    }
    
    const createUserBtn = document.getElementById('createUserBtn');
    const createUser = document.getElementById('createUser');
    let isOpenCreateUser = false;
    const closeCreateUser = document.getElementById('closeCreateUser');
    createUserBtn.addEventListener('click',()=>{
        chkUser.style.display = "flex";
        operate.value = "create";
        chkpwd.value = "";
        // createUser.style.display = "flex";
    });
    closeCreateUser.addEventListener('click',()=>{
        createUser.style.display = "none";
    })
   
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
            alert('請輸入密碼!');
            return;
        }
        if(create_name.value == ""){
            alert('請輸入姓名!');
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
    const updateUser = document.getElementById('updateUser');
    let isOpenUpdateUser = false;
    const closeUpdateUser = document.getElementById('closeUpdateUser');
    const update_password = document.getElementById('update_password');
    const update_name = document.getElementById('update_name');
    const update_option = document.getElementById('update_level').getElementsByClassName('update_option');
    const update_id = document.getElementById('update_id');
    let userData = {}
    function updateUserFn(id){
        isOpenUpdateUser = true;
        if(isOpenUpdateUser){
            chkUser.style.display = "flex";
            chkpwd.value = "";
            chkId.value  = id ;
            operate.value = "update";
            
            
        }else{
            chkUser.style.display = "none";
        }
    }
    closeUpdateUser.addEventListener('click',()=>{
        isOpenUpdateUser = false;
        if(!isOpenUpdateUser){
            updateUser.style.display = "none";
        }
    })
    function openUpdateFn(id){
        updateUser.style.display = "flex";
        axios.get(`./selectUser.php?id=${id}`).then(res=>{
            userData = res.data;
            update_password.value = userData.password;
            update_name.value = userData.name;
            update_id.value = userData.id;
            previewImg_update.src = `../images/cms/${userData.imgsrc}`;
            for(let i=0;i<update_option.length;i++){
                if(update_option[i].value == userData.level){
                    update_option[i].selected="selected";
                }
            }
        })
    }
    function postUpdateUserData(){
        if(update_password.value == ""){
            alert('密碼不得為空!');
            return;
        }
        if(update_name.value == ""){
            alert('姓名不得為空!');
            return;
        }
        formUserBtn_update.click();
    }

    const fileimgBtn_update = document.getElementById('fileimgBtn_update');
    const fileText_update = document.getElementById('fileText_update');
    const previewImg_update = document.getElementById('previewImg_update');
    fileimgBtn_update.addEventListener('change',()=>{
        if(fileimgBtn_update.value){
            fileText_update.innerHTML = fileimgBtn_update.value;
        }else{
            fileText_update.innerHTML = "尚未選擇圖片";
        }
        const file_update = fileimgBtn_update.files[0];
        const reader_update = new FileReader;
        reader_update.onload = function(e) {
            previewImg_update.src = e.target.result;
        };
        reader_update.readAsDataURL(file_update);
    });
</script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>