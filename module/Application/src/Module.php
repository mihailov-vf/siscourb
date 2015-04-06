<?php

namespace Siscourb\Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Stdlib\ArrayUtils;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        $config = array();
        $configFiles = array(
            __DIR__ . '/../config/module.config.php',
        );
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
