<?php

namespace Hashbangcode\Fractals\Generator;

class Mandlebrot extends FractalBase
{

  public function generate()
  {

    $min_x=-2;
    $max_x=1;
    $min_y=-1;
    $max_y=1;

    for ($y = 0; $y <= $this->getWidth(); $y++) {
      for ($x = 0; $x <= $this->getHeight(); $x++) {
        $c1 = $min_x + ($max_x-$min_x) / $this->getHeight() * $x;
        $c2 = $min_y + ($max_y-$min_y) / $this->getWidth() * $y;

        $z1 = 0;
        $z2 = 0;

        for ($i = 0; $i < $this->getMaxIteration(); $i++) {
          $new1 = $z1 * $z1 - $z2 * $z2 + $c1;
          $new2 = 2 * $z1 * $z2 + $c2;
          $z1 = $new1;
          $z2 = $new2;
          if ($z1 * $z1 + $z2 * $z2 >= 4) {
            break;
          }
        }

        $this->setPixel($y, $x, $i);
      }
    }

    return $this->getPixels();

    // Set the image width and height
 //   $width = 2000;
//    $height = 2000;

    // Set zoom factor
    $ZoomFactor = 2;

    // These two variables set the center point of the mandlebrot set
    $xShift = 0;
    $yShift = 0;

    // Calculate bounds
    $MinReal = ($this->getMinX() * $ZoomFactor) + $xShift; // x
    $MaxReal = ($this->getMaxX() * $ZoomFactor) + $xShift; // x
    $MinImaginary = (-1.2 * $ZoomFactor) + $yShift; // y
    $MaxImaginary = $MinImaginary + ($MaxReal - $MinReal) * ($this->getHeight() / $this->getWidth()); // y

    // Pre calculate factors
    $RealFactor = ($MaxReal - $MinReal) / ($this->getWidth() - 1);
    $ImaginaryFactor = ($MaxImaginary - $MinImaginary) / ($this->getHeight() - 1);

    // Set maximum number of iterations to count Z
    // The higher the number the more iterations are done before the value is assumed to escape the more accurate the image and the longer it takes to render it. A value of 30 will create a simple set in a few seconds, whereas a value of 1000 will create a large set, but is very, very slow. How long the set takes to generate will also depend on the size of the image created.
    //$maxIteration = 10000;

    for ($y = 0; $y < $this->getHeight(); ++$y) {
      $cImaginary = $MaxImaginary - ($y * $ImaginaryFactor);

      for ($x = 0; $x < $this->getWidth(); ++$x) {

        $cReal = $MinReal + ($x * $RealFactor);

        $ZReal = $cReal;
        $ZImaginary = $cImaginary; // Set Z = c

        // Calculate Z
        for ($i = 0; $i < $this->getMaxIteration(); ++$i) {

          $ZReal2 = $ZReal * $ZReal;
          $ZImaginary2 = $ZImaginary * $ZImaginary;

          // if the value 'escapes' then break out of this loop
          if ($ZReal2 + $ZImaginary2 > 4) {
            break;
          }

          $ZImaginary = 2 * $ZReal * $ZImaginary + $cImaginary;
          $ZReal = $ZReal2 - $ZImaginary2 + $cReal;
        }
      }
    }


  }
}
