<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}

if (G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH . '/index.php');
    return;
}

include_once(G5_THEME_PATH . '/head.php');
?>


<main class="main_page">
    <section class="main_visual">
        <div class="main_slide">
            <figure class="itm01">이미지1</figure>
            <figure class="itm02">이미지2</figure>
            <figure class="itm03">이미지3</figure>
        </div>
        <div class="slogan">
            <h2>A Global Leader in<br />Electronic Materials & Foaming Agents</h2>
            <p>
                동진쎄미켐은 화학 소재기술의 국산화, 인류의 미래를 만들어가는 새로운 기술,<br /> 인간존중의 정신을 통해 전자재료와 발포제 분야의 글로벌 리더로서 새로운 역사를 만들어가고 있습니다.
            </p>
        </div>
    </section>
    <div>
        <? echo latest("theme/main_web", "qa", 5, 25); ?>
        <? echo latest("theme/main_photo", "qa", 5, 25); ?>

    </div>
</main>




<?php
include_once(G5_THEME_PATH . '/tail.php');
