<?php
class ImageModel
{

function Thumbnail($path,$arquivo,$w,$h)
{
$mainImage = imagecreatefromjpeg($path . $arquivo);   
$mainWidth = imagesx($mainImage);
$mainHeight = imagesy($mainImage);
$thumbWidth = intval($mainWidth / $w);
$thumbHeight = intval($mainHeight / $h);
$myThumbnail = imagecreatetruecolor($thumbWidth, $thumbHeight);
imagecopyresampled($myThumbnail, $mainImage, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $mainWidth, $mainHeight);
header("Content-type: image/jpeg");
imagejpeg($myThumbnail);
imagedestroy($myThumbnail);
imagedestroy($mainImage);
}

function x($url,$w){

// Loading the image and getting the original dimensions
$image = imagecreatefromjpeg($url);
$orig_width = imagesx($image);
$orig_height = imagesy($image);

// Calc the new height
$height = (($orig_height * $width) / $orig_width);

// Create new image to display
$new_image = imagecreatetruecolor($width, $height);

// Create new image with changed dimensions
imagecopyresized($new_image, $image,
	0, 0, 0, 0,
	$width, $height,
	$orig_width, $orig_height);

// Print image
return imagejpeg($new_image);

}

}
?>