<?php

namespace Hashbangcode\Fractals\Decorator;

class MandlebrotDecorator implements FractalDecoratorInterface {

}


/*$start = microtime(true);

// Set the time limit (this might take a while)
set_time_limit(0);

// Set the image width and height
$width = 2000;
$height = 2000;

// Set zoom factor
$ZoomFactor = 2;

// These two variables set the center point of the mandlebrot set
$xShift = 0;
$yShift = 0;

// Calculate bounds
$MinReal = (-1.9 * $ZoomFactor) + $xShift ; // x
$MaxReal = (1.8 * $ZoomFactor) + $xShift; // x
$MinImaginary = (-1.2 * $ZoomFactor) + $yShift; // y
$MaxImaginary = $MinImaginary + ($MaxReal-$MinReal) * ($height/$width); // y

// Pre calculate factors
$RealFactor = ($MaxReal-$MinReal)/($width-1);
$ImaginaryFactor = ($MaxImaginary-$MinImaginary)/($height-1);


// Set maximum number of iterations to count Z
// The higher the number the more iterations are done before the value is assumed to escape the more accurate the image and the longer it takes to render it. A value of 30 will create a simple set in a few seconds, whereas a value of 1000 will create a large set, but is very, very slow. How long the set takes to generate will also depend on the size of the image created.

$maxIteration = 10000;

// Initialise image
$im = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($im, 255, 255, 255);
imagefilledrectangle($im, 0, 0, $height, $width, $background_color);

$colorFactor = log($width);

for ($y = 0; $y < $height; ++$y) {

    $cImaginary = $MaxImaginary - ($y * $ImaginaryFactor);

    for ($x = 0; $x < $width; ++$x) {

        $cReal = $MinReal + ($x * $RealFactor);

        $ZReal = $cReal;
        $ZImaginary = $cImaginary; // Set Z = c

        // Calculate Z
        for ($i = 0; $i < $maxIteration; ++$i) {

            $ZReal2 = $ZReal * $ZReal;
            $ZImaginary2 = $ZImaginary * $ZImaginary;

            // if the value 'escapes' then break out of this loop
            if ($ZReal2 + $ZImaginary2 > 4) {
                break;
            }

            $ZImaginary = 2 * $ZReal * $ZImaginary + $cImaginary;
            $ZReal = $ZReal2 - $ZImaginary2 + $cReal;
        }

		if ($i == $maxIteration) {
			$colour = imagecolorallocate($im, 0, 0, 0);
		} else {
			//$colorValue = 255 -
			$colorValue = round(log($i)/$colorFactor * 255);
			$colour = imagecolorallocate($im, 0, 0, $colorValue);
		}
        imagesetpixel($im, $x, $y, $colour);
    }
}

// Write the image to file
imagepng($im, 'fractal.png');
imagedestroy($im);


$end = microtime(true);
$time = $end - $start;
echo "time taken " . $time . ' seconds';
*/