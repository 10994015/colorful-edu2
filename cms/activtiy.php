<?php
require_once('../config/conn.php');
session_start();
$focusNav = "ACTIVITY";
$user = $_SESSION['username'];
if(isset($_SESSION['username'])){
    if(isset($_GET['user']) && $_GET['user'] != ""){
        if($_SESSION['level']>=10){
            $get_user = $_GET['user'];
            try{
                
                $sql_str = "SELECT * FROM record WHERE user = :get_user ORDER BY lastdate DESC";
                $stmt = $conn -> prepare($sql_str);
                $stmt -> bindParam(':get_user', $get_user);
                $stmt -> execute();
                $RS_record = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                $total = $stmt -> rowCount();
            }catch(PDOException $e){
                die('Error!:'.$e->getMessage());
            }
        }else{
            if(isset($_GET['user']) && $_GET['user'] == $user){
                $get_user = $_GET['user'];
                try{
                    $sql_str = "SELECT * FROM record WHERE user = :get_user ORDER BY lastdate DESC";
                    $stmt = $conn -> prepare($sql_str);
                    $stmt -> bindParam(':get_user', $get_user);
                    $stmt -> execute();
                    $RS_record = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                    $total = $stmt -> rowCount();
                }catch(PDOException $e){
                    die('Error!:'.$e->getMessage());
                }
            }else{
                echo " <script> alert('你無權限訪問!');window.location.href = './activtiy.php' </script>";
            }
        }
    }else{
        try{
            // $sql_str = "SELECT * FROM record WHERE user = '$user' ORDER BY lastdate DESC";
            // $RS_record = $conn -> query($sql_str);
            // $total_RS_record = $RS_record-> rowCount();

            $sql_str = "SELECT * FROM record WHERE user = :user ORDER BY lastdate DESC";
            $stmt = $conn -> prepare($sql_str);
            $stmt -> bindParam(':user', $user);
            $stmt -> execute();
            $RS_record = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            $total = $stmt -> rowCount();
        }catch(PDOException $e){
            die('Error!:'.$e->getMessage());
        }
    }
    
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
    <main id="activity">
        <div class="title"><span class="icon"><i class="fa-solid fa-chart-line"></i></span>活動日誌</div>

        <div class="activityList">
            <h4>活動日誌</h4>
            <p>共有 <?php echo $total; ?>筆</p>
            <?php if($_SESSION['level']>=10){ ?>
            <!-- <a href="./createMember.php" id="createMemberBtn">新增課程 <i class="fa-solid fa-plus"></i></a> -->
            <?php } ?>
            <div class="activityItem activityItemTitle">
                <strong class="username">帳號</strong>  
                <strong class="type">項目</strong>
                <strong class="action">動作</strong>
                <strong class="latest-update">活動時間</strong>
                <?php if($_SESSION['level']>=10){ ?>
                <strong class="delete">刪除</strong>
                <?php } ?>
            </div>
            <?php foreach($RS_record as $item){ ?>
            <div class="activityItem">
            <strong class="username"><?php echo $item['user']; ?></strong>  
                <strong class="type"><?php echo $item['type_name']; ?></strong>
                <strong class="action"><?php echo $item['action']; ?></strong>
                <strong class="latest-update"><?php echo $item['lastdate']; ?></strong>
                <?php if($_SESSION['level']>=10){ ?>
                <strong class="delete"><a href="javascript:;" onclick="deleteFn(<?php echo $item['id']; ?>)">刪除</a></strong>
                <?php } ?>
            </div>
            <?php } ?>
        </div>


        <?php include('./footer.php'); ?>
    </main>


<script src="../js/cms/header.js"></script>
<script>
 function deleteFn(id){
    let chk = confirm('確定要刪除嗎?');
    if(chk){
        window.location.href = `./delete_activity.php?id=${id}`;
        return;
    }
}
</script>
</body>
</html>

<?php }else{
    header('Location:./noPermission.php');
} ?>