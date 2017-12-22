<?php

namespace Hashbangcode\Fractals\Generator;

class Mandlebrot extends FractalBase
{

  /**
   * {@inheritdoc}
   */
  public function calculateEscape($realScaled, $imaginaryScaled) {
    $realZ = 0;
    $imaginaryZ = 0;

    for ($i = 0; $i < $this->getMaxIteration(); $i++) {
      $tmpRealZ = ($realZ * $realZ) - ($imaginaryZ * $imaginaryZ) + $realScaled;
      $tmpImaginaryZ = 2 * $realZ * $imaginaryZ + $imaginaryScaled;

      $realZ = $tmpRealZ;
      $imaginaryZ = $tmpImaginaryZ;

      if ($realZ * $realZ + $imaginaryZ * $imaginaryZ >= $this->getEscape()) {
        break;
      }
    }

    return $i;
  }

}
