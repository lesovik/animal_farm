<?php
use Tools\Randomizer;
use Tools\File;
use AnimalFarm\AnimalFarm;

include 'config/config.php';
include 'autoloader.php';

$parameters = [
    GOAT_LABEL => Randomizer::getRandomUniqueArray(GOAT_HERD_SIZE),
    SHEEP_LABEL => Randomizer::getRandomUniqueArray(SHEEP_HERD_SIZE),
];
$files = [
    GOAT_LABEL => new File(DATA_PATH.GOAT_FILENAME),
    SHEEP_LABEL => new File(DATA_PATH.SHEEP_FILENAME),
    SOULMATE_LABEL => new File(DATA_PATH.SOULMATE_FILENAME)
];

$farm = new AnimalFarm($parameters);
$farm->processAnimalFiles($files);
$farm->displayInfo();
