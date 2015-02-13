<?php

return array(
    'router' => array(
        'routes' => array(
            'user' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/user',
                    'defaults' => array(
                        'controller' => 'UserControllerFactory',
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
                        'controller' => 'UserControllerFactory',
                        'action' => 'register',
                    ),
                ),
            ),
            'user_login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/login',
                    'defaults' => array(
                        'controller' => 'UserControllerFactory',
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
                        'controller' => 'UserControllerFactory',
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
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'User\Entity\User',
                'identity_property' => 'email',
                'credential_property' => 'password',
            ),
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'RegisterForm' => 'User\Form\RegisterForm',
        ),
        'factories' => array(
            'UserAuthentication' => 'User\Factory\AuthenticationServiceFactory',
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'UserControllerFactory' => 'User\Factory\Controller\UserControllerFactory',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'currency' => __DIR__ . '/../view',
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
            'renderForm' => 'User\View\Helper\RenderForm'
        ),
    ),
);
