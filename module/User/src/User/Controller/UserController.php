<?php

namespace User\Controller;

use Doctrine\ORM\EntityRepository;
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
     * @var EntityRepository
     */
    protected $userEntity;

    /**
     * @param Form $registerForm
     */
    public function __construct(EntityRepository $userEntity, Form $registerForm)
    {
        $this->registerForm = $registerForm;
        $this->userEntity = $userEntity;
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

