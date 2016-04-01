<?php

namespace Livraria;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

use Livraria\Model\CategoriaTable;

use Livraria\Service\Categoria as CategoriaService;

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
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__.'Admin' => __DIR__ . '/src/' . __NAMESPACE__.'Admin',
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig() {
        return array(
            'factories' => array(
                'Livraria\Model\CategoriaService' => function($service) {
                    $adapter = $service->get('Zend\Db\Adapter\Adapter');
                    $categoriaTable = new CategoriaTable($adapter);
                    $categoriaService = new Model\CategoriaService($categoriaTable);
                    return $categoriaService;
                },
                'Livraria\Service\Categoria' => function($service) {
                    return new CategoriaService($service->get('Doctrine\ORM\EntityManager'));
                }       
            ),    
        );
    }
}
