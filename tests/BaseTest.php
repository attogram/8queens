<?php // Attogram Framework - 8queens Module - Base Test v0.0.1

use PHPUnit\Framework\TestCase;

class BaseTest extends PHPUnit\Framework\TestCase
{

    public function testTruthiness()
    {
        $this->assertTrue( true, 'true not true!' );
    }

}