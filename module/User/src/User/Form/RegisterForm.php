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
        $this->add(
            array(
                'name' => 'username',
                'options' => array(
                    'label' => 'Username',
                ),
                'attributes' => array(
                    'class' => 'form-control',
                    'type' => 'text',
                    'placeholder' => 'Username',
                ),
            )
        );
        $this->add(
            array(
                'name' => 'email',
                'options' => array(
                    'label' => 'Email',
                ),
                'attributes' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => 'Email',
                ),
            )
        );
        $this->add(
            array(
                'name' => 'password',
                'options' => array(
                    'label' => 'Password',
                ),
                'attributes' => array(
                    'type' => 'password',
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                ),
            )
        );
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
