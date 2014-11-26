<?php
/**
* phpmailer发送邮件 
* 发送网易邮箱126.com
* 
*/
require_once(LIB.DS.'PHPMailer_5.2.4/class.phpmailer.php');
class SendMailUtil{
	/**
	 * 
	 * 发送email常用类
	 * @param string $messagetitle 发送邮件标题 
	 * @param string $messagebody  发送邮件body,支持html
	 * @param string $adress       收件人
	 */
	public static function sendmail($messagetitle,$messagebody,$adress){
		echo "send";
		echo $messagebody;
		$mail= new PHPMailer(); 
		
		 
		//采用SMTP发送邮件
		$mail->IsSMTP();
		
		//邮件服务器
		$mail->Host       = "smtp.126.com";
		$mail->SMTPDebug  = 0;
		
		//使用SMPT验证
		$mail->SMTPAuth   = true;
		
		//SMTP验证的用户名称
		$mail->Username   = "search4gigs@126.com";
		
		//SMTP验证的秘密
		$mail->Password   = "superyuyue";
		
		//设置编码格式
		$mail->CharSet  = "utf-8";
		
		//设置主题
		$mail->Subject    = $messagetitle;
		
		//$mail->AltBody    = "register success"";
		
		//设置发送者
		$mail->SetFrom('search4gigs@126.com', 'search4gigs');
		
		//采用html格式发送邮件
		$mail->MsgHTML($messagebody);
		
		//接受者邮件名称
		$mail->AddAddress($adress, "search4gigs");//发送邮件
		if(!$mail->Send()) {
		  echo  "Mailer Error: " . $mail->ErrorInfo;
		//  return "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "send";
		//  return "send!";
	 }
	}
}
?>