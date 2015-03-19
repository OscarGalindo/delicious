<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 18:51
 */

namespace Calculadora\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class CalculadoraFieldset extends Fieldset implements InputFilterProviderInterface
{
  function __construct()
  {
    parent::__construct('CalculadoraFieldset');

    $this->add(
      array(
        'name' => 'operador1',
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
        'name' => 'operador2',
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

  /**
   * Should return an array specification compatible with
   * {@link Zend\InputFilter\Factory::createInputFilter()}.
   *
   * @return array
   */
  public function getInputFilterSpecification()
  {
    return array(
      array(
        'name' => 'operador1',
        'required' => true,
        'validators' => array(
          array(
            'name' => 'NotEmpty',
            'options' => array(
              'messages' => array(
                'isEmpty' => 'Operador 1 vacio.',
              )
            ),
          ),
        ),
      ),
      array(
        'name' => 'operador2',
        'required' => true,
        'validators' => array(
          array(
            'name' => 'NotEmpty',
            'options' => array(
              'messages' => array(
                'isEmpty' => 'Operador 2 vacio.',
              )
            ),
          ),
        ),
      ),
    );
  }
}