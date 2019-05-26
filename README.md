# php-qrcode
**php生成二维码，可以添加logo**

核心方法及参数注释hhhh
```
/**
  * @param $text 二维码信息如一个网址或一段文字
  * @param bool $outfile 需要输出的二维码图片地址 如./test.png
  * @param int $level 容错率，也就是有被覆盖的区域还能识别，
  * 分别是 L（QR_ECLEVEL_L，7%），M（QR_ECLEVEL_M，15%），Q（QR_ECLEVEL_Q，25%），H（QR_ECLEVEL_H，30%）
  * @param int $size 二维码大小
  * @param int $margin  边框空白距离大小
  * @param bool $saveandprint  是否保存二维码并显示
  */
  public static function png($text, $outfile = false, $level = QR_ECLEVEL_L, $size = 6, $margin = 2, $saveandprint=false)
  {
      $enc = QRencode::factory($level, $size, $margin);
      return $enc->encodePNG($text, $outfile, $saveandprint=false);
  }
```
