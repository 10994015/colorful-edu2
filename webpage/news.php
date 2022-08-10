<?php 
$max_rows = 10;
$total_rows = 0;
$total_pages = 0;
$curr_page = 0;
if(isset($_GET['curr_page'])){
    $curr_page = $_GET['curr_page'];
}
$first_row = $curr_page * $max_rows;
$last_row = $first_row + $max_rows - 1;
?>

<div id="newsPage">
    <div class="newsType">
        <button class="newsTypeBtn focus">全部</button>
        <button class="newsTypeBtn">課程</button>
        <button class="newsTypeBtn">日常</button>
        <button class="newsTypeBtn">培訓</button>
    </div>
    <div class="searchBox">
        <div class="keyword">
            <a href="javascript:;" class="course">#課程</a>
            <a href="javascript:;" class="daily">#日常</a>
            <a href="javascript:;" class="train">#培訓</a>
        </div>
        <label for="">
            <input type="text" id="searchBar" placeholder="Search...">
            <button id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </label>
    </div>
    <div class="newsConent">
        <div class="newsList">
            <h3>「幹您娘」的搜尋結果:共10筆</h3>
            <div class="newsItem focusNews">
                <div class="imgBox">
                    <img src="./images/004.png" alt="">
                </div>
                <div class="text-content">
                        <div class="hashtags">
                            <a href="javascript:;"><i class="tag" style="color:#1484c4">#課程</i></a>
                            <a href="javascript:;"><i class="tag" style="color:#FF5722">#日常</i></a>
                            <a href="javascript:;"><i class="tag" style="color:#8DC220">#培訓</i></a>
                        </div>
                        <a href="javascript:;" class="news-title">機器人STEAM教室，全國機器人大賽等著你！機器人STEAM教室，全國機器人大賽等著你！</a>
                        <p class="newsText">冰芬文教祝全天下偉大的媽媽們母親節快樂 Happy Mother’s Day❤️❤️
                        小編腦中出現這首歌，世上只有媽媽好，有媽的孩子像個寶
                        </p>
                        <div class="otherText">
                            <p class="date"> <i class="far fa-clock"></i> 2022/08/08</p>
                            <a href="javascript:;" class="reading"> <span class="back"></span> <p>READ MORE<i class="fas fa-arrow-right"></i></p> </a>
                        </div>
                    </div>
            </div>
            <?php for($i=0;$i<6;$i++){ ?>
            <div class="newsItem otherNews">
                <div class="imgBox">
                    <img src="./images/003.png" alt="">
                </div>
                <div class="text-content">
                        <div class="hashtags">
                            <a href="javascript:;"><i class="tag" style="color:#1484c4">#課程</i></a>
                            <a href="javascript:;"><i class="tag" style="color:#FF5722">#日常</i></a>
                        </div>
                        <a href="javascript:;" class="news-title">機器人STEAM教室，全國機器人大賽等著你！機器人STEAM教室，全國機器人大賽等著你！</a>
                        <p class="newsText">冰芬文教祝全天下偉大的媽媽們母親節快樂 Happy Mother’s Day❤️❤️
                        小編腦中出現這首歌，世上只有媽媽好，有媽的孩子像個寶
                        </p>
                        <div class="otherText">
                            <p class="date"> <i class="far fa-clock"></i> 2022/08/08</p>
                            <a href="javascript:;" class="reading"> <span class="back"></span> <p>READ MORE<i class="fas fa-arrow-right"></i></p> </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
        </div>
        <div class="sidebar">
            <div class="searchBox">
                <div class="keyword">
                    <a href="javascript:;" class="course">#課程</a>
                    <a href="javascript:;" class="daily">#日常</a>
                    <a href="javascript:;" class="train">#培訓</a>
                </div>
                <label for="">
                    <input type="text" id="searchBar" placeholder="Search...">
                    <button id="searchBtn"><i class="fa-solid fa-magnifying-glass"></i></button>
                </label>
            </div>
            
            <div class="sidebarNews">
                <h4>熱門訊息</h4>
                <div class="newsCarousel">
                    <?php for($i=0;$i<3;$i++){ ?>
                    <a href="javascript:;" class="newsItem">
                        <div class="imgBox hot">
                            <img src="./images/003.png" alt="">
                        </div>
                        <div  class="text-content">
                            <h3 class="news-title">機器人STEAM教室，全國機器人大賽等著你！</h3>
                            <span class="date"><i class="far fa-clock"></i> 2022/08/08</span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>課程</h4>
                <div class="newsCarousel">
                    <?php for($i=0;$i<3;$i++){ ?>
                    <a href="javascript:;" class="newsItem">
                        <div class="imgBox course">
                            <img src="./images/003.png" alt="">
                        </div>
                        <div  class="text-content">
                            <h3 class="news-title">機器人STEAM教室，全國機器人大賽等著你！</h3>
                            <span class="date"><i class="far fa-clock"></i> 2022/08/08</span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>日常</h4>
                <div class="newsCarousel">
                    <?php for($i=0;$i<3;$i++){ ?>
                    <a href="javascript:;" class="newsItem">
                        <div class="imgBox daily">
                            <img src="./images/003.png" alt="">
                        </div>
                        <div  class="text-content">
                            <h3 class="news-title">機器人STEAM教室，全國機器人大賽等著你！</h3>
                            <span class="date"><i class="far fa-clock"></i> 2022/08/08</span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="sidebarNews">
                <h4>培訓</h4>
                <div class="newsCarousel">
                    <?php for($i=0;$i<3;$i++){ ?>
                    <a href="javascript:;" class="newsItem">
                        <div class="imgBox train">
                            <img src="./images/003.png" alt="">
                        </div>
                        <div  class="text-content">
                            <h3 class="news-title">機器人STEAM教室，全國機器人大賽等著你！</h3>
                            <span class="date"><i class="far fa-clock"></i> 2022/08/08</span>
                        </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- <?php include_once('./shared/pager.php'); ?> -->
</div>