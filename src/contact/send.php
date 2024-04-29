<?php
require_once('../assets/mailer/mailer_cfg.php');
require_once('../assets/mailer/PHPMailerAutoload.php');
require_once('../assets/mailer/cryptor.php');

// $captcha;
// if(isset($_POST['g-recaptcha-response'])){
// 	$captcha = $_POST['g-recaptcha-response'];
// }
// if(!$captcha){
// 	echo '<h2>キャプチャフォームを確認してください。 </h2>';
// 	exit;
// }

// $secretKey = "6Ld1MxUpAAAAAMdnoG3X64UHyZWzu3J--JEmXk0P";
// $url = 'https://www.google.com/recaptcha/api/siteverify?secret' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
// $response = file_get_contents($url);
// $responseKeys = json_decode($response, true);
// if($responseKeys["success"]) {
// } else {
// 	echo '<h2>キャプチャフォームを確認してください。 </h2>';
// 	exit;
// }

if(!isset($_POST['mailform_token']) || !isset($_POST['mailform_js'])){
	exit('不正な画面遷移が行われました。');
}


// -------------------------- Value Form --------------------------
$txtName = isset($_POST['txtName']) ? htmlspecialchars(strip_tags($_POST['txtName'])) : '';
$txtEmail= isset($_POST["txtEmail"]) ? htmlspecialchars(strip_tags($_POST['txtEmail'])) : '';
$txtTel= isset($_POST["txtTel"]) ? htmlspecialchars(strip_tags($_POST['txtTel'])) : '';
$txtComment= isset($_POST["txtComment"]) ? htmlspecialchars(strip_tags($_POST['txtComment'])) : '';

// -------------------------- Mail Content --------------------------
$content = '';
$content .= "<div style='background-color:#dddddd; padding: 20px 15px;'>";
$content .= "<p>■Thông Tin người gởi■</p>";
$content .= "<p>Họ Và Tên：".$txtName."</p>";
$content .= "<p>E-mail：".$txtEmail."</p>";
$content .= "<p>TEL：".$txtTel."</p>";
$content .= "<p>Nội dung:".$txtComment."</p>";
$content .= "</div>";

$content_send_admin ="<p style='padding: 20px 15px 0;'>Chúng tôi đã nhận được những yêu cầu sau đây<br>Cảm ơn sự Phản hồi của bạn</p><p style='padding: 0 15px;'>*************************************************</p>".$content;

$content_send_user =
"<p>※Đây là Email được trả lời tự động. Xin lưu ý rằng chúng tôi sẽ không thể trả lời ngay cả khi nhận được thư trả lời<br><br><a href='#' target='_blank'>Rongdo.net</a> Người phụ trách sẽ liên hệ lại với bạn <br>bạn có thể phải đợi trong giây lát chậm nhất là trong ngày.<br>※xin lưu ý rằng: việc trả lời có thể có những cái chúng tôi không trả lời được hoặc mất một chút thời gian để trả lời.<br><br>Chúng tôi đã nhận được yêu cầu từ bạn</p><p>*************************************************</p>".
$content.
"<p>*************************************************</p>
<p><a href='#' target='_blank'>rongdo.net</a></p>
<p>TEL ......... / FAX ........</p>";

// -------------------------- Info Mail --------------------------
$subject_admin = $config['subject_admin'];
$config_email = $config['email'];
$from = "noreply@guis.co.jp";

// -------------------------- Send Admin --------------------------
function sendAdmin($from, $config_email, $txtEmail, $content_send_admin, $subject_admin){
	try{
		$mail = new PHPMailer();
		$mail->CharSet = "utf-8";

		$mail->From = $from;
		$mail->FromName = $txtEmail;

		foreach ($config_email as $value) {
			$mail->AddAddress($value);
		}

		$mail->WordWrap = 50;
		$mail->IsHTML(true);
		$mail->Subject = $subject_admin;
		$mail->Body = $content_send_admin;
		$mail->AltBody = '';

		/* Send Mail */ 	
		if(!$mail->Send())
		{
			echo '<h1>メール送信エラー: ' . $mail->ErrorInfo . '</h1>';
		}
		else
		{
			require_once('finish.html');
		}

	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}

sendAdmin($from, $config_email, $txtEmail, $content_send_admin, $subject_admin);


// -------------------------- Send User --------------------------
$subject_user = $config['subject_user_contact'];

function sendUser($from, $txtEmail, $content_send_user, $subject_user, $txtName){
	try{
		$mailUser = new PHPMailer();
		$mailUser->CharSet = "utf-8";
		$mailUser->SetFrom($from, $from);
		$mailUser->AddAddress($txtEmail, $txtName);
		$mailUser->WordWrap = 50;
		$mailUser->IsHTML(true);
		$mailUser->Subject = $subject_user;
		$mailUser->Body = $content_send_user;
		$mailUser->AltBody = '';
		
		/* Send Mail */ 		
		if(!$mailUser->Send())
		{
			echo '<h1>メール送信エラー: ' . $mailUser->ErrorInfo . '</h1>';
		}

	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mailUser->ErrorInfo}";
	}
}

sendUser($from, $txtEmail, $content_send_user, $subject_user, $txtName);
?>