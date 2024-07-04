<?php
// URLs of the websites provided by the user
$url1 = $_POST['https://s0.wp.com/mshots/v1/octave.co.in?w=400'];
$url2 = $_POST['https://s0.wp.com/mshots/v1/octave.co.in?w=400'];

// Output paths for the screenshots
$screenshot1Path = 'C:\XAMPP\htdocs\screenshot1.jpeg';
$screenshot2Path = 'C:\XAMPP\htdocs\screenshot2.jpeg';

// Load the input images
$sourceImage1 = imagecreatefromjpeg($image1);
$sourceImage2 = imagecreatefromjpeg($image2);

// Get the dimensions of the input images
$width1 = imagesx($sourceImage1);
$height1 = imagesy($sourceImage1);
$width2 = imagesx($sourceImage2);
$height2 = imagesy($sourceImage2);

// Output image dimensions
$width = 1000;
$height = 900;

// Create a new image with the specified dimensions
$combinedImage = imagecreatetruecolor($width, $height);

// Load the input images
$sourceImage1 = imagecreatefromjpeg($image1);
$sourceImage2 = imagecreatefromjpeg($image2);

// Calculate the width and height for each image
$image1Width = $width / 2;
$image1Height = $height;
$image2Width = $width / 2;
$image2Height = $height;

// Resize and copy image1 to the combined image
imagecopyresized(
    $combinedImage,         
    $sourceImage1,          
    0,                      
    0,                      
    0,                      
    0,                     
    $image1Width,           
    $image1Height,          
    imagesx($sourceImage1), 
    imagesy($sourceImage1));

// Resize and copy image2 to the combined image
imagecopyresized(
    $combinedImage,         
    $sourceImage2,          
    $image1Width,           
    0,                     
    0,                      
    0,                      
    $image2Width,           
    $image2Height,          
    imagesx($sourceImage2),
    imagesy($sourceImage2));



// Output the combined image to the browser
header('Content-Type: image/jpeg');
imagejpeg($combinedImage);

imagedestroy($sourceImage1);
imagedestroy($sourceImage2);
imagedestroy($combinedImage);
?>