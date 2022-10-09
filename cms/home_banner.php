<?php
require_once('../config/conn.php');
session_start();
$focusNav = "HOME";
try{
    $sql_str = "SELECT * FROM home_banner ORDER BY sort ASC";
    $RS_banner = $conn -> query($sql_str);
    $RS_banner2 = $conn -> query($sql_str);
    $RS_banner3 = $conn -> query($sql_str);
    $total_RS_banner = $RS_banner -> rowCount();
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
 </head>
 <body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="home_banner">
        <div class="title"><span class="icon"><i class="fa-solid fa-house"></i></span>Home Banner</div>
        <div class="bannerList">
            <a href="./createHomeBanner.php" id="createBannerBtn">新增圖片 <i class="fa-solid fa-plus"></i></a>
            <a href="javascript:;"" id="updateSortBtn">編輯排序</a>
            <h4>圖片列表</h4>
            <div class="bannerItem bannerItemTitle">
                <strong class="img">圖片</strong>  
                <strong class="seo">SEO文字</strong>  
                <strong class="latest-update">最後更新時間</strong>
                <strong class="user">編輯者</strong>
                <strong class="sort">排序</strong>
                <strong class="update">編輯</strong>
                <strong class="delete">刪除</strong>
            </div>
            <?php foreach($RS_banner as $item){ ?>
            <div class="bannerItem">
                <strong class="img"><img src="../images/img_upload/<?php echo $item['imgsrc']; ?>"></strong>  
                <strong class="seo"><?php echo $item['seo']; ?></strong>  
                <strong class="latest-update"><?php echo $item['lastdate']; ?></strong>
                <strong class="user"><?php echo $item['user']; ?></strong>
                <strong class="sort"><?php echo $item['sort']; ?></strong>
                <strong class="update"><a href="./update_home_banner.php?id=<?php echo $item['id']; ?>">編輯</a></strong>
                <strong class="delete"><a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a></strong>
            </div>
            <?php } ?>
        </div>


        <div class="sortModule" id="sortModule">
            <div class="module">
                <div class="header">編輯排序 <i class="fas fa-times" id="closeSortModule"></i> </div>
                <form action="./update_banner_sort.php" method="post" class="content" id="sortForm" >
                    
                    <div id="sortContent">
                        <?php foreach($RS_banner2 as $key => $item){ ?>
                            <div class="item">
                                <p> <i class="fas fa-bars"></i> </p>
                                <img src="../images/img_upload/<?php echo $item['imgsrc']; ?>" class="sortContentImg" id="homeBannerId<?php echo $item['id']; ?>">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="sortNumber">
                    <?php foreach($RS_banner3 as $key => $item){ ?>
                            <div class="item">
                                 <p>Sort:<?php echo $key +1 ; ?></p>
                            </div>
                        <?php } ?> 
                    </div>
                    <input type="hidden" name="sortId" id="sortId">
                    <div id="sortFormHidden"></div>
                    <input type="submit" value="更新" id="updateSortSendBtn" onclick="updateSortFn()" name="sortChk">
                </form>
            </div>
        </div>

        <?php include('./footer.php'); ?>
    </main>

    <script src="https://sortablejs.github.io/Sortable/Sortable.js"></script>
    <script src="../js/cms/header.js"></script>
    <script>
        const sortContent = document.getElementById('sortContent');
        const updateSortBtn = document.getElementById('updateSortBtn');
        const sortModule  = document.getElementById('sortModule');
        const closeSortModule = document.getElementById('closeSortModule');
        let sortArray = [];
        new Sortable(sortContent,{
            animation:200,
        })
        const sortModuleNumber = document.getElementsByClassName('sortModuleNumber');
        for(let i=0; i<sortModuleNumber.length;i++){
            sortModuleNumber[i].innerHTML = i+1;
        }

        updateSortBtn.addEventListener('click',()=>{
            sortModule.style.display = "block";
        })
        closeSortModule.addEventListener('click',()=>{
            sortModule.style.display = "none";
        })
        
        function updateSortFn(){
            sortArray = [];
            let hiddenHtml = "";
            const sortContentImg = sortContent.getElementsByClassName('sortContentImg');
            // console.log(sortContentImg[0]);
            for(let i=0;i<sortContentImg.length;i++){
                sortArray.push({id:sortContentImg[i].id.split('Id')[1] , sort:i+1});
            }
            let sortIdArr = [];
            sortArray.forEach(item=>{
                sortIdArr.push(item.id);
            })
            document.getElementById('sortId').value = sortIdArr.toString();
            hiddenHtml += ` <input type='hidden' name='bannerLength' value='${sortArray.length}'> `;
            // console.log(hiddenHtml);
            document.getElementById('sortFormHidden').innerHTML = hiddenHtml;
            // console.log(sortArray);
            
            
        }
       function deleteFn(id){
            let chk = confirm('確定要刪除嗎?');
            if(chk){
                window.location.href = `./delete_home_banner.php?id=${id}`;
                return;
            }
        }

    
    </script>
 </body>
 </html>

 
<?php }else{
    header('Location:./noPermission.php');
} ?>