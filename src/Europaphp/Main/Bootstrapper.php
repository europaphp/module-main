<?php

namespace Europaphp\Main;
use Europa\Di\Finder;
use Europa\Filter\ClassNameFilter;
use Europa\Fs\Locator;
use Europa\Router\Router;
use Europa\Module\ModuleBootstrapperAbstract;

class Bootstrapper extends ModuleBootstrapperAbstract
{
    public function errorReporting()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', $this->module->getConfig()['debug'] ? 'on' : 'off');
    }

    public function routes()
    {
        $router = new Router;
        $router->import($this->module->getPath() . '/configs/routes.yml');
        $this->container->get('routers')->add($router);
    }

    public function views()
    {
        $locator = new Locator;
        $locator->addPath($this->module->getPath() . '/views');
        $this->container->get('viewLocators')->add($locator);
    }
}