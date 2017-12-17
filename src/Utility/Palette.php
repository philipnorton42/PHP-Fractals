<?php

namespace Hashbangcode\Fractals\Utility;

/**
 * Class Pallette.
 *
 * @package Hashbangcode\Fractals\Utility
 */
class Palette implements \ArrayAccess {

  protected $palette = [];

  protected $maxIterations;

  public function __construct($maxiterations) {
    $this->maxIterations = $maxiterations;
  }

  public function offsetExists($offset)
  {
    if ($offset < $this->maxiterations) {
      return true;
    }
  }

  public function offsetGet($offset)
  {
    return $this->palette[$offset];
  }

  public function offsetSet($offset, $value)
  {
    $this->palette[$offset] = round(log($offset)/$value * 255);

  }

  public function offsetUnset($offset)
  {
    return;
  }

}