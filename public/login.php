<?php
require_once('../config/config.php');


header('Cache-Control: no-cache, no-store, must-revalidate'); 
header('Pragma: no-cache'); 
header('Expires: 0');

// https://stackoverflow.com/questions/1717495/check-if-a-database-table-exists-using-php-pdo
//try {
//    $result = $pdo->query('SELECT 1 FROM 'users' LIMIT 1;');
//} catch (Exception $e) {
    // We got an exception == table not found
/*
    $pdo->exec('CREATE TABLE `' . DB_TABLES[6] . '` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(25) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;')
    or die(print_r($pdo->errorInfo(), true));
    return FALSE;
*/
//}

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':

/*
    if (isset($_REQUEST['submit-register'])) {
      $stmt = $pdo->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?);");
      $stmt->execute(array(
        (($_REQUEST['name'] != false) ? $_REQUEST['name'] : NULL),
        (!empty($_REQUEST['email']) ? $_REQUEST['email'] : NULL),
        (!empty($_REQUEST['password']) ? password_hash($_REQUEST['password'], PASSWORD_DEFAULT) : NULL)
      ));
      exit(header('Location: ' . APP_URL));
    } 
*/  
    //if (isset($_REQUEST['submit-login'])) {

      if (isset($_POST['register']) && $_POST['register'] == 'add') {

        //$stmt = $pdo->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email;");

        $stmt = $pdo->prepare("INSERT INTO users (`name`, `email`, `password`, `type`) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
          $_POST['name'],
          $_POST['email'],
          password_hash($_POST['password'], PASSWORD_DEFAULT),
          'User'
        ));

        $stmt = $pdo->prepare("SELECT LAST_INSERT_ID();");
        $stmt->execute();

        $row_fetch = $stmt->fetch();

        $_SESSION['user_id'] = (int) $row_fetch['LAST_INSERT_ID()'];

        exit(header('Location: index.php'));
      } else {

        $stmt = $pdo->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email;");
        $stmt->execute(array(
          ":email" => $_POST['email']
        ));
        $row_login = $stmt->fetch();

      if (!empty($row_login)) {

        if (password_verify($_POST['password'], $row_login['password'])) { // $_POST['password'] == $row_login['password']
          $_SESSION['user_id'] = (int) $row_login['id'];

          exit(header('Location: index.php'));	
        } else {
          $login_error = 'Password did not match.'; // exit(header('Location: failed.php'));
        }

      } else {
          $login_error = 'Username did not match.'; // exit(header('Location: failed.php'));
      }
      }

   // }
    break;
  
  case 'GET':
    $stmt = $pdo->prepare("SELECT `id` FROM `users` LIMIT 1;");
    $stmt->execute(array());
    $row_login = $stmt->fetch();

    break;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>-- Login</title>

    <base href="" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/css"></style>
  </head>

  <body>


<!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

<div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
  <div class="mx-auto max-w-lg">
    <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Get started today</h1>

    <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
      inventore quaerat mollitia?
    </p>

    <form action="login.php" method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">

<?php if (isset($_GET['register'])) { ?>
  <p class="text-center text-lg font-medium">Register your account</p>
  <input type="hidden" name="register"  value=""/>
  <div>
        <label for="name" class="sr-only">Name</label>

        <div class="relative">
          <input
            name="name"
            type="text"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Enter name"
          />

          <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="size-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>

  <?php } else { ?>
    <p class="text-center text-lg font-medium">Sign in to your account</p>
    <?php } ?>
      <div>
        <label for="email" class="sr-only">Email</label>

        <div class="relative">
          <input
            name="email"
            type="email"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Enter email"
          />

          <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="size-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
          </span>
        </div>
      </div>

      <div>
        <label for="password" class="sr-only">Password</label>

        <div class="relative">
          <input
            name="password"
            type="password"
            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
            placeholder="Enter password"
          />

          <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="size-4 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
              />
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
              />
            </svg>
          </span>
        </div>
      </div>

      <button
        type="submit"
        class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white"
      >
        Sign in
      </button>

      <p class="text-center text-sm text-gray-500">
        No account?
        <a class="underline" href="#">Sign up</a>
      </p>
    </form>
  </div>
</div>









<!-- 

  <div class="debug" style="position: absolute; left: 27%; right: 42%; margin: auto; width: 600px; height: 400px; border: 1px solid #000; z-index: 10;">
  
    <iframe id="debug-frame" src="?debug" style="width: 600px; height: 400px;"></iframe>
    <div style="text-align: right;"><a class="showHideMe"><em>Close Debug</em> &#9650;</a></div>
  </div>
  
    <div class="log-form">
      <div style="border-bottom: 1px dotted black; margin: 5px; line-height: 0px;">
        <a class="showHideMe"><em>Open Debug</em> &#9650;</a>
      </div>
<?php  // if (!empty($row_login)) { ?>
      <form id="form-login" action<?= /* '="' . htmlentities($_SERVER['REQUEST_URI']) . '"' */ NULL; ?> autocomplete="off" method="post" accept-charset="utf-8">
      <h3 style="margin: 10px 5px;">Log-in to your account</h3>

        <table style="padding: 5px;">
          <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="text" id="email" name="email" title="email" placeholder="email" autocomplete="<?= (isset($_GET['register']) ? 'new-password' : 'off') ?>" value="<?=/*APP_UNAME*/NULL?>" autofocus required /></td>

          </tr>
          <tr>
            <td><label for="password">Password:</label></td>
            <td><input type="password" id="password" name="password" title="password" placeholder="password" autocomplete="off" value="<?=/*APP_PWORD*/NULL?>" required /></td>
            <td style="text-align: left;">
              <button style="float: right;" type="submit" id="submitBtn" name="submit-login">Login</button>
            </td>
          </tr>
          <tr>
            <td><small><a class="forgot" href="#" title="Feature does not work.">Forgot Password?</a></small></td>
            <td style="text-align: left;">
              <input type="checkbox" id="remember_me" name="remember_me" <?=
(defined('APP_ENV') && APP_ENV == 'production' ?
  'checked' : '') ?>>
              <small><label for="remember_me"> Remember Me?</label></small>
            </td>
            <td style="text-align: center">
              <input type="checkbox" id="enable_ssl" name="enable_ssl" <?=
(defined('APP_ENV') && APP_ENV == 'production' ? 'checked' : (defined('APP_HTTPS') AND 'checked')
) ?>>
              <small><label for="enable_ssl"> Use SSL?</label></small>
            </td>

          </tr>
        </table>
<?php if (isset($login_error)) { ?>
          <small style="padding-left: 5px;color: #f00;">Failed to login: <?=$login_error?></small>
          </tr>
<?php } ?>
      </form>
<?php //} ?>
      <div style="position: relative; white-space: nowrap; border-top: 1px dotted black; margin: 5px; line-height: 0px; width: 385px;">
        <p style="text-align: left; font-size:10px; font-weight: bold;">PHP Version: <a href="https://www.php.net/releases/<?=strtr(PHP_VERSION, array('.' => '_'))?>.php"><?=PHP_VERSION?></a> | MySQL (<a href="https://pecl.php.net/package/PDO_MYSQL">pdo</a>): <a href="https://mariadb.com/kb/en/mariadb-<?=preg_replace("/[^0-9]/", "", strtr($pdo->query('select version()')->fetchColumn(), array('.' => '')));?>-release-notes/"><?=$pdo->query('select version()')->fetchColumn();?></a></p>
      </div>
    </div><!--end log-form -->
  
    <!-- JQUERY SCRIPTS -->
</script>
  
    <script type="text/javascript">
$(document).ready(function(){
  $('.showHideMe').click(function() {
    if ($( ".debug" ).css('display') == 'none') {
      $('.showHideMe').html("Close Debug &#9650;");
      document.getElementById('debug-frame').contentWindow.location.reload();
      $( '.debug' ).slideDown( "slow", function() {
      // Animation complete.
      });
    } else {
      $('.showHideMe').html("Open Debug &#9660;");
      $( ".debug" ).slideUp( "slow", function() {
      // Animation complete.
      });
    }
  });
  $("#submitBtn").click(function(){      
    $("#login-form").submit(); // Submit the form
  });
});

//$('#login-form').disableAutoFill();
    </script>
-->



  </body>
</html>