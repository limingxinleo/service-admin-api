<?php

error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

use Phalcon\Mvc\Application;

try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/config/services.php";

    /**
     * Read vendor autoload
     */
    if (file_exists(BASE_PATH . "/vendor/autoload.php")) {
        include BASE_PATH . "/vendor/autoload.php";
    }

    /**
     * Handle the request
     */
    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
}