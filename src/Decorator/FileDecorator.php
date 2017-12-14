<?php

namespace Hashbangcode\Fractals\Decorator;

class FileDecorator extends StringDecorator
{

  protected $filename = 'fractal.txt';

  public function getFilename() {
    return $this->filename;
  }

  public function setFilename($filename) {
    $this->filename = $filename;
  }

  /**
   * @return string
   */
  public function render()
  {
    $string = parent::render();
    file_put_contents($this->getFilename(), $string);
  }

}
