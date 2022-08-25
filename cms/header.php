<header id="header">
    <div class="leftDiv">
        <a href="./" id="logo"><i class="fa-solid fa-cube"></i><p id="logotext">CMS</p></a>
        <i class="fas fa-bars" id="menuBtn"></i>
        <label for="" class="searchBox"><i class="fa-solid fa-magnifying-glass"></i> <input type="text" placeholder="Search projects"> </label>
    </div>
    <div class="rightDiv">
        <div class="user" id="user">
            <div class="imgBox">
                <img src="../images/cms/<?php echo $_SESSION['imgsrc']; ?>">
                <span class="onlineCircle"></span>
            </div>
            <p><?php echo $_SESSION['name']; ?></p>
            <i class="fa-solid fa-angle-down"></i>
            <div class="userUl" id="userUl">
                <a href="javascript:;" class="activity"><i class="fa-solid fa-chart-line"></i>活動日誌</a>
                <span class="line"></span>
                <a href="javascript:;" class="logout" onclick="logoutFn()"><i class="fa-solid fa-arrow-right-from-bracket"></i>登出</a>
            </div>
        </div>
        <i class="fa-solid fa-expand" id="fullScreen"></i>
        <i class="fa-solid fa-bell" id="messages"></i>
        <i class="fa-solid fa-arrow-right-from-bracket" id="logoutBtn" onclick="backFront()"></i>
    </div>
</header>
<nav id="nav">
    <a href="javascript:;" class="user" id="navUser">
        <img src="../images/cms/<?php echo $_SESSION['imgsrc']; ?>" alt="">
        <div class="userInfor">
            <h3><?php echo $_SESSION['name']; ?></h3>
            <p>Project Manager</p>
        </div>
    </a>
    <div class="navList" id="headerNavList">
        <a href="./" class="newsItem"><p class="newsListText">HOME</p><i class="fa-solid fa-house"></i></a>
        <a href="./news.php" class="newsItem"><p class="newsListText">NEWS</p><i class="fa-solid fa-file-lines"></i></a>
        <a href="./cooperate.php" class="newsItem"><p class="newsListText">COOPERATE</p><i class="fa-solid fa-people-group"></i></a>
    </div>
</nav>
<script>
function backFront(){
    window.location.href = "../";
}
function logoutFn(){
    let chk = confirm('確定要登出嗎?');
    if(chk){
        window.location.href = "./logout.php";
        return;
    }
}
</script>
