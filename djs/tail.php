<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/tail.php');
    return;
}

if (G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH . '/shop.tail.php');
    return;
}
?>



<?php
if (!defined('_INDEX_')) { // index가 아닐 때...
    include G5_THEME_PATH . '/sub.tail.php'; // 서버테일
}
?>

<footer class="footer">
    <ul>
        <li>주소 : <?= $as_address ?>&nbsp;&nbsp;사업자등록번호 : <?= $as_num ?></li>
        <li>대표전화 : <?= $as_tel ?>&nbsp;&nbsp;Fax : <?= $as_fax ?></li>
    </ul>
    <address>
        copyright &copy; <?= $as_title ?> allrights reserved.
    </address>
</footer>


</div>

<?php
if (G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>
<?
if ($_GET["bo_table"] == "qa") {
    $page_num = 4;
} else if ($_GET["bo_table"] == "notice") {
    $page_num = 5;
}
// else {$page_num = "0";}
// php는 땀을 중요시 한다. ;
?>

<!-- } 하단 끝 -->

<script>
    $(function() {
        // 폰트 리사이즈 쿠키있으면 실행
        font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
    });
</script>
<script>
    $(function() {
        var num = <?= $page_num ?>
        $('.lnb li').eq(num - 1).addClass('on').siblings().removeClass('on');
    })
</script>

<?php
include_once(G5_THEME_PATH . "/tail.sub.php");
