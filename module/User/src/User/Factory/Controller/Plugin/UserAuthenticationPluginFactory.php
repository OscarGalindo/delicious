<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 03/03/2015
 * Time: 19:43
 */

namespace User\Factory\Controller\Plugin;

use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\PluginManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use User\Controller\Plugin\UserAuthenticationPlugin;

class UserAuthenticationPluginFactory implements FactoryInterface
{
  /**
   * Create service
   *
   * @param ServiceLocatorInterface $serviceLocator
   * @return mixed
   */
  public function createService(ServiceLocatorInterface $pluginManager)
  {
    /* @var $pluginManager PluginManager */
    $serviceManager = $pluginManager->getServiceLocator();

    /* @var $authService AuthenticationService */
    $userService = $serviceManager->get('UserService');
    $authService = $serviceManager->get('UserAuthenticationServiceFactory');
    $authAdapter = $authService->getAdapter();

    $userAuthenticationPlugin = new UserAuthenticationPlugin();
    $userAuthenticationPlugin
        ->setAuthService($authService)
        ->setUserService($userService)
        ->setAuthAdapter($authAdapter);

    return $userAuthenticationPlugin;
  }
}