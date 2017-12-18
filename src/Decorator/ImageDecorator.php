<?php

namespace Hashbangcode\Fractals\Decorator;

use Hashbangcode\Fractals\Generator\FractalInterface;
use Hashbangcode\Fractals\Utility\Palette;

class ImageDecorator extends FractalDecoratorBase {

  /**
   * @var string
   *   The default image name.
   */
  protected $filename = 'fractal';

  /**
   * ImageDecorator constructor.
   * @param FractalInterface $fractal
   */
  public function __construct(FractalInterface $fractal) {
    $this->fractal = $fractal;
  }

  /**
   * Get the filename.
   *
   * @return string
   *   The filename.
   */
  public function getFilename() {
    return $this->filename . '.png';
  }

  /**
   * Set the filename.
   *
   * @param string $filename
   *   The filename.
   */
  public function setFilename($filename) {
    $this->filename = $filename;
  }

  /**
   *
   */
  public function render() {
    // Initialise image.
    $im = imagecreatetruecolor($this->getFractal()->getWidth(), $this->getFractal()->getHeight());
    $background_color = imagecolorallocate($im, 255, 255, 255);
    imagefilledrectangle($im, 0, 0, $this->getFractal()->getHeight(), $this->getFractal()->getWidth(), $background_color);
    //$colorFactor = log($this->getFractal()->getWidth());

    $palette = new Palette($this->getFractal()->getMaxIteration());

    $pixels = $this->getFractal()->getPixels();

    foreach ($pixels as $y => $value) {
      foreach ($pixels[$y] as $x => $value) {
        if ($value == $this->getFractal()->getMaxIteration()) {
          $colour = imagecolorallocate($im, 0, 0, 0);
        } else {
          $colorValue = $palette[$value];
          //$colorValue = log($value) / $colorFactor * 255;
          $colour = imagecolorallocate($im, $colorValue[0], $colorValue[1], $colorValue[2]);
        }
        imagesetpixel($im, $x, $y, $colour);
      }
    }

    // Write the image to file.
    imagepng($im, $this->getFilename());
    imagedestroy($im);
  }

}
