<?php

namespace User\Controller;

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
    protected $entityManager = null;

    /**
     * @param Form $registerForm
     */
    public function __construct(\Zend\Form\Form $registerForm)
    {
        $this->registerForm = $registerForm;
    }

    /**
     * Set entityManager
     *
     * @param EntityManager $em
     * @return $this
     */
    protected function setEntityManager(\Doctrine\ORM\EntityManager $em)
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
        $users = $this->getEntityManager()->getRepository('User\Entity\Users');

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
        $user = $this->getEntityManager()->getRepository('User\Entity\Users');
        return array('user' => $user->find($id));
    }


}

