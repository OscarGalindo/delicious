<?php

namespace User\Controller;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    /**
     * @var Form
     */
    protected $registerForm = null;

    /**
     * @var EntityManager
     */
    protected $model;

    /**
     * @param Form $registerForm
     */
    public function __construct(EntityManager $model, Form $registerForm)
    {
        $this->registerForm = $registerForm;
        $this->model = $model;
    }

    /**
     * Perfil de usuario
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $users = $this->model->getRepository('User\Entity\User');

        return array('users' => $users->findAll());
    }

    /**
     * Registro de nuevo usuario
     *
     * @return ViewModel
     */
    public function registerAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->registerForm->setData($request->getPost());

        }

        return array(
            'registerForm' => $this->registerForm,
        );
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
        $id = $this->params()->fromRoute('id_user');
        $user = $this->model->getRepository('User\Entity\Users');
        return array('user' => $user->find($id));
    }


}

