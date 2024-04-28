<?php
require_once('../config/config.php');

//$_SESSION['user_id'] = 1;


if (isset($_GET['logout']) && session_status() != PHP_SESSION_NONE) :
  $_SESSION = [];
  session_destroy();
endif;


switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
    if (isset($_POST['delete_user'])) {
      $stmt = $pdo->prepare("DELETE FROM `users` WHERE `users`.`id` = :user_id;");
      $stmt->execute(array(
        ":user_id" => $_POST['user_id']
      ));
    } elseif (isset($_POST['add_user'])) {
      $stmt = $pdo->prepare("SELECT `id`, `email`, `password` FROM `users` WHERE `email` = :email;");

      $stmt = $pdo->prepare("INSERT INTO users (`name`, `email`, `password`, `type`) VALUES (?, ?, ?, ?)");
      $stmt->execute(array(
        $_POST['name'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_DEFAULT),
        $_POST['type']
      ));
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

?>


<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="css/styles.css">

  <style type="text/css">
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

<div id="myModal" class="modal" style="display: none;">
<div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1"><div class="modal-header" bis_skin_checked="1">
      <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>
      <span id="addNewLabel" class="modal-title" style="">Add New User</span>
      <h5 id="addNewLabel" class="modal-title" style="display: none;">Update User's info</h5>

    </div>
    <form action method="POST">
      <input type="hidden" name="add_user" />
      <div class="modal-body" bis_skin_checked="1">
        <div class="form-group" bis_skin_checked="1"><input type="text" name="name" placeholder="Enter Name" class="form-control"> <!----></div> 
        <div class="form-group" bis_skin_checked="1"><input type="text" name="email" placeholder="Enter Email" class="form-control"> <!----></div> 
        <div class="form-group" bis_skin_checked="1"><input type="password" name="password" placeholder="Enter Password" class="form-control"> <!----></div>
        <div class="form-group" bis_skin_checked="1">
        <select name="type" id="type" placeholder="User Type" class="form-control">
          <option value="">Select User Role</option>
          <option>Admin</option>
          <option>User</option>
          <option>Author</option>
        </select> <!----></div></div>
        <div class="modal-footer" bis_skin_checked="1">
          <button type="button" data-dismiss="modal" class="btn btn-danger">Close</button>
          <button type="submit" class="btn btn-primary" style="float: right;">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if (!isset($_SESSION['user_id']) && !is_int($_SESSION['user_id'])) { ?>

    <div id="login-pop-up" style="position:fixed; display: none; width: 400px; border: 1px solid #000; z-index: 1; left: 38%; right:50%;">


      <div class="max-w-md w-full border py-8 px-6 rounded border-gray-300 bg-white">

        <span class="text-md font-semibold text-lg" style="float: right;">[<a href="javascript:void(0)" onclick="document.getElementById('login-pop-up').style.display = 'none';">x</a>]</span>
        <a href="javascript:void(0)"><img src="https://readymadeui.com/readymadeui.svg" alt="logo" class='w-40 mb-10' />
        </a>

        <h2 class="text-center text-3xl font-extrabold">
          Log in to your account
        </h2>
        <form action="login.php" method="POST" class="mt-10 space-y-4">
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
              <a href="jajvascript:void(0);" class="text-sm text-blue-600 hover:text-blue-500">
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
    <div style="display: inline; float: left; margin-top: 50px;" class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 h-[calc(100vh-2rem)] w-full max-w-[20rem] p-4 shadow-xl shadow-blue-gray-900/5">
      <!-- div class="mb-2 p-4">
        <h5 class="block antialiased tracking-normal font-sans text-xl font-semibold leading-snug text-gray-900">Material Tailwind</h5>
      </div -->
      <nav class="flex flex-col gap-1 min-w-[240px] p-2 font-sans text-base font-normal text-gray-700">
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-gray-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
            </svg>
          </div>
          <a href="dashboard.php">Dashboard</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="dashboard.php?users">Users</a>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M6.912 3a3 3 0 00-2.868 2.118l-2.411 7.838a3 3 0 00-.133.882V18a3 3 0 003 3h15a3 3 0 003-3v-4.162c0-.299-.045-.596-.133-.882l-2.412-7.838A3 3 0 0017.088 3H6.912zm13.823 9.75l-2.213-7.191A1.5 1.5 0 0017.088 4.5H6.912a1.5 1.5 0 00-1.434 1.059L3.265 12.75H6.11a3 3 0 012.684 1.658l.256.513a1.5 1.5 0 001.342.829h3.218a1.5 1.5 0 001.342-.83l.256-.512a3 3 0 012.684-1.658h2.844z" clip-rule="evenodd"></path>
            </svg>
          </div>Example Pages <div class="grid place-items-center ml-auto justify-self-end">
            <div class="relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none bg-blue-500/20 text-blue-900 py-1 px-2 text-xs rounded-full" style="opacity: 1;">
              <span class="">14</span>
            </div>
          </div>
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
            </svg>
          </div>Profile
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 00-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 00-2.282.819l-.922 1.597a1.875 1.875 0 00.432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 000 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 00-.432 2.385l.922 1.597a1.875 1.875 0 002.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 002.28-.819l.923-1.597a1.875 1.875 0 00-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 000-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 00-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 00-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 00-1.85-1.567h-1.843zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" clip-rule="evenodd"></path>
            </svg>
          </div>Settings
        </div>
        <div role="button" tabindex="0" class="flex items-center w-full p-3 rounded-lg text-start leading-tight transition-all hover:bg-blue-50 hover:bg-opacity-80 focus:bg-blue-50 focus:bg-opacity-80 active:bg-blue-50 active:bg-opacity-80 hover:text-blue-900 focus:text-blue-900 active:text-blue-900 outline-none">
          <div class="grid place-items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
              <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd"></path>
            </svg>
          </div><a href="?logout">Log Out</a>
        </div>
      </nav>
    </div>
<?php if (isset($_GET['users'])) { ?>

<div style="display: inline; float: left; margin-top: 100px; width: 1000px;" class="relative overflow-x-auto shadow-md sm:rounded-lg">  
<div class="box-tools" bis_skin_checked="1">
    <button class="btn btn-success" onclick="document.getElementById('myModal').style.display='block';">Add User<i class="fas fa-user-plus fa-fw"></i></button>
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
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> / 
                    
                    <form action method="POST" style="display: inline;">
                      <input type="hidden" name="delete_user">
                      <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                      <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>

<?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>


  <script type="text/javascript">

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

  </script>
  <script type="text/javascript" src="javascript/app.js.php"></script>
</body>

</html>

<?php

} else {

  die(header('Location: index.php'));
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
