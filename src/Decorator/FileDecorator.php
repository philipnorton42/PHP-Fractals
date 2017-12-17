<?php

namespace Hashbangcode\Fractals\Decorator;

use Hashbangcode\Fractals\Generator\FractalInterface;
use Hashbangcode\Fractals\Decorator\FractalDecoratorBase;
use Hashbangcode\Fractals\Decorator\FractalDecoratorInterface;

class FileDecorator extends FractalDecoratorBase
{
  /**
   * @var string
   */
  protected $filename = 'fractal.txt';

  /**
   * @var \Hashbangcode\Fractals\Decorator\FractalDecoratorInterface
   */
  protected $decorator;

  /**
   * FileDecorator constructor.
   *
   * @param \Hashbangcode\Fractals\Decorator\FractalDecoratorInterface $decorator
   * @param FractalInterface|NULL $fractal
   */
  public function __construct(FractalDecoratorInterface $decorator, FractalInterface $fractal = NULL) {
    $this->decorator = $decorator;

    if (!is_null($fractal)) {
      $this->fractal = $fractal;
    }
  }

  /**
   * @return string
   */
  public function getFilename() {
    return $this->filename;
  }

  /**
   * @param $filename
   */
  public function setFilename($filename) {
    $this->filename = $filename;
  }

  /**
   * @return string
   */
  public function render()
  {
    $string = $this->decorator->render();
    file_put_contents($this->getFilename(), $string);
  }

}
