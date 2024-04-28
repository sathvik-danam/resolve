<?php

define('SESSION_LIFETIME', 65535);

ini_set('session.gc_maxlifetime', SESSION_LIFETIME); // max=65535
ini_set('session.gc_probability', 1); // ?100
ini_set('session.gc_divisor', 1);

ini_set('session.cookie_lifetime', 0); // SESSION_LIFETIME
//ini_set('session.cache_expire', APP_TIMEOUT);
//ini_set('session.name', 'sessions'); // APP_NAME . '.ca'


//ini_set('session.hash_function', 1);
//ini_set('session.hash_bits_per_character', 6);

//ini_set('session.save_path', SESSION_SAVE_PATH); // APP_PATH . APP_BASE['sessions']
//session_save_path(SESSION_SAVE_PATH);

//ini_set("session.use_cookies", 0);
//ini_set('session.use_only_cookies', '0');
//ini_set("session.use_trans_sid", 1);


if (session_status() == PHP_SESSION_NONE) :
    session_start();
endif;
  
  
  //$_SESSION['user_id'] = 1;
  
  
  if (isset($_GET['logout']) && session_status() != PHP_SESSION_NONE) :
    $_SESSION = [];
    session_destroy();
  endif;
  
  
  
  if (!empty($_SESSION) && isset($_SESSION['user_id'])) {
  
    $stmt = $pdo->prepare("SELECT `id`, `name`, `email`, `type` FROM `users` WHERE `id` = :user_id;");
    $stmt->execute(array(
      ":user_id" => $_SESSION['user_id']
    ));
    $row_fetch = $stmt->fetch();
    $_SESSION = ['user_id' => (int) $row_fetch['id'], 'name' => $row_fetch['name'], 'email' => $row_fetch['email'], 'type' => (string) $row_fetch['type']];
  } else {
    /*
  //die(var_dump($_SESSION));
      $stmt = $pdo->prepare("SELECT `id`, `name`, `email`, `type` FROM `users` WHERE `id` = :user_id;");
        $stmt->execute(array(
          ":user_id" => $_SESSION['user_id']
        ));
        $row_fetch = $stmt->fetch();
        $_SESSION = ['user_id' => (int) $row_fetch['id'], 'name' => $row_fetch['name'], 'email' => $row_fetch['email'], 'type' => (int) $row_fetch['type']];
  */
  }
  
  // session_destroy();
  
  
  
  // die(var_dump($_SESSION));
  ?>
  