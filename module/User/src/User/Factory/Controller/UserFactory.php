<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 30/1/15
 * Time: 20:16
 */

namespace User\Factory\Controller;


use User\Controller\UserController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceManager = $serviceLocator->getServiceLocator();
        $model = $serviceManager->get('Doctrine\ORM\EntityManager')->getRepository(
            'User\Entity\User'
        );
        $form = $serviceManager->get('RegisterFormFactory');

        return new UserController($model, $form);
    }
}