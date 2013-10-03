<?php

namespace Europaphp;

/**
 * Provides the configuration for a default DI Container as well as some
 * default classes for easily configuring module bootstrappers.
 */
class Main extends \Europa\Module\ModuleAbstract
{
  const VERSION = '0.1.0';

  protected $assets = [
    'assets/css/img/glyphicons-halflings-white.png',
    'assets/css/img/glyphicons-halflings.png',
    'assets/css/lib/bootstrap-responsive.css',
    'assets/css/lib/bootstrap.css',
    'assets/js/lib/bootstrap.js'
  ];

  protected $config = [
    'debug' => true,
    'timezone' => 'Australia/Sydney'
  ];

  protected $routes = [
    [
      'when' => 'GET (index)?',
      'call' => 'Europaphp\\Main\\Controller\\Index->get'
    ], [
      'when' => 'CLI module',
      'call' => 'Europaphp\\Main\\Controller\\Module->info'
    ], [
      'when' => 'CLI module install',
      'call' => 'Europaphp\\Main\\Controller\\Module->install'
    ], [
      'when' => 'CLI module uninstall',
      'call' => 'Europaphp\\Main\\Controller\\Module->uninstall'
    ], [
      'when' => 'CLI modules',
      'call' => 'Europaphp\\Main\\Controller\\Modules->show'
    ], [
      'when' => 'CLI modules install',
      'call' => 'Europaphp\\Main\\Controller\\Modules->install'
    ], [
      'when' => 'CLI modules uninstall',
      'call' => 'Europaphp\\Main\\Controller\\Modules->uninstall'
    ]
  ];
}