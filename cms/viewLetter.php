<?php 
require_once('../config/conn.php');
session_start();
$focusNav = "CMS";
if(isset($_SESSION['username'])){
    if(isset($_GET['id']) && $_GET['id'] != ""){
        $id = $_GET['id'];
        $sql_str = "SELECT * FROM letter WHERE id = :id";
        $stmt = $conn -> prepare($sql_str);
        $stmt -> bindParam(":id", $id);
        $stmt -> execute();
        $total = $stmt -> rowCount();
        if($total >=1 ){
            $RS_letter = $stmt -> fetch(PDO::FETCH_ASSOC);
        }
    }

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0"> -->
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
    <main id="viewLetter">
        <div class="title"><span class="icon"><i class="fa-solid fa-cube"></i></span>CMS</div>
        <div class="letter">
            <div class="personal">
                <h3 class="name"><?php echo $RS_letter['name']; ?></h3>
                <p class="email">(<?php echo $RS_letter['email']; ?>)</p>
                <p class="time"><?php echo $RS_letter['send_time']; ?></p>
            </div>
            <div class="title">
                <h4><?php echo $RS_letter['title']; ?></h4>
            </div>
            <div class="content">
                <p>
                    <?php echo $RS_letter['content']; ?>
                </p>
            </div>
            <a href="./" class="back">回前頁</a>
        </div>


        <?php include('./footer.php'); ?>
    </main>
    <script src="../js/cms/header.js"></script>
</body>
</html>
<?php }else{
    header('Location:./noPermission.php');
} ?>