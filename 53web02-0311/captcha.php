<?php
$im = imagecreatetruecolor(25,25);
$color = imagecolorallocate($im,255,255,255);
imagestring($im,5,11,7,$_GET['num'],$color);
imagejpeg($im);
imagedestroy($im);