<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/head.php');
    return;
}

if (G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH . '/shop.head.php');
    return;
}
include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');
include_once(G5_LIB_PATH . '/outlogin.lib.php');
include_once(G5_LIB_PATH . '/poll.lib.php');
include_once(G5_LIB_PATH . '/visit.lib.php');
include_once(G5_LIB_PATH . '/connect.lib.php');
include_once(G5_LIB_PATH . '/popular.lib.php');
?>

<!-- 팝업창 -->
<?php
if (defined('_INDEX_')) { // index에서만 실행
    include G5_BBS_PATH . '/newwin.inc.php'; // 팝업레이어
}
?>

<div class="Wrap">
    <header class="header">
        <div class="inner">
            <a href="<?php echo G5_THEME_URL ?>/doc/m011.php">일반페이지</a>
            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=qa">게시판</a>
        </div>
    </header>