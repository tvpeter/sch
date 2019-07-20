<?php
session_start();
$random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) ); 
$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); 
$code = $random_number.$random_string;

$_SESSION["code"]=$code;
$im = imagecreatetruecolor(80, 30);
$bg = imagecolorallocate($im, 68, 76, 103); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>