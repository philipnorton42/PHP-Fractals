<?php

require '../vendor/autoload.php';

ini_set('memory_limit', '1028M');
set_time_limit(0);

use Hashbangcode\Fractals\Utility\Palette;

$red = 0;
$green = 0;
$blue = 0;



for ($x = 0; $x <= 10; ++$x) {
  $palette = new Palette(510);

  $palette->setRedOffset($red += 1);
  $palette->setGreenOffset($green += 1);
  $palette->setBlueOffset($blue += 1);

  $im = imagecreatetruecolor(510, 100);

  $background_color = imagecolorallocate($im, 0, 0, 0);
  imagefilledrectangle($im, 0, 0, 255, 100, $background_color);

  for ($i = 0; $i <= 510; $i += 2) {
    if (isset($palette[$i]) && !empty($palette[$i])) {
      $paletteColour = $palette[$i];
      //echo $i . ' ' . $paletteColour[0] . ':' . $paletteColour[1] . ':' . $paletteColour[2] . PHP_EOL;
      $color = imagecolorallocate($im, $paletteColour[0], $paletteColour[1], $paletteColour[2]);
      imagefilledrectangle($im, $i, 0, $i + 1, 100, $color);
    }
  }

  imagepng($im, 'output/palette_' . $red . '_' . $green .'_'.$blue . '_' . microtime() . '.png');
  imagedestroy($im);
}