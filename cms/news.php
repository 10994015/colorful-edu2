<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "NEWS";
try{
    $sql_str = "SELECT * FROM news ORDER BY lastdate DESC";
    $RS_news = $conn -> query($sql_str);
    $total_RS_news = $RS_news -> rowCount();
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
    <main id="news">
        <div class="title"><span class="icon"><i class="fa-solid fa-file-lines"></i></span>News</div>
        <div class="newsList">
            <a href="./createArticle.php" id="createArticleBtn">新增文章 <i class="fa-solid fa-plus"></i></a>
            <h4>文章列表</h4>
            <div class="newsItem newsItemTitle">
                <strong class="title">標題</strong>  
                <strong class="content">文章內容</strong>
                <strong class="latest-update">最後更新時間</strong>
                <strong class="user">編輯者</strong>
                <strong class="focus">焦點</strong>
                <strong class="update">編輯</strong>
                <strong class="delete">刪除</strong>
            </div>
            <?php foreach($RS_news as $item){ ?>
            <div class="newsItem">
                <strong class="title"> <img src="../images/img_upload/<?php echo $item['imgsrc']; ?>"> <span><?php echo $item['title']; ?></span></strong>  
                <strong class="content"><span><?php echo $item['content']; ?></span></strong>
                <strong class="latest-update"><span><?php echo $item['lastdate']; ?></span></strong>
                <strong class="user"><?php echo $item['user']; ?></strong>
                <strong class="focus"><input type="hidden" class="focusId" value="<?php echo $item['id']; ?>"><input type="radio" name="focusBtn" class="focusBtn" <?php if($item['focus']=='1'){echo 'checked';} ?> /></strong>
                <strong class="update"><a href="./updateArticle.php?id=<?php echo $item['id']; ?>">編輯</a></strong>
                <strong class="delete"><a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a></strong>
            </div>
            <?php } ?>
        </div>
       
    </main>

<script src="../js/cms/header.js"></script>
   
<script>
    const focusBtn = document.getElementsByClassName('focusBtn');

    for(let i=0;i<focusBtn.length;i++){
        focusBtn[i].addEventListener('change',focusFn);
    }
    function deleteFn(id){
        let chk = confirm('確定要刪除嗎?');
        if(chk){
            window.location.href = `./delete_news.php?id=${id}`;
            return;
        }
    }
    function focusFn(e){
        // console.log(123);
        
        let params = new URLSearchParams()
        let focusId = e.target.parentNode.getElementsByClassName('focusId')[0].value;
        params.append('focusId',focusId );
        axios.post('./update_newsFocus.php',params).then(res=>{
            alert('更新成功!');
            window.location.reload();
        })
    }
</script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>