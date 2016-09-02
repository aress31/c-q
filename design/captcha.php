<?php
	session_start();
	$_SESSION['captcha'] = rand(1000,9999);

	$captcha = imagecreatetruecolor(70, 30);

	$fill_color=imagecolorallocate($captcha, 255, 255, 255);
	imagefilledrectangle($captcha, 0, 0, 70, 30, $fill_color);
	$text_color=imagecolorallocate($captcha,10,10,10);
	$font = '../design/fonts/28DaysLater.ttf';
	imagettftext($captcha, 23, 0, 5,30, $text_color, $font, $_SESSION['captcha']);

	header("Content-type: image/jpeg");
	imagejpeg($captcha);
	imagedestroy($captcha);
