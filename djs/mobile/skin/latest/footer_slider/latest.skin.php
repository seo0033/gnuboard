<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style3.css">', 1);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->

<div>
    <ul class="footer_notice">
    <?php
        for ($i=0; $i<count($list); $i++) {?>
        <li>
            <div>
				<a href="<?php echo $list[$i]['href'];?>"><?php echo cut_str(strip_tags($list[$i]['subject']),24);?></a><small>[<?=$list[$i]['datetime2']?>]</small>
            </div>
        </li>
    <?php }?>
    </ul>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->