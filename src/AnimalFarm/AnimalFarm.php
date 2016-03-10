<?php
namespace AnimalFarm;

use AnimalFarm\Animal\Goat as Goat;
use AnimalFarm\Animal\Sheep as Sheep;
use Tools\File;

/**
 * Class AnimalFarm
 *
 * @description main start class
 *
 */
class AnimalFarm

{
    /**
     * array of arrays of Animal instances
     * @var array $herds ;
     */
    private $herds = [
        GOAT_LABEL => [],
        SHEEP_LABEL => [],
    ];
    /**
     * array of soulmates
     * @var array $soulmates ;
     */
    private $soulmates=[];

    /**
     * starts the farm based on passed collection of randomized arrays
     * @param [] $parameters
     */
    public function __construct(array $parameters)
    {

        foreach ($this->herds as $type => $herd) {
            if (isset($parameters[$type])) {
                $this->createHerd($parameters[$type], $type);
            }
        }
    }

    /**
     * exports data to files
     * @param array $files
     * @return void
     */
    public function processAnimalFiles(array $files)
    {
        foreach ($this->herds as $type => $herd) {
            if (isset($files[$type])) {
                $this->write($files[$type], $herd);
            }
        }
        $this->processSoulmates($files[SOULMATE_LABEL]);
    }
    /**
     * dumps means to screen
     * @return void
     */
    public function displayInfo()
    {
        foreach ($this->herds as $type => $herd) {
            $mean=array_sum(array_keys($herd)) / count($herd);
            ksort($herd);
            $upper=(int)$mean;
            while(!isset($herd[$upper])){
                $upper++;
            }
            $lower=(int)$mean;
            while(!isset($herd[$lower])){
                $lower--;
            }
            $average=$lower;
            if($upper<=$lower){
                $average=$upper;
            }
            $first='';
            $last='';
            foreach($herd as $key=>$animal){
                if(empty($first)){
                    $first=$key;
                }
                $last=$key;
            }
            echo $type.' mean: '.$mean.'<br>';
            echo 'largest '. $type.'\'s serial number: '.$last.'<br>';
            echo 'smallest '. $type.'\'s serial number: '.$first.'<br>';
            echo 'closest '. $type.'\'s serial number to mean: '.$average.'<br><br>';
        }

        echo 'Soulmates  (total '. count($this->soulmates).') :'.implode(',',$this->soulmates).'';

    }
    /**
     * processes soulmates
     * @param File $soulmateFile
     * @return void
     */
    protected function processSoulmates(File $soulmateFile)
    {
        $soulmateFile->openForWriting();
        $goatHerd=$this->herds[GOAT_LABEL];
        foreach ($goatHerd as $serial=>$goat) {
            if (array_key_exists($serial,$this->herds[SHEEP_LABEL])) {
                $soulmateFile->writeLine($serial);
                $this->soulmates[]=$serial;
                unset($goatHerd[$serial]);
            }
        }
        $soulmateFile->close();
    }

    /**
     * write line to the file
     * @param File $file
     * @param array $animals
     * @return void
     */
    public function write(File $file, array $animals)
    {
        $file->openForWriting();
        foreach ($animals as $animal) {
            /**
             * @var Animal $animal
             */
            $file->writeLine($animal->getSerialNumber());
        }
        $file->close();
    }


    /**
     * instantiates animals in a specific herd
     *
     * @param array $randomizedArray
     * @param string $type
     * @return array
     */
    protected function createHerd(array $randomizedArray, $type)
    {
        $this->herds[$type] = [];
        foreach ($randomizedArray as $serial) {
            $this->herds[$type][$serial] =
                ($type == GOAT_LABEL)
                    ? new Goat($serial)
                    : new Sheep($serial);
        }

    }


}