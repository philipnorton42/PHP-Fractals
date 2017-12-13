<?php

namespace Hashbangcode\Fractals\Test\Utility;

use Hashbangcode\Fractals\Utility\ComplexNumber;

class ComplexNumberTest extends \PHPUnit_Framework_TestCase
{

  /**
   * Data provider for testAdd().
   *
   * @return array
   *   The data.
   */
  public function addDataProvider() {
    return [
      [1, 3, 5, 6, 3,],
      [7, -3, 1, 8, -3,],

    ];
  }

  /**
   * @dataProvider addDataProvider
   */
  public function testAdd($real, $imaginary, $add, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->add($add);
    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testSubtract().
   *
   * @return array
   *   The data.
   */
  public function subtractDataProvider() {
    return [
      [3, 6, 2, 1, 6,],
    ];
  }

  /**
   * @dataProvider subtractDataProvider
   */
  public function testSubtract($real, $imaginary, $subtract, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->subtract($subtract);
    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testToString().
   *
   * @return array
   *   The data.
   */
  public function toStringDataProvider() {
    return [
      [-3, 8, '(-3 +8i)'],
      [10, -20, '(10 -20i)'],
    ];
  }

  /**
   * @dataProvider toStringDataProvider
   */
  public function testToString($real, $imaginary, $result)
  {
    $complex_number = new ComplexNumber($real, $imaginary);

    $string = (string) $complex_number;

    $this->assertEquals($result, $string);
  }

  /**
   * Data provider for testMultiply().
   *
   * @return array
   *   The data.
   */
  public function multiplyDataProvider() {
    return [
      [1, 3, 2, 2, 6,],
    ];
  }

  /**
   * @dataProvider multiplyDataProvider
   */
  public function testMultiply($real, $imaginary, $multiply, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->multiply($multiply);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testDivide().
   *
   * @return array
   *   The data.
   */
  public function divideDataProvider() {
    return [
      [2, -4, 2, 1, -2,],
    ];
  }

  /**
   * @dataProvider divideDataProvider
   */
  public function testDivide($real, $imaginary, $divide, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->divide($divide);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testSquare().
   *
   * @return array
   *   The data.
   */
  public function squareDataProvider() {
    return [
      [3, 4, -7, 24,],
      [-3, 8, -55, -48],

    ];
  }

  /**
   * @dataProvider squareDataProvider
   */
  public function testSquare($real, $imaginary, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->square();

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testPow().
   *
   * @return array
   *   The data.
   */
  public function powDataProvider() {
    return [
      [-3, 8, 2, -55, -48,],
      [-3, 8, 3, 549, -296,],
      [-3, 8, 4, 721, 5280,],
    ];
  }

  /**
   * @dataProvider powDataProvider
   */
  public function testPow($real, $imaginary, $pow, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real, $imaginary);
    $complex_number1->pow($pow);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());
  }

  /**
   * Data provider for testAddComplex().
   *
   * @return array
   *   The data.
   */
  public function addComplexDataProvider() {
    return [
      [1, 1, 1, 1, 2, 2,],
      [1, 2, 3, 4, 4, 6,],
      [1, 2, -3, -4, -2, -2,],
      [1, 1, 1, 1, 0, 0,],
      [1, 2, 3, 4, -2, -2,],
    ];
  }

  /**
   * @dataProvider addComplexDataProvider
   */
  public function testAddComplex($real1, $imaginary1, $real2, $imaginary2, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real1, $imaginary1);
    $complex_number2 = new ComplexNumber($real2, $imaginary2);
    $complex_number1->addComplex($complex_number2);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals($real2, $complex_number2->getReal());
    $this->assertEquals($imaginary2, $complex_number2->getImaginary());
  }

  /**
   * Data provider for testSubtractComplex().
   *
   * @return array
   *   The data.
   */
  public function subtractComplexDataProvider() {
    return [
      [1, 2, -3, -4, 4, 6,],
    ];
  }

  /**
   * @dataProvider subtractComplexDataProvider
   */
  public function testSubtractComplex($real1, $imaginary1, $real2, $imaginary2, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real1, $imaginary1);
    $complex_number2 = new ComplexNumber($real2, $imaginary2);
    $complex_number1->subtractComplex($complex_number2);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals($real2, $complex_number2->getReal());
    $this->assertEquals($imaginary2, $complex_number2->getImaginary());
  }

  /**
   * Data provider for testMultiplyComplex().
   *
   * @return array
   *   The data.
   */
  public function multiplyComplexDataProvider() {
    return [
      [2, 3, 1, 4, -10, 11,],
      [2, 3, -1, -4, 10, -11,],
    ];
  }

  /**
   * @dataProvider multiplyComplexDataProvider
   */
  public function testMultiplyComplex($real1, $imaginary1, $real2, $imaginary2, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real1, $imaginary1);
    $complex_number2 = new ComplexNumber($real2, $imaginary2);
    $complex_number1->multiplyComplex($complex_number2);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals($real2, $complex_number2->getReal());
    $this->assertEquals($imaginary2, $complex_number2->getImaginary());
  }

  /**
   * Data provider for testDivideComplex().
   *
   * @return array
   *   The data.
   */
  public function divideComplexDataProvider() {
    return [
      [1, 2, 2, 1, 0.8, 0.6,],
      [2, 3, 1, 4, 0.82399999999999995, -0.29399999999999998,],
      [1, 2, 3, -4, -0.2, 0.4,],
    ];
  }

  /**
   * @dataProvider divideComplexDataProvider
   */
  public function testDivideComplex($real1, $imaginary1, $real2, $imaginary2, $realResult, $imaginaryResult)
  {
    $complex_number1 = new ComplexNumber($real1, $imaginary1);
    $complex_number2 = new ComplexNumber($real2, $imaginary2);
    $complex_number1->divideComplex($complex_number2);

    $this->assertEquals($realResult, $complex_number1->getReal());
    $this->assertEquals($imaginaryResult, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals($real2, $complex_number2->getReal());
    $this->assertEquals($imaginary2, $complex_number2->getImaginary());
  }

}
