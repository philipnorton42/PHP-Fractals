<?php

namespace Hashbangcode\Fractals\Generator;

class Julia extends FractalBase
{

  protected $moveX = 0;

  /**
   * @var array
   *   A complex number.
   */
  protected $complexNumber;

  /**
   * @return mixed
   */
  public function getComplexNumber()
  {
    return $this->complexNumber;
  }

  /**
   * @param mixed $complexNumber
   */
  public function setComplexNumber($complexNumber)
  {
    $this->complexNumber = $complexNumber;
  }

  /**
   * {@inheritdoc}
   */
  public function calculateEscape($realScaled, $imaginaryScaled) {
    // Get the complex number for this Julia set.
    $complexNumber = $this->getComplexNumber();

    $realZ = $realScaled;
    $imaginaryZ = $imaginaryScaled;

    for ($i = 0; $i < $this->getMaxIteration(); $i++) {
      $tmpRealZ = ($realZ * $realZ) - ($imaginaryZ * $imaginaryZ) + $complexNumber[0];
      $tmpImaginaryZ = 2 * $realZ * $imaginaryZ + $complexNumber[1];

      $realZ = $tmpRealZ;
      $imaginaryZ = $tmpImaginaryZ;

      if ($realZ * $realZ + $imaginaryZ * $imaginaryZ >= $this->getEscape()) {
        break;
      }
    }

    return $i;
  }

}
