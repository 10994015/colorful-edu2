<?php
require_once('../config/conn.php');
session_start();
$focusNav = "COURSE";
if(isset($_SESSION['username'])){
    if(isset($_GET['id']) && $_GET['id']!=""){
        try{
            $id = $_GET['id'];
            $sql_str = "SELECT * FROM course WHERE id = :id";
            $stmt = $conn->prepare($sql_str);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $row_RS_course = $stmt->fetch(PDO::FETCH_ASSOC);
            $weekDiv = explode(',',$row_RS_course['week']);
            $weekArr = ['一','二','三','四','五','六','日'];
        }catch (PDOException $e ){
            die("ERROR!!!: ". $e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php'); ?>
    <main id="updateCourse">
        <div class="title"><span class="icon"><i class="fa-solid fa-landmark"></i></span>Update course</div>
        <form action="./chk_updateCourse.php" class="updateCourseForm" method="POST" enctype="multipart/form-data">
            <div class="formContent">
                <div class="basic">
                    <h4>編輯課程</h4>
                    <input type="file" name="imgsrc" id="fileimgBtn">
                    
                    <label for="">
                        <label for="fileimgBtn" class="chooseFile">
                            <i class="fa-solid fa-image"></i>選擇課程照
                        </label>
                        <span id="fileText">尚未選擇圖片</span>
                    </label>
                    <img src="../images/img_upload/<?php echo $row_RS_course['imgsrc']; ?>" class="previewImg" id="previewImg">
                    <label for="">
                        <p>課程名稱</p>
                        <input type="text" name="title" id="courseTitle" placeholder="課程名稱..." required value="<?php echo $row_RS_course['title']; ?>">
                    </label>
                    <label for="">
                        <p>課程內容介紹</p>
                        <textarea name="content" placeholder="課程內容介紹..." id="content"><?php echo $row_RS_course['content']; ?></textarea>
                    </label>
                </div>
                <div class="advanced">
                    <h4>進階選項</h4>
                    <label for="">
                        <p>開課日期</p>
                        <input type="date" name="start_day" id="start_day" required value="<?php echo $row_RS_course['start_day']; ?>">
                    </label>
                    <label for="">
                        <p>上課星期</p>
                        <div class="selectWeek">
                            <?php if($row_RS_course['week']=="8"){ ?>
                            <?php for($i=1;$i<=7;$i++){ 
                                if(in_array($i, $weekDiv)){
                            ?>
                                <div class="group"><input type="checkbox" class="weekInput weekBox" id="week<?php echo $i; ?>" checked><label for="" class="weekLabel disabled"><i class="fa-solid fa-check"></i> <?php echo $weekArr[$i-1]; ?></label></div>
                            <?php }else{ ?>
                                <div class="group"><input type="checkbox" class="weekInput weekBox" id="week<?php echo $i; ?>"><label for="" class="weekLabel disabled"><i class="fa-solid fa-check"></i> <?php echo $weekArr[$i-1]; ?></label></div>
                            <?php }}}else{ ?>

                                <?php for($i=1;$i<=7;$i++){ 
                                if(in_array($i, $weekDiv)){
                            ?>
                                <div class="group"><input type="checkbox" class="weekInput weekBox" id="week<?php echo $i; ?>" checked><label for="week<?php echo $i; ?>" class="weekLabel"><i class="fa-solid fa-check"></i> <?php echo $weekArr[$i-1]; ?></label></div>
                            <?php }else{ ?>
                                <div class="group"><input type="checkbox" class="weekInput weekBox" id="week<?php echo $i; ?>"><label for="week<?php echo $i; ?>" class="weekLabel"><i class="fa-solid fa-check"></i> <?php echo $weekArr[$i-1]; ?></label></div>
                            <?php }} ?>

                            <?php }?>
                            <div class="group"><input type="checkbox" id="week8" <?php if($row_RS_course['week']=="8"){ echo "checked";} ?>><label for="week8"><i class="fa-solid fa-check"></i> 其他</label></div>
                        </div>
                        <input type="text" placeholder="其他..." class="weekInput other " name="week_text" id="weekText" value="<?php echo $row_RS_course['week_text']; ?>" style="display:<?php if($row_RS_course['week']=="8"){ echo "block";}else{echo "none";} ?>">
                    </label>
                    <label for="">
                        <p>上課時段</p>
                        <input type="time" name="start_time" required value="<?php echo $row_RS_course['start_time']; ?>"> 至 <input type="time" name="end_time" required value="<?php echo $row_RS_course['end_time']; ?>">
                    </label>
                    <label for="">
                        <p>適合年齡</p>
                        <div class="numberBoxList">
                            <div class="numberBox">
                                <a href="javascript:;" id="start_decrement" class="decrement">-</a>
                                <input type="number" min="1" max="100" name="start_age"  value="<?php echo $row_RS_course['start_age']; ?>" id="start_age">
                                <a href="javascript:;" id="start_increment" class="increment">+</a>
                            </div>
                            <p>至</p>
                            <div class="numberBox">
                                <a href="javascript:;" id="end_decrement" class="decrement">-</a>
                                <input type="number" min="1" max="100" name="end_age"  value="<?php echo $row_RS_course['end_age']; ?>" id="end_age">
                                <a href="javascript:;" id="end_increment" class="increment">+</a>
                            </div>
                        </div>
                    </label>
                    <label for="">
                        <p>課程類型</p>
                        <div class="selectWeek">
                            <?php if($row_RS_course['course_type']=="1"){ ?>
                                <div class="group"><input type="radio" id="type1" checked name="course_type" value="1"><label for="type1"><i class="fa-solid fa-check"></i> 常態</label></div>
                                <div class="group"><input type="radio" id="type2" name="course_type" value="2"><label for="type2"><i class="fa-solid fa-check"></i> 特色</label></div>
                                <div class="group"><input type="radio" id="type3" name="course_type" value="3"><label for="type3"><i class="fa-solid fa-check"></i> 師培</label></div>
                            <?php }elseif($row_RS_course['course_type']=="2"){ ?>
                                <div class="group"><input type="radio" id="type1" name="course_type" value="1"><label for="type1"><i class="fa-solid fa-check"></i> 常態</label></div>
                                <div class="group"><input type="radio" id="type2" checked name="course_type" value="2"><label for="type2"><i class="fa-solid fa-check"></i> 特色</label></div>
                                <div class="group"><input type="radio" id="type3" name="course_type" value="3"><label for="type3"><i class="fa-solid fa-check"></i> 師培</label></div>
                            <?php }elseif($row_RS_course['course_type']=="3"){ ?>
                                <div class="group"><input type="radio" id="type1" name="course_type" value="1"><label for="type1"><i class="fa-solid fa-check"></i> 常態</label></div>
                                <div class="group"><input type="radio" id="type2" name="course_type" value="2"><label for="type2"><i class="fa-solid fa-check"></i> 特色</label></div>
                                <div class="group"><input type="radio" id="type3" checked name="course_type" value="3"><label for="type3"><i class="fa-solid fa-check"></i> 師培</label></div>
                            <?php }else{ ?>

                                <div class="group"><input type="radio" id="type1" name="course_type" value="1"><label for="type1"><i class="fa-solid fa-check"></i> 常態</label></div>
                                <div class="group"><input type="radio" id="type2" name="course_type" value="2"><label for="type2"><i class="fa-solid fa-check"></i> 特色</label></div>
                                <div class="group"><input type="radio" id="type3" name="course_type" value="3"><label for="type3"><i class="fa-solid fa-check"></i> 師培</label></div>
                            <?php } ?>
                        </div>
                    </label>
                    <label for="">
                        <p>火熱報名中</p>
                        <input type="checkbox" name="deadline" <?php if($row_RS_course['deadline']=="1"){echo "checked"; } ?>>
                    </label>
                    <label for="">
                        <p>顯示至前台</p>
                        <input type="checkbox" name="isshow" <?php if($row_RS_course['isshow']=="1"){echo "checked"; } ?>>
                    </label>
                    <label for="">
                        <p>焦點課程(顯示在首頁)</p>
                        <input type="checkbox" name="focus" id="focus" <?php if($row_RS_course['focus']=="1"){echo "checked"; } ?>>
                    </label>
                    <label for="" id="focusLabel" class="<?php if($row_RS_course['focus']=="1"){echo "open"; }else{echo "close";} ?>">
                        <p>焦點課程文字(顯示在首頁)</p>
                        <textarea name="focus_text" class="focusText"><?php echo $row_RS_course['focus_text']; ?></textarea>
                    </label>
                    <input type="hidden" id="week" name="week" value="<?php echo $row_RS_course['week']; ?>">
                    <input type="submit" hidden value="新增課程" id="createCourseBtn">
                    <a href="javascript:;" id="createSubmit">編輯課程</a>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $row_RS_course['id'];  ?>">
            
        </form>

        <?php include('./footer.php'); ?>
    </main>

<script src="../shared/ckeditor4/ckeditor.js"></script>
<script src="../js/cms/header.js"></script>
<script>

    const fileimgBtn = document.getElementById('fileimgBtn');
    const fileText = document.getElementById('fileText');
    const previewImg = document.getElementById('previewImg');
    const start_age = document.getElementById('start_age');
    const start_decrement = document.getElementById('start_decrement');
    const start_increment = document.getElementById('start_increment');
    const end_decrement = document.getElementById('end_decrement');
    const end_age = document.getElementById('end_age');
    const end_increment = document.getElementById('end_increment');
    const createCourseBtn = document.getElementById('createCourseBtn');
    const week = document.getElementById('week');
    const weekText= document.getElementById('weekText');
    const week1 = document.getElementById('week1');
    const week2 = document.getElementById('week2');
    const week3 = document.getElementById('week3');
    const week4 = document.getElementById('week4');
    const week5 = document.getElementById('week5');
    const week6 = document.getElementById('week6');
    const week7 = document.getElementById('week7');
    const week8 = document.getElementById('week8');
    const weekBox = document.getElementsByClassName('weekBox');
    const weekLabel = document.getElementsByClassName('weekLabel');
    const weekInput = document.getElementsByClassName('weekInput');
    let weekArr = [];

    const createSubmit = document.getElementById('createSubmit');
    const courseTitle = document.getElementById('courseTitle');
    const start_day = document.getElementById('start_day');
    createSubmit.addEventListener('click',()=>{
        if(courseTitle.value == ""){
            alert('請輸入標題！')
            return
        }
        if(start_day.value==""){
            alert('請輸入開課日期！');
            return;
        }
        createCourseBtn.click();
    })
    const focus = document.getElementById('focus');
    const focusLabel = document.getElementById('focusLabel');
    focus.addEventListener('change',()=>{
        if(focus.checked){
            focusLabel.classList.add('open');
            focusLabel.classList.remove('close');
        }else{
            focusLabel.classList.remove('open');
            focusLabel.classList.add('close');
        }
    })

    for(let i=0;i<weekInput.length;i++){
        weekInput[i].addEventListener('change',()=>{
            weekArr = [];
            if(week1.checked){
                weekArr.push('1');
            }
            if(week2.checked){
                weekArr.push('2');
            }
            if(week3.checked){
                weekArr.push('3');
            }
            if(week4.checked){
                weekArr.push('4');
            }
            if(week5.checked){
                weekArr.push('5');
            }
            if(week6.checked){
                weekArr.push('6');
            }
            if(week7.checked){
                weekArr.push('7');
            }
            if(week8.checked){
                weekArr.push('8');
            }
            week.value = weekArr;
        })
    }
    week8.addEventListener('click',()=>{
        for(let i=0;i<weekBox.length;i++){
            weekBox[i].checked = false;
        }
        if(week8.checked){
            weekText.style.display = "block";
            for(let i=0;i<weekLabel.length;i++){
                weekLabel[i].classList.add('disabled');
                weekLabel[i].removeAttribute('for');
            }
        }else{
            weekText.style.display = "none";
            for(let i=0;i<weekLabel.length;i++){
                weekLabel[i].setAttribute('for',`week${i+1}`);
                weekLabel[i].classList.remove('disabled');
            }
        }
        
        
    })
    start_increment.addEventListener('click',()=>{
        if(start_age.value<100){
            start_age.value++;
        }
    })
    start_decrement.addEventListener('click',()=>{
        if(start_age.value>3){
            start_age.value--;
        }
    })
    end_increment.addEventListener('click',()=>{
        if(end_age.value<100){
            end_age.value++;
        }
    })
    end_decrement.addEventListener('click',()=>{
        if(end_age.value>3){
            end_age.value--;
        }
    })
    fileimgBtn.addEventListener('change',()=>{
        if(fileimgBtn.value){
            fileText.innerHTML = fileimgBtn.value;
        }else{
            fileText.innerHTML = "尚未選擇圖片";
        }
        const file = fileimgBtn.files[0];
        const reader = new FileReader;
        reader.onload = function(e) {
            previewImg.src = e.target.result;
        };
        reader.readAsDataURL(file);


    });

    CKEDITOR.replace('content',{
        extraplugins:'filebrowser',
        height:300,
        width:'100%',
        filebrowserUploadMethod:"form",
        filebrowserUploadUrl:"./ckeditor_upload.php"
    });
</script>
</body>
</html>


<?php }else{
    header('Location:./noPermission.php');
} ?>