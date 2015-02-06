<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 6/2/15
 * Time: 19:12
 */

namespace Application\Form;

use Application\Entity\Bookmark;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class BookmarkFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('bookmarkFieldset');
        $this->setHydrator(new DoctrineObject($objectManager))
            ->setObject(new Bookmark());

//        $this->add(
//            array(
//                'type' => 'Zend\Form\Element\Hidden',
//                'name' => 'id'
//            )
//        );
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
            'id' => array(
                'required' => false
            ),
            'url' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ),
            'title' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ),
            'description' => array(
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
            ),
        );
    }
}