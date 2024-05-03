<?php

define('APP_START', microtime(true));

(defined('APP_START') && !is_float(APP_START)) and $errors['APP_START'] = APP_START;


(!defined('APP_ENV') ) or define('APP_ENV', 'production');

define('APP_DOMAIN', $_SERVER['HTTP_HOST'] ?? isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'localhost');
(!is_string(APP_DOMAIN)) and $errors['APP_DOMAIN'] = 'APP_DOMAIN is not valid. (' . APP_DOMAIN . ')' . "\n";

(isset($_SERVER['HTTPS']) === true && $_SERVER['HTTPS'] == 'on') // strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'
  and define('APP_HTTPS', TRUE);
(defined('APP_HTTPS') && APP_HTTPS) and $errors['APP_HTTPS'] = (bool) var_export(APP_HTTPS, APP_HTTPS); // print("\t" . 'Http(S)://' . APP_DOMAIN . '/' . '... ' .  var_export(defined('APP_HTTPS'), true) . "\n");

define('APP_WWW', 'http' . (defined('APP_HTTPS') ? 's':'') . '://' . APP_DOMAIN . parse_url(isset($_SERVER['SERVER_NAME']) ? $_SERVER['REQUEST_URI'] : '' , PHP_URL_PATH));

!isset($_SERVER['REQUEST_URI'])
  and $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'], 0) . ((isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != "") AND '?' . $_SERVER['QUERY_STRING']);

// substr( str_replace('\\', '/', __FILE__), strlen($_SERVER['DOCUMENT_ROOT']), strrpos(str_replace('\\', '/', __FILE__), '/') - strlen($_SERVER['DOCUMENT_ROOT']) + 1 )

// absolute pathname 
switch (basename(__DIR__)) {
    case 'config':
      define('APP_BASE', [ // https://stackoverflow.com/questions/8037266/get-the-url-of-a-file-included-by-php
        'config' => 'config' . DIRECTORY_SEPARATOR,
        'database' => 'database' . DIRECTORY_SEPARATOR,
        'public' => 'public' . DIRECTORY_SEPARATOR,
        'resources' => 'resources' . DIRECTORY_SEPARATOR,
        'src' => 'src' . DIRECTORY_SEPARATOR,
        'var' => 'var' . DIRECTORY_SEPARATOR,
        'vendor' => 'vendor' . DIRECTORY_SEPARATOR,
        //'tmp' => 'var' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR,
        //'export' =>  'var' . DIRECTORY_SEPARATOR . 'export' . DIRECTORY_SEPARATOR,
        //'session' => 'var' . DIRECTORY_SEPARATOR . 'session' . DIRECTORY_SEPARATOR,
      ]);
      break;
}

!is_array(APP_BASE) ?
  substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) == '/' // $_SERVER['DOCUMENT_ROOT']
    and define('APP_URL', 'http' . (defined('APP_HTTPS') ? 's':'') . '://' . APP_DOMAIN . substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1)) :
  define('APP_URL', [
    'scheme' => 'http' . (defined('APP_HTTPS') && APP_HTTPS ? 's': ''), // ($_SERVER['HTTPS'] == 'on', (isset($_SERVER['HTTPS']) === true ? 'https' : 'http')
    'host' => APP_DOMAIN,
    'port' => (int) ($_SERVER['SERVER_PORT'] ?? 80),
    /* https://www.php.net/manual/en/features.http-auth.php */
    'user' => (!isset($_SERVER['PHP_AUTH_USER']) ? NULL : $_SERVER['PHP_AUTH_USER']),
    'pass' => (!isset($_SERVER['PHP_AUTH_PW']) ? NULL : $_SERVER['PHP_AUTH_PW']),
    'path' => substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1), // https://stackoverflow.com/questions/7921065/manipulate-url-serverrequest-uri
    'query' => ($_SERVER['QUERY_STRING'] ?? ''), // array( key($_REQUEST) => current($_REQUEST) )
    'fregment' => '',
  ]);



// APP_BASE_URL
!is_array(APP_URL) ? define('APP_URL_BASE', APP_URL) :
  define('APP_URL_BASE', APP_URL['scheme'] . '://' . APP_URL['host'] . APP_URL['path']);

// APP_BASE_URI
define('APP_URL_PATH', !is_array(APP_URL) ? substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1) : APP_URL['path']);

define('APP_QUERY', !empty(parse_url($_SERVER['REQUEST_URI'])['query']) ? (parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $query) ? [] : $query) : []);
