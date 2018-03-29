<?php
namespace imie\poe\app;

class Autoload {
    public static function register() {
        spl_autoload_register([__NAMESPACE__."\\Autoload","loadFromNamespace"]);
    }

    public static function loadFromNamespace($className) {
        $fileName = str_replace(__NAMESPACE__, "", __DIR__) . "$className.php";
        echo "Looking: $fileName".PHP_EOL;
        if (file_exists($fileName)) {
            echo "Include: ok".PHP_EOL;
            require_once $fileName;
        }
    }
}
