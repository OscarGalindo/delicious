<?php

namespace User\Controller;

use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    /**
     * @var Form
     */
    protected $registerForm;

    /**
     * @param Form $registerForm
     */
    function __construct(Form $registerForm)
    {
        $this->registerForm = $registerForm;
    }

    /**
     * Perfil de usuario
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }


    /**
     * Registro de nuevo usuario
     *
     * @return ViewModel
     */
    public function registerAction()
    {
        $request = $this->getRequest();
        if($request->isPost()) {
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


}

