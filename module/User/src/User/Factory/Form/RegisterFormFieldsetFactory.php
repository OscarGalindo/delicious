<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 6/2/15
 * Time: 17:43
 */

namespace User\Factory\Form;


use User\Form\RegisterFormFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterFormFieldsetFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceManager = $serviceLocator->getServiceLocator();
        $model = $serviceManager->get('Doctrine\ORM\EntityManager');
        $user  = $model->getRepository('User\Entity\User');

        return new RegisterFormFieldset($user);
    }
}