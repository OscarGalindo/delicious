<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 30/1/15
 * Time: 20:16
 */

namespace User\Factory\Controller;


use User\Controller\UserController;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserControllerFactory implements FactoryInterface
{

  /**
   * Create service
   *
   * @param ServiceLocatorInterface $serviceLocator
   * @return mixed
   */
  public function createService(ServiceLocatorInterface $controllerManager)
  {
    /** @var ControllerManager $controllerManager **/
    $serviceManager = $controllerManager->getServiceLocator();

    $model = $serviceManager->get('Doctrine\ORM\EntityManager');

    $controller = new UserController($model);

    return $controller;
  }
}