<?php 
$sql_str = "SELECT * FROM pagebg WHERE id = '4' ";
$stmt = $conn -> prepare($sql_str);
$stmt -> execute();
$RS_bg = $stmt -> fetch(PDO::FETCH_ASSOC);
?>
<div id="about">
    <?php if($RS_bg['isshow']==1){ ?>
    <div class="coverBox">
        <img src="./images/cms/<?php echo $RS_bg['imgsrc']; ?>" class="coverImg">
        <h3><?php echo $RS_bg['pagename']; ?></h3>
    </div>
    <?php } ?>
    <div class="aboutContent">
        <img src="./images/xx.png">
        <div class="aboutText">
            <h4>歡迎來到<?php echo $RS_contact['name']; ?></h4>
            <p>
                <?php echo nl2br($RS_about['intro']); ?>
            </p>
        </div>
    </div>
    <div class="service"">
        <h3>我們提供了什麼?</h3>
        <p> <?php echo nl2br($RS_about['service']); ?></p>
        <div class="serviceList">
            <?php foreach($RS_service as $item){ ?>
            <div class="item">
                <div class="iconBox" style="background:<?php  echo $item['color'];?>"><i class="<?php echo $item['icon']; ?>"></i></div>
                <div class="text">
                    <h4 class="" style="color:<?php  echo $item['color'];?>"><?php echo $item['title']; ?></h4>
                    <p><?php echo nl2br($item['content']); ?></p>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
    <div class="box">
        <div class="item">
            <i class="fa-solid fa-phone"></i>
            <h2>來電詢問</h2>
            <p>
                <?php echo $RS_contact['name']; ?><br />
                <?php echo $RS_contact['address']; ?><br />
                連絡電話：<?php echo $RS_contact['phone']; ?>
            </p>
            <span>03-567-0018</span>
        </div>
        <div class="item">
            <i class="fa-solid fa-comments"></i>
            <h2>線上詢問</h2>
            <p>歡迎於以下官方臉書專頁、Instagram及line@訊息詢問更多優惠課程及相關資訊內容喔！</p>
            <div>
                <a target="_blank" href="<?php echo $RS_contact['fb']; ?>" class="icon"><i class="fab fa-facebook-square"></i></a>
                <a target="_blank" href="<?php echo $RS_contact['ig']; ?>" class="icon"><i class="fab fa-instagram"></i></a>
                <a target="_blank" href="<?php echo $RS_contact['line']; ?>" class="icon"><i class="fab fa-line"></i></a>
            </div>
        </div>
    </div>
    <div class="contact" id="contact">
        <form action="./shared/send.php" method="post">
            <h2>有什麼話想說?</h2>
            <span>姓名</span>
            <input type="text" required name="name" placeholder="姓名" id="name">
            <span>電子郵件</span>
            <input type="email" required name="email" placeholder="email" id="email">
            <span>主旨</span>
            <input type="text" required name="title" placeholder="主旨" id="title">
            <span>內容</span>
            <textarea name="content" cols="30" rows="10" placeholder="想詢問的內容..." id="content"></textarea>
            <input hidden type="submit" id="submit" />
            <a href="javascript:;" class="send" id="send">送出</a>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.386173646672!2d121.01740541483659!3d24.78222678409088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468363ae7276ba5%3A0x4e22c2db67d6fe92!2zMzAw5paw56u55biC5p2x5Y2A5YWJ5b6p6Lev5LiA5q61Mjcx6JmfM-aokw!5e0!3m2!1szh-TW!2stw!4v1645111991019!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<head>
    <title>冰芬文教｜新竹市補習班</title>
    <meta name="description" content="位於新竹市東區的冰芬文教補習班。色彩一直是療癒人心的良藥，繽紛=冰芬 意旨戒掉呆板的學習方式，透過多元教學經驗，讓學習更多 '冰芬' 色彩，並套用國外 「更高的自由度」、「更強的互動性」和「更深的參與感」的學習模式，讓學習更加放鬆、快樂，同時讓學生走進世界，開拓視野。我們也提供「留遊學諮詢」的服務，希望優秀及想往國際發展的學生，能有更好的圓夢舞台。在「人才培育」方面也提供完善的課程規劃、實作教學及測驗，讓更多有志於多元教學的人才能被看見。選擇冰芬，使你的未來繽紛。讓學生在學習的領域紛紛享受五彩斑斕的美麗世界。" />
</head>

<script>

const send = document.getElementById('send');
const name = document.getElementById('name');
const email = document.getElementById('email');
const title = document.getElementById('title');
const content = document.getElementById('content');
const submit = document.getElementById('submit');

send.addEventListener('click',sendLetter)
function sendLetter (){
    if(name.value === ""){
        Swal.fire({
            title: 'Error',
            text: "姓名不得為空",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return
    }
    if(email.value === ""){
        Swal.fire({
            title: 'Error',
            text: "Email不得為空",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return
    }
    if(title.value === ""){
        Swal.fire({
            title: 'Error',
            text: "請輸入主旨",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return
    }
    if(content.value === ""){
        Swal.fire({
            title: 'Error',
            text: "請輸入內容",
            icon: 'error',
            confirmButtonColor: '#1B4F7D',
            confirmButtonText: '確定'
          }
        )
        return
    }
    submit.click();
}

</script>
