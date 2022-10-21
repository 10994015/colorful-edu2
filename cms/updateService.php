<?php
require_once('../config/conn.php');
session_start();
$focusNav = "ABOUT";
if(isset($_GET['id']) && $_GET['id']!=""){
    $id = $_GET['id'];
    $sql_str = "SELECT * FROM service WHERE id = :id";
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(":id", $id);
    $stmt -> execute();
    $RS_service = $stmt -> fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="../css/cms.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="createService">
        <div class="title"><span class="icon"><i class="fa-solid fa-address-card"></i></span>ABOUT</div>
        <div class="information">
            <h4>新增服務</h4>
            <form action="./chk_updateService.php" method="POST">
                <label for="">
                    <p>服務項目:</p>
                    <input type="text" name="title" placeholder="服務項目..." id="title" value="<?php echo $RS_service['title']; ?>">
                </label>
                <label for="">
                    <p>服務項目說明:</p>
                    <textarea name="content" cols="30" rows="10" id="content" placeholder="服務項目說明..."><?php echo $RS_service['content']; ?></textarea>
                </label>
                <label for="">
                    <p>Icon:</p>
                    <i class="<?php echo $RS_service['icon']; ?>" id="iconView"></i>
                    <a href="javascript:;" class="chooseIcon" id="chooseIcon">選擇Icon</a>
                    <input type="hidden" name="icon" id="iconData" value="<?php echo $RS_service['icon']; ?>">
                </label>
                <label for="">
                    <p>選擇標題顏色</p>
                    <input type="color" id="colorPicker" name="color" value="<?php echo $RS_service['color']; ?>">
                </label>
                <input type="hidden" name="id" value="<?php echo $RS_service['id']; ?>">
                <input type="submit" value="送出" id="submit" hidden>
                <a href="javascript:;" id="send" onclick="sendFn()">編輯</a>
            </form>
        </div>
        <div id="iconModule">
            <div class="module">
                <div class="header">選擇icon <i class="fas fa-times" id="closeModule"></i> </div>
                <div class="content" id="iconBox"><i class=''></i></div>
                <div class="btnDiv"> <a href="javascript:;" id="chkIconBtn">確認</a></div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
    <script src="../js/cms/header.js"></script>
    <script>
        const chooseIcon = document.getElementById('chooseIcon');
        const iconBox = document.getElementById('iconBox');
        let iconArr = [];
        let iconhtml = '';
        let iconName = ''
        const iconData = document.getElementById('iconData');
        const iconView = document.getElementById('iconView');
        const chkIconBtn = document.getElementById('chkIconBtn');
        const title = document.getElementById('title')
        const content = document.getElementById('content')
        const submit = document.getElementById('submit')
        chooseIcon.addEventListener('click',()=>{
            iconModule.style.display = "flex";
            iconhtml = "";
            axios.get('./json/icon.json').then(res=>{
                iconArr = res.data.icon;
                
                iconArr.forEach(item=>{
                    iconhtml += `<i class='${item}'></i>`;
                })
                iconBox.innerHTML = iconhtml;
                iconItem = document.getElementById('iconBox').querySelectorAll('i');
                for(let i=0;i<iconItem.length;i++){
                    iconItem[i].addEventListener('click',chkIconFn);
                }
                
            })
        });
        closeModule.addEventListener('click',()=>{
            iconModule.style.display = "none";
        });
        chkIconBtn.addEventListener('click',()=>{
            iconData.value = iconName;
            iconView.className = iconName;
            iconModule.style.display = "none";
        })
        function chkIconFn(e){
            iconName = e.target.className;
            for(let i=0;i<iconItem.length;i++){
                iconItem[i].style.border = "none";
            }
            e.target.style.border = "1px #FE7296 solid";
        }
        function sendFn(){
            if(title.value==""){
                alert('服務項目不得為空！');
                return;
            }
            if(content.value==""){
                alert('服務項目說明不得為空！');
                return;
            }
            if(iconData.value==""){
                alert('請選擇icon！');
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