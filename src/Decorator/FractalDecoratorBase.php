<?php

namespace Hashbangcode\Fractals\Decorator;

use Hashbangcode\Fractals\Generator\FractalInterface;

abstract class FractalDecoratorBase implements FractalDecoratorInterface {

  /**
   * @var FractalInterface
   */
  protected $fractal;

  /**
   * FractalDecoratorBase constructor.
   * @param FractalInterface $fractal
   */
  public function __construct(FractalInterface $fractal) {
    $this->fractal = $fractal;
  }

  /**
   * Get the fractal.
   *
   * @return FractalInterface
   *   The fractal object.
   */
  public function getFractal() {
    return $this->fractal;
  }
}
