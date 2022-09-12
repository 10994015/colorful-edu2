<?php 
$sql_str = "SELECT * FROM course WHERE isshow=1 ORDER BY id DESC";
$RS_course = $conn -> query($sql_str);
$intro_text = "我們提供了安全的環境、還有常態課程幫助孩子升學、另開特色課程挖掘孩子們的興趣、此外還有師培課程，培訓每個想要成為專業教師的人才。且冰芬文教的教師皆是受過專業受訓認證的，還有完善的設備提供給大家，能讓學習更加專心舒適。";
if(isset($_GET['type'])){
    if($_GET['type']=="normal"){
        $intro_text = "我們冰芬文教提供了國、英、數等課程，幫助孩子奠定好基礎，並在未來升學方面更加順利。";
        $sql_str = "SELECT * FROM course WHERE isshow=1 AND course_type=1 ORDER BY id DESC";
        $RS_course = $conn -> query($sql_str);
    }elseif($_GET['type']=="special"){
        $intro_text = "透過多元跨領域教學,及加強互動性與參與感,創造沈浸式教學環境,提升孩子對於學習的興趣!";
        $sql_str = "SELECT * FROM course WHERE isshow=1 AND course_type=2 ORDER BY id DESC";
        $RS_course = $conn -> query($sql_str);
    }elseif($_GET['type']=="teacher"){
        $intro_text = "與TESOL合作，致力於培養專業的教師，以教學、教室訓練、管理課程為宗旨，針對實體課程進行實務受訓。";
        $sql_str = "SELECT * FROM course WHERE isshow=1 AND course_type=3 ORDER BY id DESC";
        $RS_course = $conn -> query($sql_str);
    }else{
        $sql_str = "SELECT * FROM course WHERE isshow=1 ORDER BY id DESC";
        $RS_course = $conn -> query($sql_str);
    }
}else{
    $sql_str = "SELECT * FROM course WHERE isshow=1 ORDER BY id DESC";
    $RS_course = $conn -> query($sql_str);
}
?>


<div id="course">
    <nav class="nav">
        <a href="./?page=course" class="color0 <?php if($_GET['type']=="normal" || $_GET['type']=="special" ||  $_GET['type']=="teacher"){echo "disabled";} ?>">所有課程</a>
        <a href="./?page=course&type=normal" class="color1 <?php if($_GET['type']!="normal"){echo "disabled";} ?>">常態課程</a>
        <a href="./?page=course&type=special" class="color2 <?php if($_GET['type']!="special"){echo "disabled";} ?>">特色課程</a>
        <a href="./?page=course&type=teacher" class="color3 <?php if($_GET['type']!="teacher"){echo "disabled";} ?>">師培課程</a>
    </nav>
    <p class="small-title"><?php echo $intro_text; ?></p>
    <div class="courseList">
        <?php foreach($RS_course as $item){ ?>
            <a href="./?page=courseItem&id=<?php echo $item['id']; ?>" class="courseItem">
                <div class="callout <?php if($item['deadline']==1){echo "yes";}else{echo "no";} ?>"><?php if($item['deadline']==1){echo "火熱報名中";}else{echo "報名已截止";} ?></div>
                <img src="./images/img_upload/<?php echo $item['imgsrc']; ?>" alt="<?php echo $item['title']; ?>">
                <div class="content">
                    <h2 class="courseName"><?php echo $item['title']; ?></h2>
                    <div class="remark">
                        <div class="age">
                            <span><?php echo $item['start_age']; ?>-<?php echo $item['end_age']; ?></span>
                            <p>適合年齡</p>
                        </div>
                        <div class="time">
                            <span><?php echo $item['start_time']; ?>-<?php echo $item['end_time']; ?></span>
                            <p>上課時段</p>
                        </div>
                    </div>
                </div>
            
            </a>
        <?php } ?>
    </div>
</div>


<head>
    <title>冰芬文教｜新竹市補習班</title>
</head>
