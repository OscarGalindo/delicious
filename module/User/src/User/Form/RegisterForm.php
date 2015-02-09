<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 21/1/15
 * Time: 18:17
 */

namespace User\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element\Submit;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilterProviderInterface;

class RegisterForm extends Form implements InputFilterProviderInterface
{

    function __construct(ObjectManager $objectManager)
    {
        parent::__construct('bookmarkForm');

        $this->setHydrator(new DoctrineObject($objectManager));
        $userFieldset = new UserFieldset($objectManager);
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
                'name' => 'Identical',
                'options' => array(
                    'token' => 'password',
                ),
            ),
        );
    }
}
