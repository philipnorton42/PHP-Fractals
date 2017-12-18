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

  public function __construct($maxIterations) {
    $this->maxIterations = $maxIterations;
  }

  public function offsetExists($offset)
  {
    return $offset < $this->maxIterations;
  }

  public function offsetGet($offset)
  {
    if (isset($this->palette[$offset])) {
      // Return already set palette options.
      return $this->palette[$offset];
    }

    if ($offset == 0) {
      // If the offset is 0 then return black.
      $this->palette[$offset] = [0,0,0,];
      return $this->palette[$offset];
    }

    // Create a colour.
    /*$colour = [
      $offset / $this->maxIterations * 255,
      0,
      log($offset) / log($this->maxIterations) * 255,
    ];*/

    $value = $offset / $this->maxIterations * 255;

    $colour = [
      abs(sin(0.016 * $value + 4) * 230 + 25),
      abs(sin(0.013 * $value + 2) * 230 + 25),
      abs(sin(0.01 * $value + 1) * 230 + 25),
    ];

    // Store the colour in the palette.
    $this->palette[$offset] = $colour;

    return $this->palette[$offset];
  }

  public function offsetSet($offset, $value)
  {
    return;
  }

  public function offsetUnset($offset)
  {
    return;
  }

}
