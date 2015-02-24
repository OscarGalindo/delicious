<?php

namespace User\Controller;

use Doctrine\Common\Persistence\ObjectManager;
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
    public function __construct(ObjectManager $entityManager, AuthenticationService $auth)
    {
        $this->entityManager = $entityManager;
        $this->auth = $auth;
        $this->adapter = $this->auth->getAdapter();
        $this->storage = $this->auth->getStorage();
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
        $result = ['status' => false, 'message' => 'Authentication failed. Please try again.'];
        $data = $this->getRequest()->getPost();

        $this->adapter
            ->setIdentity($data['email'])
            ->setCredentialValue($data['password']);

        $authResult = $this->auth->authenticate();

        if ($authResult->isValid()) {
            $user = $authResult->getIdentity();
            if ($data['rememberme'] == 1)
                $this->storage->setRememberMe(1);

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

