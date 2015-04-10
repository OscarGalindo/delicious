<?php

return array(
  'router' => array(
    'routes' => array(
      'user' => array(
        'type' => 'Segment',
        'options' => array(
          'route' => '/profile[/:id_user]',
          'defaults' => array(
            'controller' => 'UserControllerFactory',
            'action' => 'profile',
          ),
        ),
      ),
      'signup' => array(
        'type' => 'Literal',
        'options' => array(
          'route' => '/signup',
          'defaults' => array(
            'controller' => 'UserControllerFactory',
            'action' => 'register',
          ),
        ),
      ),
      'signin' => array(
        'type' => 'Literal',
        'options' => array(
          'route' => '/signin',
          'defaults' => array(
            'controller' => 'UserControllerFactory',
            'action' => 'login',
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
    'aliases' => array(
      'Zend\Authentication\AuthenticationService' => 'UserAuthenticationServiceFactory',
    ),
    'invokables' => array(
      'RegisterForm' => 'User\Form\RegisterForm',
    ),
    'factories' => array(
      'UserAuthenticationServiceFactory' => 'User\Factory\UserAuthenticationServiceFactory',
      'RegisterFormFactory' => 'User\Factory\Form\RegisterFormFactory',
    ),
  ),
  'controllers' => array(
    'factories' => array(
      'UserControllerFactory' => 'User\Factory\Controller\UserControllerFactory',
    ),
  ),
  'controller_plugins' => array(
    'factories' => array(
      'UserAuthentication' => 'User\Factory\Controller\Plugin\UserAuthenticationPluginFactory',
    ),
  ),
  'view_manager' => array(
    'strategies' => array(
      'ViewJsonStrategy',
    ),
  ),
);
