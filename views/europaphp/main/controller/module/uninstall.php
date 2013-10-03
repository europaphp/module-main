<?php

$this->extend('europaphp\main\layout\cli');

echo 'Uninstalled:' . PHP_EOL . PHP_EOL;

foreach ($this->context('assets') as $asset) {
  echo '  ' . $asset . PHP_EOL;
}