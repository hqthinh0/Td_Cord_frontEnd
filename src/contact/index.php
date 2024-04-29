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
<html lang="ja" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
	<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<title>お問い合わせ | 建築設備設計屋さんの省エネ計算.net</title>
	<meta
		name="description"
		content="省エネ計算.netは、「省エネルギー措置届出書」の作成を承っております。省エネ計算.netは独自のサービスにより、 低価格・短納期で「省エネルギー措置届出書」の作成を承ります。省エネ計算だけでなくCASBEEも作成いたしますのでお気軽にご連絡ください"
	/>
	<meta name="keywords" content="省エネ計算.net,省エネ,省エネ計算,省エネルギー措置届出書,CASBEE" />
	<meta property="og:title" content="お問い合わせ | 建築設備設計屋さんの省エネ計算.net" />
	<meta
		property="og:description"
		content="省エネ計算.netは、「省エネルギー措置届出書」の作成を承っております。省エネ計算.netは独自のサービスにより、 低価格・短納期で「省エネルギー措置届出書」の作成を承ります。省エネ計算だけでなくCASBEEも作成いたしますのでお気軽にご連絡ください"
	/>
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://www.shoenekeisan.net/contact/" />
	<meta property="og:image" content="http://www.shoenekeisan.net/assets/images/ogp.png" />
	<meta property="og:site_name" content="建築設備設計屋さんの省エネ計算.net" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/css/style.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.css" />
</head>

	<body>
		<div id="l-document" data-scroll-container>
			<header id="l-header" class="l-header" >
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
								<a href="../company/" class="nav-item">giới thiệu</a>
							</li>
							<li class="">
								<a href="../service/" class="nav-item">dịch vụ</a>
							</li>
							<!-- <li class="">
								<a href="../accessibility/" class="nav-item">đối tác</a>
							</li> -->
							<li class="active">
								<a href="../contact/" class="nav-item">liên hệ</a>
							</li>
						
						</ul>

					</nav>
				</div>
			</header>
			<!-- <div class="contact">
				<div class="contact__fixed">
					<a href="../estimate/" class="contact__btn btn"
						><img src="../assets/images/icn-calculator.png"
					/></a>
					<a href="../contact/" class="contact__btn btn"
						><img src="../assets/images/email.png"
					/></a>
				</div>
			</div> -->

<div id="l-main" >
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
				<h2 class="hdg-lv2__banner">Contact</h2>
			</div> 
		</div>
	</section>
	<div class="wrp-container__breadcrumbs">
		<div class="breadcrumbs">
			<ul class="breadcrumbs__list">
				<li><a href="../">ホーム</a></li>
				<li>お問い合わせ</li>
			</ul>
		</div>
	</div>
	<section class="sec-base">
		<div class="wrp-container__v2">
			<div class="contact-title">
				<h3 class="hdg-lv3">Mẫu Yêu Cầu</h3>
				<p><span class="txt--red">*</span>các trường hợp bắt buộc<br />vui lòng nhập theo chi tiết yêu cầu của bạn</p>
			</div>
			<div class="contact-title hide">
				<h3 class="hdg-lv3">Mẫu Yêu Cầu（Màn hình xác nhận）</h3>
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
										<th>Địa chỉ email<span class="txt--red"> *</span></th>
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
										<th>Địa chỉ email (xác Nhận)<span class="txt--red"> *</span></th>
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
										<th>Số Điện Thoại</th>
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
										<th>Nội dung yêu cầu<span class="txt--red"> *</span></th>
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
									<button id="submit_btn" class="submit_btn frm-btn" ntype="submit">
										<span>gửi thư</span>
									</button>
								</div>
							</div>
						</div>
						<table class="frm-tbl--v2 contact-btn">
							<tr class="tbl-txt_c">
								<th></th>
								<td>
									<!-- <div class="txt_c">
										<div style="display: inline-block; margin-bottom: 20px;">
											<div
												class="g-recaptcha"
												data-sitekey="6Ld1MxUpAAAAAEK3t2ZF9pIU8S6q-_pNhzTj0nu_"
												data-callback="activeBtn"
												data-expired-callback="inactiveBtn"
												data-error-callback="inactiveBtn"
											></div>
										</div>
									</div> -->
									<div class="txt_c">
										<button
											id="confirm_btn"
											class="confirm_btn frm-btn frm-btn--v2"
											name="config"
											onClick="return ConfirmClick_Contact();"
			
										>
											<span>xác nhận</span>
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
								<h3 class="hdg-lv3 box-contact__title">Liên hệ trực tiếp với chúng tôi </h3>
								<p>
									Xin cứ thoải mái liên lạc với chúng tôi.<br />Giờ làm việc: Các ngày trong tuần 10:00-22:00 các ngày trong tuần.<br />HongPhat co.,Ltd: 19A Mai chí Thọ, Thành Phố Thủ Đức, Tp. HCM
									<br />Điện Thoại : 065512144232<br /><br /><br />
								</p>
								<p class="box-contact__tel">
									<a href="tel:052-757-3255">Điện Thoại : 065512144232</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</section>
	<section class="maps">
			<div class="wrp-container__v2">
					<h2 class="hdg-lv2 maps__company--lv2">địa điểm liên hệ</h2>
					<div class="maps__content">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.380210567759!2d106.69695262608796!3d10.782163948556434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f313481d90f%3A0x857be40255cabe87!2zxJDhuqFpIGjhu41jIEtp4bq_biB0csO6YyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmggKFVBSCk!5e0!3m2!1svi!2s!4v1700107417329!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
			</div>
		</section>
	
</div>
<script>
	// function activeBtn(){
	//     $('#confirm_btn').removeAttr('disabled');
	//     $('#submit_btn').removeAttr('disabled');
	// }
	// function inactiveBtn(){
	//     $('#confirm_btn').attr('disabled', 'disabled');
	//     $('#submit_btn').attr('disabled','disabled');
	// }
</script>
<!-- /#main -->
<!-- /#container -->
<footer id="l-footer" class="l-footer" >
	<div class="l-footer__wrapper wrp-container-footer">
		<div class="l-footer__row">
			<div class="l-footer__col l-footer__col--first">
				<h3 class="hdg-lv3 l-footer__lv3">Công ty TNHH thương mại sản xuất Rồng Đỏ</h3>
				<div class="l-footer__logo-check">
					<div class="l-footer`__logo">
						<a href="../"><img src="../assets/images/logo.png" alt="★★★" class="fluid-image"/></a>
					</div>
					<div class="l-footer__check">
						<img src="../assets/images/img_check_bocongthuong.png" alt="★★★" class="fluid-image"/>
					</div>

				</div>
			</div>
			<div class="l-footer__col l-footer__col--second">
				<h3 class="hdg-lv3 l-footer__lv3">Danh mục</h3>
				<ul class="l-footer__sitemap">
					<li><a href="../" class="l-footer__link">Trang chủ</a></li>
					<li><a href="../company/" class="l-footer__link">Giới Thiệu</a></li>
					<li><a href="../service/" class="l-footer__link">Dịch Vụ</a></li>
					<li><a href="../accessibility/" class="l-footer__link">Đối Tác</a></li>
					<li><a href="../contact/" class="l-footer__link">Liên hệ</a></li>
				
				</ul>
			</div>
			<div class="l-footer__col l-footer__col--third">
				<h3 class="hdg-lv3 l-footer__lv3">Thông Tin Liên Hệ</h3>
				<p class="l-footer__p"><span>Địa Chỉ: </span>Lô 15 KCN Quang Minh, Mê Linh, Hà Nội, Việt Nam </p>
				<p class="l-footer__p"><span>Thời gian: </span>Thứ 2 - thứ 7 từ 8h00 - 17h00 hàng tuần</p>
				<p class="l-footer__p"><span>Số điện thoại: </span> 052-757-3255 </p>
				<p class="l-footer__p"><span>Email: </span> demo1@gmail.com </p>
			</div>
		</div>
	</div>
	<p class="l-footer__txt-copyright">
		<small>Copyright &copy; 2008 - 2023 Rongdo - All Rights Reserved.</small>
	</p>
	<p class="nav-backtotop"><a href="#l-document">&nbsp;</a></p>
</footer>
 </div>
</div><!-- /#document -->
<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.min.js"></script>
<script type="text/javascript" src="../assets/js/components/jquery.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="../assets/js/components/jquery-ui.js" charset="UTF-8"></script>
<script type="text/javascript" src="../assets/js/components/autoConfirm.js" charset="UTF-8"></script>
<!-- <script src="//www.google.com/recaptcha/api.js" async defer charset="UTF-8"></script> -->
<script type="module" src="../assets/js/all.js"></script>
</body>
</html>
