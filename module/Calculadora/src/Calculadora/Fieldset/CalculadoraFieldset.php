<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 18:51
 */

namespace Calculadora\Fieldset;

use Zend\Form\Fieldset;

class CalculadoraFieldset extends Fieldset
{
  function __construct()
  {
    parent::__construct('CalculadoraFieldset');

    $this->add(
      array(
        'name' => 'Operador 1',
        'options' => array(
          'label' => 'Operador 1',
        ),
        'attributes' => array(
          'class' => 'form-control',
          'type' => 'number',
          'placeholder' => 'Operador 1',
        ),
      )
    );

    $this->add(
      array(
        'name' => 'Operador 2',
        'options' => array(
          'label' => 'Operador 2',
        ),
        'attributes' => array(
          'class' => 'form-control',
          'type' => 'number',
          'placeholder' => 'Operador 2',
        ),
      )
    );
  }
}