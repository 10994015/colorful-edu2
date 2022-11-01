
<?php
$sql_str = "SELECT * FROM course ORDER BY lastdate DESC";
$stmt = $conn->prepare($sql_str);
$stmt->execute();
$RS_course = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>

<div id="formPage">
    <form action="./shared/singupsend.php" method="post">
        <h2>報名表單</h2>
        <span>姓名</span>
        <input type="text" required name="name" placeholder="請輸入姓名..." id="name">
        <span>手機</span>
        <input type="text" required name="phone" placeholder="請輸入手機號碼..." id="phone">
        <span>電子郵件</span>
        <input type="email" required name="email" placeholder="請輸入Email..." id="email">
        <span>出生年月日</span>
        <input type="date" name="age"  id="age" require>
        <span>報名課程</span>
        <select name="courseSelect"  id="courseSelect">
            <option value="" disabled selected >請選擇課程</option>
            <?php foreach($RS_course as $item){ ?>
                <option value="<?php echo $item['title']; ?>"><?php echo $item['title']; ?></option>
            <?php } ?>
        </select>
        <input hidden type="submit" id="submit" />
        <a href="javascript:;" class="send" id="send">送出</a>
    </form>
</div>

<head>
    <title>冰芬文教｜新竹市補習班</title>
    <meta name="description" content="位於新竹市東區的冰芬文教補習班。色彩一直是療癒人心的良藥，繽紛=冰芬 意旨戒掉呆板的學習方式，透過多元教學經驗，讓學習更多 '冰芬' 色彩，並套用國外 「更高的自由度」、「更強的互動性」和「更深的參與感」的學習模式，讓學習更加放鬆、快樂，同時讓學生走進世界，開拓視野。我們也提供「留遊學諮詢」的服務，希望優秀及想往國際發展的學生，能有更好的圓夢舞台。在「人才培育」方面也提供完善的課程規劃、實作教學及測驗，讓更多有志於多元教學的人才能被看見。選擇冰芬，使你的未來繽紛。讓學生在學習的領域紛紛享受五彩斑斕的美麗世界。" />
</head>

<script src="./js/formPage.js"></script>
