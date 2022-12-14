<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 420;
$thumb_height = 280;
?>

<link rel="stylesheet" href="<?=$latest_skin_url?>/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?=$latest_skin_url?>/css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
 <div class="owl-carousel owl-theme">
    <?php
    for ($i=0; $i<count($list); $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    ?> 	
  
 <div class="item">
  <div class="lt_img"><a href="<?php echo $list[$i]['href'] ?>"><?php echo $img_content; ?></a></div>
   <div class="custom_overlay">
    <span class="custom_overlay_inner">
    <?php
    if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i><span class=\"sound_only\">비밀글</span> ";

    if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";

    if ($list[$i]['icon_hot']) echo "<span class=\"hot_icon\">H<span class=\"sound_only\">인기글</span></span>";
    
	echo "<a href=\"".$list[$i]['wr_link1']."\" class='subject'> ";
    if ($list[$i]['is_notice'])
    echo "<strong>".$list[$i]['subject']."</strong>";
    else
    echo $list[$i]['subject'];

    echo "</a>";

    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

    //echo $list[$i]['icon_reply']." ";
    // if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
    //if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

     if ($list[$i]['comment_cnt'])  echo "
     <span class=\"lt_cmt\">+ ".$list[$i]['wr_comment']."</span>";
     ?>
     <span class="lt_date"><?php echo $list[$i]['datetime2'] ?></span>
     </span>
     </div>
    </div>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
  <div class="empty_li">게시물이 없습니다.</div>
    <?php }  ?>
</div>
