<?php

namespace Hashbangcode\Fractals\Decorator;

class StringDecorator extends FractalDecoratorBase
{

  /**
   * @return string
   */
  public function render()
  {
    $string = '';

    $pixels = $this->getFractal()->getPixels();

    foreach ($pixels as $y => $value) {
      foreach ($pixels[$y] as $x => $value) {
        $percent = ($value * 255) / $this->getFractal()->getMaxIteration();

        if ($percent == 0) {
          $string .= '.';
        } elseif ($percent > 1 && $percent <= 10) {
          $string .= ':';
        } elseif ($percent > 10 && $percent <= 50) {
          $string .= '-';
        } elseif ($percent > 50 && $percent <= 100) {
          $string .= '|';
        } elseif ($percent > 100 && $percent <= 175) {
          $string .= 'x';
        } elseif ($percent > 175 && $percent <= 199) {
          $string .= 'X';
        } elseif ($percent > 200 && $percent <= 254) {
          $string .= '#';
        } else {
          $string .= '@';
        }
      }
      $string .= PHP_EOL;
    }

    return $string;
  }

}
