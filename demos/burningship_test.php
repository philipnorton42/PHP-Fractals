<?php

require '../vendor/autoload.php';

ini_set('memory_limit', '1028M');
set_time_limit(0);

use Hashbangcode\Fractals\Generator\BurningShip;
use Hashbangcode\Fractals\Decorator\StringDecorator;
use Hashbangcode\Fractals\Decorator\ImageDecorator;

$type = 'image';

switch ($type) {
  case 'string':
    $fractal = new BurningShip(100, 100);
    $fractal->generate();

    $fractalDecorator = new StringDecorator($fractal);
    print $fractalDecorator->render();

    break;
  case 'image':
    $fractal = new BurningShip(1000, 1000);
    $fractal->setMaxIteration(200);
    $fractal->generate();

    $fractalDecorator = new ImageDecorator($fractal);
    $fractalDecorator->setFilename('output/burningship' . time());
    $fractalDecorator->render();

    break;
}
