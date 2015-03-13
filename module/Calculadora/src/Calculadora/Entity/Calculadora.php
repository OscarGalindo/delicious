<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 18:48
 */

namespace Calculadora\Entity;

/**
 * Class Calculadora
 * @package Calculadora\Entity
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
   * @return int
   */
  public function getOp1()
  {
    return $this->op1;
  }

  /**
   * @param int $op1
   */
  public function setOp1($op1)
  {
    $this->op1 = $op1;
  }

  /**
   * @return int
   */
  public function getOp2()
  {
    return $this->op2;
  }

  /**
   * @param int $op2
   */
  public function setOp2($op2)
  {
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