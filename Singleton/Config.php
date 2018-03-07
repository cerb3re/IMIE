<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/03/2018
 * Time: 09:45
 */
namespace Singleton;

class Config
{
    /**
     * @var Singleton $instance
     */
    private static $instance;
    private $id;
    private static $config;

    private function __construct() {
        $this->id = uniqid("Config_");
        self::$config = parse_ini_file("config.ini", true);
    }

    public static function fetchParameter(string $section, string $paramKey) {
        $paramValue = "";

        if (!empty(self::$config[$section][$paramKey]))
            $paramValue = self::$config[$section][$paramKey];
        return $paramValue;
    }

    public static function getInstance() {
        if (static::$instance == null)
            static::$instance = new Config();
        return static::$instance;
    }
}

