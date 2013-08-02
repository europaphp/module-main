<?php

namespace Europaphp\Main\Controller;
use Europa\Reflection;

class Modules
{
  private $modules;

  public function __construct($modules)
  {
    $this->modules = $modules;
  }

  /**
   * Lists information about all enabled modules.
   *
   * @cli
   */
  public function cli()
  {
    $modules = [];
  
    foreach ($this->modules as $module) {
      $modules[] = [
      'name' => $module->name(),
      'version' => $module->version(),
      'description' => (new Reflection\ClassReflector($module))->getDocBlock()->getDescription()
      ];
    }
  
    return [
      'modules' => $modules
    ];
  }
}
