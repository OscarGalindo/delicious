<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 04/03/2015
 * Time: 20:41
 */

namespace User\Factory\Form;

use Doctrine\ORM\EntityManager;
use User\Form\RegisterForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterFormFactory implements FactoryInterface {

  /**
   * Create service
   *
   * @param ServiceLocatorInterface $serviceLocator
   * @return mixed
   */
  public function createService(ServiceLocatorInterface $serviceManager)
  {
    /** @var EntityManager $entityManager */
    $entityManager = $serviceManager->get('Doctrine\ORM\EntityManager');
    $form = new RegisterForm($entityManager);

    return $form;
  }
}