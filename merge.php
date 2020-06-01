<?php
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

 imagepng($dest, 'image.png');

 # Output straight to the browser.
 //imagepng($image);
?>
