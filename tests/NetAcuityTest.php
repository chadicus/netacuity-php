<?php

namespace TraderInteractive\NetAcuity\Tests;

use PHPUnit\Framework\TestCase;
use TraderInteractive\NetAcuity\NetAcuity;

/**
 * @coversDefaultClass \TraderInteractive\NetAcuity\NetAcuity
 * @covers ::__construct
 */
final class NetAcuityTest extends TestCase
{
    /**
     * @test
     * @covers ::getGeo
     *
     * @return void
     */
    public function getGeo()
    {
        $client = new NetAcuity(new TestDatabase());
        $actual = $client->getGeo('127.0.0.1');
        $expected = ['some' => 'data'];
        $this->assertSame($expected, $actual);
    }
}
