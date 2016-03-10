<?php

namespace AnimalFarm;

/**
 * Class Animal
 *
 * @description abstract class for generic animal
 *
 */
abstract class Animal
{

    /**
     * @var int $serialNumber
     */
    protected $serialNumber;

    /**
     * @param int $serialNumber
     */
    public function __construct($serialNumber)
    {
        $this->setSerialNumber($serialNumber);
    }

    /**
     * @param int $serialNumber
     * @return void
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return int
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }
}