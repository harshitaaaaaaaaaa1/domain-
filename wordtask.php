<?php
$keywordList = file("keywords.txt", FILE_IGNORE_NEW_LINES);

foreach ($keywordList as $keyword) {
    $screenshotIN = hi ;
    $screenshotCOIN = "https://screenshot.as-a-service.dev/?url=https://{$keyword}.in";

    $screenshotPathIN = retrieveAndSaveScreenshot($screenshotIN);
    $screenshotPathCOIN = retrieveAndSaveScreenshot($screenshotCOIN);

    if (filesize($screenshotPathIN) > 10 && filesize($screenshotPathCOIN) > 10) {
        createCombinedImage($screenshotPathIN, $screenshotPathCOIN);
    }
}

function retrieveAndSaveScreenshot($url) {
    $filename = uniqid() . '.jpg';
    file_put_contents($filename, file_get_contents($url));
    return $filename;
}

function createCombinedImage($pathIN, $pathCOIN) {
    $imageIN = imagecreatefromjpeg($pathIN);
    $imageCOIN = imagecreatefromjpeg($pathCOIN);

    $combinedImage = imagecreatetruecolor(imagesx($imageIN) + imagesx($imageCOIN), imagesy($imageIN));
    imagecopy($combinedImage, $imageIN, 0, 0, 0, 0, imagesx($imageIN), imagesy($imageIN));
    imagecopy($combinedImage, $imageCOIN, imagesx($imageIN), 0, 0, 0, imagesx($imageCOIN), imagesy($imageCOIN));

    $combinedImagePath = uniqid() . '.jpg';
    imagejpeg($combinedImage, $combinedImagePath);

    imagedestroy($imageIN);
    imagedestroy($imageCOIN);
    imagedestroy($combinedImage);

    return $combinedImagePath;
}
?>
