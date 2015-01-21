<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 21/1/15
 * Time: 18:17
 */

namespace User\Form;

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
                    'type' => 'text'
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
                    'type' => 'text'
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
                    'type' => 'password'
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
                    'type' => 'password'
                ),
            )
        );
        $this->add(
            array(
                'name' => 'Register',
                'options' => array(
                    'label' => 'Register'
                ),
                'attributes' => array(
                    'type' => 'submit'
                )
            )
        );
    }
}
