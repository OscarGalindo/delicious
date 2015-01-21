<?php

return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'controller' => 'RegisterFactory',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'User_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/User/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\Entity' => 'User_driver'
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'RegisterForm' => 'User\Form\RegisterForm',
        )
    ),
    'controllers' => array(
        'factories' => array(
            'RegisterFactory' => 'User\Factory\Form\RegisterFormFactory'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'currency' => __DIR__ . '/../view',
        )
    ),
);
