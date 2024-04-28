<?php

class Shutdown {
    private static $instance = false;
    private $functions;
    private static $enabled = true;
    private $shutdownMessage;

    public function __construct() {
        $this->functions = array();
        defined('APP_END') or define('APP_END', microtime(true));
        register_shutdown_function(array($this, 'onShutdown'));
    }

    public static function instance() {
        if (self::$instance == false) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function onShutdown() {
        if (!self::$enabled) { // $this->enabled
            // global $pdo, $session_save;
            //if (defined('APP_INSTALL') && APP_INSTALL && $path = APP_PATH . 'install.php') // is_file('config/constants.php')) 
            //    require_once($path);

    //include('checksum_md5.php'); // your_logger(get_included_files());
    //unset($pdo);
            return;
        }

        foreach ($this->functions as $fnc) {
            $fnc($this->shutdownMessage);
        }
        exit('');
    }

    public static function setEnabled($enabled) {
        self::$enabled = (bool)$enabled;
        return isset(self::$instance) ? static::instance() : $this; // $this Return an instance of Shutdown class
    }

    public static function getEnabled() {
        return self::$enabled;
    }

    public function registerFunction(callable $fnc) {
        $this->functions[] = $fnc;
        return $this; // Return $this to allow method chaining
    }

    public static function setShutdownMessage(callable $messageCallback) { // $message
        self::instance()->shutdownMessage = $messageCallback; // $this->shutdownMessage = $messageCallback;
        return self::instance(); // $this; // Return $this to allow method chaining
    }

    public function shutdown($die = true) {
        if (!self::$enabled) {
            foreach ($this->functions as $fnc) {
                $fnc($this->shutdownMessage);
            }
        }
        if (is_callable($this->shutdownMessage)) {
            $message = call_user_func($this->shutdownMessage);
        } else {
            $message = $this->shutdownMessage;
        }
        if ($die == true)
            exit($message);
    }

    public static function create() {
        return new self();
    }
}


function dd(mixed $param = null, $die = true, $debug = true) {
    $output = ($debug == true && !defined('APP_END') ? 
          'Execution time: <b>'  . round(microtime(true) - APP_START, 3) . '</b> secs' : 
          //APP_END . ' == APP_END'
          'Execution time: <b>'  . round(APP_END - APP_START, 3) . '</b> secs'
          ) . "<br />\n";
    if ($die)
      Shutdown::setEnabled(false)->setShutdownMessage(function() use ($param, $output) {
        return '<pre><code>' . var_export($param, true) . '</code></pre>' . $output; //.  // var_dump
      })->shutdown();
    else
      return var_dump('<pre><code>' . var_export($param, true) . '</code></pre>' . $output); // If you want to return the parameter after printing it

}