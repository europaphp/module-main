<?php

namespace Europaphp\Main\Module;
use Europa\Fs;
use Europa\Module;

class Bootstrapper extends \Europa\Bootstrapper\BootstrapperAbstract
{
    public function routes(Module\ModuleInterface $module, callable $container)
    {
        if ($module instanceof Module\RouteAwareInterface) {
            $router = $container('routerTemplate');
            $import = $container('routerImporter');
            $import($router, $module->routes());
            $container('routers')->append($router);
        }
    }

    public function views(Module\ModuleInterface $module, callable $container)
    {
        if ($module instanceof Module\ViewScriptAwareInterface) {
            $locator = new Fs\Locator;
            $locator->setRoot($module->path());
            $locator->addPaths($module->viewPaths());
            $container('viewLocators')->append($locator);
        }
    }
}