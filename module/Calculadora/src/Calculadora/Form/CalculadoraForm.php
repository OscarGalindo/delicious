<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 18:59
 */

namespace Calculadora\Form;

use Calculadora\Fieldset\CalculadoraFieldset;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

/**
 * Class CalculadoraForm
 * @package Calculadora\Form
 */
class CalculadoraForm extends Form
{
  /**
   * @var $action String
   */
  protected $action;

  public function __construct()
  {
    parent::__construct();

    $calculadoraFieldset = new CalculadoraFieldset();
    $calculadoraFieldset->setUseAsBaseFieldset(true);
    $this->add($calculadoraFieldset);

    $submit = new Submit();
    $submit->setAttributes(array(
        'name' => 'submit',
        'type' => 'submit',
        'class' => 'btn btn-success',
        'value' => 'Calcular'
      )
    );
    $this->add($submit);
  }

  /**
   * @param $action String
   */
  public function setAction($action)
  {
    $this->action = $action;
  }
}