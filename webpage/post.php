<?php

if(isset($_GET['id']) && $_GET['id']!=""){
    try{
        $sql_str = "SELECT * FROM news WHERE id=:id";
        $id = $_GET['id'];
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(':id', $id);
        $stmt -> execute();
        $row_post = $stmt -> fetch(PDO::FETCH_ASSOC);
        $tag = "";
        if($row_post['course']==1){
            $sql_str_tag = "SELECT * FROM news WHERE course=1 and isshow=1  ORDER BY id DESC Limit 4";
        }elseif($row_post['daily']==1){
            $sql_str_tag = "SELECT * FROM news WHERE daily=1 and isshow=1  ORDER BY id DESC Limit 4";
        }elseif($row_post['train']==1){
            $sql_str_tag = "SELECT * FROM news WHERE train=1 and isshow=1  ORDER BY id DESC Limit 4";
        }else{
            $sql_str_tag = "SELECT * FROM news WHERE isshow=1 ORDER BY id DESC Limit 4";
        }
        
        $RS_tag = $conn -> query($sql_str_tag);
    }catch (PDOException $e ){
        die("ERROR!!!: ". $e->getMessage());
    }
}


?>

<div id="post">
    <div class="postContent">
        <h3 class="title"><?php echo $row_post['title']; ?></h3>
        <div class="date"> <i class="far fa-clock"></i> <span class="tailoffDate"><?php echo $row_post['lastdate']; ?></span></div>
        <img src="./images/img_upload/<?php echo $row_post['imgsrc']; ?>" alt="">
        <article class="content"><?php echo $row_post['content']; ?></article>
        <a href="./?page=news" class="comeback"><i class="fa-solid fa-arrow-left-long"></i></a>
    </div>
    <div class="sidebar">
        <h4 class="title">您可能會有興趣</h4>
        <div  class="newsList">
            <?php foreach($RS_tag as $item){ ?>
            <div href="##" class="newsItem">
                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="">
                <div class="hashtags">
                    <?php if($item['course']==1){ ?><a href="javascript:;"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                    <?php if($item['daily']==1){ ?><a href="javascript:;"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                    <?php if($item['train']==1){ ?><a href="javascript:;"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                </div>
                <h5><?php echo $item['title']; ?></h5>
                <div class="date"> <i class="far fa-clock"></i> <span class="tailoffDate"><?php echo $item['lastdate']; ?></span></div>
                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="seemore">READ MORE</a>
            </div>
            <?php } ?>
        </div>
    </div>

</div>

<head>
    <title><?php echo $row_post['title']; ?></title>
</head>