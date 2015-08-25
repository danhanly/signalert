<?php

use Notifly\Exception\NotiflyResolverException;
use Notifly\Notifly;
use Notifly\Type\Error;

class ResolverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function resolveClassByClassName()
    {
        $notifly = new Notifly();
        $notifly->notify(Error::class, 'test', 'test');
        $this->assertInstanceOf(Error::class, $notifly->getNotifier());
    }

    /**
     * @test
     * @expectedException NotiflyResolverException
     */
    public function resolveClassByInvalidClassName()
    {
        $notifly = new Notifly();
        $notifly->notify(Notifly::class, 'test', 'test');
    }

    /**
     * @test
     */
    public function resolveClassByString()
    {
        $notifly = new Notifly();
        $notifly->notify('error', 'test', 'test');
        $this->assertInstanceOf(Error::class, $notifly->getNotifier());
    }
}