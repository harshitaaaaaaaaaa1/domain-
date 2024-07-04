<?php

// Image data in the form of string
/*$data = 'iVBORw0KGgoAAAANSUhEUgAAAHgAAAAUAQMAAAB'
	. '8nGuwAAAABlBMVEX///8AAP94wDzzAAAACXBIWX'
	. 'MAAA7EAAAOxAGVKw4bAAAAgUlEQVQYlWNgIBHYM'
	. 'TDwMDB8gDEYkkEU4wwog4HhAIx/AMqX4+c5/rDh'
	. '4x4w4wHDAWPJ3h7DxhnPwAwDhuOJG87zsD/mOQB'
	. 'mMDAcrt9/nv1hM88BMOMBw+EEA94GQxAfxDBgSD'
	. 'acceYMUP8BMMOAwU6evyf9YcOHA2DGA1K9QykAA'
	. 'NIrNwD/nKH3AAAAAElFTkSuQmCC';*/
$data=file_get_contents("https://screenshot.as-a-service.dev/?url=https://octave.co.in");
//print_r($data);

// Decode the data
//$data = base64_encode($data);

// Create an image from data
$im = imagecreatefromstring($data);

// Output the image
header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
?>
