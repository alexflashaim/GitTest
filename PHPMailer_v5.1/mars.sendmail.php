<?php
	#引入檔  class.phpmailer.php 會引入 pop3 and smtp 兩隻class
	require_once('class.phpmailer.php');
	
	#呼叫
	//PHPmailer 並指定 $mail 變數
	$mail             = new PHPMailer(); 
	
	#發送變數設定
	
	//嵌入網頁
	$body             = file_get_contents('contents.html');
	$body             = eregi_replace("[\]",'',$body);
	
	//設定 回復給誰
	$mail->AddReplyTo("name@yourdomain.com","First Last");
	//設定 寄件人
	$mail->SetFrom('name@yourdomain.com', 'First Last');
	
	//指定收件人
	$address = "whoto@otherdomain.com";
	//設定 收件人
	$mail->AddAddress($address, "John Doe");
	//設定 郵件標題
	$mail->Subject    = "PHPMailer Test Subject via mail(), basic";
	
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
	//設定 寄出內容（網頁）
	$mail->MsgHTML($body);
	
	$mail->AddAttachment("images/phpmailer.gif");      // attachment
	$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
	
	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}

?>

