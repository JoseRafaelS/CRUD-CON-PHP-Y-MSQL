<?php

 function autoloade($classname){
    include 'controller/'. $classname .'.php"';
 }

 spl_autoload_register('autoloade');