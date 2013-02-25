<?php

namespace Europaphp\Main;
use Europa\Module\ModuleBootstrapperAbstract;

class Bootstrapper extends ModuleBootstrapperAbstract
{
    public function errorReporting()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', $this->getConfig('debug') ? 'on' : 'off');
    }
}