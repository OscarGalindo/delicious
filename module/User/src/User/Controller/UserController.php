<?php

namespace User\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use User\Entity\User;
use User\Form\RegisterForm;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    /**
     * @var ObjectManager
     */
    protected $entityManager;

    /**
     * @param ObjectManager $entityManager
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
        $createUserForm = new RegisterForm($this->entityManager);

        $user = new User();
        $createUserForm->bind($user);

        if ($this->request->isPost()) {
            $createUserForm->setData($this->request->getPost());

            if ($createUserForm->isValid()) {
                $this->entityManager->persist($user);
                $this->entityManager->flush();
            }
        }

        return array('createForm' => $createUserForm);
    }

    /**
     * Formulario de login
     *
     * @return ViewModel
     */
    public function loginAction()
    {
        return new ViewModel();
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
        $id   = $this->params()->fromRoute('id_user');
        $user = $this->entityManager->getRepository('User\Entity\User');

        return [
            'user' => $user->find($id)
        ];
    }


}

