<?php

namespace Europaphp\Main\Controller;
use Europa\Controller\ControllerAbstract;

class Modules extends ControllerAbstract
{
    public function cli()
    {
        return [
            'modules' => $this->service('modules')
        ];
    }
}