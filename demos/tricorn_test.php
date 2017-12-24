<?php

require '../vendor/autoload.php';

ini_set('memory_limit', '1028M');
set_time_limit(0);

use Hashbangcode\Fractals\Generator\Tricorn;
use Hashbangcode\Fractals\Decorator\StringDecorator;
use Hashbangcode\Fractals\Decorator\ImageDecorator;

$type = 'image';

switch ($type) {
  case 'string':
    $fractal = new Tricorn(50, 50);
    $fractal->setEscape(4);
    $fractal->setMaxIteration(50);
    $fractal->generate();

    $fractalDecorator = new StringDecorator($fractal);
    print $fractalDecorator->render();

    break;
  case 'image':
    $fractal = new Tricorn(2000, 2000);
    $fractal->setMaxIteration(200);
    $fractal->setEscape(100);
    $fractal->generate();

    $fractalDecorator = new ImageDecorator($fractal);
    $fractalDecorator->setFilename('output/tricorn' . time());
    $fractalDecorator->render();

    break;
}

unset($fractal);
unset($fractalDecorator);
