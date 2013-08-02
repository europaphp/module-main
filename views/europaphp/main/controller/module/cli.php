<?php

$this->extend('europaphp\main\layout\cli');

$module = $this->context('module');
$helper = $this->helper('cli');

echo $helper->color($module['name'], 'cyan')
  . PHP_EOL
  . $helper->color(str_repeat('-', strlen($module['name'])), 'cyan')
  . PHP_EOL
  . PHP_EOL;

echo $module['description']
  . PHP_EOL
  . PHP_EOL;

echo $helper->color('  Version:', 'yellow') . ' ' . $module['version'] . PHP_EOL;
echo $helper->color('Namespace:', 'yellow') . ' ' . $module['namespace'] . PHP_EOL;
echo $helper->color('   Path:', 'yellow') . ' ' . $module['path'] . PHP_EOL;
echo PHP_EOL;

if ($module['dependencies']) {
  echo $helper->color('Dependencies', 'cyan') . PHP_EOL;
  echo $helper->color('------------', 'cyan') . PHP_EOL;
  echo PHP_EOL;

  foreach ($module['dependencies'] as $name => $version) {
    echo '- ' . $helper->color($name, 'green') . ' ' . $helper->color($version, 'yellow') . PHP_EOL;
  }

  echo PHP_EOL;
}

if ($module['config']) {
  echo $helper->color('Configuration', 'cyan') . PHP_EOL;
  echo $helper->color('-------------', 'cyan') . PHP_EOL;
  echo PHP_EOL;
  echo implode(PHP_EOL, $module['config']);
}