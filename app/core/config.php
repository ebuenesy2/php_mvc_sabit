<?php

class Config
{
    private static $settings = [];

    public static function load()
    {
        self::$settings['app'] = require dirname(__DIR__, 2) . '/config/app.php';
        self::$settings['db'] = require dirname(__DIR__, 2) . '/config/database.php';
    }

    public static function get($file, $key = null)
    {
        if (!isset(self::$settings[$file])) {
            throw new Exception("Config file '$file' not loaded.");
        }

        if ($key === null) {
            return self::$settings[$file];
        }

        return self::$settings[$file][$key] ?? null;
    }
}
