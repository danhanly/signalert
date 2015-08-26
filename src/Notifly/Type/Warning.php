<?php

namespace Notifly\Type;

class Warning extends NotiflyType
{
    /**
     * Set basic properties
     */
    public function __construct()
    {
        parent::__construct();

        $this->typeString = 'warning';
        $this->renderClass = 'alert alert-warning';
    }
}
