<?php


define('DB_HOST',      'localhost');
define('DB_PATH',      '');
define('DB_CHARSET',   'utf8mb4');
define('DB_UNAME',     'root'); // $_ENV['DB_UNAME']
define('DB_PWORD',     'Cst@1985'); // $_ENV['DB_PWORD']
define('DB_NAME',  'resolve'); // DB_NAME[0]

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$options = [
  PDO::ATTR_EMULATE_PREPARES   => true, // turn off emulation mode for "real" prepared statements
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // turn on errors in the form of exceptions
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // make the default fetch be an associative array
];

/* Make sure DB exists ... */

//$pdo = new PDO($dsn, DB_UNAME, DB_PWORD, $options);

//if (!is_object($pdo)) {}

/**/
//dd($pdo);

try {
  $pdo = new PDO($dsn, DB_UNAME, DB_PWORD, $options);
} catch (PDOException $e) {
   ////die('testing connection failed');
  $errors['DATABASE'] = 'Database Failed to connect.';

}
