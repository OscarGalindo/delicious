<?php

namespace Application\Controller;

use Application\Entity\Bookmark;
use Application\Form\CreateForm;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BookmarkController extends AbstractActionController
{

    /**
     * @var EntityManager
     */
    protected $entityManager = null;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
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
        $bookmarks = $this->entityManager->getRepository('Application\Entity\Bookmark')->findAll();

        return ['bookmarks' => $bookmarks];
    }

    /**
     * @return ViewModel
     */
    public function createAction()
    {
        $bookmarkForm = new CreateForm($this->entityManager);

        $bookmark = new Bookmark();
        $bookmarkForm->bind($bookmark);

        if ($this->request->isPost()) {
            $bookmarkForm->setData($this->request->getPost());

            if ($bookmarkForm->isValid()) {
                $this->entityManager->persist($bookmark);
                $this->entityManager->flush();
            }
        }

        return array('createForm' => $bookmarkForm);
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

