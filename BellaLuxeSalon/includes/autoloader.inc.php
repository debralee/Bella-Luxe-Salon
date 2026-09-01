<?php

//Loads each class
spl_autoload_register('autoLoader');


function autoLoader($className){

  $path = realpath(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "classes"). DIRECTORY_SEPARATOR;
  $extension = ".class.php";
  $fullPath = $path . $className . $extension;
  include_once $fullPath;
}
