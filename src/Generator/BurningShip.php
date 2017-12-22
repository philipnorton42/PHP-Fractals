<?php

namespace Hashbangcode\Fractals\Generator;

class BurningShip extends FractalBase
{

  protected $moveX = -0.5;
  protected $moveY = -0.5;

  /**
   * {@inheritdoc}
   */
  public function calculateEscape($realScaled, $imaginaryScaled) {
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

    return $i;
  }

}
