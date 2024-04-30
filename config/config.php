<?php declare(strict_types=1); // First Line Only!

error_reporting(E_ALL/*E_STRICT |*/);

//date_default_timezone_set('America/Vancouver');

ini_set('display_errors', 'true');
ini_set('display_startup_errors', 'true');
ini_set('error_log', (is_dir($path = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'config') ? dirname($path, 1) . DIRECTORY_SEPARATOR . 'error_log' : 'error_log'));
ini_set('log_errors', 'true');


require_once('constants.php');

require_once('functions.php');

require_once('database.php');

require_once('session.php');