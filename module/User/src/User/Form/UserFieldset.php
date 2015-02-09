<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 6/2/15
 * Time: 17:16
 */

namespace User\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use User\Entity\User;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterProviderInterface;

class UserFieldset extends Fieldset implements InputFilterProviderInterface
{
    function __construct(ObjectManager $objectManager)
    {
        parent::__construct('UserFieldset');
        $this->setHydrator(new DoctrineObject($objectManager))
            ->setObject(new User());

        $this->add(
            array(
                'type' => 'Zend\Form\Element\Hidden',
                'name' => 'id'
            )
        );

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
                'name' => 'name',
                'options' => array(
                    'label' => 'Name',
                ),
                'attributes' => array(
                    'class' => 'form-control',
                    'type' => 'text',
                    'placeholder' => 'Name',
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
                'name' => 'username',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 50,
                        ),
                    ),
                ),
            ),
            array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'EmailAddress',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 3,
                            'max' => 50,
                        ),
                    ),
                ),
            )
        );
    }
}