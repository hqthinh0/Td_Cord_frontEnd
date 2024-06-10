<?php
    require_once('../assets/mailer/mailer_cfg.php');
    require_once('../assets/mailer/cryptor.php');

    $Referer_check = 1;
    $Referer_check_domain = $config['domain'];
    $hash = Cryptor::encrypt( time(), $_SERVER['REMOTE_ADDR'] . $config['secret_pass']);
    function refererCheck($Referer_check,$Referer_check_domain){
        if($Referer_check == 1 && !empty($Referer_check_domain)){
            if(isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'],$Referer_check_domain) === false){
                return exit('<p align="center">リファラチェックエラー。フォームページのドメインとこのファイルのドメインが一致しません</p>');
            }
        }
    }
    refererCheck($Referer_check,$Referer_check_domain);
?>

<!DOCTYPE html>
<html lang="ja" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
	<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<title>★★★</title>
	<meta
		name="description"
		content="★★★"
	/>
	<meta name="keywords" content="★★★" />
	<meta property="og:title" content="★★★" />
	<meta
		property="og:description"
		content="★★★"
	/>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="★★★" />
	<meta property="og:image" content="http://www.shoenekeisan.net/assets/images/ogp.png" />
	<meta property="og:site_name" content="★★★" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
</head>

	<body>
		<div id="l-document">
			<header id="l-header" class="l-header" >
				<div class="wrp-container no-container">
					<div class="l-header__contact ">
						<p class="l-header__contact--p icon-phone txt-uppercase">Tư vấn báo giá hotline: 182201476</p>
					</div>
				</div>
				<div class="l-header__wrapper">
						
					<h1 id="sitelogo">
						<a href="../"
							><img src="../assets/images/logo.png" alt="★★★" class="fluid-image"
						/></a>	
					</h1>
					<a class="nav-global-menu">
						<span class="b1" aria-hidden="true"></span>
						<span class="b2" aria-hidden="true"></span>
						<span class="b3" aria-hidden="true"></span>
					</a>
					<nav class="nav-global-wrap">
						<ul class="nav-global">
							<li class="">
								<a href="../" class="nav-item">Trang Chủ</a>
							</li>
							<li class="">
								<a href="../company/" class="nav-item">Giới thiệu</a>
							</li>
							<li class="">
								<a href="../construction/" class="nav-item">Thi công</a>
							</li>
							<li class="">
								<a href="../serivce/" class="nav-item">dịch vụ</a>
							</li>
							<li class="">
								<a href="../model/" class="nav-item">Nhà mẫu</a>
							</li>
							<li class="">
								<a href="../estimate/" class="nav-item">Báo giá</a>
							</li>
							<!-- <li class="">
								<a href="../recruitment/" class="nav-item">Tuyển dụng</a>
							</li> -->
							<li class="active">
								<a href="../contact/" class="nav-item">liên hệ</a>
							</li>
						
						</ul>

					</nav>
				</div>
			</header>
		
<div id="l-main">
	<section>
		<div class="box-mainvisual">
			<div class="box-mainvisual__img box-effect">
				<div class="box-effect__frame">
					<figure class="js-fullbg box-effect__bg">
						<img src="../assets/images/pct-mainvisual_privacy.jpg" alt="" />
					</figure>
				</div>
			</div>
			<div class="box-mainvisual__triangle"></div>
			<div class="box-mainvisual__wrp  box-mainvisual__title ">
				<h2 class="hdg-lv2__banner hdg-lv2">Liên hệ</h2>
			</div>
		</div>
	</section>
	<div class="wrp-container">
            <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li><a href="../">Trang Chủ</a></li>
                    <li>Liên Hệ</li>
                </ul>
            </div>
        </div>
	<section class="sec-base">
		<div class="wrp-container">
			<div class="contact-title">
				<h3 class="hdg-lv3"> <span class="color-primary">Mẫu Yêu Cầu</span></h3>
				<p><span class="txt--red">*</span>các trường hợp bắt buộc<br />vui lòng nhập theo chi tiết yêu cầu của bạn</p>
			</div>
			<div class="contact-title hide">
					<h3 class="hdg-lv3"> <span class="color-primary">Mẫu Yêu Cầu</span></h3>
				<p>
					Vui lòng kiểm tra xem thông tin bạn nhập có đúng không.<br />Nếu nội dung không có vấn đề gì vui lòng nhấn nút "Gửi".
				</p>
			</div>
			<div class="grid-row box-contact-wrp">
				<div class="grid-col--8 box-contact__col">
					<form
						method="post"
						action="send.php"
						class="autoConfirm mt0"
						enctype="multipart/form-data"
						name="contact_frm"
						id="contact_frm"
					>
						<div id="contact_frm_confilm">
							<div id="mail_input">
								<table class="mb20 frm-tbl--v2">
									<tr>
										<th>Họ và tên<span class="txt--red"> *</span></th>
										<td>
											<input
												size="20"
												type="text"
												name="txtName"
												id="txtName"
												class="frm-base-input js_validate"
											/>
											<p class="error_message" id="error_txtName"></p>
										</td>
									</tr>
									<!-- <tr>
										<th>お名前（カナ）<span class="txt--red">*</span></th>
										<td>
											<input
												size="20"
												type="text"
												name="txtName_kana"
												id="txtName_kana"
												class="frm-base-input js_validate"
											/>
											<p class="error_message" id="error_txtName_kana"></p>
										</td>
									</tr> -->
									<!-- <tr>
										<th>会社名</th>
										<td>
											<input
												size="20"
												type="text"
												name="txtCompany"
												id="txtCompany"
												class="frm-base-input js_validate"
											/>
											<p class="error_message" id="error_txtCompany"></p>
										</td>
									</tr> -->
									<tr>
										<th>Email<span class="txt--red"> *</span></th>
										<td>
											<input
												size="30"
												type="text"
												name="txtEmail"
												id="txtEmail"
												class="frm-base-input js_validate"
											/><br />
											<p class="error_message" id="error_txtEmail"></p>
										</td>
									</tr>
									<tr>
										<th>Xác nhận lại email <span class="txt--red"> *</span></th>
										<td>
											<div id="box_emailconfirm">
												<input
													size="30"
													type="text"
													name="txtEmail_confirm"
													id="txtEmail_confirm"
													class="frm-base-input js_validate"
												/>
												<p class="error_message" id="error_txtEmail_confirm"></p>
											</div>
										</td>
									</tr>
									<tr>
										<th>Số Điện Thoại <span class="txt--red"> *</span></th>
										<td>
											<input
												size="30"
												type="text"
												name="txtTel"
												id="txtTel"
												class="frm-base-input js_validate"
											/>
											<p class="error_message" id="error_txtTel"></p>
										</td>
									</tr>
									<tr>
										<th>Chi Tiết Yêu cầu<span class="txt--red"> *</span></th>
										<td>
											<textarea
												name="txtComment"
												id="txtComment"
												cols="50"
												rows="5"
												class="frm-base-input frm-base-textarea js_validate"
											></textarea>
											<p class="error_message" id="error_txtComment"></p>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div id="mail-btn" class="txt_c contact-btn hide">
							<div class="txt_c">
								<input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
								<div class="wrp-button">
									<button
										id="back"
										name="back"
										class="autoConfirmBack frm-btn frm-btn__back"
										name="send"
										onclick="javascript: return DisplayInput();"
									>
										<span>Quay Lại</span>
									</button>
									<button id="submit_btn" class="submit_btn frm-btn" ntype="submit" disabled>
										<span>Gởi đi</span>
									</button>
								</div>
							</div>
						</div>
						<table class="frm-tbl--v2 contact-btn">
							<tr class="tbl-txt_c">
								<th></th>
								<td>
									<div class="txt_c">
										<div style="display: inline-block; margin-bottom: 20px;">
											<div
												class="g-recaptcha"
												data-sitekey="6Ld1MxUpAAAAAEK3t2ZF9pIU8S6q-_pNhzTj0nu_"
												data-callback="activeBtn"
												data-expired-callback="inactiveBtn"
												data-error-callback="inactiveBtn"
											></div>
										</div>
									</div>
									<div class="txt_c">
										<button
											id="confirm_btn"
											class="confirm_btn frm-btn frm-btn--v2"
											name="config"
											onClick="return ConfirmClick_Contact();"
										>
											<span>Xác nhận</span>
										</button>
									</div>
								</td>
							</tr>
						</table>
						  <?php
							echo '<input type="hidden" name="mailform_token" id="mailform_token" value="'.$hash.'">';
						?>
                        <input type="hidden" id="mailform_js" name="mailform_js" value="false">
					</form>
				</div>
				<div class="grid-col--4 box-contact__col">
					<div class="box-contact__inner">
						<div class="box-contact__info">
							<div class="box-contact__row">
								<h3 class="hdg-lv3">Liên hệ trực tiếp với chúng tôi</h3>
								<h4 class="hdg-lv4 txt-capitalize"> <span class="color-primary">Công Ty TNHH XD TM Trang Trí Nội Thất  TD.CORP</span></h4>
								<p></p>
								<ul class="lst-list lst">
									<li>Mã số thuế: 0312218097</li>
									<li>Địa chỉ: 98/19 Thích Quảng Đức, Phường 5, Quận Phú Nhuận, TPHCM</li>
									<li>văn phòng : 55 Thành Mỹ, Phường 8, Quận Tân Bình, TP HCM</li>
									<li>hotline: 182201476</li>
									<li>Email: quocminhconstruction@gmail.com </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>
</div>
<script>
	function activeBtn(){
	    $('#confirm_btn').removeAttr('disabled');
	    $('#submit_btn').removeAttr('disabled');
	}
	function inactiveBtn(){
	    $('#confirm_btn').attr('disabled', 'disabled');
	    $('#submit_btn').attr('disabled','disabled');
	}
</script>
<!-- /#main -->
<!-- /#container -->
<footer id="l-footer" class="l-footer" >
<div class="wrp-container">
	<div class="footer">
		<div class="grid-row footer--grid">
			<div class="grid-col--3">
				<div class="footer--logo">
					<h1 id="sitelogo">
						<a href="../"><img src="../assets/images/logo.png" alt="★★★"/></a>
					</h1>
					<div class="footer--check">
						<img src="../assets/images/img_check_bocongthuong.png" alt="★★★"/>
					</div>
				</div>
			</div>
			<div class="grid-col--4">
				<div class="footer--address">
					<h3 class="hdg-lv3"> <span class="color-primary">Thông tin liên hệ</span></h3>
					<div class="footer--infomation">
						<p>Công Ty TNHH XD TM Trang Trí Nội Thất  TD.CORP</p>
						<p>Mã số thuế: 0312218097</p>
						<p>Địa chỉ: 98/19 Thích Quảng Đức, Phường 5, Quận Phú Nhuận, TPHCM</p>
						<p>văn phòng : 55 Thành Mỹ, Phường 8, Quận Tân Bình, TP HCM</p>
					</div>
				</div>
			</div>
			<div class="grid-col--2">
				<div class="footer--policy">
					<h3 class="hdg-lv3"> <span class="color-primary">Thông tin liên hệ</span></h3>
					<ul class="lst-link">
						<li><a href="★★★">Điều khoản chung</a></li>
						<li><a href="★★★">Chính sách bảo mật</a></li>
						<li><a href="★★★">Hợp đồng tham khảo</a></li>
						<li><a href="★★★">Tư Vấn Kỹ Thuật</a></li>
						<li><a href="★★★">bảo hành - khuyến mãi</a></li>
					</ul>
				</div>
			</div>
			<div class="grid-col--3">
				<div class="footer--smedia" style="position: relative;">
					<h3 class="hdg-lv3"> <span class="color-primary">Liên hệ qua các nền tảng</span></h3>
					<ul class="lst-media grid-row">
						<li><a href="★★★"><img src="../assets/images/facebook.png" alt="★★★"/></a></li>
						<li><a href="★★★"><img src="../assets/images/icon-zalo.png" alt="★★★"/></a></li>
						<li><a href="★★★"><img src="../assets/images/icon-mess.png" alt="★★★"/></a></li>
					</ul>
					<p class="footer--txt txt-uppercase">Tư vấn báo giá hotline: 182201476</p>
				</div>
			</div>
		</div>
		<div class="copyright">
			 <p class="txt-copyright"> <small>Copyright &copy; 2013 - 2024 TD.CORP - All Rights Reserved.</small></p>
		</div>
		
	</div>
	   
</div>

</footer>
	 </div>
</div><!-- /#document -->
<!-- <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script> -->
<script type="text/javascript" src="../assets/js/components/jquery.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../assets/js/components/jquery-ui.js" charset="UTF-8"></script>
<script type="text/javascript" src="../assets/js/components/autoConfirm.js" charset="UTF-8"></script>
<script src="//www.google.com/recaptcha/api.js" async defer charset="UTF-8"></script>
<script type="module" src="../assets/js/all.js"></script>
</body>
</html>
