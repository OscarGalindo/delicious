<?php

namespace User\Service;

use JWT;
use User\Entity\User;
use Zend\ServiceManager\ServiceManager;
use Zend\ServiceManager\ServiceManagerAwareInterface;

class UserService implements ServiceManagerAwareInterface
{
  /**
   * @var ServiceManager
   */
  protected $serviceManager;

  /**
   * @param User $user
   */
  public function generateToken(User $user)
  {
    $config = $this->getServicemanager()->get('Config');
    $secret = $config['key'];

    $now = time();
    $payload = [
        'iat' => $now,
        'email' => $user->getEmail(),
    ];

    $token = JWT::encode($payload, $secret);

    return $token;
  }

  /**
   * Retrieve service manager instance
   *
   * @return ServiceManager
   */
  public function getServiceManager()
  {
    return $this->serviceManager;
  }

  /**
   * Set service manager instance
   *
   * @param ServiceManager $serviceManager
   */
  public function setServiceManager(ServiceManager $serviceManager)
  {
    $this->serviceManager = $serviceManager;
    return $this;
  }
}