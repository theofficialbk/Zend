<?php
/**
 * Created by PhpStorm.
 * User: bilal.khalid
 * Date: 21/10/14
 * Time: 14:40
 */
namespace Album;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Album\Model\Album;
use Album\Model\AlbumTable;
use Album\Model\FosterTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


class Module
{
    public function getAutoloaderConfig()
    {
    return array (
        'Zend\Loader\ClassMapAutoloader'=>array(
        __DIR__.'/autoload_classmap.php',
        ),
        'Zend\Loader\StandardAutoloader'=>array(
            'namespaces'=>array(
              __NAMESPACE__=>__DIR__.'/src/'.__NAMESPACE__,
            ),
        ),
    );


    }

    public function getConfig()
    {
        return include __DIR__.'/config/module.config.php';
    }
    // Add this method:
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Album\Model\AlbumTable' =>  function($sm) {
                        $tableGateway = $sm->get('AlbumTableGateway');
                        $table = new AlbumTable($tableGateway);
                        return $table;
                    },
                'Album\Model\FosterTable' =>  function($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $table     = new FosterTable($dbAdapter);
                        return $table;
                    },
                'AlbumTableGateway' => function ($sm) {
                        $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                        $resultSetPrototype = new ResultSet();
                        $resultSetPrototype->setArrayObjectPrototype(new Album());
                        return new TableGateway('album', $dbAdapter, null, $resultSetPrototype);
                    },
            ),
        );
    }

}
?>