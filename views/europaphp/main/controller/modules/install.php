<?php

$this->extend('europaphp\main\layout\cli');

foreach ($this->context('modules') as $module) {
  if ($assets = $module->assets()) {
    echo $this->helper('cli')->color($module->name() . ':', 'green');
    echo PHP_EOL;

    foreach ($module->assets() as $asset) {
      echo '  ' . $asset . PHP_EOL;
    }
  }

  echo PHP_EOL;
}