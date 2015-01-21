<?php
/**
 * Created by PhpStorm.
 * User: lysyu_000
 * Date: 17.04.2014
 * Time: 3:20
 */
namespace PpcDevMode\Factory;

use Zend\Log\Logger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use \Zend\Log\Writer\FirePhp as FirePhpWriter;


class Log implements FactoryInterface {
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $log = new Logger();
        $writer = new FirePhpWriter();
        $log->addWriter($writer);

        return $log;
    }

} 