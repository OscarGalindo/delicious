<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookmarkController extends AbstractActionController
{

    /**
     * @var EntityRepository
     */
    protected $bookmarkEntity = null;

    /**
     * @var Form
     */
    private $createForm = null;

    /**
     * @param EntityRepository $bookmarkEntity
     * @param Form $createForm
     */
    public function __construct(\Doctrine\ORM\EntityRepository $bookmarkEntity, \Zend\Form\Form $createForm)
    {
        $this->bookmarkEntity = $bookmarkEntity;
        $this->createForm     = $createForm;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function showAction()
    {
        $bookmarks = $this->bookmarkEntity->findAll();

        return ['bookmarkForm' => $bookmarks];
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        return ['createForm' => $this->createForm];
    }

    /**
     * @return ViewModel
     */
    public function editAction()
    {
        return new ViewModel();
    }

    /**
     * @return ViewModel
     */
    public function deleteAction()
    {
        return new ViewModel();
    }

    public function addAction()
    {
        return new ViewModel();
    }


}

