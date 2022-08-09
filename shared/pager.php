<?php 

?>

<div class="page">
    <div class="left">
        <p>第<?php echo ($first_row + 1); ?> - <?php echo min(($last_row + 1),$total_rows); ?>筆 / 共<?php echo $total_rows; ?>筆</p>
    </div>
    <div class="center">
        <?php if($curr_page > 0){ ?>
        <a href="./?page=latestnews&curr_page=0"><i class="fa-solid fa-angles-left"></i></a>
        <a href="./?page=latestnews&curr_page=<?php echo ($curr_page - 1); ?>"><i class="fa-solid fa-angle-left"></i></a>
        <?php } ?>
        <?php for($i=0;$i<$total_pages;$i++){ ?>
        <a href="./?page=latestnews&curr_page=<?php echo $i; ?>" class="<?php if($curr_page==$i){echo 'focus';}?>"><li><?php echo ($i+1);?></li></a>
        <?php } ?>
        <?php if($curr_page < ($total_pages - 1)){ ?>
        <a href="./?page=latestnews&curr_page=<?php echo ($curr_page + 1); ?>"><i class="fa-solid fa-angle-right"></i></a>
        <a href="./?page=latestnews&curr_page=<?php echo ($total_pages - 1); ?>"><i class="fa-solid fa-angles-right"></i></a>
        <?php } ?>
    </div>
    <div class="right">
        <p>第<?php echo ($curr_page + 1); ?>頁 / 共<?php echo $total_pages; ?>頁</p>
    </div>
</div>