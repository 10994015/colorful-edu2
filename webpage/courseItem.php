<?php 
if(isset($_GET['id']) && $_GET['id']!=""){
    $sql_str = "SELECT * FROM course WHERE id=:id";
    $id = $_GET['id'];
    $stmt = $conn -> prepare($sql_str);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $row_course = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($row_course['week']!="8"){
        $weekViewArr = array();
        $week = explode(',' , $row_course['week']);
        $weekArr = ['一','二','三','四','五','六','日'];
        for($i=1;$i<=7;$i++){
            if(in_array($i, $week)){
                array_push($weekViewArr, $weekArr[$i-1]);
            }
        }
        if(count($weekViewArr)>=7){
            $weekViewArr = ['一至周日'];
        }
        
    }
    $start_day = str_replace("-", "/",  $row_course['start_day']);
}
?>


<div id="courseItem">
    <img src="./images/img_upload/<?php echo $row_course['imgsrc']; ?>" alt="<?php echo $row_course['title']; ?>">
    <h1><?php echo $row_course['title']; ?></h1>
    <div class="remark">
        <div class="age">
            <span><?php echo $row_course['start_age']; ?>-<?php echo $row_course['end_age']; ?></span>
            <p>適合年齡</p>
        </div>
        <div class="time">
            <span><?php echo $row_course['start_time']; ?>-<?php echo $row_course['end_time']; ?></span>
            <p>上課時段</p>
        </div>
        <div class="week">
            <span><?php if($row_course['week']!="8"){ echo "每周"; foreach($weekViewArr as $key => $item){ if($key == array_key_last($weekViewArr)){echo $item;}else{ echo $item."、";} } }else{ echo $row_course['week_text']; }?></span>
            <p>上課日</p>
        </div>
    </div>
    <div class="comingSoon">
        <div><h6 id="comngSoonDay"><?php echo $start_day; ?></h6></div>
        <div class="launch-time">
            <div><p id="days">00</p><span>Days</span></div>
            <div><p id="hours">00</p><span>Houes</span></div>
            <div><p id="minutes">00</p><span>Minutes</span></div>
            <div><p id="seconds">00</p><span>Seconds</span></div>
        </div>
    </div>
    <article class="content">
      <?php echo $row_course['content']; ?>
    </article>
    <a href="./?page=about#contact" class="apply">立即報名</a>
</div>



<script src="./js/launch-time.js"></script>

<head>
    <title><?php echo $row_course['title']; ?></title>
</head>