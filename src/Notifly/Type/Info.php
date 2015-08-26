<?php

namespace Notifly\Type;

class Info extends NotiflyType
{
    /**
     * Set basic properties
     */
    public function __construct()
    {
        parent::__construct();

        $this->typeString = 'info';
        $this->renderClass = 'alert alert-info';
    }
}
