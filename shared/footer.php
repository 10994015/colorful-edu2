<footer id="footer">
        <div class="contact">
            <div class="footerLogo">
                <img src="./images/cms/<?php echo $RS_infor['logo']; ?>" alt="新竹市東區補習班冰芬文教LOGO">
                <p>
                    色彩一直是療育人心的良藥
                    繽紛=冰芬 意旨戒掉呆板數學及爛英文的學習方式
                    利用國外的學習模式 "更高的自由度、更強的互動性和更深的參與感" 讓學習更加放鬆、快樂
                </p>
            </div>
            <div class="contactus">
                <h2>CONTACT INFORMATION</h2>
                <p>Phone:<?php echo $RS_contact['phone']; ?></p>
                <p>E-mail:<br><?php echo $RS_contact['email']; ?></p>
                <p>Address:<br><?php echo $RS_contact['address']; ?></p>
                <p>Cooperate:
                    <?php foreach($cooperate_img as $item){ echo $item['name']." "; } ?>
                </p>
            </div>
            <div class="about">
                <h2>About Us</h2>
                <div class="aboutList">
                    <a href="./?page=course">Course</a>
                    <a href="./?page=news">News</a>
                    <a href="./?page=cooperate">Cooperate</a>
                    <a href="./?page=about">About</a>
                    <!-- <a href="./?page=faq&innerpage=signup">常見問題</a>
                     <a href="javascript:;">加入會員</a> 
                    <a href="./?page=faq&innerpage=privacy">隱私政策</a>
                    <a href="./?page=faq&innerpage=serve">服務條款</a> -->
                </div>
            </div>
            <div class="link">
                <h2>Follow Us</h2>
                <div>
                    <a href="<?php echo $RS_contact['fb']; ?>" class="icon"><i class="fab fa-facebook-square"></i></a>
                    <a href="<?php echo $RS_contact['ig']; ?>" class="icon"><i class="fab fa-instagram"></i></a>
                    <a href="<?php echo $RS_contact['line']; ?>" class="icon"><i class="fab fa-line"></i></a>
                </div>
                <!-- <img src="./images/LINE.png" alt="" class="lineqrcode"> -->
                <div id="jquery-qrcode"></div>
            </div>
        </div>
        <div class="copyright">
            Copyright @2022 <a href="./"><?php echo $RS_infor['web_name']; ?>.</a>  All Rights Reserved.
        </div>
    </footer>

    <script>
        $("#jquery-qrcode").qrcode({
            render: 'div',
            size:133,
            text: '<?php echo $RS_contact['line']; ?>'
        });
</script>