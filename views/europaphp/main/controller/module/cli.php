<?php

$this->extend('europaphp/main/layout/cli.php');

$module = $this->context('module');
$helper = $this->helper('cli');

echo $helper->color('     Name:', 'yellow') . ' ' . $helper->color($module->name(), 'green') . PHP_EOL;
echo $helper->color('  Version:', 'yellow') . ' ' . $helper->color($module->version(), 'yellow') . PHP_EOL;
echo $helper->color('Namespace:', 'yellow') . ' ' . $module->ns() . PHP_EOL;
echo $helper->color('     Path:', 'yellow') . ' ' . $module->path() . PHP_EOL;
echo PHP_EOL;

if ($dependencies = $module->dependencies()) {
    echo $helper->color('Dependencies', 'cyan') . PHP_EOL;
    echo $helper->color('------------', 'cyan') . PHP_EOL;
    echo PHP_EOL;

    foreach ($dependencies as $name => $version) {
        echo '- ' . $helper->color($name, 'green') . ' ' . $helper->color($version, 'yellow') . PHP_EOL;
    }

    echo PHP_EOL;
}

$config = 'Europa\Config\Adapter\To\\' . ucfirst($this->context('config'));
$config = $module->config()->export(new $config(JSON_PRETTY_PRINT));
$config = explode(PHP_EOL, $config);

if ($config) {
    echo $helper->color('Configuration', 'cyan') . PHP_EOL;
    echo $helper->color('-------------', 'cyan') . PHP_EOL;
    echo PHP_EOL;
    echo implode(PHP_EOL, $config);
}