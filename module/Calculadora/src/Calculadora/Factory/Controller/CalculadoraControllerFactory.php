<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 19:10
 */

namespace Calculadora\Factory\Controller;

use Calculadora\Controller\CalculadoraController;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CalculadoraControllerFactory implements FactoryInterface
{
  /**
   * Create service
   *
   * @param ServiceLocatorInterface $serviceLocator
   * @return mixed
   */
  public function createService(ServiceLocatorInterface $controllerManager)
  {
    /** @var ControllerManager $controllerManager * */
    $serviceManager = $controllerManager->getServiceLocator();
    $calculadoraForm = $serviceManager->get('CalculadoraFormFactory');
    $controller = new CalculadoraController($calculadoraForm);

    return $controller;
  }
}