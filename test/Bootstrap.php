<?php
include '../config/config.php';
/**
 * @description autoloader for unit testing
 * @param $className
 */
function loadClass($className)

{

    $fileName = '';
    $namespace = '';
    //replace '/test' and append '/src'
    $includePath = str_replace('/test','/',dirname(__FILE__)) . DIRECTORY_SEPARATOR . ROOT_PATH;
    if (false !== ($lastNsPos = strripos($className, '\\'))) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fullFileName = $includePath . DIRECTORY_SEPARATOR . $fileName;

    if (file_exists($fullFileName)) {
        require $fullFileName;
    }
}

spl_autoload_register('loadClass'); // Registers the autoloader