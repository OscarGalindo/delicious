<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
  'router' => array(
    'routes' => array(
      'calculadora' => array(
        'type' => 'Segment',
        'options' => array(
          'route' => '/calculadora[/:type]',
          'defaults' => array(
            'controller' => 'CalculadoraControllerFactory',
            'action' => 'index',
          ),
        ),
      ),
    ),
  ),
  'service_manager' => array(
    'abstract_factories' => array(
      'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
      'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'factories' => array(
      'CalculadoraFormFactory' => 'Calculadora\Factory\Form\CalculadoraFormFactory',
    ),
  ),
  'controllers' => array(
    'factories' => array(
      'CalculadoraControllerFactory' => 'Calculadora\Factory\Controller\CalculadoraControllerFactory',
    ),
  ),
  'view_manager' => array(
    'template_path_stack' => array(
      'currency' => __DIR__ . '/../view',
    ),
  ),
);
