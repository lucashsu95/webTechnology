<?php
session_start();
//session_start();
$numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
$ans = '';

$big = imagecreatetruecolor(65, 25);
for ($i = 0; $i < 4; $i++) {
  $random_number = rand(0, count($numbers) - 1);
  $ans .= $numbers[$random_number];

  $im = imagecreatetruecolor(25, 25);
  $textColor = imagecolorallocate($im, 255, 255, 255);
  //加上字且都不同高度
  imagestring($im,11,5,rand(6,10),$numbers[$random_number],$textColor);
  //旋轉圖片
  $im = imagerotate($im,rand(-15,15),0);
  //把小圖片放進大圖片
  imagecopy($big,$im,$i*15,0,0,0,100,100);
  imagedestroy($im);
}
$_SESSION['ans'] = $ans;
//隨機線條
for ($i=0;$i<4;$i++){
  imageline($big, rand(0,60), 0, rand(100,-10), 60, $textColor);
} 
//$_SESSION['captcha'] = $ans;





imagejpeg($big);
imagedestroy($big);
