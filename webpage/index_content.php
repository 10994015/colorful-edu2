
<?php 
try{
    $sql_str = "SELECT * FROM news WHERE isshow=1 ORDER BY id DESC Limit 10";
    $RS_news = $conn -> query($sql_str);
    $RS_news2 = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE focus =1 AND isshow=1 Limit 1";
    $RS_focus_news = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE hot=1 AND isshow=1 ORDER BY id DESC Limit 4";
    $RS_newList_last = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE course=1 AND isshow=1 ORDER BY id DESC Limit 4";
    $RS_newList_course = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE daily=1 AND isshow=1 ORDER BY id DESC Limit 4";
    $RS_newList_daily = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM news WHERE train=1 AND isshow=1 ORDER BY id DESC Limit 4";
    $RS_newList_train = $conn -> query($sql_str);
    // $total_RS_news = $RS_news -> rowCount();

    $sql_str = "SELECT * FROM cooperate_img ORDER BY id DESC";
    $RS_cooperate = $conn -> query($sql_str);

    $sql_str = "SELECT * FROM course WHERE isshow=1 AND focus=1 Limit 1";
    // $RS_course = $conn -> query($sql_str);
    $stmt_course = $conn -> prepare($sql_str);
    $stmt_course -> execute();
    $RS_course = $stmt_course -> fetch(PDO::FETCH_ASSOC);

    $sql_str = "SELECT * FROM course WHERE isshow=1 AND focus=1";
    $stmt_courseFocus = $conn -> prepare($sql_str);
    $stmt_courseFocus -> execute();
    $RS_course_focus = $stmt_courseFocus -> fetchAll(PDO::FETCH_ASSOC);

    $sql_str = "SELECT * FROM home_banner WHERE isshow=1 ORDER BY sort ASC";
    $RS_banner = $conn -> query($sql_str);

    
}catch(PDOException $e){
    die('Error!:'.$e->getMessage());
}

?>

<div id="index_content">
    <h1 style="opacity: 0;position: absolute;top: -9999999px;">新竹市 補習班 推薦 冰芬文教</h1>
    <div class="responsive">
        <?php foreach($RS_banner as $item){ ?>
            <div><a href="<?php echo $item['link']; ?>"><img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="<?php echo $item['seo']; ?>"></a></div>
        <?php } ?>
    </div>
    <div class="about">
        <div class="title">
            <span class="line"></span>
            <h2>Welcome</h2>
            <span class="line"></span>
        </div>
        <p class="small-title"></p>
        <div class="aboutContent">
            <div class="left">
                <h3>我們提供了什麼?</h3>
                <p>我們提供了安全的環境、還有常態課程幫助孩子升學、另開特色課程挖掘孩子們的興趣、此外還有師培課程，培訓每個想要成為專業教師的人才。且冰芬文教的教師皆是受過專業受訓認證的，還有完善的設備提供給大家，能讓學習更加專心舒適。</p>
                <div class="serviceList">
                    <?php foreach($RS_service as $item){ ?>
                    <div class="item">
                        <div class="iconBox" style="background:<?php  echo $item['color'];?>"><i class="<?php echo $item['icon']; ?>"></i></div>
                        <div class="text">
                            <h4 class="" style="color:<?php  echo $item['color'];?>"><?php echo $item['title']; ?></h4>
                            <p><?php echo nl2br($item['content']); ?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="right">
                <img src="./images/xx.png">
                <a href="./?page=about">了解更多</a>
            </div>
        </div>

    </div>
    <div class="course">
        <div class="title">
            <span class="line"></span>
            <h2>COURSE</h2>
            <span class="line"></span>
        </div>
        <p class="small-title"></p>
        <div class="courseList">
            <div class="courseItem courseItem1">
                <h3>常態課程</h3>
                <span>Normal course</span>
                <p>
                我們冰芬文教提供了國、英、數等課程，幫助孩子奠定好基礎，並在未來升學方面更加順利。
                </p>
                <a href="./?page=course&type=normal" class="seemore seemore1">SEE MORE</a>
            </div>
            <div class="courseItem courseItem2">
                <h3>特色課程</h3>
                <span>Featured Programs</span>
                <p>透過多元跨領域教學,及加強互動性與參與感,創造沈浸式教學環境,提升孩子對於學習的興趣!</p>
                <a href="./?page=course&type=special" class="seemore seemore2">SEE MORE</a>
            </div>
            <div class="courseItem courseItem3">
                <h3>師培課程</h3>
                <span>Teacher training course</span>
                <p>
                與TESOL合作，致力於培養專業的教師，以教學、教室訓練、管理課程為宗旨，針對實體課程進行實務受訓。
                </p>
                <a href="./?page=course&type=teacher" class="seemore seemore3">SEE MORE</a>
            </div>
        </div>
        <?php  if(count($RS_course_focus) >=1 ){ ?>
        <div class="comingSoon">
            <div class="comingSoonBox">
                <span id="comngSoonDay"><?php echo $RS_course['start_day']; ?></span>
                <h3><?php echo $RS_course['title']; ?><br><p id="courseing">即將開班</p></h3>
                <article>
                    <?php echo nl2br($RS_course['focus_text']); ?>
                </article>
                <a href="./?page=courseItem&id=<?php echo $RS_course['id']; ?>">View courses</a>
                <div class="launch-time">
                    <div><p id="days">00</p><span>Days</span></div>
                    <div><p id="hours">00</p><span>Houes</span></div>
                    <div><p id="minutes">00</p><span>Minutes</span></div>
                    <div><p id="seconds">00</p><span>Seconds</span></div>
                </div>
            
            </div>
        </div>
        <?php } ?>
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
                    <p class="newsTypeBtn focus" id="newTypeBtnLast">熱門</p>
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
        <p class="small-title"></p>
        <div class="cooperateList">
            <?php foreach($RS_cooperate as $item){ ?>
                <a href="<?php echo $item['url']; ?>"><img src="./images/cooperate/<?php echo $item['imgsrc']; ?>"></a>
            <?php } ?>
            <!-- <a href="https://www.evoneic.com/"><img src="./images/evone.png" alt=""></a>
            <a href="https://www.esoleducation.com/"><img src="./images/esol.png" alt=""></a>
            <a href="https://www.cavesbooks.com.tw/"><img src="./images/caves.png" alt=""></a> -->
        </div>
        <a href="./?page=cooperate" class="seemore">All Cooperation</a>
    </div>
</div>



<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="./shared/slick-1.6.0/slick/slick-theme.css"/>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="./shared/slick-1.6.0/slick/slick.min.js"></script>
<script src="./js/slick.js"></script>
<script src="./js/launch-time.js"></script>

<head>
    <title>冰芬文教｜新竹市補習班</title>
</head>
