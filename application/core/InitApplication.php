<?php

class InitApplication {

    public static function includeCore($filesNames)
    {
        foreach($filesNames as $fileName) {

            include_once $fileName.'.php';
        }
    }

}