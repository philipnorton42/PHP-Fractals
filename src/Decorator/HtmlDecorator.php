<?php

namespace Hashbangcode\Fractals\Decorator;

use Hashbangcode\Fractals\Decorator\StringDecorator;

class HtmlDecorator extends StringDecorator
{

  /**
   * @return string
   */
  public function render()
  {
    $string = parent::render();
    return '<html><body><pre style="font-size: 5px;line-height: 3px;">' . $string . '</pre></body></html>';
  }

}
