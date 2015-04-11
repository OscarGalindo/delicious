<?php

return [
    'router'             => [
        'routes' => [
            'user'   => [
                'type'    => 'Segment',
                'options' => [
                    'route'    => '/profile[/:id_user]',
                    'defaults' => [
                        'controller' => 'UserControllerFactory',
                        'action'     => 'profile',
                    ],
                ],
            ],
            'signup' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/signup',
                    'defaults' => [
                        'controller' => 'UserControllerFactory',
                        'action'     => 'register',
                    ],
                ],
            ],
            'signin' => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/signin',
                    'defaults' => [
                        'controller' => 'UserControllerFactory',
                        'action'     => 'login',
                    ],
                ],
            ],
        ],
    ],
    'doctrine'           => [
        'driver'         => [
            'users_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/User/Entity'],
            ],
            'orm_default'    => [
                'drivers' => [
                    'User\Entity' => 'users_entities',
                ],
            ],
        ],
        'authentication' => [
            'orm_default' => [
                'object_manager'      => 'Doctrine\ORM\EntityManager',
                'identity_class'      => 'User\Entity\User',
                'identity_property'   => 'email',
                'credential_property' => 'password',
            ],
        ],
    ],
    'service_manager'    => [
        'aliases'    => [
            'Zend\Authentication\AuthenticationService' => 'UserAuthenticationServiceFactory',
        ],
        'invokables' => [
            'RegisterForm' => 'User\Form\RegisterForm',
            'UserService'  => 'User\Service\UserService',
        ],
        'factories'  => [
            'UserAuthenticationServiceFactory' => 'User\Factory\UserAuthenticationServiceFactory',
            'RegisterFormFactory'              => 'User\Factory\Form\RegisterFormFactory',
        ],
    ],
    'controllers'        => [
        'factories' => [
            'UserControllerFactory' => 'User\Factory\Controller\UserControllerFactory',
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'UserAuthentication' => 'User\Factory\Controller\Plugin\UserAuthenticationPluginFactory',
        ],
    ],
    'view_manager'       => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
