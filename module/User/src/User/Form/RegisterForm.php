<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 21/1/15
 * Time: 18:17
 */

namespace User\Form;

use Zend\Form\Element\Submit;
use Zend\Form\Form;

class RegisterForm extends Form
{

    function __construct()
    {
        parent::__construct();

        $this->add(array(
            'type' => 'RegisterFormFieldsetFactory',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(
            array(
                'name' => 'passwordVerify',
                'options' => array(
                    'label' => 'Password Verify',
                ),
                'attributes' => array(
                    'type' => 'password',
                    'class' => 'form-control',
                    'placeholder' => 'Password Verify',
                ),
            )
        );
        $submit = new Submit('Register');
        $submit
            ->setLabel('Register')
            ->setAttributes(
                array(
                    'class' => 'btn  btn-success',
                    'type' => 'submit',
                )
            );

        $this->add($submit);
    }
}
