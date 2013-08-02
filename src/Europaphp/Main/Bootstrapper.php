<?php

namespace Europaphp\Main;

class Bootstrapper extends Module\Bootstrapper
{
  public function errorReporting($module)
  {
    error_reporting(E_ALL);
    ini_set('display_errors', $module->config()['debug'] ? 'on' : 'off');
  }

  public function timezone($module, $container)
  {
    date_default_timezone_set($module->config()['timezone']);
  }
}