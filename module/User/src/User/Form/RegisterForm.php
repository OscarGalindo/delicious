<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 21/1/15
 * Time: 18:17
 */

namespace User\Form;

use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element\Submit;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

class RegisterForm extends Form implements InputFilterProviderInterface
{

    function __construct(EntityManager $entityManager)
    {
        parent::__construct('UserForm');

        $this->setHydrator(new DoctrineObject($entityManager));
        $userFieldset = new UserFieldset($entityManager);
        $userFieldset->setUseAsBaseFieldset(true);
        $this->add($userFieldset);

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
            ->setAttributes(
                array(
                    'class' => 'btn btn-success',
                    'type' => 'submit',
                    'value' => 'Register'
                )
            );

        $this->add($submit);
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
            'passwordVerify' => array(
                'name' => 'passwordVerify',
                'validators' => array(
                    array(
                        'name' => 'Identical',
                        'options' => array(
                            'token' => array('UserFieldset' => 'password'),
                        ),
                    )
                ),
            ),
        );
    }
}
