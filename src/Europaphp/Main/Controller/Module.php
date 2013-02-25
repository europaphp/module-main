<?php

namespace Europaphp\Main\Controller;
use Europa\Controller\ControllerAbstract;

class Module extends ControllerAbstract
{
    public function cli($name, $config = 'yml')
    {
        return [
            'config' => $config,
            'module' => $this->service('modules')->get($name)
        ];
    }
}