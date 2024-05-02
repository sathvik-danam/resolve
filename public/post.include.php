<?php

//include('../config/config.php');

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    //dd($_POST);

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

      $stmt = $pdo->prepare("INSERT INTO users (`name`, `email`, `password`, `type`) VALUES (?, ?, ?, ?)");
      $stmt->execute(array(
        $_POST['name'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['type']
      ));
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'delete') {
      $stmt = $pdo->prepare("DELETE FROM `professionals` WHERE `professionals`.`id` = :profession_id;");
      $stmt->execute(array(
        ":profession_id" => $_POST['partner_id']
      ));
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'edit') {


      $stmt = $pdo->prepare($sql = "UPDATE `professionals` SET `profession` = :profession, `profession_name` = :profession_name, `type` = :type, `about` = :about, `city` = :city, `name` = :name, `phone` = :phone, `address` = :address, `user_id` = :user_id WHERE `professionals`.`id` = :profession_id;");

      if (basename(APP_SELF) == 'dashboard.php') {

      //dd($_POST);
      $stmt->execute(array(
        ':profession_id' => $_POST['partner_id'],
        ':profession' => $_POST['profession'],
        ':profession_name' => $_POST['profession_name'],
        ':type' => (isset($_POST['type']) ? $_POST['type'] : ''),
        ':about' => $_POST['about'],
        ':city' => $_POST['city'],
        ':name' => (isset($_POST['name']) ? $_POST['name'] : ''),
        ':phone' => (isset($_POST['phone']) ? $_POST['phone'] : ''),
        ':address' => (isset($_POST['address']) ? $_POST['address'] : ''),
        ':user_id' => (isset($_POST['user_id']) ? $_POST['user_id'] : '')
      ));
      } else {
        $stmt->execute(array(
            ':profession_id' => $_POST['partner_id'],
            ':profession' => $_POST['profession'],
            ':profession_name' => $_POST['profession_name'],
            ':type' => (isset($_POST['type']) ? $_POST['type'] : ''),
            ':about' => $_POST['about'],
            ':city' => $_POST['city'],
            ':name' => (isset($_POST['name']) ? $_POST['name'] : ''),
            ':phone' => (isset($_POST['phone']) ? $_POST['phone'] : ''),
            ':address' => (isset($_POST['address']) ? $_POST['address'] : ''),
            ':user_id' => (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '')
          ));
      }
    } elseif (isset($_POST['partner']) && $_POST['partner'] == 'add') {
      // id, profession, profession_name, type, about, photo, state, city, name, phone, email, address, slug, user_id, created_at, updated_at
      //dd(basename(APP_SELF));
      if (basename(APP_SELF) == 'dashboard.php') {

        $stmt = $pdo->prepare("INSERT INTO professionals (`profession`, `profession_name`, `type`, `about`, `city`,  `name`, `phone`, `user_id`, `created_at`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute(array(
          $_POST['profession'],
          $_POST['profession_name'],
          $_POST['type'],
          $_POST['about'],
          $_POST['city'],
          $_POST['name'],
          $_POST['phone'],
          $_POST['user_id'],
          date('Y-m-d H:i:s')
        ));

      } else {

        $stmt = $pdo->prepare("INSERT INTO professionals (`profession`, `profession_name`, " /*`type`,*/ . " `about`, `city`, `name`, `phone`, `address`, `user_id`,  `created_at`) VALUES ( ?, ?, " . /*?,*/ " ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute(array(
          $_POST['profession'],
          $_POST['profession_name'],
          //$_POST['type'],
          $_POST['about'],
          $_POST['city'],
          $_SESSION['name'], //$_POST['name'],
          '0005551212', //$_POST['phone']
          $_POST['address'],
          $_SESSION['user_id'],
          date('Y-m-d H:i:s')
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
        ':city' => $_POST['name']
      ));
    } elseif (isset($_POST['city']) && $_POST['city'] == 'add') {
      $stmt = $pdo->prepare("INSERT INTO `cities` (`city`) VALUES (?)");
      $stmt->execute(array(
        $_POST['name'],
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
      $stmt = $pdo->prepare($sql = "UPDATE `subcategories` SET `name` = :name, `belongs_to` = :belongs_to WHERE `subcategories`.`id` = :subcategory_id;");

      //dd($sql);
      $stmt->execute(array(
        ":subcategory_id" => $_POST['subcategory_id'],
        ':name' => $_POST['name'],
        ':belongs_to' => $_POST['belongs_to']
      ));
    } elseif (isset($_POST['subcategory']) && $_POST['subcategory'] == 'add') {
      $stmt = $pdo->prepare("INSERT INTO `subcategories` (`name`, `belongs_to`) VALUES (?, ?)");
      $stmt->execute(array(
        $_POST['name'],
        $_POST['belongs_to']
      ));
    } elseif (!empty($rawData = file_get_contents("php://input"))) {
      $decodedData = json_decode($rawData, true);
      
    dd('{"test":"123"}');
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
      } else if(isset($decodedData['partner_id'])) {
        //die(json_decode($decodedData, true));

        $stmt = $pdo->prepare("SELECT `id`, `profession`, `profession_name`, `type`, `about`, `city`, `name`, `phone`, `address`, `user_id`,  `created_at` FROM `professionals` WHERE `id` = :partner_id;");
        $stmt->execute(array(
            ":partner_id" => $decodedData['partner_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['partner_id' => $decodedData['partner_id'], 'profession' => $row_fetch['profession'], 'profession_name' => $row_fetch['profession_name'], 'type' => $row_fetch['type'], 'about' => $row_fetch['about'], 'city' => $row_fetch['city'], 'name' => $row_fetch['name'], 'phone' => $row_fetch['phone'], 'address' => $row_fetch['address'], 'user_id' => $row_fetch['user_id'], 'created_at' => $row_fetch['created_at']]));
      } else if(isset($decodedData['category_id'])) {
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
        $stmt = $pdo->prepare("SELECT `name`, `belongs_to` FROM `subcategories` WHERE `id` = :subcategory_id;");
        $stmt->execute(array(
            ":subcategory_id" => $decodedData['subcategory_id']
        ));
        //die('{"test":"test"}');
        $row_fetch = $stmt->fetch();
        die(json_encode(['subcategory_id' => $decodedData['subcategory_id'], 'name' =>  $row_fetch['name'], 'belongs_to' => $row_fetch['belongs_to']]));
      }
     
    }
    break;

}






if (!empty($_SESSION) && isset($_SESSION['user_id'])) {

  $stmt = $pdo->prepare("SELECT `id`, `name`, `email`, `type` FROM `users` WHERE `id` = :user_id;");
  $stmt->execute(array(
    ":user_id" => $_SESSION['user_id']
  ));
  $row_fetch = $stmt->fetch();
  $_SESSION = ['user_id' => (int) $row_fetch['id'], 'name' => $row_fetch['name'], 'email' => $row_fetch['email'], 'type' => (string) $row_fetch['type']];
}

