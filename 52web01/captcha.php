<?php
$im = imagecreatetruecolor(32, 32);
$textColor = imagecolorallocate($im, 255, 255, 255);

imagestring($im, 5, 5, 7, $_GET['num'], $textColor);

imagejpeg($im);
imagedestroy($im);
