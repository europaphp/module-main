<?php

namespace Europaphp;

/**
 * Provides the configuration for a default DI Container as well as some
 * default classes for easily configuring module bootstrappers.
 */
class Main extends \Europa\Module\ModuleAbstract
{
  const VERSION = '0.1.0';

  protected $config = [
    'debug'  => true,
    'timezone' => 'Australia/Sydney'
  ];

  protected $routes = [
    [
      'when' => 'GET (index)?',
      'call' => 'Europaphp\\Main\\Controller\\Index->get'
    ], [
      'when' => 'CLI module',
      'call' => 'Europaphp\\Main\\Controller\\Module->cli'
    ], [
      'when' => 'CLI modules',
      'call' => 'Europaphp\\Main\\Controller\\Modules->cli'
    ]
  ];
}