<?php
 # If you know your originals are of type PNG.
 $dest = imagecreatefrompng("photo.png");
 //$dest = imagealphablending($dest, true);
 $source = imagecreatefrompng("img/vegeta_burned.png");

 //$dest_image = imagecreatetruecolor(200, 170);
 //$source = imagesavealpha($dest_image, true);

 $width                        =    imagesx ( $source );
 $height                       =    imagesy ( $source );
 $offsetX = imagesx($dest) / 2;

 imagecolortransparent($source);
 imagecopy($dest, $source, $offsetX, 0, 0, 0, $width, $height);

 # Save the image to a file

 imagepng($dest, 'image.png');

 # Output straight to the browser.
 //imagepng($image);
?>
