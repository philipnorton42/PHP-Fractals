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
      [1, 2, -7, 24,],
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





  public function testAddComplex1()
  {
    $complex_number1 = new ComplexNumber(1, 1);
    $complex_number2 = new ComplexNumber(1, 1);
    $complex_number1->addComplex($complex_number2);

    $this->assertEquals(2, $complex_number1->getReal());
    $this->assertEquals(2, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(1, $complex_number2->getReal());
    $this->assertEquals(1, $complex_number2->getImaginary());
  }

  public function addComplex2()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(3, 4);
    $complex_number1->addComplex($complex_number2);

    $this->assertEquals(4, $complex_number1->getReal());
    $this->assertEquals(6, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(3, $complex_number2->getReal());
    $this->assertEquals(4, $complex_number2->getImaginary());
  }

  public function addComplex3()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(-3, -4);
    $complex_number1->addComplex($complex_number2);

    $this->assertEquals(-2, $complex_number1->getReal());
    $this->assertEquals(-2, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(-3, $complex_number2->getReal());
    $this->assertEquals(-4, $complex_number2->getImaginary());
  }


  public function subtractComplex1()
  {
    $complex_number1 = new ComplexNumber(1, 1);
    $complex_number2 = new ComplexNumber(1, 1);
    $complex_number1->subtractComplex($complex_number2);

    $this->assertEquals(0, $complex_number1->getReal());
    $this->assertEquals(0, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(1, $complex_number2->getReal());
    $this->assertEquals(1, $complex_number2->getImaginary());
  }

  public function subtractComplex2()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(3, 4);
    $complex_number1->subtractComplex($complex_number2);

    $this->assertEquals(-2, $complex_number1->getReal());
    $this->assertEquals(-2, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(3, $complex_number2->getReal());
    $this->assertEquals(4, $complex_number2->getImaginary());
  }

  public function subtractComplex3()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(-3, -4);
    $complex_number1->subtractComplex($complex_number2);

    $this->assertEquals(4, $complex_number1->getReal());
    $this->assertEquals(6, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(-3, $complex_number2->getReal());
    $this->assertEquals(-4, $complex_number2->getImaginary());
  }


  public function multiplyComplex1()
  {
    $complex_number1 = new ComplexNumber(2, 3);
    $complex_number2 = new ComplexNumber(1, 4);
    $complex_number1->multiplyComplex($complex_number2);

    $this->assertEquals(-10, $complex_number1->getReal());
    $this->assertEquals(11, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(1, $complex_number2->getReal());
    $this->assertEquals(4, $complex_number2->getImaginary());
  }

  public function multiplyComplex2()
  {
    $complex_number1 = new ComplexNumber(2, 3);
    $complex_number2 = new ComplexNumber(-1, -4);
    $complex_number1->multiplyComplex($complex_number2);

    $this->assertEquals(10, $complex_number1->getReal());
    $this->assertEquals(-11, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(-1, $complex_number2->getReal());
    $this->assertEquals(-4, $complex_number2->getImaginary());
  }

  public function divideComplex1()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(2, 1);
    $complex_number1->divideComplex($complex_number2);

    $this->assertEquals(0.8, $complex_number1->getReal());
    $this->assertEquals(0.6, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(2, $complex_number2->getReal());
    $this->assertEquals(1, $complex_number2->getImaginary());
  }

  public function divideComplex2()
  {
    $complex_number1 = new ComplexNumber(2, 3);
    $complex_number2 = new ComplexNumber(1, 4);
    $complex_number1->divideComplex($complex_number2);

    $this->assertEquals(round(0.824, 3), round($complex_number1->getReal(), 3));
    $this->assertEquals(round(-0.294, 3), round($complex_number1->getImaginary(), 3));

    // Passed ComplexNumber should remain the same
    $this->assertEquals(1, $complex_number2->getReal());
    $this->assertEquals(4, $complex_number2->getImaginary());
  }

  public function divideComplex3()
  {
    $complex_number1 = new ComplexNumber(1, 2);
    $complex_number2 = new ComplexNumber(3, -4);
    $complex_number1->divideComplex($complex_number2);

    $this->assertEquals(-0.2, $complex_number1->getReal());
    $this->assertEquals(0.4, $complex_number1->getImaginary());

    // Passed ComplexNumber should remain the same
    $this->assertEquals(3, $complex_number2->getReal());
    $this->assertEquals(-4, $complex_number2->getImaginary());
  }

}
