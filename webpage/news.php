<?php 
if(isset($_GET['search']) && $_GET['search']!=""){
    $max_rows = 9;
}elseif(isset($_GET['tag']) && $_GET['tag']!=""){
    $max_rows = 9;
}
else{
    $max_rows = 7;
}
$total_rows = 0;
$total_pages = 0;
$curr_page = 0;

if(isset($_GET['curr_page'])){
    $curr_page = $_GET['curr_page'];
}



$first_row = $curr_page * $max_rows;
$last_row = $first_row + $max_rows - 1;

$sql_str = "SELECT * FROM news WHERE isshow=1 ORDER BY id DESC";
$RS_news_all = $conn -> query($sql_str);


$sql_str = "SELECT * FROM news WHERE focus =1 Limit 1";
$RS_focus_news = $conn -> query($sql_str);
$focus_total_rows = $RS_focus_news -> rowCount();


$total_rows = $RS_news_all -> rowCount();
$total_pages = ceil($total_rows / $max_rows);

if(isset($_GET['search']) && $_GET['search']!=""){
    $keyword = $_GET['search'];
    $sql_str = "SELECT * FROM news WHERE isshow=1 AND title LIKE '%$keyword%' LIMIT $first_row,$max_rows" ;
    $RS_news = $conn -> query($sql_str);
    $total_rows = $RS_news -> rowCount();
    $total_pages = ceil($total_rows / $max_rows);
}elseif(isset($_GET['tag']) && $_GET['tag']!=""){
    $tagText = $_GET['tag'];
    $tagWork = "";
    if($tagText == "course"){
        $tagWork = "課程";
        $sql_str = "SELECT * FROM news WHERE course=1 AND isshow=1 ORDER BY id DESC LIMIT $first_row,$max_rows" ;
    }elseif($tagText == "daily"){
        $tagWork = "日常";
        $sql_str = "SELECT * FROM news WHERE daily=1 AND isshow=1 ORDER BY id DESC LIMIT $first_row,$max_rows" ;
    }elseif($tagText == "train"){
        $tagWork = "培訓";
        $sql_str = "SELECT * FROM news WHERE train=1 AND isshow=1 ORDER BY id DESC LIMIT $first_row,$max_rows" ;
    }
    $RS_news = $conn -> query($sql_str);
    $total_rows = $RS_news -> rowCount();
    $total_pages = ceil($total_rows / $max_rows);
}else{
    $sql_str = "SELECT * FROM news WHERE focus=0 AND isshow=1 ORDER BY id DESC LIMIT $first_row,$max_rows";
    $RS_news = $conn -> query($sql_str);
}
if(!isset($_GET['curr_page']) || $_GET['curr_page']==0 ){
    $last_row = $last_row + 1;
}else{
    $first_row = $first_row + 1;
}


$sql_str = "SELECT * FROM news WHERE hot=1 AND isshow=1 ORDER BY id DESC Limit 3";
$RS_hot = $conn -> query($sql_str);

$sql_str = "SELECT * FROM news WHERE course=1 AND isshow=1 ORDER BY id DESC Limit 3";
$RS_course = $conn -> query($sql_str);

$sql_str = "SELECT * FROM news WHERE daily=1 AND isshow=1 ORDER BY id DESC Limit 3";
$RS_daily = $conn -> query($sql_str);

$sql_str = "SELECT * FROM news WHERE train=1 AND isshow=1 ORDER BY id DESC Limit 3";
$RS_train = $conn -> query($sql_str);

?>

<div id="newsPage">
    <div id="loading"><i class="fa-solid fa-spinner"></i></div>
    <div class="newsType">
        <a href="./?page=news" class="newsTypeBtn <?php if(!isset($_GET['tag'])){echo 'focus';} ?>">全部</a>
        <a href="./?page=news&tag=course" class="newsTypeBtn <?php if($_GET['tag']=='course'){echo 'focus';} ?>">課程</a>
        <a href="./?page=news&tag=daily" class="newsTypeBtn <?php if($_GET['tag']=='daily'){echo 'focus';} ?>">日常</a>
        <a href="./?page=news&tag=train" class="newsTypeBtn <?php if($_GET['tag']=='train'){echo 'focus';} ?>">培訓</a>
    </div>
    <div class="searchBox">
        <div class="keyword">
            <a href="javascript:;" class="searchText course">#課程</a>
            <a href="javascript:;" class="searchText daily">#日常</a>
            <a href="javascript:;" class="searchText train">#培訓</a>
        </div>
        <label for="">
            <input type="text" id="rwd_searchBar" placeholder="Search...">
            <button id="rwd_searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </label>
    </div>
    <div class="newsConent">
        <div class="newsList">
            <?php if(isset($_GET['search']) && $_GET['search']!=""){ ?>
                <h3>「<?php echo $keyword; ?>」的搜尋結果:共<?php echo $total_rows; ?>筆</h3>
            <?php } ?>
            <?php if(isset($_GET['tag']) && $_GET['tag']!=""){ ?>
                <h3>「#<?php echo $tagWork; ?>」分類:共<?php echo $total_rows; ?>筆</h3>
            <?php } ?>
            <?php 
            if(!isset($_GET['search'])){
                if(!isset($_GET['tag'])){
                    if( !isset($_GET['curr_page']) ||$_GET['curr_page']==0){
                    foreach($RS_focus_news as $item){ ?>
                        <div class="newsItem focusNews" >
                            <div class="imgBox">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="">
                            </div>
                            <div class="text-content">
                                    <div class="hashtags">
                                        <?php if($item['course']==1){ ?><a href="javascript:;"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                        <?php if($item['daily']==1){ ?><a href="javascript:;"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                        <?php if($item['train']==1){ ?><a href="javascript:;"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                    </div>
                                    <a href="javascript:;" class="news-title"><?php echo $item['title']; ?></a>
                                    <p class="newsText">
                                        <?php echo $item['title']; ?>
                                    </p>
                                    <div class="otherText">
                                        <p class="date"> <i class="far fa-clock"></i><span class="tailoffDate"><?php echo $item['lastdate']; ?></span></p>
                                        <a href="?page=post&id=<?php echo $item['id']; ?>" class="reading"> <span class="back"></span> <p>READ MORE<i class="fas fa-arrow-right"></i></p> </a>
                                    </div>
                                </div>
                        </div>
            <?php } } } }?>
            <?php foreach($RS_news as $item){ ?>
            <div class="newsItem otherNews">
                <div class="imgBox">
                    <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>">
                </div>
                <div class="text-content">
                        <div class="hashtags">
                            <?php if($item['course']==1){ ?><a href="javascript:;"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                            <?php if($item['daily']==1){ ?><a href="javascript:;"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                            <?php if($item['train']==1){ ?><a href="javascript:;"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                        </div>
                        <a href="javascript:;" class="news-title"><?php echo $item['title']; ?></a>
                        <div class="newsText">
                            <?php echo $item['content']; ?>
                        </div>
                        <div class="otherText">
                            <p class="date"> <i class="far fa-clock"></i> <span class="tailoffDate"><?php echo $item['lastdate']; ?></span></p>
                            <a href="?page=post&id=<?php echo $item['id']; ?>" class="reading"> <span class="back"></span> <p>READ MORE<i class="fas fa-arrow-right"></i></p> </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
            <?php include_once('./shared/pager.php'); ?>
        </div>

        <div class="sidebar">
            <div class="searchBox">
                <div class="keyword">
                    <a href="./?page=news&tag=couese" class="searchText course">#課程</a>
                    <a href="./?page=news&tag=daily" class="searchText daily">#日常</a>
                    <a href="./?page=news&tag=train" class="searchText train">#培訓</a>
                </div>
                <label for="">
                    <input type="text" id="searchBar" placeholder="Search...">
                    <button id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </label>
            </div>
            
            <div class="sidebarNews">
                <h4>熱門訊息</h4>
                <div class="newsCarousel">
                    <?php foreach($RS_hot as $item){ ?>
                        <a href="./?page=post&id=<?php echo $item['id']; ?>" class="newsItem">
                            <div class="imgBox hot">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>">
                            </div>
                            <div  class="text-content">
                                <h3 class="news-title"><?php echo $item['title']; ?></h3>
                                <span class="date"><i class="far fa-clock"></i><small class="tailoffDate"><?php echo $item['lastdate']; ?></small></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>課程</h4>
                <div class="newsCarousel">
                    <?php foreach($RS_course as $item){ ?>
                    <a href="./?page=post&id=<?php echo $item['id']; ?>" class="newsItem">
                        <div class="imgBox course">
                            <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="">
                        </div>
                        <div  class="text-content">
                            <h3 class="news-title"><?php echo $item['title']; ?></h3>
                            <span class="date"><i class="far fa-clock"></i><small class="tailoffDate"><?php echo $item['lastdate']; ?></small></span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>日常</h4>
                <div class="newsCarousel">
                    <?php foreach($RS_daily as $item){ ?>
                        <a href="./?page=post&id=<?php echo $item['id']; ?>" class="newsItem">
                            <div class="imgBox daily">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="">
                            </div>
                            <div  class="text-content">
                                <h3 class="news-title"><?php echo $item['title']; ?></h3>
                                <span class="date"><i class="far fa-clock"></i><small class="tailoffDate"><?php echo $item['lastdate']; ?></small></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>培訓</h4>
                <div class="newsCarousel">
                    <?php foreach($RS_train as $item){ ?>
                        <a href="./?page=post&id=<?php echo $item['id']; ?>" class="newsItem">
                            <div class="imgBox train">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="">
                            </div>
                            <div  class="text-content">
                                <h3 class="news-title"><?php echo $item['title']; ?></h3>
                                <span class="date"><i class="far fa-clock"></i><small class="tailoffDate"><?php echo $item['lastdate']; ?></small></span>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="./js/search.js"></script>