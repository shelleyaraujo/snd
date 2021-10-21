<?php
header('Content-Type: image/jpeg');

$url = "imagens/". $_GET["imagem"];
$width = $_GET["w"];
$height = $_GET["h"];


if(strrchr($_GET["imagem"], ".") == ".png") {
	$source_image = imagecreatefrompng($url);
	$source_imagex = imagesx($source_image);
	$source_imagey = imagesy($source_image);
	$dest_imagex = $width;
	$dest_imagey = $height;
	$dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);
	imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_imagex, 
		$dest_imagey, $source_imagex, $source_imagey);
	header("Content-Type: image/png");
	imagejpeg($dest_image,NULL,100);
} else {
	$image = imagecreatefromjpeg($url);
	$orig_width = imagesx($image);
	$orig_height = imagesy($image);
	$height = (($orig_height * $width) / $orig_width);
	$new_image = imagecreatetruecolor($width, $height);

	imagecopyresized($new_image, $image,
		0, 0, 0, 0,
		$width, $height,
		$orig_width, $orig_height);
	imagejpeg($new_image);
}

?>