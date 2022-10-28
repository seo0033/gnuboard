<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width=640;
$thumb_height=448;

?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<ul>
<?php
        for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height);
            if($thumb['src']) {
                $img = '<img class="img-responsive" src="'.$thumb['src'].'" alt="'.$list[$i]['subject'].'" >';
            } else {
                $img = "NO IMAGE";
            }?>
 	<li>
		<a href="<?php echo $list[$i]['href'];?>"><?php echo $img;?><?php echo cut_str(strip_tags($list[$i]['subject']),20);?></a>
	</li>
<?php }?>
</ul>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->