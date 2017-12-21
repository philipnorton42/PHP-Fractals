<?php

namespace Hashbangcode\Fractals\Generator;

class BurningShip extends FractalBase
{

  /**
   * {@inheritdoc}
   */
  public function generate()
  {
    for ($y = 0; $y <= $this->getWidth(); $y++) {
      for ($x = 0; $x <= $this->getHeight(); $x++) {
        // Work out the scaled complex number.
        $realScaled = 1.5 * ($x - $this->getWidth() / 2) / (0.5 * $this->getZoom() * $this->getWidth()) + $this->getMoveX();
        $imaginaryScaled = ($y - $this->getHeight() / 2) / (0.5 * $this->getZoom() * $this->getHeight()) + $this->getMoveY() -0.5;

        $realZ = 0;
        $imaginaryZ = 0;

        for ($i = 0; $i < $this->getMaxIteration(); $i++) {
          $tmpRealZ = abs($realZ * $realZ) - abs($imaginaryZ * $imaginaryZ) + $realScaled;
          $tmpImaginaryZ = abs(2 * $realZ * $imaginaryZ) + $imaginaryScaled;

          $realZ = $tmpRealZ;
          $imaginaryZ = $tmpImaginaryZ;

          if ($realZ * $realZ + $imaginaryZ * $imaginaryZ >= $this->getEscape()) {
            break;
          }
        }

        $this->setPixel($y, $x, $i);
      }
    }

    return $this->getPixels();
  }

}
