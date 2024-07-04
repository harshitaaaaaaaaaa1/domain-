<?php

$data1=file_get_contents("https://screenshot.as-a-service.dev/?url=https://octave.co.in");
$data2=file_get_contents("https://screenshot.as-a-service.dev/?url=https://octave.in");
// Create an image from data
$im1 = imagecreatefromstring($data1);
$im2= imagecreatefromstring($data2);
// Output the image
/*header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
?> */

// Get the dimensions of the input images
$width1 = imagesx($im1);
$height1 = imagesy($im1);
$width2 = imagesx($im2);
$height2 = imagesy($im2);

// Calculate the width and height for the combined image
$combinedWidth = $width1 + $width2;
$combinedHeight = max($height1, $height2);

// Create a new image for the combined image
$combinedImage = imagecreatetruecolor($combinedWidth, $combinedHeight);

// Copy the first image to the left side of the combined image
imagecopyresampled($combinedImage, $im1, 0, 0, 0, 0, $width1, $combinedHeight, $width1, $height1);
// Copy the second image to the right side of the combined image
imagecopyresampled($combinedImage, $im2, $width1, 0, 0, 0, $width2, $combinedHeight, $width2, $height2);
// Output the combined image to the browser
header('Content-Type: image/jpeg');
imagejpeg($combinedImage);

// Free up memory
imagedestroy($im1);
imagedestroy($im2);
imagedestroy($combinedImage);
?>