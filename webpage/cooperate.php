<?php 
 $sql_str = "SELECT * FROM cooperate_img ORDER BY id DESC";
 $cooperate_img = $conn -> query($sql_str);

 $sql_str = "SELECT * FROM store_img ORDER BY id DESC";
 $store_img = $conn -> query($sql_str);

 $sql_str = "SELECT * FROM store_text ORDER BY id DESC";
 $store_text = $conn -> query($sql_str);

?>

<div id="cooperate">
    <div class="coverBox">
        <img src="./images/0002.jpg" class="coverImg">
        <h3>COOPERATE</h3>
    </div>
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