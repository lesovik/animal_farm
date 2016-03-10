<?php

namespace AnimalFarmTest\Animal;

use AnimalFarm\Animal\Goat;
use PHPUnit_Framework_TestCase;

class GoatTest extends PHPUnit_Framework_TestCase
{

    public function testContainer()
    {
        $serial = 1234567890;

        $goat = new Goat($serial);
        $this->assertEquals($serial, $goat->getSerialNumber());
    }
}
