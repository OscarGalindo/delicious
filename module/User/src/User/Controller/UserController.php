<?php

namespace User\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use User\Controller\Plugin\UserAuthenticationPlugin;
use User\Entity\User;
use User\Form\RegisterForm;
use Zend\Authentication\AuthenticationService;
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
   * @var AuthenticationService
   */
  protected $auth;

  /**
   * @var null|\Zend\Authentication\Adapter\AdapterInterface
   */
  protected $adapter;

  /**
   * @var \Zend\Authentication\Storage\StorageInterface
   */
  protected $storage;

  /**
   * @param ObjectManager $entityManager
   * @param AuthenticationService $auth
   */
  public function __construct(ObjectManager $entityManager)
  {
    $this->entityManager = $entityManager;
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
    
    $createUserForm = new RegisterForm($this->entityManager);

    $user = new User();
    $createUserForm->bind($user);

    if ($this->request->isPost()) {
      $createUserForm->setData($this->request->getPost());

      if ($createUserForm->isValid()) {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        $id = $user->getId();
        return $this->redirect()->toRoute('user/profile', ['id_user' => $id]);
      }
    }

    return array('createForm' => $createUserForm);
  }

  /**
   * Formulario de login/Auth
   *
   * @return ViewModel
   */
  public function loginAction()
  {
    /* @var $userPlugin UserAuthenticationPlugin */
    $userPlugin = $this->UserAuthentication();

    if ($userPlugin->hasIdentity()) {
      return $this->redirect()->toRoute('/');
    }

    $result = ['status' => false, 'message' => 'Authentication failed. Please try again.'];
    $data = $this->getRequest()->getPost();

    $adapter = $userPlugin->getAuthAdapter();
    $adapter
        ->setIdentity($data['email'])
        ->setCredential($data['password']);

    $authResult = $adapter->authenticate();

    if ($authResult->isValid()) {
      $user = $authResult->getIdentity();

      $result = [
          'status' => true,
          'id' => $user->getId(),
          'username' => $user->getUsername()
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
    $id = $this->params()->fromRoute('id_user');
    $user = $this->entityManager->getRepository('User\Entity\User');

    return [
        'user' => $user->find($id)
    ];
  }


}

