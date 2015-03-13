<?php

namespace Calculadora\Controller;

use Calculadora\Entity\Calculadora;
use Calculadora\Form\CalculadoraForm;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mvc\Controller\AbstractActionController;

class CalculadoraController extends AbstractActionController
{
  protected $calculadoraForm;

  public function __construct(CalculadoraForm $calculadoraForm)
  {
    $this->calculadoraForm = $calculadoraForm;
  }

  public function indexAction()
  {
    return [];
  }

  public function SumaAction()
  {
    /** @var Request $request */
    $request = $this->request;

    if ($request->isPost()) {
      $post = $request->getPost('CalculadoraFieldset');
      /** @var Calculadora $calc */
      $calc = new Calculadora();
      $calc->setOp1($post['Operador 1']);
      $calc->setOp2($post['Operador 2']);

      return ['form' => $this->calculadoraForm, 'resultado' => $calc->suma()];
    }

    $this->calculadoraForm->setAction('suma');
    return ['form' => $this->calculadoraForm];
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

