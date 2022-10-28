<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css">', 0);
?>
<section id="bo_w" class="fz_wrap">
	<div class="fz_title_box"><?php echo $g5['title'] ?></div>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <?php
    $option = '';
    $option_hidden = '';
    if ($is_notice || $is_html || $is_secret || $is_mail) {
        $option = '';
        if ($is_notice) {
            $option .= "\n".'<span class="checkbox2"><input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label></span>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<span class="checkbox2"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'">'."\n".'<label for="html"'.($html_checked ? " class='ui-state-active'" : "").'>html</label></span>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<span class="checkbox2"><input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label></span>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<span class="checkbox2"><input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label></span>';
        }
    }

    echo $option_hidden;
    ?>
	<?php if ($is_name) { ?>
	<div class='fz-form-title'><label for="wr_name">이름 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'><input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="i_text required" maxlength="20" placeholder="이름을 입력해 주세요."></div>
	<?php } ?>
	<?php if ($is_password) { ?>
	<div class='fz-form-title'><label for="wr_password">비밀번호 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'><input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="i_text <?php echo $password_required ?>" placeholder="비밀번호는 꼭 기억하십시오." maxlength="20"></div>
	<?php } ?>

	<?php if ($is_email) { ?>
	<div class='fz-form-title'><label for="wr_email">이메일 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'><input type="email" name="wr_email" id="wr_mail" value="<?php echo $email ?>" class="i_text email" placeholder="메일로 견적을 받기 원하시면 이메일을 꼭 남겨주십시오." maxlength="20"></div>
	<?php } ?>

	<?php if ($is_category) { ?>
	<div class='fz-form-title'><label for="ca_name">분류 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'>
		<span class="select_box">
		<select id="ca_name" name="ca_name">
			<option value="">선택하세요</option>
			<?php echo $category_option ?>
		</select>
		</span>
	</div>
	<?php } ?>
	<div class='fz-form-title'><label for="wr_subject">제목 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'><input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="i_text required" placeholder="제목을 입력해 주세요."></div>

	<div class='fz-form-title'><label for="wr_6">일반전화번호</label></div>
	<div class='fz-form-content'><input type="number" name="wr_6" value="<?php echo $wr_6 ?>" id="wr_6"  class="i_text" placeholder="연락 받으실 전화번호를 입력해 주세요."></div>

	<div class='fz-form-title'><label for="wr_7">휴대폰번호 (필수입력)<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'><input type="number" name="wr_7" value="<?php echo $wr_7 ?>" id="wr_7" required class="i_text required" placeholder="연락 받으실 휴대폰번호를 입력해 주세요."></div>


	<div class='fz-form-title'><label for="wr_10">답변유형<strong class="sound_only">필수</strong></label></div>
	<div class='fz-form-content'>
		<input name="wr_10" type=radio value="게시판" <? if( $u=w || $write[wr_10] == "게시판")  echo "checked"; ?> > 게시판 
		<input name="wr_10" type=radio value="메일" <? if( $u=w || $write[wr_10] == "메일")  echo "checked"; ?> >  메일
		<input name="wr_10" type=radio value="전화" checked <? if($write[wr_10] == "전화")  echo "checked"; ?> >  전화    
		<input type=radio name="wr_10" value="방문" <? if($write[wr_10] == "방문")  echo "checked"; ?> > 방문   
	</div>




	<div class='fz-form-title'><label for="wr_content">내용<strong class="sound_only">필수</strong></label></div>
	<div class="wr_content fz-form-title">
	<?php if($write_min || $write_max) { ?>
	<!-- 최소/최대 글자 수 사용 시 -->
	<p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
	<?php } ?>
	<?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
	<?php if($write_min || $write_max) { ?>
	<!-- 최소/최대 글자 수 사용 시 -->
	<div id="char_count_wrap"><span id="char_count"></span>글자</div>
	<?php } ?>
	</div>
	
	<?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
	<div class='fz-form-title'><label for="wr_link<?php echo $i ?>">링크 #<?php echo $i ?></label></div>
	<div class='fz-form-content'><input type="url" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="i_text wr_link" placeholder="http://"></div>
	<?php } ?>

	<?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
	<div class='fz-form-title'>파일 #<?php echo $i+1 ?></div>
	<div class='fz-form-content'>
		<input type="file" name="bf_file[]" title="파일첨부 <?php echo $i+1 ?> :  용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file i_text">
		<?php if ($is_file_content) { ?>
		<input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" placeholder="파일 설명을 입력해주세요." class="frm_file i_text">
		<?php } ?>
		<?php if($w == 'u' && $file[$i]['file']) { ?>
		<span class="checkbox2"><input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i; ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')'; ?> 파일 삭제</label></span>
		<?php } ?>
	</div>
	<?php } ?>

    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>


	<hr> 
	<div class="frx">
		<input type="submit" name="btn_submit" value="글쓰기"  class="list_btn btn_list pull-right" ><br><br>
	</div>
    </form>

	<script type="text/javascript">
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });
    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
		<?php if($is_category){?>
		if(!$("#ca_name").val())
		{
			alert("카테고리는 필수 입력사항입니다. 카테고리를 선택해 주세요.");
			$("#ca_name").siblings("a").focus();
			return false;
		}
		<?php }?>
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }

	$(function(){
		//$(".select_box").select_box({useBorderbox:true});
		//$(".checkbox2").check_box();
	});
    </script>
</section>
<!-- } 게시물 작성/수정 끝 -->