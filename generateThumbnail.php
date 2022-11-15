<?php
function load_portrait($filename, $type) {
    if ($type == IMAGETYPE_JPEG) {
        return imagecreatefromjpeg($filename);
    } elseif ($type == IMAGETYPE_PNG) {
        return imagecreatefrompng($filename);
    } elseif ($type == IMAGETYPE_GIF) {
        return imagecreatefromgif($filename);
    }
}

function resize_image($new_width, $image, $width, $height) {
    $resize_ratio = $new_width / $width;
    $new_height = $height * $resize_ratio;
    $new_image = imagecreatetruecolor($new_width, $new_height);
    imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    return $new_image;
}
?>