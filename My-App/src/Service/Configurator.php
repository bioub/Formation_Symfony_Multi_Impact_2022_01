<?php

// src/Service/Configurator.php
namespace App\Service;


class Configurator
{

    public static function configure($service)
    {
        if (is_object($service)) {
            echo get_class($service) . "<br >";
        }
    }

    // ...
}
