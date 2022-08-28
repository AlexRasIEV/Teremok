<?php

	$to  = 'raskalei@gmail.com';
	$message = "";
	
	// текст сообщения 
	try {

	if(isset($_POST['f']['name'])) {
		$message .= "Від: " . trim(strip_tags($_POST['f']['name'])) . "\r\n"; }
	
	if(isset($_POST['f']['email'])){
		$message .= "E-mail: " . trim(strip_tags($_POST['f']['email'])) . "\r\n"; }
		
	if(isset($_POST['f']['phone'])){
		$message .= "Телефон: " . trim(strip_tags($_POST['f']['phone'])) . "\r\n"; }
		
	if(isset($_POST['f']['comments'])){	
		$message .= "Коментарі: " . trim(strip_tags($_POST['f']['comments']));}
		
	$message .= "\r\n\r\n---------------------------------------------------\r\n";
	$message .= "Лист відправлено автоматично, не відповідайте на нього.";
	$message = wordwrap($message, 70); 

	// Добавляем необходимые заголовки
	$headers =  'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type:text/plain;charset=utf-8' . "\r\n";
	$headers .= 'To: ' . $to . "\r\n";
	$headers .= 'From: Teremok <support@teremok.club>' . "\r\n";

	// Добавляем тему письма
	$subject = "Теремок: отримано новий запит\r\n";
	
	// отправляем сообщение 
	mail($to, $subject, $message, $headers);
	echo ("Mail sent sussesflly.\r\n");
	echo ($message);
	}
	catch (Exception $ex) { 
		echo ("Error send mail: " . $ex);
	}
?>
