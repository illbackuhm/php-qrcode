<?php

include 'phpqrcode.php';

/**
 * @param $text 二维码信息如一个网址或一段文字
 * @param bool $outfile 需要输出的二维码图片地址 如./test.png
 * @param int $level 容错率，也就是有被覆盖的区域还能识别，
 * 分别是 L（QR_ECLEVEL_L，7%），M（QR_ECLEVEL_M，15%），Q（QR_ECLEVEL_Q，25%），H（QR_ECLEVEL_H，30%）
 * @param int $size 二维码大小
 * @param int $margin  边框空白距离大小
 * @param bool $saveandprint  是否保存二维码并显示
 */

QRcode::png('my qrcode','myqrcode.png',QR_ECLEVEL_H);

$logo = 'logo.png';//准备好的logo图片 

$QR='myqrcode.png';

if ($logo !== FALSE) {

	$QR = imagecreatefromstring(file_get_contents($QR));

	$logo = imagecreatefromstring(file_get_contents($logo));

	$QR_width = imagesx($QR);//二维码图片宽度

	$QR_height = imagesy($QR);//二维码图片高度

	$logo_width = imagesx($logo);//logo图片宽度

	$logo_height = imagesy($logo);//logo图片高度

	$logo_qr_width = $QR_width / 5;

	$scale = $logo_width/$logo_qr_width;

	$logo_qr_height = $logo_height/$scale;

	$from_width = ($QR_width - $logo_qr_width) / 2;

//重新组合图片并调整大小

	imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,

		$logo_qr_height, $logo_width, $logo_height);

}

//输出图片

imagepng($QR, 'code.png');

echo '<img src="code.png">';
