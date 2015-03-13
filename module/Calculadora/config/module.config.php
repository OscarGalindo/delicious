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
        'type' => 'literal',
        'options' => array(
          'route' => '/calculadora',
          'defaults' => array(
            'controller' => 'CalculadoraController',
            'action' => 'index',
          ),
        ),
        'may_terminate' => true,
        'child_routes' => array(
          'suma' => array(
            'type' => 'literal',
            'options' => array(
              'route' => '/suma',
              'defaults' => array(
                'action' => 'suma',
              ),
            ),
          ),
          'resta' => array(
            'type' => 'literal',
            'options' => array(
              'route' => '/resta',
              'defaults' => array(
                'action' => 'resta',
              ),
            ),
          ),
          'multiplicacion' => array(
            'type' => 'literal',
            'options' => array(
              'route' => '/multiplicacion',
              'defaults' => array(
                'action' => 'multiplicacion',
              ),
            ),
          ),
          'division' => array(
            'type' => 'literal',
            'options' => array(
              'route' => '/division',
              'defaults' => array(
                'action' => 'division',
              ),
            ),
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
    'invokables' => array(
      'CalculadoraForm' => 'Calculadora\Form\CalculadoraForm',
    ),
  ),
  'controllers' => array(
    'invokables' => array(
      'CalculadoraController' => 'Calculadora\Controller\CalculadoraController',
    ),
  ),
  'view_manager' => array(
    'template_path_stack' => array(
      'currency' => __DIR__ . '/../view',
    ),
  ),
);
