<?php

namespace Application\Form;

use Application\Form\Fieldset\BookmarkFieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class CreateForm extends Form
{

  function __construct(ObjectManager $objectManager)
  {
    parent::__construct('bookmarkForm');

    $this->setHydrator(new DoctrineObject($objectManager));
    $bookmarkFieldset = new BookmarkFieldset($objectManager);
    $bookmarkFieldset->setUseAsBaseFieldset(true);
    $this->add($bookmarkFieldset);

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
