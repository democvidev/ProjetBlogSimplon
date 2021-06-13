<?php

spl_autoload_register(function($className)
{
    $className = str_replace("\\", "/", $className);
    $className = substr($className, 3);
    require_once __DIR__ . $className . '.php';
    // var_dump(__DIR__ . $className . '.php');
});