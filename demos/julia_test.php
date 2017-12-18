<?php

require '../vendor/autoload.php';

ini_set('memory_limit', '1028M');
set_time_limit(0);

use Hashbangcode\Fractals\Generator\Julia;
use Hashbangcode\Fractals\Decorator\StringDecorator;
use Hashbangcode\Fractals\Decorator\ImageDecorator;

$type = 'image';

switch ($type) {
  case 'string':
    $fractal = new Julia(100, 100);
    $fractal->setMaxIteration(100);
    $fractal->setComplexNumber([-0.7, 0.27015]);
    $fractal->generate();

    $fractalDecorator = new StringDecorator($fractal);
    print $fractalDecorator->render();

    break;

  case 'image':
    $fractal = new Julia(1000, 1000);
    $fractal->setMaxIteration(200);
    $fractal->setComplexNumber([-0.7, 0.27015]);
    //$fractal->setComplexNumber([0.25, 0.52]);
    $fractal->generate();

    $fractalDecorator = new ImageDecorator($fractal);
    $fractalDecorator->setFilename('output/julia' . time());
    $fractalDecorator->render();
    break;
}

unset($fractal);
unset($fractalDecorator);
