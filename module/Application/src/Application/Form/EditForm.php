<?php

namespace Application\Form;

use Application\Form\Fieldset\BookmarkFieldset;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element\Submit;
use Zend\Form\Form;

class EditForm extends Form
{

  function __construct(ObjectManager $objectManager)
  {
    parent::__construct('bookmarkForm');

    $this->setHydrator(new DoctrineObject($objectManager));
    $bookmarkFieldset = new BookmarkFieldset($objectManager);
    $bookmarkFieldset->setUseAsBaseFieldset(true);
    $this->add($bookmarkFieldset);

    $submit = new Submit('Editar');
    $submit
        ->setLabel('Editar')
        ->setAttributes(
            array(
                'class' => 'btn btn-warning',
                'type' => 'submit',
            )
        );

    $this->add($submit);
  }
}
