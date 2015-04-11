<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 03/03/2015
 * Time: 19:43
 */

namespace User\Controller\Plugin;

use DoctrineModule\Authentication\Adapter\ObjectRepository as Adapter;
use User\Service\UserService;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\Authentication\AuthenticationService;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserAuthenticationPlugin extends AbstractPlugin
{
  /**
   * @var Adapter
   */
  protected $authAdapter;

  /**
   * @var AuthenticationService
   */
  protected $authService;

  /**
   * @var ServiceLocatorInterface
   */
  protected $serviceLocator;

  /**
   * @var UserService
   */
  protected $userService;

  /**
   * Proxy convenience method
   *
   * @return bool
   */
  public function hasIdentity()
  {
    return $this->getAuthService()->hasIdentity();
  }

  /**
   * Proxy convenience method
   *
   * @return mixed
   */
  public function getIdentity()
  {
    return $this->getAuthService()->getIdentity();
  }

  /**
   * Get authAdapter.
   *
   * @return Adapter
   */
  public function getAuthAdapter()
  {
    return $this->getAuthService()->getAdapter();
  }

  /**
   * Set authAdapter.
   *
   * @param Adapter $authAdapter
   */
  public function setAuthAdapter(Adapter $authAdapter)
  {
    $this->authAdapter = $authAdapter;
    return $this;
  }

  /**
   * Get authService.
   *
   * @return AuthenticationService
   */
  public function getAuthService()
  {
    return $this->authService;
  }

  /**
   * Set authService.
   *
   * @param AuthenticationService $authService
   */
  public function setAuthService(AuthenticationService $authService)
  {
    $this->authService = $authService;
    return $this;
  }

  /**
   * @return UserService
   */
  public function getUserService()
  {
    return $this->userService;
  }

  /**
   * @param UserService $userService
   */
  public function setUserService(UserService $userService)
  {
    $this->userService = $userService;
    return $this;
  }
}