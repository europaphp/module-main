<?php

namespace Europaphp\Main\Di;
use Europa\App;
use Europa\Di;
use Europa\Event;
use Europa\Fs;
use Europa\Module;
use Europa\Request;
use Europa\Response;
use Europa\Router;
use Europa\View;

class Configuration extends Di\ConfigurationAbstract
{
    public function init(Di\ContainerInterface $container)
    {
        $container->template('routerTemplate');
    }

    public function app(callable $container)
    {
        return new App\Dispatcher(
            $container('controllerCaller'),
            $container('controllerResolver'),
            $container('modules'),
            $container('request'),
            $container('response'),
            $container('router'),
            $container('view'),
            $container('viewFilter')
        );
    }

    public function controllerCaller(callable $container)
    {
        $caller = new App\ControllerCaller($container);
        $caller->setContainer($container);
        $caller->setRequest($container('request'));
        return $caller;
    }

    public function controllerResolver(callable $container)
    {
        $resolver = new App\ControllerResolver($container);
        $resolver->setContainer($container);
        return $resolver;
    }

    public function modules(callable $container)
    {
        return new Module\Manager($container);
    }

    public function loader(callable $container)
    {
        $loader = new Fs\Loader;
        $loader->setLocator($container('loaderLocator'));
        return $loader;
    }

    public function loaderLocator(callable $container)
    {
        return new Fs\LocatorArray($container('loaderLocators'));
    }

    public function loaderLocators()
    {
        return new \ArrayIterator;
    }

    public function request(callable $container)
    {
        $negotiator = $container('requestNegotiator');
        return $negotiator();
    }

    public function requestNegotiator()
    {
        return new App\RequestNegotiator;
    }

    public function response(callable $container)
    {
        $negotiator = $container('responseNegotiator');
        return $negotiator($container('request'));
    }

    public function responseNegotiator()
    {
        $negotiator = new App\ResponseNegotiator;
        $negotiator->allow('application/javascript', 'js');
        $negotiator->allow('application/json', 'json');
        $negotiator->allow('application/xml', 'xml');
        $negotiator->fallback('text/html');
        return $negotiator;
    }

    public function router(callable $container)
    {
        return new Router\RouterArray($container('routers'));
    }

    public function routerImporter(callable $container)
    {
        return new Router\RouterImporter;
    }

    public function routers()
    {
        return new \ArrayIterator;
    }

    public function routerTemplate(callable $container)
    {
        return new Router\Router;
    }

    public function view(callable $container)
    {
        $negotiator = $container('viewNegotiator');
        return $negotiator($container('request'));
    }

    public function viewFilter(callable $container)
    {
        return new App\ViewFilter;
    }

    public function viewHelperContainer(callable $container)
    {
        return new Di\ContainerArray($container('viewHelperContainers'));
    }

    public function viewHelperContainers()
    {
        $defaultContainer     = new Di\Container;
        $defaultConfiguration = new View\HelperConfiguration;
        $defaultConfiguration($defaultContainer);

        $viewHelperContainers = new \ArrayIterator;
        $viewHelperContainers->append($defaultContainer);

        return $viewHelperContainers;
    }

    public function viewLocator(callable $container)
    {
        return new Fs\LocatorArray($container('viewLocators'));
    }

    public function viewLocators()
    {
        return new \ArrayIterator;
    }

    public function viewNegotiator(callable $container)
    {
        $negotiator = new App\ViewNegotiator;
        $negotiator->map(['json', 'application/json'], $container('viewRendererJson'));
        $negotiator->map(['js', 'application/javascript'], $container('viewRendererJsonp'));
        $negotiator->map(['xml', 'application/xml'], $container('viewRendererXml'));
        $negotiator->fallback($container('viewRendererPhp'));
        return $negotiator;
    }

    public function viewRendererJson()
    {
        return new View\Json;
    }

    public function viewRendererJsonp()
    {
        return new View\Jsonp;
    }

    public function viewRendererPhp(callable $container)
    {
        $php = new View\Php;
        $php->setContainer($container('viewHelperContainer'));
        $php->setLocator($container('viewLocator'));
        return $php;
    }

    public function viewRendererXml()
    {
        return new View\Xml;
    }
}