<?php
require_once('../config/config.php');

if (empty($_SESSION)) die(header('Location: ' . APP_URL_BASE)); ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css" -->

  <base href="<?= APP_URL_BASE ; /* /resolve/ */ ?>" /> <!-- always follow with a resolve/ -->

  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

  <!-- link rel="stylesheet" type="text/css" href="css/adminlte.css" -->
  <!-- link rel="stylesheet" type="text/css" href="css/app.css" -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    *:focus {
      outline: none;
    }
    body{
      background-color: #FFF;
      overflow-x: hidden;
    }
    nav {
      position: absolute;
      display: block;
      /* width: 100vw; */
      /* 100% */
      z-index: 2;
    }
    .form-control {
    display: block;
  width: 100%;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  color: #495057;
  background-color: #ffffff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  box-shadow: inset 0 0 0 transparent;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}

  .form-group {
    margin-bottom: 1rem;
  }
  
  .form-text {
    display: block;
    margin-top: 0.25rem;
  }


    .modal {
  display: block; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

 
.modal-title {
    margin-bottom: 0;
    line-height: 1.5;
  }

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 600px; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
  </style>
</head>

<body>



<?php if (in_array($_SESSION['type'], ['Admin'])) { ?>

  <?php if (isset($_GET['users'])) { // 7x  ?>

<div id="myModal" class="modal" style="display: none;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
        <span id="addNewLabel" class="modal-title" style="">Add New User</span>
        <h5 id="addNewLabel" class="modal-title" style="display: none;">Update User's info</h5>

      </div>
      <form action method="POST">
        <input type="hidden" name="user" value="add" />
        <input type="hidden" name="user_id" />
        <div class="modal-body" bis_skin_checked="1">
        <div class="form-group" bis_skin_checked="1"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control"> <!----></div> 
        <div class="form-group" bis_skin_checked="1"><input type="text" id="email" name="email" placeholder="Enter Email" class="form-control"> <!----></div> 
        <div class="form-group" bis_skin_checked="1"><input type="password" id="password" name="password" placeholder="Enter Password" class="form-control"> <!----></div>
        <div class="form-group" bis_skin_checked="1">
        <select name="type" id="type" placeholder="User Type" class="form-control">
          <option value="">Select User Role</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
          <option value="Partner">Partner</option>
        </select> <!----></div></div>
        <div class="modal-footer" bis_skin_checked="1">
          <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
          <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php } elseif (isset($_GET['cities'])) { // 7x  ?>

<div id="myModal" class="modal" style="display: none;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
      <div class="modal-content" bis_skin_checked="1">
        <div class="modal-header" bis_skin_checked="1">
          <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
          <span id="addNewLabel" class="modal-title" style="">Add New City</span>
          <h5 id="addNewLabel" class="modal-title" style="display: none;">Update User's info</h5>

        </div>
        <form action method="POST">
          <input type="hidden" name="city" value="add" />
          <input type="hidden" name="city_id" />
          <div class="modal-body" bis_skin_checked="1">
            <div class="form-group" bis_skin_checked="1"><input type="text" id="city_name" name="city_name" placeholder="Enter Name" class="form-control"> <!----></div> 
          </div>
          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
          </div>
        </form>
      </div>
    </div>
</div>


<?php } elseif (isset($_GET['categories'])) { // 7x  ?>

<div id="myModal" class="modal" style="display: none;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
      <div class="modal-content" bis_skin_checked="1">
        <div class="modal-header" bis_skin_checked="1">
          <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
          <span id="addNewLabel" class="modal-title">Add New</span>

        </div>
        <form action method="POST">
          <input type="hidden" name="category" value="add" />
          <input type="hidden" name="category_id" />
          <div class="modal-body" bis_skin_checked="1">
            <div class="form-group" bis_skin_checked="1"><input type="text" id="name" name="name" placeholder="Enter Name" class="form-control"> </div> 
          </div>
          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
          </div>
        </form>
      </div>
    </div>
</div>


<?php } elseif (isset($_GET['subcategories'])) { // 7x  ?>

<div id="myModal" class="modal" style="display: none;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
      <div class="modal-content" bis_skin_checked="1">
        <div class="modal-header" bis_skin_checked="1">
          <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
          <span id="addNewLabel" class="modal-title">Add New</span>

        </div>
        <form action method="POST">
          <input type="hidden" name="subcategory" value="add" />
          <input type="hidden" name="subcategory_id" />
          <div class="modal-body" bis_skin_checked="1">
            <div class="form-group" bis_skin_checked="1">
              <label>Name</label>
            <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control"> <!----></div> 
            <label>Belongs To Primary Profession</label>
            <div class="form-group" bis_skin_checked="1">
              <select name="category">
<?php
$stmt = $pdo->prepare("SELECT `name` FROM `categories`;");
  $stmt->execute(array());
  
while ($row_fetch = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch['name'] ?>"><?= $row_fetch['name'] ?></option>
<?php } ?>
              </select>
            <!----></div> 

          </div>
          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
          </div>
        </form>
      </div>
    </div>
</div>

<?php } ?>

<?php } else if (in_array($_SESSION['type'], ['Admin', 'Partner', 'User'])) { 
  if (isset($_GET['partners']) || /* isset($_GET['create-profession']) ||*/ isset($_GET['skills']) ) { // 7x  ?>

<div id="myModal" class="modal" style="display: <?= ($_GET['partners'] == 'add' && isset($_GET['category']) ? 'none' : 'none') ?>;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
        <span id="addNewLabel" class="modal-title" style="">Add Partner</span>
        <h5 id="addNewLabel" class="modal-title" style="display: none;">Update User's info</h5>
      </div>
<?php if (isset($_GET['category'])) { ?>
      <form action="<?= APP_WWW ?>" method="GET">
        <input type="hidden" name="partners" value="add" />

      <label>Category</label>
        <div class="form-group" bis_skin_checked="1">
        <select id="category" name="category" class="form-control" onchange="this.form.submit();">
<?php
$stmt = $pdo->prepare("SELECT `id`, `name` FROM `categories`;");
  $stmt->execute(array());
  
while ($row_fetch = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch['id'] ?>" <?= ($row_fetch['id'] == $_GET['category'] ? 'selected' : '' )?>><?= $row_fetch['name'] ?></option>
     
<?php } ?>
          </select>
      </form>

<?php } ?>

      <form action="dashboard.php?partners=add" method="POST">

        <div class="modal-body" bis_skin_checked="1">
        <div class="form-group" bis_skin_checked="1">
          <input type="hidden" name="partner" value="add" />
          <input type="hidden" name="partner_id" />
          <input type="hidden" id="user_id" name="user_id" class="form-control">
          <?php //if (isset($_GET['category']) && is_int((int) $_GET['category'])) { ?> 
          <input id="category" type="hidden" name="category" value="<?= (isset($_GET['category']) ? $_GET['category'] : '52' ) ?>">  
          <?php //} ?><!----></div> 

        </div> 
        <label>Profession</label>
        <div class="form-group" bis_skin_checked="1">
          
        <select id="subcategory" name="subcategory" class="form-control">
        <?php
    $default_subcategory = 52; // Default subcategory ID
    $selected_category = isset($_GET['category']) ? (int) $_GET['category'] : null;
    $has_subcategories = false; // Flag to check if any subcategories are found

    if ($selected_category) {
        $stmt = $pdo->prepare("SELECT `id`, `name` FROM `subcategories` WHERE `category_id` = :category_id;");
        $stmt->execute(['category_id' => $selected_category]);

        while ($row = $stmt->fetch()) {
            echo "<option value='{$row['id']}'>{$row['name']}</option>";
            $has_subcategories = true; // Set flag to true as subcategories exist
        }
    } else {
      $stmt = $pdo->prepare("SELECT `id`, `name` FROM `subcategories`;");
      $stmt->execute();

      while ($row = $stmt->fetch()) {
          echo "<option value='{$row['id']}'>{$row['name']}</option>";
          $has_subcategories = true; // Set flag to true as subcategories exist
      }

    }

    // Show default option only if no subcategories were fetched
    if (!$has_subcategories) {
        //echo "<option value='{$default_subcategory}' selected>Others</option>";
    }
    ?>
          </select>
<?php
          if (!$has_subcategories) {
        echo '<input type="hidden" name="subcategory" value="52">';
    }
    ?>
          <!----></div>
<!-- 
        <label>Name</label>
        <div class="form-group" bis_skin_checked="1"><input id="name" name="name" placeholder="Enter Name" value="<?= $_SESSION['name'] ?>" class="form-control" /></div> 
-->
        <label>About</label>
        <div class="form-group" bis_skin_checked="1"><textarea id="about" name="about" placeholder="Enter About" class="form-control"></textarea> <!----></div> 
        <label>City</label>
        <div class="form-group" bis_skin_checked="1">
        <select name="city_id" class="form-control">
          <?php
$stmt = $pdo->prepare("SELECT `id`, `city` FROM `cities`;");
  $stmt->execute(array());
  
  $first = true; // Initialize a flag to check for the first iteration
  while ($row_fetch_city = $stmt->fetch()) {
      // Check if it's the first iteration
      if ($first) {
          echo '<option value="' . htmlspecialchars($row_fetch_city['id']) . '" selected>' . htmlspecialchars($row_fetch_city['city']) . '</option>';
          $first = false; // Unset the flag after the first iteration
      } else {
          echo '<option value="' . htmlspecialchars($row_fetch_city['id']) . '">' . htmlspecialchars($row_fetch_city['city']) . '</option>';
      }
  }
?>

</select><!----></div> 

          <label>Phone</label>
          <div class="form-group" bis_skin_checked="1"><input id="phone" type="tel" name="phone" minlength="10" maxlength="10" value="<?= $_SESSION['phone'] ?>" placeholder="Enter Phone" class="form-control"></textarea> <!----></div> 
          <label>Address</label>
          <div class="form-group" bis_skin_checked="1"><textarea id="address" name="address" placeholder="Enter Address" class="form-control"></textarea> <!----></div> 
          <label>About You And Your Profession</label>

          <label>Partner Type</label>
          <div class="form-group" bis_skin_checked="1">
          <select name="type" class="form-control">
            <option>Partner</option>
          </select> <!----></div> 

          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } 
 } ?>

<?php if (isset($_GET['enquiries'])) { // 7x  ?>
<div id="myModal" class="modal" style="border: 1px solid #000; display: none;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>

      </div>
      <form action="<?= APP_URL_BASE . basename(APP_SELF) . '?enquiries' ?>" method="POST">
        <input type="hidden" name="enquiry" value="add" />
        <input type="hidden" name="enquiry_id" />
        <div class="modal-body" bis_skin_checked="1">

        <span class="text-center">Need Professional Help?</span>
        <div class="form-group" bis_skin_checked="1">

        
        <?php
if (!empty($_SESSION)) {

$stmt_users = $pdo->prepare("SELECT * FROM `users` WHERE id = :user_id;");
$stmt_users->execute(array(
  ':user_id' => $_SESSION['user_id']
));
$row_fetch_user = $stmt_users->fetch();
}

?> 
        <input type="hidden" name="user_id" value="<?= $row_fetch_user['id']; ?>"><!----></div>
        <label>Profession</label>
        <div class="form-group" bis_skin_checked="1">
          <select id="subcategory" name="subcategory" class="form-control">
          <?php
$stmt_subcategory = $pdo->prepare("SELECT `id`, `name` FROM `subcategories`;");
$stmt_subcategory->execute(array());
  
while ($row_fetch_subcategory = $stmt_subcategory->fetch()) { ?>
            <option value="<?= $row_fetch_subcategory['id'] ?>"><?= $row_fetch_subcategory['name'] ?></option>
<?php } ?>

</select><!----></div>
        <label>Name</label>
        <div class="form-group" bis_skin_checked="1"><input type="text" id="name" name="name" value="<?= $row_fetch_user['name']; ?>" placeholder="Enter Name" class="form-control"> <!----></div> 
         
        <label>Email</label>
        <div class="form-group" bis_skin_checked="1"><input type="text" id="email" name="email" value="<?= $row_fetch_user['email']; ?>" placeholder="Enter Email" class="form-control"> <!----></div> 
         
        <label>Phone</label>
        <div class="form-group" bis_skin_checked="1"><input type="text" id="phone" name="phone" value="<?= $row_fetch_user['phone']; ?>" placeholder="Enter Phone" class="form-control"> <!----></div>

        <label>Address</label>
        <div class="form-group" bis_skin_checked="1"><textarea id="address" name="address" placeholder="Enter Address" class="form-control"><?= $row_fetch_user['address']; ?></textarea> <!----></div> 

        <label>City</label>
        <div class="form-group" bis_skin_checked="1">
          <select name="city" class="form-control">
          <?php
$stmt_cities = $pdo->prepare("SELECT `id`, `city` FROM `cities`;");
  $stmt_cities->execute(array());
  
while ($row_fetch_city = $stmt_cities->fetch()) { ?>
            <option value="<?= $row_fetch_city['id'] ?>" <?= ($row_fetch_user['city_id'] == $row_fetch_city['id'] ? 'selected' : '') ?>><?= $row_fetch_city['city'] ?></option>
<?php } ?>

</select>
           <!----></div> 
          
        <label>Description</label>
        <div class="form-group" bis_skin_checked="1"><textarea id="description" name="description" placeholder="Enter Description" class="form-control"></textarea> <!----></div> 
          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="px-5 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-red-600 lg:px-10 rounded-xl hover:bg-red-700">Close</button>
            <button type="submit" class="px-5 py-2 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-green-600 lg:px-10 rounded-xl hover:bg-green-700" style="float: right;">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<?php } elseif (isset($_GET['create-profession'])) { ?>

<div id="myModal" class="modal" style="display: none; border: 1px solid #000;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
        <span id="addNewLabel" class="modal-title" style="">Add Partner</span>
        <h5 id="addNewLabel" class="modal-title" style="display: none;">Update User's info</h5>
      </div>
      <form action method="POST">
        <input type="hidden" name="partner" value="add" />
        <input type="hidden" name="partner_id" />
        <div class="modal-body" bis_skin_checked="1">

        <label>Primary Profession</label>
        <div class="form-group" bis_skin_checked="1">
          <select id="category" name="category" class="form-control">
<?php
$stmt = $pdo->prepare("SELECT `name` FROM `categories`;");
  $stmt->execute(array());
  
while ($row_fetch = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch['name'] ?>"><?= $row_fetch['name'] ?></option>
     
<?php } ?>
          </select><!----></div> 
        <label>Profession Sub-Types</label>
        <div class="form-group" bis_skin_checked="1">
        <select id="subcategory" name="subcategory" class="form-control">
<?php
$stmt = $pdo->prepare("SELECT `name` FROM `subcategories`;");
  $stmt->execute(array());
  
while ($row_fetch = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch['name'] ?>"><?= $row_fetch['name'] ?></option>
     
<?php } ?>
          </select>
        
        <!----></div> 
        <label>City</label>
        <div class="form-group" bis_skin_checked="1"><select name="city_id" class="form-control">
          <?php
$stmt = $pdo->prepare("SELECT `id`, `city` FROM `cities`;");
  $stmt->execute(array());
  
while ($row_fetch_city = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch_city['id'] ?>" <?= (isset($_SESSION['city']) && $_SESSION['city'] == $row_fetch_city['city'] ? 'selected' : '')  ?>><?= $row_fetch_city['city'] ?></option>
<?php } ?>

</select><!----></div> 
        <label>Address</label>
        <div class="form-group" bis_skin_checked="1"><textarea id="address" name="address" placeholder="Enter Address" class="form-control"></textarea> <!----></div> 
        <label>About Your Profession</label>

        <div class="form-group" bis_skin_checked="1"><textarea id="about" name="about" placeholder="Enter About" class="form-control"></textarea> <!----></div> 

  
          <div class="modal-footer" bis_skin_checked="1">
            <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
            <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php } ?>

<?php if (!isset($_SESSION['user_id'])) { ?>

    <div id="login-pop-up" style="position:fixed; display: none; width: 400px; border: 1px solid #000; z-index: 1; left: 38%; right:50%;">


      <div class="max-w-md w-full border py-8 px-6 rounded border-gray-300 bg-white">

        <span class="text-md font-semibold text-lg" style="float: right;">[<a href="javascript:void(0)" onclick="document.getElementById('login-pop-up').style.display = 'none';">x</a>]</span>
        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40 mb-10' />
        </a>

        <h2 class="text-center text-3xl font-extrabold">
          Log in to your account
        </h2>
        <form action method="POST" class="mt-10 space-y-4">
          <input type="hidden" name="user" value="login">
          <div>
            <input name="email" type="email" autocomplete="email" required class="w-full text-sm px-4 py-3 rounded outline-none border-2 focus:border-blue-500" placeholder="Email address" />
          </div>
          <div>
            <input name="password" type="password" autocomplete="current-password" required class="w-full text-sm px-4 py-3 rounded outline-none border-2 focus:border-blue-500" placeholder="Password" />
          </div>
          <div class="flex items-center justify-between gap-4">
            <div class="flex items-center">
              <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
              <label for="remember-me" class="ml-3 block text-sm">
                Remember me
              </label>
            </div>
            <div>
              <a href="javascript:void(0);" class="text-sm text-blue-600 hover:text-blue-500">
                Forgot Password?
              </a>
            </div>
          </div>
          <div class="!mt-10">
            <button type="submit" class="w-full py-2.5 px-4 text-sm rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
              Log in
            </button>
          </div>
        </form>
      </div>

    </div>
  <?php } ?>

  <div style="overflow-x: auto; width: 100%; max-width: 100%;">

    <div style="position:fixed; top: 0; left: 0; display: inline; float: left;  width: 20%; box-sizing: border-box; margin-top: 0; background-color: #232323;" class="relative flex flex-col bg-clip-border  bg-white text-gray-700 h-[calc(100vh)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">

      <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
      <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <a href="<?= APP_URL_BASE ?>">Resolve</a>
        </div>  
      <hr />
      <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <a href="?"><?= (!isset($_SESSION['name']) ? 'user' : $_SESSION['name']) . '<br />' . (!isset($_SESSION['type']) ? 'User': $_SESSION['type']) ?></a>
        </div>  
      <hr />

<?php if (isset($_SESSION['type']) && in_array($_SESSION['type'], ['Partner'])) { ?> 

        <div id="hide-show_profession_btn" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div id="" class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <a href="javascript:void(0);">Partner Dashboard</a>
        </div>
<div id="hide-show_partners" style="display: block;"> 
         <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <i class="fa fa-user"></i>
          </div><a href="dashboard.php?partners">Skills</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="dashboard.php?enquiries">Enquiries</a>
        </div>
</div>
<?php } elseif (isset($_SESSION['type']) && in_array($_SESSION['type'], ['Admin'])) { ?>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div id="hide-show_users_btn" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
<i class="fa fa-users"></i>
          </div><a href="javascript:void(0)">Manage Users</a>
        </div>
<div id="hide-show_users" style="display: 
<?= (isset($_GET['users']) || isset($_GET['partners']) || isset($_GET['enquiries']) || isset($_GET['cities']) ? 'block':'none') ?>
;">
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <i class="fa fa-user"></i>
          </div><a href="dashboard.php?users">Users</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <i class="fa fa-people"></i>
          </div><a href="dashboard.php?partners">Partners</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <i class="fa fa-chat"></i>
          </div><a href="dashboard.php?enquiries">Enquiries</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
          <i class="fas fa-city"></i>
          </div><a href="dashboard.php?cities">City</a>
        </div>
</div>
        <div id="hide-show_profession_btn" role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
<i class="fa fa-briefcase"></i>
          </div><a href="javascript:void(0);">Manage Profession</a>
        </div>
<div id="hide-show_profession" style="display: 
<?= (isset($_GET['categories']) || isset($_GET['subcategories']) || isset($_GET['create-profesion']) || isset($_GET['primary-profession']) || isset($_GET['profession-sub-types']) ? 'block':'none') ?>
;">
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">

          </div><a href="<?= APP_WWW ?>?partners">Create Profession</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="<?= basename(APP_SELF) . '?categories' ?>">Primary Profession</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="<?= basename(APP_SELF) . '?subcategories' ?>">Profession Sub-Types</a>
        </div>
</div>
<?php }
if (isset($_SESSION['type']) && in_array($_SESSION['type'], ['User'])) { ?>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="dashboard.php?enquiries">Enquiries</a>
        </div>

        <!-- div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd"></path>
            </svg>
          </div>Developer
        </div -->
<?php } ?>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="<?= basename(APP_SELF); ?>?profile">Profile</a>
        </div>

        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 text-white outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd"></path>
            </svg>
          </div><!-- i class="fa-solid fa-power-off"></i --><a href="?logout">Log Out</a>
        </div>
      </nav>
    </div>
<?php if (in_array($_SESSION['type'], ['Admin']) && empty($_GET)) { ?>

<div style="position: absolute; top: 0; left: 100px; height: 95%; display: inline; float: left; margin: 25px 0 0 250px;" class="absolute overflow-x-auto shadow-md sm:rounded-lg">

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Dashboard Page</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Welcome to your personalized dashboard, your central hub for all things important to you. This intuitive interface provides a comprehensive overview of your key metrics, tasks, and insights, empowering you to make informed decisions and stay on top of your priorities. From monitoring your progress to accessing valuable data, your dashboard is designed to streamline your workflow and enhance your productivity. Dive in and discover the power of having everything you need at your fingertips.</p>
    </div>
    <!-- First Row -->
    <div class="flex flex-wrap -m-4 text-center">
      <!-- First Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div><h3>

<?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `users`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?>


          </h3> <p>User Registrations</p></div> <div class="icon" bis_skin_checked="1"><i class="fa fa-user-plus"></i></div> <a href="dashboard.php?users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Second Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `partners`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Partner Registrations</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-briefcase"></i></div> <a href="dashboard.php?partners" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Third Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `cities`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Service Served in City</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-city"></i></div> <a href="dashboard.php?cities" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- Second Row -->
    <div class="flex flex-wrap -m-4 text-center">
      <!-- Fourth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `posts`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Professsion Created</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-plane-departure"></i></div> <a href="dashboard.php?posts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Fifth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
        <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `categories`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Primary Profession</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-star"></i></div> <a href="dashboard.php?categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Sixth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="small-box bg-info" bis_skin_checked="1">
            <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `subcategories`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Sub Profession</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-archive"></i></div> <a href="dashboard.php?subcategories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
<?php } elseif (in_array($_SESSION['type'], ['User']) && empty($_GET))  {?>
  
<div style="position: absolute; top: 0; left: 100px; height: 95%; display: inline; float: left; margin: 25px 0 0 250px;" class="absolute overflow-x-auto shadow-md sm:rounded-lg">

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">User Dashboard Page</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Welcome to your personalized dashboard, your central hub for all things important to you. This intuitive interface provides a comprehensive overview of your key metrics, tasks, and insights, empowering you to make informed decisions and stay on top of your priorities. From monitoring your progress to accessing valuable data, your dashboard is designed to streamline your workflow and enhance your productivity. Dive in and discover the power of having everything you need at your fingertips.</p>
    </div>
    <!-- First Row -->
    <div class="flex flex-wrap -m-4 text-center">
      <!-- First Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div><h3>

<?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `users`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?>


          </h3> <p>User Registrations</p></div> <div class="icon" bis_skin_checked="1"><i class="fa fa-user-plus"></i></div> <a href="dashboard.php?users" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Second Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `partners`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Partner Registrations</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-briefcase"></i></div> <a href="dashboard.php?partners" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Third Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `cities`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Service Served in City</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-city"></i></div> <a href="dashboard.php?cities" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- Second Row -->
    <div class="flex flex-wrap -m-4 text-center">
      <!-- Fourth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `posts`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Professsion Created</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-plane-departure"></i></div> <a href="dashboard.php?posts" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Fifth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
        <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `categories`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Primary Profession</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-star"></i></div> <a href="dashboard.php?categories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Sixth Item -->
      <div class="p-4 md:w-1/3 sm:w-1/2 w-full">
        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
          <div class="small-box bg-info" bis_skin_checked="1">
            <div class="inner" bis_skin_checked="1"><h3><?php
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM `subcategories`;");

    // Fetch the count result
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $row['total']; ?></h3> <p>Sub Profession</p></div> <div class="icon" bis_skin_checked="1"><i class="fas fa-archive"></i></div> <a href="dashboard.php?subcategories" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</div>
  <?php } elseif (in_array($_SESSION['type'], ['Admin']) && isset($_GET['users'])) { ?>

<div style="position: absolute; top: 0; left: 100px; height: 95%; display: inline; float: left; margin: 25px 0 0 250px;" class="absolute overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <button class="btn btn-success px-5 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 lg:px-10 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" onclick="document.getElementById('myModal').style.display='block';">Add User<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
<?php 

$stmt = $pdo->query("SELECT `id`, `name`, `email`, `type` FROM `users`;");

while ($row = $stmt->fetch()) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $row['name'] ?>
                </th>
                <td class="px-6 py-4">
                 <?= $row['email'] ?>
                </td>
                <td class="px-6 py-4">
                  <?= $row['type'] ?>
                </td>
                <td class="px-6 py-4">
                    <!-- a href="javascript:void(0);" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="document.getElementById('myModal').style.display='block';">Edit</a --> 
                    <form class="user_edit" style="display: inline;">
                      <input type="hidden" name="user" value="edit" />
                      <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form>
                    / 
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="user" value="delete" />
                      <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>
<?php } elseif(isset($_GET['profile'])) {?>
  <div style="position: absolute; top: 0; left: 100px; height: 95%; display: inline; float: left; margin: 25px 0 0 250px; width: 45%; overflow-x:scroll;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
  <h1 style="font-weight: bold; font-size: 20pt;">My Profile</h1>
  <form action method="POST">
        <input type="hidden" name="user" value="edit" />
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>" />
<?php

$stmt = $pdo->prepare("SELECT `name`, `email`, `password` FROM `users` WHERE `id` = :user_id;");
$stmt->execute(array(
  ":user_id" => $_SESSION['user_id']
));

$row_fetch = $stmt->fetch(); ?>
        <div class="modal-body" bis_skin_checked="1">
          <div class="form-group" bis_skin_checked="1">
            <label>Name</label>  
            <input type="text" id="name" name="name" value="<?= $row_fetch['name'] ?>" placeholder="Enter Name" class="form-control"> <!---->
          </div> 
          <!-- div class="form-group" bis_skin_checked="1">
            <label>Phone</label>  
            <input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control">
          </div --> 
          <div class="form-group" bis_skin_checked="1">
            <label>Email</label>  
            <input type="text" id="email" name="email" value="<?= $row_fetch['email'] ?>" placeholder="Enter Email" class="form-control"> <!---->
          </div> 
        
          <div class="form-group" bis_skin_checked="1">
            <label>Password</label>  
            <input type="password" id="password" name="password" placeholder="Enter Password" class="form-control"> <!---->
          </div>

        </div>
        <div class="modal-footer" bis_skin_checked="1">
          <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
          <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
        </div>
      </form>  
</div>

<?php } elseif (in_array($_SESSION['type'], ['Admin', 'Partner']) && isset($_GET['partners']) || isset($_GET['create-profession'])) { ?>
 
<div style="position: absolute; top: 0; right: 60px; height: 95%; display: inline; float: right; margin: 25px 0 0 275px; width: 75%; overflow-x:scroll;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add Partner<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
<?php if ($_SESSION['type'] == 'Admin') { ?>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
<?php } ?>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Subcategory
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    About
                </th>
                <th scope="col" class="px-6 py-3">
                    Profile
                </th>
                <th scope="col" class="px-6 py-3">
                    Registered At
                </th>
                <th scope="col" class="px-6 py-3">
                    Modify
                </th>
            </tr>
        </thead>
        <tbody>
          
<?php 

$stmt = $pdo->prepare($sql = "SELECT `id`, `category_id`, `subcategory_id`, `type`, `about`, `photo`, `city_id`, `name`, `phone`, `user_id`, `created_at` FROM `partners` " . ($_SESSION['type'] == 'Partner' ? ' WHERE `user_id` = :user_id' : '') . ";");
//dd($sql);
$array = [];

if ($_SESSION['type'] == 'Partner') {
  $array = array('user_id' => $_SESSION['user_id']);
}
$stmt->execute($array);


while ($row = $stmt->fetch()) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
<?php if ($_SESSION['type'] == 'Admin') { ?>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <?= $row['id'] ?>
                </th>
<?php } ?>

                <td class="px-6 py-4">
<?php
//dd($row);
/*
$stmt = $pdo->prepare("SELECT `name` FROM `users` WHERE `id` = :user_id;");
$stmt->execute(array('user_id' => $_SESSION['user_id']));
$row_user = $stmt->fetch();
*/           
?>
<?php
//dd($row);
$stmt_user = $pdo->prepare("SELECT `name` FROM `users` WHERE `id` = :user_id;");
$stmt_user->execute(array('user_id' => $row['user_id']));
$row_user = $stmt_user->fetch();
             
?><?= $row_user['name']; ?>
                </td>
                <td class="px-6 py-4">
<?php
//dd($row);
$stmt_category = $pdo->prepare("SELECT `name` FROM `categories` WHERE `id` = :category_id;");
$stmt_category->execute(array('category_id' => $row['category_id']));
$row_category = $stmt_category->fetch();
             
?><?= $row_category['name']; ?>
                </td>
                <td class="px-6 py-4">
                <?php
//dd($row);
$stmt_subcategory = $pdo->prepare("SELECT `name` FROM `subcategories` WHERE `id` = :subcategory_id;");
$stmt_subcategory->execute(array('subcategory_id' => $row['subcategory_id']));
$row_subcategory = $stmt_subcategory->fetch();
             
?><?= $row_subcategory['name']; ?>
                </td>
                <td class="px-6 py-4">
                  <?= $row['type'] ?>
                </td>
                <td class="px-6 py-4">
                <?php
//dd($row);
$stmt_city = $pdo->prepare("SELECT `city` FROM `cities` WHERE `id` = :city_id;");
$stmt_city->execute(array('city_id' => $row['city_id']));
$row_city = $stmt_city->fetch();
             
?><?= $row_city['city']; ?>
                </td>
                <td class="px-6 py-4">
                  <?php
$phone = $row['phone'] ?? $_SESSION['phone'] ?? '';
$formattedPhone = '';

if (!is_null($phone) && $phone !== '') {
    // Format the phone number using preg_replace
    $formattedPhone = preg_replace('/(\d{3})(\d{0,3})(\d{0,3})/', '$1-$2-$3', $phone);
} ?><?= $formattedPhone ?>   
               </td>
                <td class="px-6 py-4">
                 <?= $row['about'] ?>
                </td>
                <td class="px-6 py-4">
                  <?= $row['photo'] ?>
                </td>
                <td class="px-6 py-4">
                  <?= $row['created_at'] ?>
                </td>
                <td class="px-6 py-4">
                    <!-- a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a -->

                    <form class="partner_edit" style="display: inline;">
                      <input type="hidden" name="partner" value="edit" />
                      <input type="hidden" name="partner_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form>
                    / 
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="partner" value="delete" />
                      <input type="hidden" name="partner_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>

  <?php } elseif (isset($_GET['enquiries'])) { ?>

<div style="position: absolute; top: 0; left: 100px; height: 95%; display: inline; float: left; margin: 25px 0 0 250px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
Enquiries Table<br />
<button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add Enquiry<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Profession
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Approval Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Modify
                </th>
            </tr>
        </thead>
        <tbody>
<?php 
//dd($_SESSION);
//dd(implode(',', $_SESSION['professions']));

//$stmt = $pdo->prepare("SELECT `id`, `user_id`, `email`, `phone`, `subcategory_id`, `city_id`, `address`, `approval_status` FROM `enquiries` " . ($_SESSION['type'] == 'User' ? ' WHERE `user_id` = :user_id' : ($_SESSION['type'] == 'Partner' ? ' WHERE `subcategory_id` IN (' . implode(',', $_SESSION['professions']) . ')' : '')) . ";");
//$stmt = $pdo->prepare("SELECT `id`, `user_id`, `email`, `phone`, `subcategory_id`, `city_id`, `address`, `approval_status`, `created_at`, `updated_at` FROM `enquiries` " 
//    . ($_SESSION['type'] == 'User' ? ' WHERE `user_id` = :user_id' : ($_SESSION['type'] == 'Partner' ? ' WHERE `subcategory_id` IN (' . implode(',', $_SESSION['professions']) . ')' : ''))
//    . " ORDER BY `updated_at` DESC, `created_at` DESC;");

$sql = "SELECT `id`, `user_id`, `email`, `phone`, `subcategory_id`, `city_id`, `address`, `approval_status`, `created_at`, `updated_at` FROM `enquiries`";

// Additional WHERE conditions based on session type
if ($_SESSION['type'] == 'User') {
    $whereClause = " WHERE `user_id` = :user_id";
} elseif (in_array($_SESSION['type'], ['Partner', 'Admin'])) {
    $whereClause = " WHERE `subcategory_id` IN (" . implode(',', $_SESSION['professions']) . ")  OR `user_id` = :user_id";
}

// Append ORDER BY clause
$sql .= $whereClause . " ORDER BY `updated_at` DESC, `created_at` DESC;";
//dd($sql);
$stmt = $pdo->prepare($sql);
$stmt->execute(array('user_id' => $_SESSION['user_id']));

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <?= $row['email'] ?>
                </td>
                <td class="px-6 py-4"><?php
$phone = $row['phone'] ?? $_SESSION['phone'] ?? '';
$formattedPhone = '';

if (!is_null($phone) && $phone !== '') {
    // Format the phone number using preg_replace
    $formattedPhone = preg_replace('/(\d{3})(\d{0,3})(\d{0,3})/', '$1-$2-$3', $phone);
} ?><?= $formattedPhone ?></td>
                <td class="px-6 py-4">
<?php
$stmt_subcategory = $pdo->prepare("SELECT `name` FROM `subcategories` WHERE `id` = :id;");
$stmt_subcategory->execute(array('id' => $row['subcategory_id']));
$row_subcategory = $stmt_subcategory->fetch();
             
?><?= $row_subcategory['name']; ?>
                </td>
                <td class="px-6 py-4">
<?php
//dd($row);
$stmt_city = $pdo->prepare("SELECT `city` FROM `cities` WHERE `id` = :city_id;");
$stmt_city->execute(array('city_id' => $row['city_id']));
$row_city = $stmt_city->fetch();
             
?><?= $row_city['city']; ?>
                </td>
                <td class="px-6 py-4">
                 <?= $row['address'] ?>
                </td>
                <th scope="col" class="px-6 py-3">
<?php

// Decode the JSON string as an object
$approvals = json_decode($row['approval_status'], false);

// Check if $approvals is null and initialize as an object if so
if ($approvals === null) {
    $approvals = new stdClass();  // Ensures $approvals is always an object
}

$yes = $no = 0; // Initialize counters for 'Yes' and 'No' approvals

                // Check if $approvals is not empty and iterate to count approvals
if (!empty($approvals)) {
    foreach ($approvals as $key => $approval) {
        if ($approval == 1) {
            $yes++; // Increment 'Yes' count
        } else {
            $no++; // Increment 'No' count
        }
    }
}

// Check if the user is a 'User' or 'Admin' and either modify or add their approval status
if (in_array($_SESSION['type'], ['User', 'Admin'])) {
    // If user's approval status is already present in the approvals, toggle it
    if (isset($approvals->{$_SESSION['user_id']})) {
        $approvals->{$_SESSION['user_id']} = (int)!$approvals->{$_SESSION['user_id']};
        // Adjust counts based on new value
        if ($approvals->{$_SESSION['user_id']} == 1) {
            $no--;
        } else {
            $yes--;
        }
    }

?>
                  Yes: <?= $yes ?> - No: <?= $no ?>
<?php } else { ?>
                          Status:
<form style="display: inline;"action method="POST">
                        <input type="hidden" name="enquiry" value="edit">
                        <input type="hidden" name="enquiry_id" value="<?= $row['id'] ?>">

                        <button type="submit"><?= (isset($approvals->{$_SESSION['user_id']}) ? ($approvals->{$_SESSION['user_id']} == 1 ? 'Yes': 'No') : 'Pending')?><button>
</form>
  <?php } ?>
                </th>
                <td class="px-6 py-4">
                    
                <form class="enquiry_edit" style="display: inline;">
                      <input type="hidden" name="enquiry" value="edit" />
                      <input type="hidden" name="enquiry_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form>
                    /
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="enquiry" value="delete">
                      <input type="hidden" name="enquiry_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>
<?php } elseif (in_array($_SESSION['type'], ['Admin']) && isset($_GET['cities'])) { ?>

<div style="position: absolute; top: 0; left: 300px; height: 95%; display: inline; float: left; margin: 25px 20px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add City<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    City
                </th>
                <th scope="col" class="px-6 py-3">
                    Modify
                </th>
            </tr>
        </thead>
        <tbody>
<?php 

$stmt = $pdo->query("SELECT `id`, `city`, `updated_at` FROM `cities`;");

while ($row = $stmt->fetch()) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $row['id'] ?>
                </th>
                <td class="px-6 py-4">
                 <?= $row['city'] ?>
                </td>
                <td class="px-6 py-4">
                    <form class="city_edit" style="display: inline;">
                      <input type="hidden" name="city" value="edit">
                      <input type="hidden" name="city_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form>/ 
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="city" value="delete">
                      <input type="hidden" name="city_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>

  <?php } elseif (in_array($_SESSION['type'], ['Admin']) && isset($_GET['categories'])) { ?>

<div style="position: absolute; top: 0; left: 325px; height: 95%; display: inline; float: left; margin: 25px 20px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <h1 class="text-lg md:text-xl">Primary Profession Table</h1>
    <button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add Category<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Modify
                </th>
            </tr>
        </thead>
        <tbody>
<?php 

$stmt = $pdo->query("SELECT `id`, `name` FROM `categories`;");

while ($row = $stmt->fetch()) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?= '[' . $row['id'] . '] ' . $row['name'] ?>
                </th>
                <td class="px-6 py-4">
                    <form class="category_edit" style="display: inline;">
                      <input type="hidden" name="category" value="edit">
                      <input type="hidden" name="category_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form> / 
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="category" value="delete">
                      <input type="hidden" name="category_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>

  <?php } elseif (in_array($_SESSION['type'], ['Admin']) && isset($_GET['subcategories'])) { ?>

<div style="position: absolute; top: 0; left: 325px; height: 95%; display: inline; float: left; margin: 25px 20px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <h1 class="text-lg md:text-xl">Profession Sub-Types Table</h1>
    <button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add Professional Sub-Types<i class="fas fa-user-plus fa-fw"></i></button>
</div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Modify
                </th>
            </tr>
        </thead>
        <tbody>
<?php 

$stmt = $pdo->query("SELECT `id`, `category_id`, `name` FROM `subcategories`;");

while ($row = $stmt->fetch()) { ?>

    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  <?= '[' . $row['id'] . '] ' . $row['name'] ?>
               
                </th>
                <td class="px-6 py-4">
 <?php
$stmt_category = $pdo->prepare("SELECT `name` FROM `subcategories` WHERE `id` = :id;");
$stmt_category->execute(array('id' => $row['category_id']));
$row_category = $stmt_category->fetch();
             
?><?= '[' . $row['category_id'] . '] ' . $row_category['name']; ?>
                </td>
                <td class="px-6 py-4">
                    <form class="subcategory_edit" style="display: inline;">
                      <input type="hidden" name="subcategory" value="edit">
                      <input type="hidden" name="subcategory_id" value="<?= $row['id'] ?>">
                      <button type="submit">Edit</button>
                    </form> / 
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="subcategory" value="delete">
                      <input type="hidden" name="subcategory_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>

  <?php } else { ?>

<div style="position: absolute; top: 0; left: 325px; height: 95%; display: inline; float: left; margin: 25px 20px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <h1 class="text-lg md:text-xl">404 Page Not Found</h1>
    <form action="<?= basename(APP_SELF) ?>" method="GET"><button class="btn btn-success" name="">Dashboard</button>
</div>
  
</div>

  <?php }  ?>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script  type="text/javascript" src="<?=(!defined('APP_URL_BASE') and '//' . APP_DOMAIN . APP_URL_PATH)?>javascript/jquery.inputmask.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <script type="text/javascript" src="javascript/app.js.php"></script>

  <script type="text/javascript">
<?php if (!empty($_GET) && !isset($_GET['profile'])) { ?>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
 <?php }?>
/*
 document.addEventListener('DOMContentLoaded', function() {
            var usersFeatures = document.getElementById('myModal');
            usersFeatures.style.display = 'block';
        });
*/

<?php if (isset($_GET['users'])) {  ?>
 document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('user_edit');

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission


        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'user_id') {
              console.log('User_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('user')[0].value = 'edit';
                  document.getElementsByName('user_id')[0].value = data['user_id'];
                  document.getElementById('name').value = data['name'];
                  document.getElementById('email').value = data['email'];
                  document.getElementById('type').value = data['type'];

                  const selectElement = document.getElementById('type');
                  if (selectElement.querySelector(`option[value="${data['type']}"]`)) {
                      selectElement.value = data['type'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
                }
              };

              var data = JSON.stringify({
                "user_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }

        //console.log(formData.entries());

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var type = document.getElementById('type').value;

        // Example: Do something with the form data, like logging it or appending it somewhere
        console.log("email:", email, "password:", email, "type:", type);

        // Optionally, display the result somewhere on the page
        //document.getElementById('result').innerText = 'Form submitted with Username: ' + username + ' and Email: ' + email;

        // If needed, send the data to a server via AJAX
        // sendData(username, email);
    });
  }
});
<?php } elseif (isset($_GET['enquiries'])) { ?>
  document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('enquiry_edit');

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission


        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'enquiry_id') {
              console.log('enquiry_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';

              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('enquiry')[0].value = 'edit';
                  document.getElementsByName('enquiry_id')[0].value = data['enquiry_id'];
 
                  var selectElement = document.getElementById('subcategory');
                  if (selectElement.querySelector(`option[value="${data['subcategory_id']}"]`)) {
                      selectElement.value = data['subcategory_id'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
                  

                  //document.getElementsByName('category')[0].value = data['category']; // $_POST['name'],
                  document.getElementsByName('name')[0].value = data['name'];  // $_POST['phone'],
                  document.getElementsByName('email')[0].value = data['email'];  // $_POST['phone'],
                  //document.getElementsByName('type')[0].value = data['type'];  // $_POST['user_id'].
                  document.getElementsByName('phone')[0].value = data['phone']; // $_POST['city']
                  document.getElementsByName('address')[0].value = data['address']; // $_POST['city']
                  document.getElementsByName('city')[0].value = data['city_id']; // $_POST['city']
                  document.getElementsByName('description')[0].value = data['description'];  // $_POST['about']

                  /* selectElement = document.getElementById('type');
                  if (selectElement.querySelector(`option[value="${data['type']}"]`)) {
                      selectElement.value = data['type'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  } */
                }
              };

              var data = JSON.stringify({
                "enquiry_id": `${value}`
              });
              
              xhr.send(data);

              return;
            }
          }

        // Optionally, display the result somewhere on the page
        //document.getElementById('result').innerText = 'Form submitted with Username: ' + username + ' and Email: ' + email;

        // If needed, send the data to a server via AJAX
        // sendData(username, email);
    });
  }
});
<?php } elseif (isset($_GET['partners']) || isset($_GET['skills'])) { ?>
 document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('partner_edit');

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission


        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'partner_id') {
              console.log('partner_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('partner')[0].value = 'edit';
                  document.getElementsByName('partner_id')[0].value = data['partner_id'];
 
                  var selectElement = document.getElementById('category');
<?php if (isset($_GET['category'])) { ?>

                  if (selectElement.querySelector(`option[value="${data['category_id']}"]`)) {
                      selectElement.value = data['category_id'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
<?php } else { ?> selectElement.value = data['category_id']; <?php } ?>
 
                  
                  selectElement = document.getElementById('subcategory');
                  if (selectElement.querySelector(`option[value="${data['subcategory_id']}"]`)) {
                      selectElement.value = data['subcategory_id'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
                  

                  //document.getElementsByName('category')[0].value = data['category']; // $_POST['name'],
                  //document.getElementsByName('name')[0].value = data['name'];  // $_POST['phone'],
                  document.getElementsByName('type')[0].value = data['type'];  // $_POST['user_id'].
                  document.getElementsByName('city_id')[0].value = data['city_id']; // $_POST['city']
                  document.getElementsByName('phone')[0].value = data['phone']; // $_POST['city']
                  document.getElementsByName('user_id')[0].value = data['user_id']; // $_POST['city']
                  document.getElementsByName('about')[0].value = data['about'];  // $_POST['about']

                  /* selectElement = document.getElementById('type');
                  if (selectElement.querySelector(`option[value="${data['type']}"]`)) {
                      selectElement.value = data['type'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  } */
                }
              };

              var data = JSON.stringify({
                "partner_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }

        //console.log(formData.entries());

        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var type = document.getElementById('type').value;

        // Example: Do something with the form data, like logging it or appending it somewhere
        console.log("email:", email, "password:", email, "type:", type);

        // Optionally, display the result somewhere on the page
        //document.getElementById('result').innerText = 'Form submitted with Username: ' + username + ' and Email: ' + email;

        // If needed, send the data to a server via AJAX
        // sendData(username, email);
    });
  }
});
<?php } elseif (isset($_GET['cities'])) { ?>
 document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('city_edit');

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'city_id') {
              console.log('city_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('city')[0].value = 'edit';
                  document.getElementsByName('city_id')[0].value = data['city_id'];
                  document.getElementById('city_name').value = data['city'];
                }
              };

              var data = JSON.stringify({
                "city_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }
    });
  }
});
<?php } elseif (isset($_GET['create-profession'])) { ?>
  

  document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('partner_edit');
console.log('testing 123');
    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission


        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'partner_id') {
              console.log('partner_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "index.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('partner')[0].value = 'edit';
                  document.getElementsByName('partner_id')[0].value = data['partner_id'];

                  var selectElement = document.getElementById('category');
                  if (selectElement.querySelector(`option[value="${data['category']}"]`)) {
                      selectElement.value = data['category'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
                   selectElement = document.getElementById('subcategory');
                  if (selectElement.querySelector(`option[value="${data['subcategory']}"]`)) {
                      selectElement.value = data['subcategory'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  }
                  
                  
                  
/*
                  selectElement = document.getElementById('category');
                  if (selectElement.querySelector(`option[value="${data['category']}"]`)) {
                      selectElement.value = data['category'];
                  } else {
                      console.error('The specified value does not exist in the options');
                  } // $_POST['category'],
*/

                  //document.getElementsByName('category')[0].value = data['category']; // $_POST['name'],
                  //document.getElementsByName('name')[0].value = data['name']; // $_POST['name'],
                  //document.getElementsByName('phone')[0].value = data['phone'];  // $_POST['phone'],
                  //document.getElementsByName('user_id')[0].value = data['user_id'];  // $_POST['user_id'].
                  document.getElementsByName('city')[0].value = data['city']; // $_POST['city']
                  document.getElementsByName('address')[0].value = data['address']; // $_POST['city']
                  document.getElementsByName('about')[0].value = data['about'];  // $_POST['about']
                  //document.getElementsByName('name')[0].value = data['name']; //$_POST['name']

                }
              };

              var data = JSON.stringify({
                "partner_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }

        // Optionally, display the result somewhere on the page
        //document.getElementById('result').innerText = 'Form submitted with Username: ' + username + ' and Email: ' + email;

        // If needed, send the data to a server via AJAX
        // sendData(username, email);
    });
  }
});
  
<?php } elseif (isset($_GET['categories'])) { ?>
 document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('category_edit'); // city_edit

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'category_id') {
              console.log('category_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('category')[0].value = 'edit';
                  document.getElementsByName('category_id')[0].value = data['category_id'];
                  document.getElementById('name').value = data['name'];
                }
              };

              var data = JSON.stringify({
                "category_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }
    });
  }
});
<?php } elseif (isset($_GET['subcategories'])) { ?>
 document.addEventListener('DOMContentLoaded', function () {
    var forms = document.getElementsByClassName('subcategory_edit');

    for (var i = 0; i < forms.length; i++) {

    forms[i].addEventListener('submit', function(event) {
      
        event.preventDefault(); // Prevent the default form submission

        const formData = new FormData(this);
        //let dataToShow = '';

        // Loop through the entries of the form data.
        for (let [key, value] of formData.entries()) {
            //dataToShow += `${key}: ${value}<br>`; // Append each key-value pair to a string

            if (`${key}` == 'subcategory_id') {
              console.log('subcategory_id: ' + `${value}` ); 
              document.getElementById('myModal').style.display = 'block';


              var xhr = new XMLHttpRequest();
              var url = "dashboard.php"; // Replace with your endpoint URL
              xhr.open("POST", url, true);
              xhr.setRequestHeader("Content-Type", "application/json");

              xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                  //console.log('what is tyhis' + xhr.responseText.split(',')[1] ); // Handle the response data here
                  var data = JSON.parse(xhr.responseText);
                  console.log(data);
                  document.getElementsByName('subcategory')[0].value = 'edit';
                  document.getElementsByName('subcategory_id')[0].value = data['subcategory_id'];
                  document.getElementById('name').value = data['name'];
                }
              };

              var data = JSON.stringify({
                "subcategory_id": `${value}`
              });
              
              xhr.send(data);

              return; }
            }
    });
  }
});
<?php } ?>

/*
document.addEventListener("DOMContentLoaded", function() {
    var btn = document.getElementById('hide-show_users_btn');
    var userFeature = document.getElementById('hide-show_users');

    btn.addEventListener('click', function() {
      console.log('clicked');
      if (userFeature.style.display == 'none') {
         userFeature.slideDown( "slow", function() {
          // Animation complete.
          });
          console.log('slide down');
        } else {
          userFeature.slideUp( "slow", function() {
          // Animation complete.
          });
          console.log('slide up');
        }
    });
});
*/

      $(document).ready(function(){
        // console.log('test');
/*
        jQuery('input[name="phone"]').inputmask({
    "mask": "(999) 999-9999",
    removeMaskOnSubmit: true,
    onUnMask: function(maskedValue, unmaskedValue) {
      newvalue = unmaskedValue.replace(/(\d{3})(\d{0,3})(\d{0,3})/, function(match, p1, p2, p3) {
        return p1 + "-" + p2 + "-" + p3;
      });
      return unmaskedValue.replace(/(\d{3})(\d{0,3})(\d{0,3})/, function(match, p1, p2, p3) {
        return p1 + p2 + p3;
      });;
    }
  });
  */     $('#hide-show_users_btn').click(function() {
          console.log('pressed');

          if ($('#hide-show_users').css('display') == 'none') {
            $('#hide-show_users').slideDown( "slow", function() {
          // Animation complete.
            });
          } else {
            $('#hide-show_users').slideUp( "slow", function() {
          // Animation complete.
            });
          }
        });

        $('#hide-show_partners_btn').click(function() {
          console.log('pressed');

          if ($('#hide-show_partners').css('display') == 'none') {
            $('#hide-show_partners').slideDown( "slow", function() {
          // Animation complete.
            });
          } else {
            $('#hide-show_partners').slideUp( "slow", function() {
          // Animation complete.
            });
          }
        });


        $('#hide-show_profession_btn').click(function() {
          console.log('pressed');

          if ($('#hide-show_profession').css('display') == 'none') {
            $('#hide-show_profession').slideDown( "slow", function() {
          // Animation complete.
            });
          } else {
            $('#hide-show_profession').slideUp( "slow", function() {
          // Animation complete.
            });
          }
        });

        });
  </script>

</body>

</html>

<?php

////} else {

 // die(header('Location: index.php'));
  /*
//die(var_dump($_SESSION));
    $stmt = $pdo->prepare("SELECT `id`, `name`, `email`, `type` FROM `users` WHERE `id` = :user_id;");
      $stmt->execute(array(
        ":user_id" => $_SESSION['user_id']
      ));
      $row_fetch = $stmt->fetch();
      $_SESSION = ['user_id' => (int) $row_fetch['id'], 'name' => $row_fetch['name'], 'email' => $row_fetch['email'], 'type' => (int) $row_fetch['type']];
*/
//}

// session_destroy();



// die(var_dump($_SESSION));
?>
