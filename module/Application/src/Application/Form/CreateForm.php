<?php

namespace Application\Form;

use Zend\Form\Element\Submit;
use Zend\Form\Form;

class CreateForm extends Form
{

    function __construct()
    {
        parent::__construct();

        $this->add(
            array(
                'name' => 'url',
                'options' => array(
                    'label' => 'URL',
                ),
                'attributes' => array(
                    'class' => 'form-control',
                    'type' => 'text',
                    'placeholder' => 'URL del bookmark',
                ),
            )
        );
        $this->add(
            array(
                'name' => 'title',
                'options' => array(
                    'label' => 'Titulo',
                ),
                'attributes' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => 'Titulo descriptivo del bookmark',
                ),
            )
        );
        $this->add(
            array(
                'name' => 'description',
                'options' => array(
                    'label' => 'Descripcion',
                ),
                'attributes' => array(
                    'type' => 'text',
                    'class' => 'form-control',
                    'placeholder' => 'Descripción del bookmark',
                ),
            )
        );

        $submit = new Submit('Crear');
        $submit
            ->setLabel('Crear')
            ->setAttributes(
                array(
                    'class' => 'btn  btn-primary',
                    'type' => 'submit',
                )
            );

        $this->add($submit);
    }
}
