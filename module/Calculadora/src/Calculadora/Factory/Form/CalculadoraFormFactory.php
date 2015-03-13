<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 13/3/15
 * Time: 19:04
 */

namespace Calculadora\Factory\Form;

use Calculadora\Form\CalculadoraForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class CalculadoraFormFactory implements FactoryInterface
{
  /**
   * Create service
   *
   * @param ServiceLocatorInterface $serviceLocator
   * @return mixed
   */
  public function createService(ServiceLocatorInterface $serviceLocator)
  {
    $calculadoraForm = new CalculadoraForm();

    return $calculadoraForm;
  }
}