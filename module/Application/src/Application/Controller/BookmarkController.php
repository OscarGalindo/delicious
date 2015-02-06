<?php

namespace Application\Controller;

use Doctrine\ORM\EntityRepository;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookmarkController extends AbstractActionController
{
    /**
     * @var EntityRepository
     */
    protected $bookmarkEntity;

    /**
     * @param EntityRepository $bookmarkEntity
     */
    function __construct(EntityRepository $bookmarkEntity)
    {
        $this->bookmarkEntity = $bookmarkEntity;
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

        return array('bookmarks' => $bookmarks);
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        return new ViewModel();
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

