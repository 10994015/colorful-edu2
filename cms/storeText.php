<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "COOPERATION";
try{
    $sql_str = "SELECT * FROM store_text ORDER BY id DESC";
    $RS_text = $conn -> query($sql_str);
    $total_RS_text = $RS_text -> rowCount();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="storeText">
        <div class="title"><span class="icon"><i class="fa-solid fa-people-group"></i></span>Cooperate</div>
        <div class="storeTextDiv">
            <a href="javascript:;" id="createStoreBtn">新增廠商<i class="fa-solid fa-plus"></i></a>
            <h4>特約廠商</h4>
            <div class="storeItem">
                <strong class="name">廠商名稱</strong>
                <strong class="user">上傳者</strong>
                <strong class="date">上傳時間</strong>
                <strong class="delete">編輯或刪除</strong>
            </div>
            <?php foreach($RS_text as $item){ ?>
            <div class="storeItem">
                <strong class="name"><span><?php echo $item['name']; ?></span></strong>
                <strong class="user"><span><?php echo $item['user']; ?></span></strong>
                <strong class="date"><span><?php echo $item['lastdate']; ?></span></strong>
                <strong class="delete">
                    <a href="javascript:;" onclick="updateFn(<?php echo $item['id']; ?>,'<?php echo $item['name']; ?>')" class="update">編輯</a>
                    <a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)" class="delete">刪除</a>
                </strong>
            </div>
            <?php } ?>
        </div>
        <a href="./cooperate.php" class="backPage"><i class="fa-solid fa-arrow-left-long"></i></a>
        <div id="storeModule">
            <div class="module">
                <div class="header">
                    <p>新增廠商</p>
                    <i class="fas fa-times" id="closeModule"></i>
                </div>
                <div class="content">
                    <div id="textBox">
                        <input type="text" placeholder="廠商名稱..." class="name" />
                    </div>
                    <button id="addBtn">+</button>
                    <input type="submit" id="create" value="新增" / >
                </div>
            </div>
        </div>
        
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
    <script src="../js/cms/header.js"></script>
    <script>
        const name = document.getElementsByClassName('name');
        const create = document.getElementById('create');
        const addBtn = document.getElementById('addBtn');
        let nameArr = [];
        const createStoreBtn = document.getElementById('createStoreBtn');
        const storeModule = document.getElementById('storeModule');
        const closeModule = document.getElementById('closeModule');
        
        createStoreBtn.addEventListener('click',()=>{
            storeModule.style.display = "flex";
        })
        closeModule.addEventListener('click',()=>{
            storeModule.style.display = "none";
        })
        create.addEventListener('click',()=>{
            for(let i=0;i<name.length;i++){
                nameArr.push(name[i].value);
            }
            console.log(nameArr);
            axionFn(nameArr);
        });

        addBtn.addEventListener('click',()=>{
            var str = document.createElement('input');
            // str.innerHTML = `<input type="text" class="name" placeholder="企業名稱...">`;
            str.setAttribute('class','name');
            str.setAttribute('type','text');
            str.setAttribute('placeholder','廠商名稱...');
            document.querySelector('#textBox').appendChild(str);
        });

        function axionFn(nameArr){
            var params = new URLSearchParams()
            params.append('name',nameArr );
            axios.post('./chk_storeText.php',params).then(res=>{
                alert('新增成功!');
                window.location.reload();
            })
        }
        function deleteFn(id){
            let chk = confirm('確定要刪除嗎?');
            if(chk){
                window.location.href = `./dalete_stroeText.php?id=${id}`;
            }
        }
        
    </script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>