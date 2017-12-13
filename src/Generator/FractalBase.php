<?php

namespace Hashbangcode\Fractals\Generator;

use Hashbangcode\Fractals\Utility\ComplexNumber;

abstract class FractalBase implements FractalInterface {

  protected $maxIteration;
  protected $width;
  protected $height;

  /**
   * @return mixed
   */
  public function getMaxIteration()
  {
    return $this->maxIteration;
  }

  /**
   * @param mixed $maxIteration
   */
  public function setMaxIteration($maxIteration)
  {
    $this->maxIteration = $maxIteration;
  }

  /**
   * @return mixed
   */
  public function getWidth()
  {
    return $this->width;
  }

  /**
   * @param mixed $width
   */
  public function setWidth($width)
  {
    $this->width = $width;
  }

  /**
   * @return mixed
   */
  public function getHeight()
  {
    return $this->height;
  }

  /**
   * @param mixed $height
   */
  public function setHeight($height)
  {
    $this->height = $height;
  }

  public function __construct($height, $width, $maxiterations = 200)
  {
    $this->setHeight($height);
    $this->setWidth($width);

    $this->setMaxIteration($maxiterations);
  }
}
