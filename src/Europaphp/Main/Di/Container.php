<?php

namespace Europaphp\Main\Di;

class Container extends \Europa\Di\Container
{
  public function __construct()
  {
    $this->configure(new Configuration);
  }
}
