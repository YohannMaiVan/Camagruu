<?php
require('Database/coDatabase.php');
require 'index.php';

$upload_dir = "pics/";
//$file = $upload_dir . "image.png";
$file = $upload_dir . $_SESSION["login"] . mktime() . ".png";
 # If you know your originals are of type PNG.
 $dest = imagecreatefrompng("photo.png");
 //$dest = imagealphablending($dest, true);
 $source = imagecreatefrompng("img/kenny.png");

 //$dest_image = imagecreatetruecolor(200, 170);
 //$source = imagesavealpha($dest_image, true);

 $width                        =    imagesx ( $source );
 $height                       =    imagesy ( $source );
 $offsetX = imagesx($dest) / 4;
 $offsetY = imagesy($dest) / 4;


 imagecolortransparent($source);
 imagecopy($dest, $source, $offsetX, $offsetY, 0, 0, $width, $height);

 # Save the image to a file

 imagepng($dest, $file);
 chmod($file, fileperms($file) | 128 + 16 + 2);

 # Output straight to the browser.
 //imagepng($image);

print_r($_SESSION);

 $sql = $bdd->prepare("INSERT INTO images(user_image, path_image) VALUES(?, ?)");
 $sql->execute(array($_SESSION["login"], $file));
?>
