<?php include('../config/config.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Service Site</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <base href="<?= APP_URL_BASE ?>">
    

    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style type="text/css">
        
#show_error_notice {
    width: 300px;
    background-color: #f0f0f0; /* Light grey background */
    border: 2px solid #3498db; /* Solid blue border */
    box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.5); /* x-offset, y-offset, blur-radius, color */
    padding: 5px;
    text-align: center;
     /* line-height: 160px;Center text vertically */
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
    display: none; /* Hidden by default */
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
<body class="bg-gray-100">

<?php require_once('nav_bar.php'); ?>


<?php

if (isset($_GET['page']) && $_GET['page'] != '') {     
    $stmt = $pdo->prepare("SELECT `category`, `subcategory`, `city`, `about`, `photo1` FROM `posts` WHERE `slug` = :page_slug;");
  $stmt->execute(array(':page_slug' => $_GET['page']));
  $row_fetch = $stmt->fetch();


  if (empty($row_fetch)) unset($row_fetch);
?> 


<?php } ?>

<?php if (!empty($_SESSION)) { ?>
<div id="myModal" class="modal" style="border: 1px solid #000;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="modal-content" bis_skin_checked="1">
      <div class="modal-header" bis_skin_checked="1">
        <button id="myBtn" type="button" data-dismiss="modal" aria-label="Close" class="close" style="float: right;"><span aria-hidden="true">×</span></button>

      </div>
      <form action method="POST">
        <input type="hidden" name="enquiry" value="add" />
        <input type="hidden" name="enquiry_id" />
        <div class="modal-body" bis_skin_checked="1">

        <span class="text-center">Need Professional Help?</span>
        <div class="form-group" bis_skin_checked="1">

        
        <?php
if (!empty($_SESSION)) {

$stmt = $pdo->prepare("SELECT * FROM `users` WHERE id = :user_id;");
$stmt->execute(array(
  ':user_id' => $_SESSION['user_id']
));
$row_fetch_user = $stmt->fetch();
}

?> 
        <!----></div>
        <label>Profession</label>
        <div class="form-group" bis_skin_checked="1">
          <select name="subcategory" class="form-control">
          <?php
$stmt = $pdo->prepare("SELECT `id`, `name` FROM `subcategories`;");
  $stmt->execute(array());
  
while ($row_fetch_subcategory = $stmt->fetch()) { ?>
            <option value="<?= $row_fetch_subcategory['id'] ?>"><?= $row_fetch_subcategory['name'] ?></option>
<?php } ?>

</select> <!----></div>
        <label>Name</label>
        <div class="form-group" bis_skin_checked="1"><input type="hidden" name="user_id" value="<?= $row_fetch_user['id']; ?>"><input type="text" id="name" name="name" value="<?= $row_fetch_user['name']; ?>" placeholder="Enter Name" class="form-control"> <!----></div> 
         
        <label>Email</label>
        <div class="form-group" bis_skin_checked="1"><input type="text" id="email" name="email" value="<?= $row_fetch_user['email']; ?>" placeholder="Enter Email" class="form-control"> <!----></div> 
         
        <label>Phone</label>
        <div class="form-group" bis_skin_checked="1"><input type="text" id="phone" name="phone" value="<?= $row_fetch_user['phone']; ?>" placeholder="Enter Phone" class="form-control"> <!----></div>

        <label>Address</label>
        <div class="form-group" bis_skin_checked="1"><textarea id="address" name="address" placeholder="Enter Address" class="form-control"><?= $row_fetch_user['address']; ?></textarea> <!----></div> 

        <label>City</label>
        <div class="form-group" bis_skin_checked="1">
          <select name="city_id" class="form-control">
          <?php
$stmt = $pdo->prepare("SELECT `id`, `city` FROM `cities`;");
  $stmt->execute(array());
  
while ($row_fetch_city = $stmt->fetch()) { ?>
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

<?php if (!isset($_SESSION['user_id']) || !is_int( $_SESSION['user_id'] ) ) { ?>
<div style="margin: 100px auto;">
<h1>Please Login/ Sign Up to Continuel</h1>
<button onclick="document.getElementById('login-pop-up').style.display = 'block';">Login / Sign Up</button>
</div>

<?php }
} ?>


<!-- Main hero section -->
<section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('<?= (isset($row_fetch['photo1']) ? 'img/profession/' . $row_fetch['photo1'] : 'https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80') ?>'); height: 350px;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative max-w-5xl mx-auto h-full flex items-center pl-8">
        <h1 class="text-cyan-300 text-3xl font-bold"><?= (isset($row_fetch['category']) ? $row_fetch['category'] : 'Let us find your Forever Home.') ?></h1>
    </div>
</section>

<!-- Container for content -->
<div class="w-full h-64 bg-white p-8 shadow-lg flex flex-col justify-center items-center font-roboto">
  <div class="text-left mx-auto text-black"> <!-- Added text-white class -->
    <h2 class="text-3xl mb-4"><?= (isset($row_fetch['category']) ? $row_fetch['category'] : 'Heading') ?></h2>
    <div style=" font-size: 1.475rem;" class="text-black"><?= (isset($row_fetch['about']) ? $row_fetch['about'] : 'Heading Description') ?></div>
  </div>
</div>

<!-- Steps  -->
<section class="bg-center" style="position:relative; background-image: url('img/ssbg.jpg'); background-repeat:no-repeat; padding: 100px; margin: 0 auto; width: auto;">
  <div class="mx-auto flex justify-center" style="display: flex; width: 100%;">
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Step 1</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Tell us what you need</h1>
        <p class="text text-gray-500 leading-6">Share your contact details & post your enquiry</p>
      </div>
    </div>
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Step 2</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Review interested businesses</h1>
        <p class="text text-gray-500 leading-6">Let them reach out by phone, email or direct message</p>
      </div>
    </div>
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Step 3</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Choose your professional</h1>
        <p class="text text-gray-500 leading-6">Compare reviews & book your favourite service</p>
      </div>
    </div>
  </div>
  <div style="margin: 10px auto 0 auto; width: 100%;">
  <div class="flex justify-center" style="padding: 25px;">
<?php if (empty($_SESSION)) { ?> 
    <form action="<?= APP_URL_BASE ?>" method="GET">
    <input type="hidden" name="login">
    <button type="submit" class="px-5 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 lg:px-10 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Post Enquiry</button>
</form><?php } else { ?>

  <button type="submit" class="px-5 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 lg:px-10 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" onclick="document.getElementById('myModal').style.display = 'block';">Post Enquiry</button>

<?php } ?>
  </div>
</div>
</section>

<!-- Service cards section -->
<div class="services-container mx-auto mt-8 px-4">
    <h1 class="text-2xl font-bold text-gray-900 mb-4">What plumbing service do I need?</h1>
    <div class="grid grid-cols-3 gap-4">
        <!-- Card 1 -->
        <div class="service-card bg-white p-4 shadow-md rounded-lg">
            <h2 class="text-xl font-semibold text-gray-800">1. New installations</h2>
            <p class="text-gray-600">When upgrading your property, always hire an expert plumber to install bathroom fittings, dishwashers and washing machines, and central heating systems. Use a plumber for anything you need to channel water around your property, and avoid future headaches.</p>
        </div>
        <!-- Card 2 -->
        <div class="service-card bg-white p-4 shadow-md rounded-lg">
            <h2 class="text-xl font-semibold text-gray-800">2. Plumbing repairs</h2>
            <p class="text-gray-600">Plumbers fix faulty plumbing systems to get your home back up and running. Common requests include clogged drains, dripping taps, and weak water pressure – but that’s just a sample of the many issues you might face. Enquiries on Yell get you a tailored solution to your current problem.</p>
        </div>
        <!-- Card 3 -->
        <div class="service-card bg-white p-4 shadow-md rounded-lg">
            <h2 class="text-xl font-semibold text-gray-800">3. Emergency plumber</h2>
            <p class="text-gray-600">Plumbing emergencies must be dealt with immediately. For situations like burst pipes and sewage backups, you’ll need an emergency plumber right away. This 24-hour service comes at a premium, but it’s worth the added expense to avoid severe property damage and further upheaval.</p>
        </div>
    </div>
</div>





<?php require_once('footer.php'); ?>
<script type="text/javascript">

//document.getElementById('myModal').style.display='block';
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
</body>
</html>
