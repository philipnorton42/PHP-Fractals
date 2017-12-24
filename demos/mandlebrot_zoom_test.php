<?php

require '../vendor/autoload.php';

ini_set('memory_limit', '1028M');
set_time_limit(0);

use Hashbangcode\Fractals\Generator\Mandlebrot;
use Hashbangcode\Fractals\Decorator\StringDecorator;
use Hashbangcode\Fractals\Decorator\ImageDecorator;

$type = 'image';

for ($i = 1; $i < 100000000; $i *= 10) {

  switch ($type) {
    case 'string':
      $fractal = new Mandlebrot(50, 50);
      $fractal->setEscape(4);
      $fractal->setMaxIteration(50);

      $fractal->setMoveX(-1.04125);
      $fractal->setMoveY(0.3501);

      $fractal->setZoom($i);
      $fractal->generate();
      $fractalDecorator = new StringDecorator($fractal);
      print $fractalDecorator->render();

      break;
    case 'image':
      $fractal = new Mandlebrot(200, 200);
      $fractal->setMaxIteration(60);
      $fractal->setEscape(4);

      $fractal->setMoveX(-1.04125);
      $fractal->setMoveY(0.3501);

      $fractal->setZoom($i);

      $fractal->generate();

      $fractalDecorator = new ImageDecorator($fractal);
      $fractalDecorator->setFilename('output/mandlebrot' . time());
      $fractalDecorator->render();

      break;
  }
}

unset($fractal);
unset($fractalDecorator);
