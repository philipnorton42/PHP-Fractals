<?php

namespace Hashbangcode\Fractals\Generator;

interface FractalInterface {

  /**
   * Generate the fractal set.
   *
   * @return array
   *   The set.
   */
  public function generate();

  /**
   * @param $realScaled
   * @param $imaginaryScaled
   * @return mixed
   */
  public function calculateEscape($realScaled, $imaginaryScaled);
}
