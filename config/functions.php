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



function check_ping($ip = '8.8.8.8') {
  $status = null;
  // Ping the host to check network connectivity
  if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
    exec("ping -n 1 -w 1 -W 20 $ip" ?? '8.8.8.8', $output, $status);  // parse_url($ip, PHP_URL_HOST)
  else
    exec("sudo /bin/ping -c2 -w2 $ip" ?? "8.8.8.8 2>&1", $output, $status); // var_dump(\$status)

  return $status == 0 ? false : true;
}

/* HTTP status of a URL and the network connectivity using ping */
function check_http_200($url = 'http://8.8.8.8') {
  if (APP_CONNECTIVITY === true) { // check_ping() was 2 == fail | 0 == success
    if ($url !== 'http://8.8.8.8') {
      $headers = get_headers($url);
      return strpos($headers[0], '200') !== false ? false : true;
    } else
      return true; // Special case for the default URL
  }
  return false; // Ping or HTTP request failed //$connected = @fsockopen("www.google.com", 80); //fclose($connected);
}