<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 21/1/15
 * Time: 18:12
 */

namespace User\Factory\Form;

use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterFormFactory implements FactoryInterface {
    /**
     * @var EntityManager ORM
     */
    protected $entityManager;

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceManager = $serviceLocator->getServiceLocator();
        $form = $serviceManager->get('RegisterForm');
        return $form;
    }
}