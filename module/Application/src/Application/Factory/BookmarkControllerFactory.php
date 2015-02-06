<?php
/**
 * Created by PhpStorm.
 * User: kaseOga
 * Date: 6/2/15
 * Time: 18:28
 */
namespace Application\Factory;

use Application\Controller\BookmarkController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookmarkControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
//        $serviceManager = $controllerManager->getServiceLocator();
        return new BookmarkController();
    }
}