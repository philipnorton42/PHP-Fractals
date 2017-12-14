<?php

namespace Hashbangcode\Fractals\Utility;

/**
 * A class for hold a Complex Number.
 *
 * @package Hashbangcode\Fractals\Utility
 */
class ComplexNumber
{

  /**
   * @var int
   *   The real part.
   */
  protected $real;

  /**
   * @var int
   *   The imaginary part.
   */
  protected $imaginary;

  /**
   * ComplexNumber constructor.
   *
   * @param int $real
   *   The real part.
   * @param int $imaginary
   *   The imaginary part.
   */
  public function __construct($real, $imaginary)
  {
    $this->real = $real;
    $this->imaginary = $imaginary;
  }

  /**
   * Add another complex number to this complex number.
   *
   * @param ComplexNumber $number
   *   The complex number to add.
   *
   * @return $this
   *   The current object.
   */
  public function addComplex(ComplexNumber $number)
  {
    $this->real = $this->real + $number->getReal();
    $this->imaginary = $this->imaginary + $number->getImaginary();
    return $this;
  }

  /**
   * Get the real part.
   *
   * @return int
   *   The real part.
   */
  public function getReal()
  {
    return $this->real;
  }

  /**
   * Set the real part.
   *
   * @param int $real
   *   The real part to set.
   */
  public function setReal($real)
  {
    $this->real = $real;
  }

  /**
   * Get the imaginary part.
   *
   * @return int
   *   The imaginary part.
   */
  public function getImaginary()
  {
    return $this->imaginary;
  }

  /**
   * Set the imaginary part.
   *
   * @param int $imaginary
   *   The imaginary part to set.
   */
  public function setImaginary($imaginary)
  {
    $this->imaginary = $imaginary;
  }

  public function subtractComplex(ComplexNumber $number)
  {
    $this->real = $this->real - $number->getReal();
    $this->imaginary = $this->imaginary - $number->getImaginary();
    return $this;
  }

  public function add($number)
  {
    $this->real = $this->real + $number;
    return $this;
  }

  public function subtract($number)
  {
    $this->real = $this->real - $number;
    return $this;
  }

  public function multiply($number)
  {
    $this->real = $this->real * $number;
    $this->imaginary = $this->imaginary * $number;
    return $this;
  }

  public function divide($number)
  {
    $this->real = $this->real / $number;
    $this->imaginary = $this->imaginary / $number;
    return $this;
  }

  public function divideComplex(ComplexNumber $number)
  {
    $den = ($number->real * $number->real) + ($number->imaginary * $number->imaginary);
    $tmpReal = (($this->real * $number->real) + ($this->imaginary * $number->imaginary)) / $den;
    $this->imaginary = (($this->imaginary * $number->real) - ($this->real * $number->imaginary)) / $den;
    $this->real = $tmpReal;

    return $this;
  }

  public function multiplyComplex(ComplexNumber $number)
  {
    $tmpReal = $this->real;
    $this->real = ($this->real * $number->getReal()) + (($this->imaginary * $number->getImaginary()) * -1);
    $this->imaginary = ($tmpReal * $number->getImaginary()) + ($this->imaginary * $number->getReal());
    return $this;
  }

  public function square()
  {
    $tmpReal = ($this->real * $this->real) - ($this->imaginary * $this->imaginary);
    $this->imaginary = 2 * ($this->real * $this->imaginary);
    $this->real = $tmpReal;
    return $this;
  }

  public function pow($pow)
  {
    /*
    // complex number `a' raised to an integer power `n'
    //     a**n = r**n * (cos(n theta) + i sin (n theta))
    _EXPORT
    template <class _TypeT>
    complex<_TypeT>
    pow (const complex<_TypeT>& __a, int __n)
    {

        if (_TypeT () == __a.imag ()) {
            if (__a.real () < _TypeT ())
                return pow (__a, complex<_TypeT>(__n));

            return complex<_TypeT>(_RWSTD_C::pow (__a.real (), __n));
        }

        _TypeT __r  = _RWSTD_C::pow (_TypeT (abs (__a)), __n);
        _TypeT __th = __n * arg (__a);

        return complex<_TypeT>(__r * _RWSTD_C::cos (__th),  __r * _RWSTD_C::sin (__th));
    }*/





    $ar = $this->real;
    $ai = $this->imaginary;
    if ($ar == 0 && $ai == 0) {
      $r = $i = 0.0;
    } else {
      $logr = log($this->imaginary);
      $theta = $this->imaginary;
      $rho = exp($logr * $pow);
      $beta = $theta * $pow;
      $r = $rho * cos($beta);
      $i = $rho * sin($beta);
    }

    $this->real = $r;
    $this->imaginary = $i;
    /*

        $__r  = pow($this->imaginary, $pow);
        $theta = $pow * $this->imaginary;

        $this->real = $__r * cos ($theta);
        $this->imaginary = $__r * sin ($theta);
        return $this;*/
  }

  /*
// complex<T> square root of complex<T> number `a'
//     sqrt(a) = sqrt(r) * ( cos (theta/2) + i sin (theta/2))
template <class _TypeT>
inline complex<_TypeT> sqrt (const complex<_TypeT>& __a)
{
    _TypeT __r  = _RWSTD_C::sqrt(abs(__a));
    _TypeT __th = arg (__a) / _TypeT (2.0);
    return complex<_TypeT>(__r * _RWSTD_C::cos (__th),
                           __r * _RWSTD_C::sin (__th));
}
*/
  public function sqrt()
  {

  }

  public function __toString()
  {
    return '(' . $this->real . ' ' . (($this->imaginary > 0) ? '+' : '') . $this->imaginary . 'i)';
  }
}
