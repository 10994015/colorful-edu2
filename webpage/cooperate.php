<?php 
$sql_str = "SELECT * FROM pagebg WHERE id = '3'";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_bg = $stmt -> fetch(PDO::FETCH_ASSOC);
?>


<div id="cooperate">
    <?php if($RS_bg['isshow']==1){ ?>
    <div class="coverBox">
        <img src="./images/cms/<?php echo $RS_bg['imgsrc']; ?>" class="coverImg">
        <h3><?php echo $RS_bg['pagename']; ?></h3>
    </div>
    <?php } ?>
    <div class="cooperateContent">
        <div class="title">
            <span class="line"></span>
            <h2>企業合作</h2>
            <span class="line"></span>
            <div class="cooperate"></div>
        </div>
        <p class="small-title">Enterprises that cooperate with Colorful Culture and Education</p>
        <div class="cooperateList">
            <?php foreach($cooperate_img as $item){ ?>
                <a href="<?php echo $item['url']; ?>"><img src="./images/cooperate/<?php echo $item['imgsrc']; ?>" alt=""></a>
            <?php }?>
        </div>
    </div>
    <div class="cooperateContent storeContent">
        <div class="title">
            <span class="line"></span>
            <h2>特約廠商</h2>
            <span class="line"></span>
            <div class="cooperate"></div>
        </div>
        <p class="small-title">Cooperating with Colorful Culture and Education</p>
        <div class="cooperateList">
        <?php foreach($store_img as $item){ ?>
            <a href="javascript:;"><img src="./images/cooperate/<?php echo $item['imgsrc']; ?>" alt=""></a>
        <?php }?>
        </div>
    </div>
    <div class="searchDiv">
        <input type="text" placeholder="搜尋..." id="searchBox">
        <button id="searchBtn">搜尋</button>
        <button id="allBtn">全部</button>
    </div>
    <div class="textBox">
        <div class="textHeader">
            企業名稱
        </div>
        <?php foreach($store_text as $item){ ?>
            <div class="textList"><?php echo $item['name']; ?></div>
        <?php }?>
        <!-- <?php foreach($RS_store_text as $item){ ?>
            <div class="textList"><?php echo  $item['name']; ?></div>
        <?php } ?> -->
    </div>
</div>

<script src="./js/cooperate.js"></script>

<head>
    <title>冰芬文教｜新竹市補習班</title>
</head>