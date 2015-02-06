<?php

namespace User\Controller;

use Doctrine\ORM\EntityRepository;
use User\Entity\User;
use User\Form\RegisterForm;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    /**
     * @var RegisterForm
     */
    protected $registerForm = null;

    /**
     * @var EntityRepository
     */
    protected $userEntity;

    /**
     * @param Form $registerForm
     */
    public function __construct(EntityRepository $userEntity, RegisterForm $registerForm)
    {
        $this->userEntity   = $userEntity;
        $this->registerForm = $registerForm;
    }

    /**
     * Perfil de usuario
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        return array('users' => $this->userEntity->findAll());
    }

    /**
     * Registro de nuevo usuario
     *
     * @return ViewModel
     */
    public function registerAction()
    {
        $user = new User();
        $form = $this->registerForm->bind($user);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($user->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->userEntity->persist($user);
                $this->userEntity->flush();

                return $this->redirect()->toRoute('user_login');
            }
        }

        return array('registerForm' => $form);
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
        $user = $this->model->getRepository('User\Entity\Users');

        return array('user' => $user->find($id));
    }


}

