<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css">', 0);
?>
<h2 id="container_title"><?php echo $board['bo_subject'] ?><span class="sound_only"> 목록</span></h2>
<!-- 게시판 목록 시작 { -->
<div id="bo_list" class="fz_wrap">
    <!-- 게시판 카테고리 시작 { -->
    <?php if ($is_category) { ?>
    <nav id="bo_cate">
        <h2><?php echo $board['bo_subject'] ?> 카테고리</h2>
        <ul id="bo_cate_ul">
            <?php echo $category_option ?>
        </ul>
    </nav>
    <?php } ?>
    <!-- } 게시판 카테고리 끝 -->

    <!-- 게시판 페이지 정보 및 RSS { -->
	<div class="fz_header">
		<div class="fz_total_count"><span> Total <strong><?php echo number_format($total_count) ?></strong>건</span></div>
		<? if ($rss_href) { ?><div class="fz_rss"><a class="list_btn" href="<?=$rss_href?>" title="RSS"><i class="fa fa-rss"></i> RSS</a></div><?php }?>
		<?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="list_btn pull-right"><i class="fa fa-user-circle" aria-hidden="true"></i> 관리자</a><?php } ?>
	</div>
    <!-- } 게시판 페이지 정보 및 RSS 끝 -->
<form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

	<ul class="fz_list">
		<li class="fz_list_th">
			<div class="fz_num hidden-xs">번호</div>
    <?php if ($is_checkbox) { ?>
    <div id="gall_allchk">
        <input type="checkbox" id="chkall" onclick="if (this.checked) all_checked(true); else all_checked(false);">
		<label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
    </div>
    <?php } ?>
			<div class="fz_subject">제목</div>
			<div class="fz_writer hidden-xs">글쓴이</div>
			<div class="fz_date hidden-xs"><?php echo subject_sort_link('wr_datetime', $qstr2, 1) ?>날짜</a></div>
			<div class="fz_hit hidden-xs"><?php echo subject_sort_link('wr_hit', $qstr2, 1) ?>조회</a></div>
			<?php if ($is_good) { ?><div class="fz_good hidden-xs"><?php echo subject_sort_link('wr_good', $qstr2, 1) ?>추천</a></div><?php } ?>
			<?php if ($is_nogood) { ?><div class="fz_nogood hidden-xs"><?php echo subject_sort_link('wr_nogood', $qstr2, 1) ?>비추천</a></div><?php } ?>
		</li>
		<?php
		for ($i=0; $i<count($list); $i++) {
			if($list[$i]['icon_secret']) $list[$i]['article_type'] = "<span class='icon_pack2 icon_secret2'>비밀글</span>";
			else if($list[$i]['icon_file']) $list[$i]['article_type'] = "<span class='icon_pack2 icon_file2'>파일첨부</span>";
			else $list[$i]['article_type'] = "<span class='icon_pack2 icon_txt2'>텍스트</span>";

			if($list[$i]['icon_link']) $list[$i]['icon_pack'] .= "<span class='icon_pack icon_link'>링크</span>";
			if($list[$i]['icon_new']) $list[$i]['icon_pack'] .= "<span class='icon_pack icon_new'>새글</span>";
			if($list[$i]['wr_reply']) $list[$i]['icon_reply'] = "<span class='icon_pack2 icon_reply'>답변</span>";
		 ?>
		<li class="<?php if ($list[$i]['is_notice']) echo "bo_notice";if($list[$i]['wr_reply']) echo "re".strlen($list[$i][wr_reply]);?>">
			<div class="fz_num hidden-xs">
			<?php

			if ($list[$i]['is_notice']) // 공지사항
				echo '<strong class="icon_notice">공지</strong>';
			else if ($wr_id == $list[$i]['wr_id'])
				echo "<span class=\"bo_current\">열람중</span>";
			else
				echo $list[$i]['num'];
			 ?>
			</div>
			<?php if ($is_checkbox) { ?>
			<div class="fz_checkbox">
				<label for="chk_wr_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject'] ?></label>
				<input type="checkbox" name="chk_wr_id[]" value="<?php echo $list[$i]['wr_id'] ?>" id="chk_wr_id_<?php echo $i ?>">
			</div>
			<?php } ?>
			<div class="fz_subject">
			<?php 
				echo "<a href='{$list[$i]['href']}' class='ellipsis'>";
				echo $list[$i]['icon_reply'];
				echo $list[$i]['article_type'];
				if ($is_category && $list[$i]['ca_name']) {echo "<span class=\"bo_cate_link\">[{$list[$i]['ca_name']}]</span>";}
				echo $list[$i]['subject'];
				if($list[$i]['comment_cnt']) { echo "<span class='sound_only'>댓글</span>{$list[$i]['comment_cnt']}<span class='sound_only'>개</span>";}
				echo $list[$i]['icon_pack'];
				echo "</a>";
			?>
			</div>
			<div class="fz_writer"><span class="fz_mobile_info"><i class="fa fa-user"></i></span><?php echo $list[$i]['name'] ?></div>
			<div class="fz_date"><span class="fz_mobile_info"><i class="fa fa-calendar-check-o"></i></span><?php echo $list[$i]['datetime2'] ?></div>
			<div class="fz_hit"><span class="fz_mobile_info"><i class="fa fa-eye"></i></span><?php echo $list[$i]['wr_hit'] ?></div>
			<?php if ($is_good) { ?><div class="fz_good"><span class="fz_mobile_info"><i class="fa fa-thumbs-o-up"></i></span><?php echo $list[$i]['wr_good'] ?></div><?php } ?>
			<?php if ($is_nogood) { ?><div class="fz_nogood"><span class="fz_mobile_info"><i class="fa fa-thumbs-o-down"></i></span><?php echo $list[$i]['wr_nogood'] ?></div><?php } ?>
		</li>
		<?php } ?>
		<?php if (count($list) == 0) { echo '<div class="fz_empty_list">게시물이 없습니다.</div>'; } ?>

	</ul>

	<div class="fz_footer">
        <?php if ($is_checkbox) { ?>
		<div id="bo_fx">
	<?php if ($is_checkbox) { ?>
			<button type="submit" class="list_btn" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value">선택삭제</button>
			<button type="submit" class="list_btn" name="btn_submit" value="선택복사" onclick="document.pressed=this.value">선택복사</button>
			<button type="submit" class="list_btn" name="btn_submit" value="선택이동" onclick="document.pressed=this.value">선택이동</button>
	<?php } ?>

		</div>
        <?php } ?>
		<div class="fr">
            <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="list_btn btn_list">목록</a><?php } ?>
            <?php if ($write_href) { ?><a class="list_btn btn_write" href="<?=$write_href?>" title="글쓰기"><i class="fa fa-pencil"></i> 글쓰기</a><?php } ?>
		</div>
	</div>

    </form>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>




<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}
// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->

