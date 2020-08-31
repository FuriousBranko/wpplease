<?php
function watermark($name, $ext){
$source = "./images";
$destination = "./destination";
$watermark = imagecreatefrompng("watermark.png");
// $name= "5e24cf35507b92.29181249.png"; $ext= "png";
$margin_right = 10;
$margine_bottom  = 10;

$sx = imagesx($watermark);
$sy = imagesy($watermark);

//$images = array_diff(scandir($source), array('..','.'));

//foreach ( $images as $image){
    if($ext=="jpg"||$ext=="jpeg"){
        $img = imagecreatefromjpeg($source.'/'.$name);
    }elseif($ext=="png"){
        $img = imagecreatefrompng($source.'/'.$name);
    }
    

    imagecopy($img, $watermark, imagesx($img)-$sx-$margin_right, imagesy($img)-$sy-$margine_bottom,0,0,$sx,$sy);
    $i = imagepng($img, $destination.'/'.$name, 100);
    imagedestroy($img);
//}
header("Location: index.php?watermarked");
}
// echo '<img src="./destination/'.$name.'">';
?>