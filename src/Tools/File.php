<?php
namespace Tools;

/**
 * Class File
 *
 * @description file utility class
 *
 */
class File

{

    private $fp;
    private $name;


    /**
     * opens file
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * opens file
     */
    public function openForWriting()
    {
        $this->fp = fopen($this->name, 'w+');
    }

    /**
     * writes line
     * @param $line
     */
    public function writeLine($line)
    {
        fputcsv($this->fp, [$line]);
    }

    /**
     * closes file
     */
    public function close()
    {
        fclose($this->fp);
    }


}