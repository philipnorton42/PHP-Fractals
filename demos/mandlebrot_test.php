<?php

require '../vendor/autoload.php';

use Hashbangcode\Fractals\Generator\Mandlebrot;
use Hashbangcode\Fractals\Decorator\StringDecorator;
use Hashbangcode\Fractals\Decorator\ImageDecorator;

$type = 'string';

switch ($type) {
  case 'string':
    $fractal = new Mandlebrot(100, 100);
    $fractal->generate();

    $fractalDecorator = new StringDecorator($fractal);
    print $fractalDecorator->render();

    break;
  case 'image':
    $fractal = new Mandlebrot(500, 500, 1000);
    $fractal->generate();

    $fractalDecorator = new ImageDecorator($fractal);
    $fractalDecorator->setFilename('mandlebrot');
    $fractalDecorator->render();

    break;
}
