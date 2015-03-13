<?php

namespace Calculadora\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class CalculadoraController extends AbstractActionController
{
  protected $calculadoraForm;

  public function __construct($calculadoraForm)
  {
    $this->calculadoraForm = $calculadoraForm;
  }
  public function indexAction()
  {
    return [];
  }

  public function SumaAction()
  {
    return ['saludo' => 'hola'];
  }

  public function RestaAction()
  {
    return ['saludo' => 'hola'];
  }

  public function MultiplicacionAction()
  {
    return ['saludo' => 'hola'];
  }

  public function DivisionAction()
  {
    return ['saludo' => 'hola'];
  }
}

