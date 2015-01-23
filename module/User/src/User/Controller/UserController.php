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
    protected $registerForm;

    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param Form $registerForm
     */
    function __construct(Form $registerForm)
    {
        $this->registerForm = $registerForm;
    }

    /**
     * Set entityManager
     *
     * @param EntityManager $em
     * @return $this
     */
    protected function setEntityManager(EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }

    /**
     * Devuelve entityManager
     *
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->entityManager;
    }

    /**
     * Perfil de usuario
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $index = $this->getEntityManager()->getRepository('User\Entity\User');
        return array('users' => $index->findAll());
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

