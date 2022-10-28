<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style3.css">', 1);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->

<div class="section_list_n">
    <a href="<?php echo $list[0]['href'];?>"><?php echo cut_str(strip_tags($list[0]['wr_content']),60);?></a>
    <ul>
    <?php
        for ($i=0; $i<count($list); $i++) {?>
        <li>
            <div class="inner_h">
				<p class="tit"><a href="<?php echo $list[$i]['href'];?>"><?php echo cut_str(strip_tags($list[$i]['subject']),24);?></a><small class="pull-right">[<?=$list[$i]['datetime2']?>]</small></p>
            </div>
        </li>
    <?php }?>
    </ul>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->