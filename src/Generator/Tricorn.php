<?php

namespace Hashbangcode\Fractals\Generator;

class Tricorn extends FractalBase
{

  /**
   * {@inheritdoc}
   */
  public function generate()
  {
    for ($y = 0; $y <= $this->getWidth(); $y++) {
      for ($x = 0; $x <= $this->getHeight(); $x++) {
        $newReal = 1.5 * ($x - $this->getWidth() / 2) / (0.5 * $this->getZoom() * $this->getWidth()) + $this->getMoveX();
        $newImaginary = ($y - $this->getHeight() / 2) / (0.5 * $this->getZoom() * $this->getHeight()) + $this->getMoveY();

        $z1 = 0;
        $z2 = 0;

        for ($i = 0; $i < $this->getMaxIteration(); $i++) {
          $new1 = $z1 * $z1 - $z2 * $z2 + $newReal;
          $new2 = -2 * $z1 * $z2 + $newImaginary;

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
  }

}
