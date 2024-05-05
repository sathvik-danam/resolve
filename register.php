<?php 
require_once('config/config.php');

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':

//die(var_dump($_POST));


    if (isset($_REQUEST['register'])) {
      $stmt = $pdo->prepare("INSERT INTO `users` (`name`, `email`, `phone`, `type`, `password`) VALUES (?, ?, ?, ?, ?);");
      $stmt->execute(array(
        (($_REQUEST['name'] != false) ? $_REQUEST['name'] : NULL),
        (!empty($_REQUEST['email']) ? $_REQUEST['email'] : NULL),
        (!empty($_REQUEST['phone']) ? $_REQUEST['phone'] : NULL),
        (!empty($_REQUEST['type']) ? (bool) $_REQUEST['type'] : 1),
        (!empty($_REQUEST['password']) ? password_hash($_REQUEST['password'], PASSWORD_DEFAULT) : NULL)
      ));
      exit(header('Location: index.php'));
    } 
 

   break;

}


header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Pragma: no-cache'); 
header('Expires: 0');

