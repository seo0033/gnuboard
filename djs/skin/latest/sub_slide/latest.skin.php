<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
$thumb_width=500;
$thumb_height=350;

?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->

    <?php
        for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height);
            if($thumb['src']) {
                $img = '<img class="img-responsive img-rounded--mx" src="'.$thumb['src'].'" alt="'.$list[$i]['subject'].'" width="100%">';
            } else {
                $img = "NO IMAGE";
            }?><div class="col-md-3 col-sm-4 col-xs-6 mx-gline padding-3">
								<div class="item-box">
									<figure>
										<span class="item-hover">
											<span class="overlay dark-5"></span>
											<span class="inner">

												<!-- lightbox -->
												<a class="ico-rounded lightbox" href="<?php echo $thumb['ori'] ?>" data-plugin-options='{'type':'image'}'>
													<span class="fa fa-plus size-20"></span>
												</a>

												
												<a class="ico-rounded" href="<?php echo $list[$i][wr_link1]?>" target="_blank">
													<span class="fa fa-link size-20"></span>
												</a>
												

											</span>
										</span>
										<?php echo $img;?>
									</figure>
								</div>
				  </div>
    <?php }?>

<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->