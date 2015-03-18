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
    /** @var Request $request */
    $request = $this->request;
    $type = $this->params('type');
    $resultado = [];

    if ($request->isPost()) {
      $post = $request->getPost('CalculadoraFieldset');
      /** @var Calculadora $calc */
      $calc = new Calculadora();
      $calc->setOp1($post['Operador 1']);
      $calc->setOp2($post['Operador 2']);
      $resultado = ['resultado' => $calc->$type()];
    }

    $this->calculadoraForm->setAction('suma');
    $toView = [
      'action' => $type,
      'form' => $this->calculadoraForm,
    ];

    return array_merge($toView, $resultado);
  }
}

