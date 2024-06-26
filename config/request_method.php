<?php
include('config.php'); //dd($_FILES);

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    // dd($_POST);

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

      exit(header('Location: ' . APP_URL_BASE . 'dashboard.php'));
    } elseif (isset($_POST['user']) && $_POST['user'] == 'login') {

      $stmt = $pdo->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email;");
      $stmt->execute(array(
        ":email" => $_POST['email']
      ));
      $row_login = $stmt->fetch();

      if (!empty($row_login)) {

        if (password_verify($_POST['password'], $row_login['password'])) { // $_POST['password'] == $row_login['password']
          $_SESSION['user_id'] = (int) $row_login['id'];

          exit(header('Location: ' . APP_URL_BASE . 'dashboard.php'));	
        } else {
          $login_error = 'Password did not match.'; // exit(header('Location: failed.php'));
        }

      } else {
        $login_error = 'Username did not match.'; // exit(header('Location: failed.php'));
      }
    }

    if (!empty($_SESSION)) {

    if (isset($_POST['user']) && $_POST['user'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `users` WHERE `users`.`id` = :user_id;");
      $stmt->execute(array(
        ":user_id" => $_POST['user_id']
      ));
    } elseif (isset($_POST['user']) && $_POST['user'] == 'edit') {


      $sql = "UPDATE `users` SET ";

      // Start an array to hold SQL segments
      $updates = array();
      
      // Always update these fields
      $updates[] = "`name` = :user_name";
      $updates[] = "`email` = :user_email";
      $updates[] = "`type` = :user_type";
      
      // Check if password needs to be updated
      if (isset($_POST['password']) && !empty($_POST['password'])) {
          $updates[] = "`password` = :user_password";
      }
      
      // Join all updates to complete the SQL statement
      $sql .= implode(", ", $updates) . " WHERE `id` = :user_id";
      
      // Prepare the SQL statement
      $stmt = $pdo->prepare($sql);
      
      // Bind parameters
      $params = array(
          ':user_id' => $_POST['user_id'],
          ':user_name' => $_POST['name'],
          ':user_email' => $_POST['email'],
          ':user_type' => isset($_POST['type']) ? $_POST['type'] : $_SESSION['type']
      );
      
      // Optionally add the password to the parameters
      if (isset($_POST['password']) && !empty($_POST['password'])) {
          $params[':user_password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
      }
      
      // Execute the statement
      $stmt->execute($params);
      
      // Optionally, check for success or handle errors
      /*
      if ($stmt->rowCount() > 0) {
          echo "Profile updated successfully!";
      } else {
          echo "No changes were made to the profile.";
      }*/

    } elseif (isset($_POST['user']) && $_POST['user'] == 'add') {
      //$stmt = $pdo->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email;");

      $stmt = $pdo->prepare("INSERT INTO users (`name`, `email`, `password`) VALUES (?, ?, ?" /*, ?*/ . ";");
      $stmt->execute(array(
        $_POST['name'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        /* $_POST['type'] */
      ));
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `partners` WHERE `partners`.`id` = :partner_id;");
      $stmt->execute(array(
        ":partner_id" => $_POST['partner_id']
      ));
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'edit') {
//dd($_POST);

if (!isset($_POST['category']) && isset($_POST['subcategory'])) {
  $stmt = $pdo->query("SELECT `category_id` FROM `subcategories` WHERE `id` = " . (int) $_POST['subcategory'] . ";");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $_POST['category'] = $row['category_id'];
} 

      $stmt = $pdo->prepare($sql = "UPDATE `partners` SET `category_id` = :category_id, `subcategory_id` = :subcategory_id, `type` = :type, `about` = :about, `city_id` = :city_id, " /*`name` = :name,*/ . " `phone` = :phone, `address` = :address, `user_id` = :user_id WHERE `partners`.`id` = :partner_id;");

      //dd($_POST);
      if (basename(APP_SELF) == 'dashboard.php') {
        $array = array(
        ':partner_id' => $_POST['partner_id'],
        ':category_id' => $_POST['category'],
        ':subcategory_id' => $_POST['subcategory'],
        ':type' => (isset($_POST['type']) ? $_POST['type'] : ''),
        ':about' => $_POST['about'],
        ':city_id' => (isset($_POST['city_id']) ? $_POST['city_id'] : 1),
        //':name' => (isset($_POST['name']) ? $_POST['name'] : ''),
        ':phone' => (isset($_POST['phone']) ? $_POST['phone'] : ''),
        ':address' => (isset($_POST['address']) ? $_POST['address'] : ''),
        ':user_id' => (isset($_POST['user_id']) ? $_POST['user_id'] : '')
        );
      //dd($_POST);
      } else {
        $array = array(
            ':partner_id' => $_POST['partner_id'],
            ':category_id' => $_POST['category'],
            ':subcategory_id' => $_POST['subcategory'],
            ':type' => (isset($_POST['type']) ? $_POST['type'] : ''),
            ':about' => $_POST['about'],
            ':city_id' => $_POST['city'],
            //':name' => (isset($_POST['name']) ? $_POST['name'] : ''),
            ':phone' => (isset($_POST['phone']) ? $_POST['phone'] : ''),
            ':address' => (isset($_POST['address']) ? $_POST['address'] : ''),
            ':user_id' => (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '')
        );
      }

//dd($_POST);

      $stmt->execute($array);
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'add') {
      // id, category, subcategory, type, about, photo, state, city, name, phone, email, address, slug, user_id, created_at, updated_at
      //dd(basename(APP_SELF));
      if (basename(APP_SELF) == 'dashboard.php') {

        if (!isset($_POST['category']) && isset($_POST['subcategory'])) {
          $stmt = $pdo->query("SELECT `category_id` FROM `subcategories` WHERE `id` = " . (int) $_POST['subcategory'] . ";");
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          $_POST['category'] = $row['category_id'];
        } 


        $stmt = $pdo->prepare("INSERT INTO `partners` (`category_id`, `subcategory_id`, `type`, `about`, `city_id`, " /*`name`,*/ . "`address`, `phone`, `user_id`, `created_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?);");


         /*array (
  'partner' => 'add',
  'partner_id' => '',
  'category' => 'Personal & More',
  'subcategory' => 'Microwave Repair',
  'city_id' => '2',
  'address' => 'ghdfghfgh',
  'about' => 'dgfhdgfh',
)*/

        $stmt->execute(array(
          $_POST['category'],
          $_POST['subcategory'],
          $_POST['type'],
          $_POST['about'],
          $_POST['city_id'],
          $_POST['address'],
          //$_POST['name'],
          $_POST['phone'],
          $_SESSION['user_id'],
          date('Y-m-d H:i:s')
        ));

      } else {

        $stmt = $pdo->prepare("INSERT INTO `partners` (`category_id`, `subcategory_id`, " /*`type`,*/ . " `about`, `city_id`, `name`, `phone`, `address`, `user_id`,  `created_at`) VALUES ( ?, ?, " . /*?,*/ " ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute(array(
          $_POST['category'],
          $_POST['subcategory'],
          //$_POST['type'],
          $_POST['about'],
          $_POST['city_id'],
          $_SESSION['name'], //$_POST['name'],
          NULL, //$_POST['phone']
          $_POST['address'],
          $_SESSION['user_id'],
          date('Y-m-d H:i:s')
        ));
      }

    } elseif (isset($_POST['enquiry']) && $_POST['enquiry'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `enquiries` WHERE `enquiries`.`id` = :enquiry_id;");
      $stmt->execute(array(
        ":enquiry_id" => $_POST['enquiry_id']
      ));
    } elseif (isset($_POST['enquiry']) && $_POST['enquiry'] == 'add') {

      /* array (
  'enquiry' => 'add',
  'enquiry_id' => '',
  'subcategory' => '5',
  'user_id' => '2',
  'name' => 'John',
  'email' => 'random@localhost',
  'phone' => '545556568',
  'address' => '456 Testing',
  'city_id' => '2',
  'description' => 'Technical details',
) */     //dd($_POST);
      // 	 	created_at 	updated_at 	

      //dd($_POST);

      $stmt = $pdo->prepare("INSERT INTO `enquiries` ( `user_id`, `email`, `address`, `phone`, `subcategory_id`, `city_id` , `description` ,`approval_status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->execute(array(
        $_POST['user_id'], 
        $_POST['email'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['subcategory'],
        $_POST['city'],
        $_POST['description'],
        '{}'//approval_status`
      ));
      die(header('Location: ' . APP_URL_BASE . 'dashboard.php?enquiries' ));
    } elseif (isset($_POST['enquiry'])) {

      if ($_POST['enquiry'] == 'edit') {
// dd($_POST);
        $stmt = $pdo->prepare($sql = "UPDATE `enquiries` SET `email` = :email, `phone` = :phone, `address` = :address, `subcategory_id` = :subcategory_id, `city_id` = :city_id, `description` = :description WHERE `enquiries`.`id` = :enquiry_id;");


         $stmt->execute(array(
          ':email' => $_POST['email'],
          ':phone' => $_POST['phone'],
          ':address' => $_POST['address'],
          ':subcategory_id' => (isset($_POST['subcategory']) ? $_POST['subcategory'] : '52'),
          ':city_id' => $_POST['city'],
          ':description' => $_POST['description'],
          ':enquiry_id' => (isset($_POST['enquiry_id']) ? $_POST['enquiry_id'] : '')
          ));
/*
Email
Phone
Address
subcategory_id)
City_id
Description

array (
  'enquiry' => 'edit',
  'enquiry_id' => '12',
  'user_id' => '2',
  'subcategory' => '1',
  'name' => 'John',
  'email' => 'user@localhost',
  'phone' => '1234567889',
  'address' => '456 Testing',
  'city' => '2',
  'description' => 'Description here'
*/

      } else if (isset($_POST['enquiry_id']) && $_SESSION['type'] == 'Partner') {

        $stmt = $pdo->prepare($sql = "SELECT `approval_status` FROM `enquiries` WHERE `enquiries`.`id` = :enquiry_id;");
        $stmt->execute(array('enquiry_id' => $_POST['enquiry_id']));
        $row = $stmt->fetch();

        $approvals = json_decode($row['approval_status'], false); // {"1":1,"2":0,"3":1}
//dd($approvals, false);
// Check if $approvals is null and initialize as an object if so
if ($approvals === null) {
  $approvals = new stdClass();  // Ensures $approvals is always an object
}

// Check if $approvals is non-empty and the current session user_id exists in $approvals
if (!empty($approvals) && property_exists($approvals, $_SESSION['user_id'])) {
  // Toggle the approval status if it exists
  $approvals->{$_SESSION['user_id']} = (int)!$approvals->{$_SESSION['user_id']};
} else {
  // Set approval to true if user_id does not exist or $approvals is empty
  $approvals->{$_SESSION['user_id']} = 1;
}
//dd(json_encode($approvals), true);

        $stmt = $pdo->prepare($sql = "UPDATE `enquiries` SET `approval_status` = :approval_status WHERE `enquiries`.`id` = :enquiry_id;");
        $stmt->execute(array(
          ':approval_status' => json_encode($approvals),
          ':enquiry_id' => $_POST['enquiry_id']
        ));

      }

    } elseif (isset($_POST['city']) && $_POST['city'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `cities` WHERE `cities`.`id` = :city_id;");
      $stmt->execute(array(
        ":city_id" => $_POST['city_id']
      ));
    }  elseif (isset($_POST['city']) && $_POST['city'] == 'edit') {
      $stmt = $pdo->prepare($sql = "UPDATE `cities` SET `city` = :city WHERE `cities`.`id` = :city_id;");

      //dd($sql);
      $stmt->execute(array(
        ":city_id" => $_POST['city_id'],
        ':city' => $_POST['city_name']
      ));
    } elseif (isset($_POST['city']) && $_POST['city'] == 'add') {
      $stmt = $pdo->prepare("INSERT INTO `cities` (`city`) VALUES (?)");
      $stmt->execute(array(
        $_POST['city_name'],
      ));
    } elseif (isset($_POST['category']) && $_POST['category'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `categories` WHERE `categories`.`id` = :category_id;");
      $stmt->execute(array(
        ":category_id" => $_POST['category_id']
      ));
    } elseif (isset($_POST['category']) && $_POST['category'] == 'edit') {
      $stmt = $pdo->prepare($sql = "UPDATE `categories` SET `name` = :name WHERE `categories`.`id` = :category_id;");

      //dd($sql);
      $stmt->execute(array(
        ":category_id" => $_POST['category_id'],
        ':name' => $_POST['name']
      ));
    } elseif (isset($_POST['category']) && $_POST['category'] == 'add') {
      $stmt = $pdo->prepare("INSERT INTO `categories` (`name`) VALUES (?)");
      $stmt->execute(array(
        $_POST['name']
      ));
    }  elseif (isset($_POST['subcategory']) && $_POST['subcategory'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `subcategories` WHERE `subcategories`.`id` = :subcategory_id;");
      $stmt->execute(array(
        ":subcategory_id" => $_POST['subcategory_id']
      ));
    } elseif (isset($_POST['subcategory']) && $_POST['subcategory'] == 'edit') {
      $stmt = $pdo->prepare($sql = "UPDATE `subcategories` SET  `category_id` = :category_id, `name` = :name WHERE `subcategories`.`id` = :subcategory_id;");

      //dd($sql);
      $stmt->execute(array(
        ":subcategory_id" => $_POST['subcategory_id'],
        ':name' => $_POST['name'],
        ':category_id' => $_POST['category']
      ));
    } elseif (isset($_POST['subcategory']) && $_POST['subcategory'] == 'add') {
      $stmt = $pdo->prepare($sql = "INSERT INTO `subcategories` (`category_id`, `name`) VALUES ( :category_id, :name);");
      //dd($sql);
      $stmt->execute(array(
        ':category_id' => $_POST['category'],
        ':name' => $_POST['name']
      ));
    }  elseif (isset($_POST['post']) && $_POST['post'] == 'edit') {
      $stmt = $pdo->prepare($sql = "UPDATE `posts` SET `category_id` = :category_id, `subcategory_id` = :subcategory_id, `about` = :about, `city_id` = :city_id WHERE `posts`.`id` = :post_id;");

      //dd($sql);
      $stmt->execute(array(
        ":post_id" => $_POST['post_id'],
        ':category_id' => $_POST['category'],
        ':subcategory_id' => $_POST['subcategory'],
        ':city_id' => $_POST['city'],
        ':about' => $_POST['about']
      ));
    } elseif (isset($_POST['post']) && $_POST['post'] == 'add') {


      if (is_file($fileTmpPath = $_FILES['file_upload']['tmp_name'][0])) {

        move_uploaded_file($fileTmpPath, $destination = APP_PATH . 'public/img/profession/' . basename($_FILES['file_upload']['name'][0]) );
      }
      $stmt_category = $pdo->prepare("SELECT `name` FROM `subcategories` WHERE `id` = :subcategory_id;");
      $stmt_category->execute(array('subcategory_id' => $_POST['subcategory']));
      $row_fetch_category = $stmt_category->fetch();
                   
      ?><?php
      $stmt = $pdo->prepare("INSERT INTO `posts` (`category_id`, `subcategory_id`, `about`, `city_id`, `photo1`, `slug`) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->execute(array(
        $_POST['category'],
        $_POST['subcategory'],
        $_POST['about'],
        $_POST['city'],
        $_FILES['file_upload']['name'][0], // ($_FILES["file_upload"]["error"] == 0 ? 'success' : 'test' )
        createSlug($row_fetch_category['name'])
      ));
    } elseif (isset($_POST['post']) && $_POST['post'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `posts` WHERE `posts`.`id` = :post_id;");
      $stmt->execute(array(
        ":post_id" => $_POST['post_id']
      ));
    } elseif (!empty($rawData = file_get_contents("php://input"))) {
      $decodedData = json_decode($rawData, true);
      
      //dd('{"test":"123"}');
      if (isset($decodedData['user_id'] )) {
        $stmt = $pdo->prepare("SELECT `id`, `name`, `email`, `password`, `type` FROM `users` WHERE `id` = :user_id;");
        $stmt->execute(array(
            ":user_id" => $decodedData['user_id']
        ));

        $row_fetch = $stmt->fetch();

        die(json_encode(['user_id' => $decodedData['user_id'], 'name' => $row_fetch['name'], 'email' => $row_fetch['email'], 'type' => $row_fetch['type']]));
      } elseif (isset($decodedData['city_id'])) {
       
        $stmt = $pdo->prepare("SELECT `id`, `city` FROM `cities` WHERE `id` = :city_id;");
        $stmt->execute(array(
            ":city_id" => $decodedData['city_id']
        ));

        $row_fetch = $stmt->fetch();

        die(json_encode(['city_id' => $decodedData['city_id'], 'city' => $row_fetch['city']]));

        // 
      } else if (isset($decodedData['enquiry_id'])) {
        //die(json_decode($decodedData, true));
        //die('{"test":"test"}');
        $stmt = $pdo->prepare("SELECT `email`, `phone`, `address`, `subcategory_id`, `city_id`, `description` FROM `enquiries` WHERE `id` = :enquiry_id;");
        $stmt->execute(array(
            ":enquiry_id" => $decodedData['enquiry_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['enquiry_id' => $decodedData['enquiry_id'], 'name' => $_SESSION['name'], 'email' => $row_fetch['email'], 'phone' => $row_fetch['phone'], 'address' => $row_fetch['address'], 'subcategory_id' => $row_fetch['subcategory_id'], 'city_id' => $row_fetch['city_id'], 'description' => $row_fetch['description'] ]));
      }  else if (isset($decodedData['partner_id'])) {
        //die(json_decode($decodedData, true));

        $stmt = $pdo->prepare("SELECT `id`, `category_id`, `subcategory_id`, `type`, `about`, `city_id`, `name`, `phone`, `address`, `user_id`,  `created_at` FROM `partners` WHERE `id` = :partner_id;");
        $stmt->execute(array(
            ":partner_id" => $decodedData['partner_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['partner_id' => $decodedData['partner_id'], 'category_id' => $row_fetch['category_id'], 'subcategory_id' => $row_fetch['subcategory_id'], 'type' => $row_fetch['type'], 'about' => $row_fetch['about'], 'city_id' => $row_fetch['city_id'], 'name' => $row_fetch['name'], 'phone' => $row_fetch['phone'], 'address' => $row_fetch['address'], 'user_id' => $row_fetch['user_id'], 'created_at' => $row_fetch['created_at']]));
      } elseif (isset($decodedData['post_id'])) {
        $stmt = $pdo->prepare("SELECT `id`, `category_id`, `subcategory_id`, `about`, `city_id`, `photo1`, `photo2`, 'address', 'user_id', `created_at` FROM `posts` WHERE `id` = :post_id;");
        $stmt->execute(array(
            ":post_id" => $decodedData['post_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
 
        die(json_encode(['post_id' => $decodedData['post_id'], 'category_id' => $row_fetch['category_id'], 'subcategory_id' => $row_fetch['subcategory_id'], 'about' => $row_fetch['about'], 'city_id' => $row_fetch['city_id'], 'photo1' => $row_fetch['photo1'], 'photo2' => $row_fetch['photo2'], 'address' => $row_fetch['address'], 'user_id' => $row_fetch['user_id'], 'created_at' => $row_fetch['created_at']]));

      } else if (isset($decodedData['category_id'])) {
        //die(json_decode($decodedData, true));
        //die('{"test":"test"}');
        $stmt = $pdo->prepare("SELECT `name` FROM `categories` WHERE `id` = :category_id;");
        $stmt->execute(array(
            ":category_id" => $decodedData['category_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['category_id' => $decodedData['category_id'], 'name' =>  $row_fetch['name']]));
      } else if(isset($decodedData['subcategory_id'])) {
        //die(json_decode($decodedData, true));
        //die('{"test":"test"}');
        $stmt = $pdo->prepare("SELECT  `category_id`, `name` FROM `subcategories` WHERE `id` = :subcategory_id;");
        $stmt->execute(array(
            ":subcategory_id" => $decodedData['subcategory_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['subcategory_id' => $decodedData['subcategory_id'], 'category_id' => $row_fetch['category_id'], 'name' =>  $row_fetch['name'], ]));
      }
     
    }
  }

    exit(header('Location: ' . APP_WWW . (!empty(APP_QUERY) ? '?' . http_build_query(APP_QUERY): '' )));
    break;

    case 'GET':
      if (basename(APP_SELF) == 'dashboard.php' && isset($_GET['partners']) && $_GET['partners'] != 'add') {

        exit(header('Location: ' . APP_URL_BASE . 'dashboard.php?partners=add&category=1'));

      }

      // partners=add&category_id=1
      break;
}