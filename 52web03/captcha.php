<?php
$im = imagecreatetruecolor(32,32);
$color = imagecolorallocate($im,255,255,255);
imagestring($im,5,11,7,$_GET['num'],$color);
imagejpeg($im);
imagedestroy($im);