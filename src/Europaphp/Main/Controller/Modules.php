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
  public function show()
  {
    $modules = [];

    foreach ($this->modules as $module) {
      $modules[] = [
        'name' => $module->name(),
        'version' => $module->version(),
        'description' => (new Reflection\ClassReflector($module))->getDocBlock()->getDescription(),
        'installed' => $module->installed()
      ];
    }

    return [
      'modules' => $modules
    ];
  }

  /**
   * Installs all modules.
   *
   * @cli
   */
  public function install()
  {
    return [
      'modules' => $this->modules->install()
    ];
  }

  /**
   * Uninstalls all modules.
   *
   * @cli
   *
   * @param string $from The path to uninstall the modules from.
   */
  public function uninstall($from = null)
  {
    return [
      'modules' => $this->modules->uninstall()
    ];
  }
}
