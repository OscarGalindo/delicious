<?php
namespace User;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Stdlib\ArrayUtils;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface
{
    public function getConfig()
    {
      $config = array();
      $configFiles = array(
          include __DIR__ . '/config/module.config.php',
          include __DIR__ . '/config/module.kuser.php',
      );
      foreach ($configFiles as $file) {
        $config = ArrayUtils::merge($config, $file);
      }
      return $config;
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
