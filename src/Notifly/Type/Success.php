<?php

namespace Notifly\Type;

class Success extends NotiflyType
{
    /**
     * Set basic properties
     */
    public function __construct()
    {
        parent::__construct();

        $this->typeString = 'success';
        $this->renderClass = 'alert alert-success';
    }
}
