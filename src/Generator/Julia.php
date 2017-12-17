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
    for ($y = 0; $y <= $this->getWidth(); $y++) {
      for ($x = 0; $x <= $this->getHeight(); $x++) {
        $newRe = 1.5 * ($x - $this->getWidth() / 2) / (0.5 * $this->getZoom() * $this->getWidth()) + $this->getMoveX();
        $newIm = ($y - $this->getHeight() / 2) / (0.5 * $this->getZoom() * $this->getHeight()) + $this->getMoveY();

        for ($i = 0; $i < $this->getMaxIteration(); $i++) {
          $oldRe = $newRe;
          $oldIm = $newIm;

          $newRe = $oldRe * $oldRe - $oldIm * $oldIm + $this->getComplexNumber()[0];
          $newIm = 2 * $oldRe * $oldIm + $this->getComplexNumber()[1];

          if (($newRe * $newRe + $newIm * $newIm) > 4) {
            break;
          }
        }

        $this->setPixel($y, $x, $i);
      }
    }

    return $this->getPixels();
  }

}
