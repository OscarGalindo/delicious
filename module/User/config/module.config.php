<?php

return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'controller' => 'UserFactory',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'profile' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/:id_user',
                            'defaults' => array(
                                'action' => 'profile',
                            ),
                        ),
                    ),
                ),
            ),
            'user_register' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        'controller' => 'UserFactory',
                        'action' => 'register',
                    ),
                ),
            ),
            'user_login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'UserFactory',
                        'action' => 'login',
                    ),
                ),
            ),
            'user_logout' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/logout[/:redirect_url]',
                    'constraints' => array(
                        'redirect_url' => '.*?'
                    ),
                    'defaults' => array(
                        'controller' => 'UserFactory',
                        'action' => 'logout',
                    ),
                ),
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'users_entities' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/User/Entity'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\Entity' => 'users_entities',
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'RegisterFormFactory' => 'User\Form\RegisterForm',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'UserFactory' => 'User\Factory\Form\RegisterFormFactory'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'currency' => __DIR__ . '/../view',
        )
    ),
);
