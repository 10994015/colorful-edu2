<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "COURSE";
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0"> -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="noindex">
    <title>後台管理系統</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" href="../css/cms.css">
</head>
<body>
    <input type="hidden" value="<?php echo $focusNav; ?>" id="focusNav">
    <?php include_once('./header.php');  ?>
    <main id="createCourse">
        <div class="title"><span class="icon"><i class="fa-solid fa-landmark"></i></span>Create course</div>
        <form action="./chk_createCourse.php" class="createCourseForm" method="POST" enctype="multipart/form-data">
            <div class="formContent">
                <div class="basic">
                    <h4>新增課程</h4>
                    <input type="file" name="imgsrc"  id="fileimgBtn">
                    
                    <label for="">
                        <label for="fileimgBtn" class="chooseFile">
                            <i class="fa-solid fa-image"></i>選擇課程照
                        </label>
                        <span id="fileText">尚未選擇圖片</span>
                    </label>
                    <img src="" class="previewImg" id="previewImg">
                    <label for="">
                        <p>課程名稱</p>
                        <input type="text" name="title" placeholder="課程名稱..." required id="courseTitle">
                    </label>
                    <label for="">
                        <p>課程內容介紹</p>
                        <textarea name="content" placeholder="課程內容介紹..." id="content"></textarea>
                    </label>
                </div>
                <div class="advanced">
                    <h4>進階選項</h4>
                    <label for="">
                        <p>開課日期</p>
                        <input type="date" name="start_day" required id="start_day">
                    </label>
                    <label for="">
                        <p>上課星期</p>
                        <div class="selectWeek">
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week1" value="一"><label for="week1" class="weekLabel"><i class="fa-solid fa-check"></i> 一</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week2" value="二"><label for="week2" class="weekLabel"><i class="fa-solid fa-check"></i> 二</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week3" value="三"><label for="week3" class="weekLabel"><i class="fa-solid fa-check"></i> 三</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week4" value="四"><label for="week4" class="weekLabel"><i class="fa-solid fa-check"></i> 四</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week5" value="五"><label for="week5" class="weekLabel"><i class="fa-solid fa-check"></i> 五</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week6" value="六"><label for="week6" class="weekLabel"><i class="fa-solid fa-check"></i> 六</label></div>
                            <div class="group"><input type="checkbox" class="weekInput weekBox" id="week7" value="日"><label for="week7" class="weekLabel"><i class="fa-solid fa-check"></i> 日</label></div>
                            <div class="group"><input type="checkbox" id="week8"><label for="week8"><i class="fa-solid fa-check"></i> 其他</label></div>
                        </div>
                        <input type="text" placeholder="其他..." class="weekInput other" name="week_text" id="weekText">
                    </label>
                    <label for="">
                        <p>上課時段</p>
                        <input type="time" name="start_time" required> 至 <input type="time" name="end_time" required>
                    </label>
                    <label for="">
                        <p>適合年齡</p>
                        <div class="numberBoxList">
                            <div class="numberBox">
                                <a href="javascript:;" id="start_decrement" class="decrement">-</a>
                                <input type="number" min="1" max="100" name="start_age"  value="3" id="start_age">
                                <a href="javascript:;" id="start_increment" class="increment">+</a>
                            </div>
                            <p>至</p>
                            <div class="numberBox">
                                <a href="javascript:;" id="end_decrement" class="decrement">-</a>
                                <input type="number" min="1" max="100" name="end_age"  value="5" id="end_age">
                                <a href="javascript:;" id="end_increment" class="increment">+</a>
                            </div>
                        </div>
                    </label>
                    <label for="">
                        <p>課程類型</p>
                        <div class="selectWeek">
                            <div class="group"><input type="radio" id="type1" checked name="course_type" value="1"><label for="type1"><i class="fa-solid fa-check"></i> 常態</label></div>
                            <div class="group"><input type="radio" id="type2" name="course_type" value="2"><label for="type2"><i class="fa-solid fa-check"></i> 特色</label></div>
                            <div class="group"><input type="radio" id="type3" name="course_type" value="3"><label for="type3"><i class="fa-solid fa-check"></i> 師培</label></div>
                        </div>
                    </label>
                    <label for="">
                        <p>火熱報名中</p>
                        <input type="checkbox" name="deadline" checked>
                    </label>
                    <label for="">
                        <p>顯示至前台</p>
                        <input type="checkbox" name="isshow" checked>
                    </label>
                    <label for="">
                        <p>焦點課程(顯示在首頁)</p>
                        <input type="checkbox" name="focus" id="focus">
                    </label>
                    <label for="" id="focusLabel" class="close">
                        <p>焦點課程文字(顯示在首頁)</p>
                        <textarea name="focus_text" class="focusText"></textarea>
                    </label>
                    <input type="hidden" id="week" name="week">
                    <input type="submit" value="新增課程" id="createCourseBtn" hidden>
                    <a href="javascript:;" id="createSubmit">新增課程</a>
                </div>
            </div>
        </form>

        <?php include('./footer.php'); ?>
    </main>


    <script src="../shared/ckeditor4/ckeditor.js"></script>
    <script src="../js/cms/header.js"></script>
    <script src="../js/cms/createCourse.js"></script>
</body>
</html>


<?php }else{
    header('Location:./noPermission.php');
} ?>