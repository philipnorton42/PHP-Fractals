<?php

namespace Hashbangcode\Fractals\Generator;

class Julia extends FractalBase
{

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
  public function generate()
  {
    // Get the complex number for this Julia set.
    $complexNumber = $this->getComplexNumber();

    for ($y = 0; $y <= $this->getWidth(); $y++) {
      for ($x = 0; $x <= $this->getHeight(); $x++) {
        // Work out the scaled complex number.
        $realScaled = 1.5 * ($x - $this->getWidth() / 2) / (0.5 * $this->getZoom() * $this->getWidth()) + $this->getMoveX();
        $imaginaryScaled = ($y - $this->getHeight() / 2) / (0.5 * $this->getZoom() * $this->getHeight()) + $this->getMoveY();

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

        $this->setPixel($y, $x, $i);
      }
    }

    return $this->getPixels();
  }
}
