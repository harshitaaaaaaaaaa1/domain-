<?php
// Function to capture website screenshot using phantomjs
//function captureScreenshot($url, $outputPath)
//{
 //   $command = "phantomjs path/to/rasterize.js $url $outputPath";
 //   exec($command);
//}

// URLs of the websites provided by the user
#$url1 = $_POST['https://s0.wp.com/mshots/v1/octave.co.in?w=400'];
$url1 = "https://s0.wp.com/mshots/v1/octave.co.in?w=400";


#$url2 = $_POST['https://s0.wp.com/mshots/v1/octave.co.in?w=400'];
$url2 = "https://s0.wp.com/mshots/v1/octave.co.in?w=400";

$imagedata1= file_get_contents($url1);
$imagedata2= file_get_contents($url2);
//echo file_get_contents($url2);

// Output paths for the screenshots
$screenshot1Path = 'C:\XAMPP\htdocs\screenshot1.jpeg';
$screenshot2Path = 'C:\XAMPP\htdocs\screenshot2.jpeg';

// Capture the screenshots
//captureScreenshot($url1, $screenshot1Path);
//captureScreenshot($url2, $screenshot2Path);

// Combine the screenshots side by side
$image1 = imagecreatefromjpeg($screenshot1Path);
$image2 = imagecreatefromjpeg($screenshot2Path);

$combinedWidth = imagesx($image1) + imagesx($image2);
$combinedHeight = max(imagesy($image1), imagesy($image2));

$combinedImage = imagecreatetruecolor($combinedWidth, $combinedHeight);

imagecopy($combinedImage, $image1, 0, 0, 0, 0, imagesx($image1), imagesy($image1));
imagecopy($combinedImage, $image2, imagesx($image1), 0, 0, 0, imagesx($image2), imagesy($image2));

// Display the combined image
header('Content-Type: image/png');
imagepng($combinedImage);

// Output the combined image to a file or directly to the browser
//$outputFile = 'C:\XAMPP\htdocs\screenshot1.jpg';
//imagejpeg($combinedImage, $outputFile);

// Clean up
imagedestroy($image1);
imagedestroy($image2);
imagedestroy($combinedImage);

// Delete the screenshot files
unlink($screenshot1Path);
unlink($screenshot2Path);
?>