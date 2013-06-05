<?php

namespace Europaphp\Main;
use Europa\Fs\Locator;
use Europa\Router\Router;
use Europa\Module\Bootstrapper\BootstrapperAbstract;

class Bootstrapper extends BootstrapperAbstract
{
    public function errorReporting()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', $this->module->config()['debug'] ? 'on' : 'off');
    }

    public function timezone()
    {
        date_default_timezone_set($this->module->config()['timezone']);
    }

    public function routes()
    {
        $router = new Router;
        $router->import($this->module->path() . '/configs/routes.json');
        $this->container('routers')->append($router);
    }

    public function views()
    {
        $locator = new Locator;
        $locator->addPath($this->module->path() . '/views');
        $this->container('viewLocators')->append($locator);
    }
}