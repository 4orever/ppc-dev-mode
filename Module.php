<?php

namespace PpcDevMode;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

use Zend\Mvc\MvcEvent;

class Module implements AutoloaderProviderInterface,
    ConfigProviderInterface
{

    public function getAutoloaderConfig()
    {

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $serviceManager->get('doctrine.entitymanager.orm_default')
            ->getConfiguration()->setSQLLogger($serviceManager->get('FirePhpProfiler'));

        $eventManager->attach(
            MvcEvent::EVENT_FINISH,
            function ($e) use ($serviceManager) {
                $profiler = $serviceManager->get('FirePhpProfiler');
                $profiler->showTable();
            },
            100
        );
    }

    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
                'FirePhpProfiler' => 'Application\FirePhpProfiler',
            )
        );
    }

}
