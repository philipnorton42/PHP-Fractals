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

  /**
   * {@inheritdoc}
   */
  public function offsetExists($offset)
  {
    return $offset < $this->maxIterations;
  }

  /**
   * {@inheritdoc}
   */
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

    // Figure out the percentage of escape.
    $value = $offset / $this->maxIterations * 255;

    // Create the palette.
    $colour = [
      // Red.
      abs(sin(0.016 * $value + 6) * 230 + 20),
      // Green.
      abs(sin(0.013 * $value + 6) * 230 + 25),
      // Blue.
      abs(sin(0.01 * $value + 6) * 230 + 25),
    ];

    // Store the colour in the palette.
    $this->palette[$offset] = $colour;

    // Return the pallet colour.
    return $this->palette[$offset];
  }

  /**
   * {@inheritdoc}
   */
  public function offsetSet($offset, $value)
  {
    return;
  }

  /**
   * {@inheritdoc}
   */
  public function offsetUnset($offset)
  {
    return;
  }

}
