<?php declare(strict_types=1); // First Line Only!

error_reporting(E_ALL/*E_STRICT |*/);

//date_default_timezone_set('America/Vancouver');

ini_set('display_errors', 'true');
ini_set('display_startup_errors', 'true');
ini_set('error_log', (is_dir($path = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'config') ? dirname($path, 1) . DIRECTORY_SEPARATOR . 'error_log' : 'error_log'));
ini_set('log_errors', 'true');


!defined('APP_SELF') and define('APP_SELF', get_included_files()[0] ?? __FILE__); // get_included_files()[0] | str_replace($_SERVER['DOCUMENT_ROOT'], '', $_SERVER['SCRIPT_FILENAME']) | $_SERVER['PHP_SELF']

//var_dump(get_defined_constants(true)['user']);

!defined('APP_PATH') and define('APP_PATH', implode(DIRECTORY_SEPARATOR, array_intersect_assoc(
  explode(DIRECTORY_SEPARATOR, __DIR__),
  explode(DIRECTORY_SEPARATOR, dirname(APP_SELF))
)) . DIRECTORY_SEPARATOR);


header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Pragma: no-cache'); 
header('Expires: 0');

require_once('constants.php');

require_once('functions.php');

require_once('database.php');

require_once('session.php');

require_once('request_method.php');