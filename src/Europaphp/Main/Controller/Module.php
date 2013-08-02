<?php

namespace Europaphp\Main\Controller;
use Europa\Reflection;

class Module
{
  private $modules;

  public function __construct($modules)
  {
    $this->modules = $modules;
  }

  /**
   * Shows information about the specified module.
   *
   * @cli
   *
   * @param string $name   The name of the module.
   * @param string $config The format to return the configuration in. Available formats are json, xml and yml.
   */
  public function cli($name, $config = 'json')
  {
    $module = $this->modules->get($name);
    $config = 'Europa\Config\Adapter\To\\' . ucfirst($config);
    $config = $module->config()->export(new $config(JSON_PRETTY_PRINT));
    $config = explode(PHP_EOL, $config);
  
    return [
      'module' => [
      'name' => $module->name(),
      'description' => (new Reflection\ClassReflector($module))->getDocBlock()->getDescription(),
      'version' => $module->version(),
      'namespace' => $module->ns(),
      'path' => $module->path(),
      'dependencies' => $module->dependencies(),
      'config' => $config
      ]
    ];
  }
}
