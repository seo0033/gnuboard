<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width=640;
$thumb_height=448;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style3.css">', 1);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<ul class="main_web row">
    <?php
        for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height);
            if($thumb['src']) {
                $img = '<img class="img-responsive" src="'.$thumb['src'].'" alt="'.$list[$i]['subject'].'" width="100%">';
            } else {
                $img = "NO IMAGE";
            }?>
 							
								<li>
								<?php echo "<a href=\"".$list[$i]['href']."\">"; ?>
		                        <?php echo $img;?>
								<?php echo "<strong>".$list[$i]['subject']."</strong>";?>
								<?php echo "</a>";?>
								</li>
    <?php }?>
</ul>

<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->