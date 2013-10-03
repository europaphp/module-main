<?php

$this->extend('europaphp\main\layout\cli');

echo 'Installed:' . PHP_EOL;

foreach ($this->context('assets') as $asset) {
  echo '  ' . $asset . PHP_EOL;
}