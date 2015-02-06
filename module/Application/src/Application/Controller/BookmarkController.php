<?php

namespace Application\Controller;

use Doctrine\ORM\EntityRepository;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookmarkController extends AbstractActionController
{
    /**
     * @var EntityRepository
     */
    protected $bookmarkEntity;

    /**
     * @var Form
     */
    private $createForm;

    /**
     * @param EntityRepository $bookmarkEntity
     * @param Form $createForm
     */
    function __construct(EntityRepository $bookmarkEntity, Form $createForm)
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

        return ['bookmarks' => $bookmarks];
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        return ['form' => $this->createForm];
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
}

