<?php

namespace User\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use JWT;
use User\Controller\Plugin\UserAuthenticationPlugin;
use User\Form\RegisterForm;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
  /**
   * @var ObjectManager
   */
  protected $entityManager;

  /**
   * @var RegisterForm
   */
  protected $registerForm;

  /**
   * @param ObjectManager $entityManager
   * @param RegisterForm $registerForm
   */
  public function __construct(ObjectManager $entityManager, RegisterForm $registerForm)
  {
    $this->entityManager = $entityManager;
    $this->registerForm = $registerForm;
  }

  /**
   * Perfil de usuario
   *
   * @return ViewModel
   */
  public function indexAction()
  {
    return [
        'users' => $this->entityManager->getRepository('User\Entity\User')->findAll()
    ];
  }

  /**
   * Registro de nuevo usuario
   *
   * @return ViewModel
   */
  public function registerAction()
  {
    /* @var $userPlugin UserAuthenticationPlugin */
    $userPlugin = $this->UserAuthentication();

    if ($userPlugin->hasIdentity()) {
      return $this->redirect()->toRoute('/');
    }

    if ($this->request->isPost()) {
      $this->registerForm->setData($this->request->getPost());
      if ($this->registerForm->isValid()) {
        $user = $this->entityManager->getRepository('User\Entity\User');
        $this->registerForm->bind($user);

        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $id = $user->getId();
        return $this->redirect()->toRoute('user/profile', ['id_user' => $id]);
      }
    }

    return array('createForm' => $this->registerForm);
  }

  /**
   * Formulario de login/Auth
   *
   * @return ViewModel
   */
  public function loginAction()
  {
    /** @var Request $request */
    $request = $this->request;

    /* @var $userPlugin UserAuthenticationPlugin */
    $userPlugin = $this->UserAuthentication();

    $data = json_decode($request->getContent());
    $result = ['auth' => false];

    $adapter = $userPlugin->getAuthAdapter();
    $adapter
        ->setIdentity($data->email)
        ->setCredential($data->password);

    $authResult = $adapter->authenticate();
    if ($authResult->isValid()) {
      $user = $authResult->getIdentity();

      $key = 'U7AqCsldWBrTW3zdUTBg5ibwGjqktWlAEhqCYI8MjnBZvS7N';
      $now = time();
      $payload = [
          'iat' => $now,
          'email' => $user->getEmail(),
      ];

      $token = JWT::encode($payload, $key);

      $result = [
          'auth' => true,
          'token' => $token
      ];
    }

    return new JsonModel($result);
  }

  /**
   * Logout de la página
   *
   * @return ViewModel
   */
  public function logoutAction()
  {
    return new ViewModel();
  }

  /**
   * Perfil de usuario
   *
   * @return ViewModel
   */
  public function profileAction()
  {
    $userPlugin = $this->UserAuthentication();
    if ($userPlugin->hasIdentity()) {
      die(var_dump([$userPlugin->getAuthService()->hasIdentity()]));
    } else {
      echo 'adios';
    }
    $id = $this->params()->fromRoute('id_user');
    $user = $this->entityManager->getRepository('User\Entity\User');

    return [
        'user' => $user->find($id)
    ];
  }


}

