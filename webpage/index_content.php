
<?php 
try{
    $sql_str = "SELECT * FROM news ORDER BY id DESC Limit 10";
    $RS_news = $conn -> query($sql_str);
    $RS_news2 = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE focus =1 Limit 1";
    $RS_focus_news = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news ORDER BY id DESC Limit 4";
    $RS_newList_last = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE course=1 ORDER BY id DESC Limit 4";
    $RS_newList_course = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE daily=1 ORDER BY id DESC Limit 4";
    $RS_newList_daily = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE train=1 ORDER BY id DESC Limit 4";
    $RS_newList_train = $conn -> query($sql_str);
    // $total_RS_news = $RS_news -> rowCount();
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}

?>

<div id="index_content">
    <div class="responsive">
        <div><a href="javascript:;"><img src="./images/banner.png" alt=""></a></div>
        <div><a href="javascript:;"><img src="./images/banner.png" alt=""></a></div>
    </div>
  
    <div class="course">
        <div class="title">
            <span class="line"></span>
            <h2>COURSE</h2>
            <span class="line"></span>
        </div>
        <p class="small-title">所有常態課程、日常課程、特色課程培訓課程都在冰芬文教！</p>
        <div class="courseList">
            <div class="courseItem courseItem1">
                <h3>常態課程</h3>
                <span>Normal course</span>
                <p>
                會考怎麼考？會考沒有看一眼就能答的題目，記憶題少，思考和理解才是答題關鍵。會考成績的影響？會考成績絕對是比序關鍵，總分比完，再比積點！
                </p>
                <a href="javascript:;" class="seemore seemore1">SEE MORE</a>
            </div>
            <div class="courseItem courseItem2">
                <h3>特色課程</h3>
                <span>Featured Programs</span>
                <p>
                會考怎麼考？會考沒有看一眼就能答的題目，記憶題少，思考和理解才是答題關鍵。會考成績的影響？會考成績絕對是比序關鍵，總分比完，再比積點！
                </p>
                <a href="javascript:;" class="seemore seemore2">SEE MORE</a>
            </div>
            <div class="courseItem courseItem3">
                <h3>師培課程</h3>
                <span>Teacher training course</span>
                <p>
                會考怎麼考？會考沒有看一眼就能答的題目，記憶題少，思考和理解才是答題關鍵。會考成績的影響？會考成績絕對是比序關鍵，總分比完，再比積點！會考怎麼考？會考沒有看一眼就能答的題目，記憶題少，思考和理解才是答題關鍵。會考成績的影響？會考成績絕對是比序關鍵，總分比完，再比積點！
                </p>
                <a href="javascript:;" class="seemore seemore3">SEE MORE</a>
            </div>
        </div>
    </div>
    <div class="news">
        <div class="title">
            <span class="line"></span>
            <h2>NEWS</h2>
            <span class="line"></span>
        </div>
        <p class="small-title"></p>
        <div class="newsContent">
            <div class="fristDiv">
                <div class="leftList">
                    <?php foreach($RS_news as $i => $item){ ?>
                        <div class="leftItem">
                            <span class="numberBox"><?php echo $i+1; ?></span>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    <?php foreach($RS_news2 as $i => $item){ ?>
                        <div class="leftItem">
                            <span class="numberBox"><?php echo $i+1; ?></span>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
                <?php foreach($RS_focus_news as $item){ ?>
                    <div class="centerList">
                        <a href="./?page=post&id=<?php echo $item['id']; ?>" class="imgBox">
                            <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="backImg">
                            <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="coverImg">
                        </a>
                        <div class="text-content">
                            <div class="hashtags">
                                <?php if($item['course']==1){ ?><a href="./?page=news&tag=course"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                            </div>
                            <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            <div class="otherText">
                                <p class="date"> <i class="far fa-clock"></i> <span class="tailoffDate"><?php echo $item['lastdate']; ?></span></p>
                                <a href="?page=post&id=<?php echo $item['id']; ?>" class="reading"> <span class="back"></span> <p>CONTINUE READING<i class="fas fa-arrow-right"></i></p> </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="rightList">
                <div class="typeList">
                    <p class="newsTypeBtn focus" id="newTypeBtnLast">最新</p>
                    <p class="newsTypeBtn" id="newTypeBtnCourse">課程</p>
                    <p class="newsTypeBtn" id="newTypeBtnDaily">日常</p>
                    <p class="newsTypeBtn" id="newTypeBtnTrain">培訓</p>
                </div>
                <div class="newsList" id="newsListLast">
                    <?php foreach($RS_newList_last as $item){ ?>
                        <div class="newsItem">
                            <a href="./?page=post&id=<?php echo $item['id']; ?>" class="imgBox">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="coverImg">
                            </a>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="newsList" id="newsListCourse" style="display:none">
                    <?php foreach($RS_newList_course as $item){ ?>
                        <div class="newsItem">
                            <a href="./?page=post&id=<?php echo $item['id']; ?>" class="imgBox">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="coverImg">
                            </a>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="newsList" id="newsListDaily" style="display:none">
                    <?php foreach($RS_newList_daily as $item){ ?>
                        <div class="newsItem">
                            <a href="./?page=post&id=<?php echo $item['id']; ?>" class="imgBox">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="coverImg">
                            </a>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="newsList" id="newsListTrain" style="display:none">
                    <?php foreach($RS_newList_train as $item){ ?>
                        <div class="newsItem">
                            <a href="./?page=post&id=<?php echo $item['id']; ?>" class="imgBox">
                                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" class="coverImg">
                            </a>
                            <div class="text-content">
                                <div class="hashtags">
                                    <?php if($item['course']==1){ ?><a href="./?page=news&tag=course ?>"><i class="tag" style="color:#1484c4">#課程</i></a> <?php }?>
                                    <?php if($item['daily']==1){ ?><a href="./?page=news&tag=daily"><i class="tag" style="color:#FF5722">#日常</i></a><?php }?>
                                    <?php if($item['train']==1){ ?><a href="./?page=news&tag=train"><i class="tag" style="color:#8DC220">#培訓</i></a><?php }?>
                                </div>
                                <a href="./?page=post&id=<?php echo $item['id']; ?>" class="news-title"><?php echo $item['title']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <a href="./?page=news" class="seemore">SEE MORE</a>
    </div>
    

    <div class="cooperate">
         <div class="title">
            <span class="line"></span>
            <h2>Cooperation</h2>
            <span class="line"></span>
            <div class="cooperate"></div>
        </div>
        <p class="small-title">Enterprises that cooperate with Colorful Culture and Education</p>
        <div class="cooperateList">
            <a href="https://www.evoneic.com/"><img src="./images/evone.png" alt=""></a>
            <a href="https://www.esoleducation.com/"><img src="./images/esol.png" alt=""></a>
            <a href="https://www.cavesbooks.com.tw/"><img src="./images/caves.png" alt=""></a>
        </div>
        <a href="./?page=cooperate" class="seemore">All cooperate</a>
    </div>
</div>

<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick-theme.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="./shared/slick-1.6.0/slick/slick.min.js"></script>
<script src="./js/slick.js"></script>