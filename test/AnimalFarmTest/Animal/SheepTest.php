<?php

namespace AnimalFarmTest\Animal;

use AnimalFarm\Animal\Sheep;
use PHPUnit_Framework_TestCase;

class SheepTest extends PHPUnit_Framework_TestCase
{

    public function testContainer()
    {
        $serial = 1234567890;

        $sheep = new Sheep($serial);
        $this->assertEquals($serial, $sheep->getSerialNumber());
    }
}
