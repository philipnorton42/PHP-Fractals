<?php

namespace Hashbangcode\Fractals\Generator;

use Hashbangcode\Fractals\Utility\ComplexNumber;

abstract class FractalBase implements FractalInterface {

  protected $maxIteration;
  protected $width;
  protected $height;
  protected $pixels = [];

  protected $zoom;

  protected $moveX = -0.5;
  protected $moveY = 0;

  /**
   * @return int
   */
  public function getMoveX()
  {
    return $this->moveX;
  }

  /**
   * @param int $moveX
   */
  public function setMoveX($moveX)
  {
    $this->moveX = $moveX;
  }

  /**
   * @return int
   */
  public function getMoveY()
  {
    return $this->moveY;
  }

  /**
   * @param int $moveY
   */
  public function setMoveY($moveY)
  {
    $this->moveY = $moveY;
  }

  /**
   * @return float
   */
  public function getZoom()
  {
    return $this->zoom;
  }

  /**
   * @param float $zoom
   */
  public function setZoom($zoom)
  {
    $this->zoom = $zoom;
  }

  /**
   * Set a pixel to a particular value.
   *
   * @param int $y
   *   The y coordinate.
   * @param int $x
   *   The x coordinate.
   * @param int $value
   *   The value to set.
   */
  public function setPixel($y, $x, $value) {
    $this->pixels[$y][$x] = $value;
  }

  /**
   * Get the entire pixel array.
   *
   * @return array
   *   The entire pixel array.
   */
  public function getPixels() {
    return $this->pixels;
  }

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

  /**
   * FractalBase constructor.
   * @param $height
   * @param $width
   * @param int $maxiterations
   */
  public function __construct($height, $width, $zoom = 1, $maxiterations = 100)
  {
    $this->setHeight($height);
    $this->setWidth($width);
    $this->setZoom($zoom);
    $this->setMaxIteration($maxiterations);
  }

  /**
   *
   */
  public function __destruct()
  {
   unset($this->height);
   unset($this->width);
   unset($this->maxIteration);
   unset($this->pixels);
   unset($this->moveX);
   unset($this->moveY);
   unset($this->zoom);
  }

}
