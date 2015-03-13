<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 18:48
 */

namespace Calculadora\Entity\Calculadora;

/**
 * Class Calculadora
 * @package Calculadora\Entity\Calculadora
 */
class Calculadora {

  /**
   * @var int
   */
  private $op1;
  /**
   * @var int
   */
  private $op2;

  /**
   * @param $op1
   * @param $op2
   */
  function __construct($op1, $op2)
  {
    $this->op1 = $op1;
    $this->op2 = $op2;
  }

  /**
   * @return int
   */
  public function suma()
  {
    return $this->op1 + $this->op2;
  }

  /**
   * @return int
   */
  public function resta()
  {
    return $this->op1 - $this->op2;
  }

  /**
   * @return int
   */
  public function multiplicacion()
  {
    return $this->op1 * $this->op2;
  }

  /**
   * @return float
   */
  public function division()
  {
    return $this->op1 / $this->op2;
  }
}