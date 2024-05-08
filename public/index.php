<?php include('../config/config.php');

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <base href="<?= APP_URL_BASE ?>">

    <link rel="stylesheet" href="css/styles.css">


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
      /*overflow-x: hidden;*/
      font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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


nav {
            position: absolute;
            display: block;
            width: 100vw;
            /* 100% */
            z-index: 1;
            background-color: black;
        }

a:hover {

  color: blue;
}

.trending-categories {
  text-align: center;
  background: #f5f5f5; /* Replace with your desired background color */
  padding: 50px 0; /* Adjust the padding to your preference */
}

.trending-categories h2 {
  font-size: 24px; /* Adjust the size as needed */
  margin-bottom: 15px; /* Gives space under the title */
}

.trending-categories p {
  margin-bottom: 30px; /* Space between text and category items */
}

.categories-container {
  display: flex;
  justify-content: space-around;
  flex-wrap: wrap;
}

.category {
  width: 200px; /* Width of each category */
  margin-bottom: 20px; /* Space between rows of categories */
}

.category h3 {
  font-size: 20px; /* Adjust to match your design */
}

.category p {
  font-size: 16px; /* Adjust to match your design */
  margin-bottom: 10px; /* Space between text and the button */
}


.text-container {
    font-family: 'Helvetica Neue', sans-serif; /* Replace with the specific font-family */
    font-size: 24px;
    letter-spacing: 2px; /* Adjust as needed */
    text-align: center;
    overflow: hidden;
  }
  .text-change {
    display: inline-block;
    color: #007bff; /* Replace with the exact color code from your image */
    font-weight: bold;
    position: relative;
    top: 20px;
    opacity: 0;
  }
  .text-change.enter {
    animation: enter 0.5s forwards;
  }
  .text-change.exit {
    animation: exit 0.5s forwards;
  }
  @keyframes enter {
    0% { top: 20px; opacity: 0; }
    100% { top: 0; opacity: 1; }
  }
  @keyframes exit {
    0% { top: 0; opacity: 1; }
    100% { top: -20px; opacity: 0; }
  }

        nav {
            display: block;
            width: 100%;
            background-color: white;
        }

        #content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            text-align: center; /* Center the text horizontally */
        }

        #login-prompt-container {
            padding: 2em;
            margin: 0 auto; /* Center the prompt container horizontally */
            max-width: 600px; /* Max width for the container */
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
        }

        .login-signup-btn {
            background-color: #0ccdf0;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1em;
            margin-top: 20px;
        }

        footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            width: 100%;
        }

.reviews-section {
  display: flex;
  justify-content: space-around; /* Or use 'space-between' depending on your layout */
  align-items: center;
  background-color: #f7f7f7; /* Your desired background color */
  padding: 50px 0;
}

.review-item {
  text-align: center;
  max-width: 300px; /* Adjust width as per your design */
}

.review-item .icon {
  margin-bottom: 20px; /* Space between icon and text */
}

.rating-text {
  font-size: 1.5em;
  color: #333; /* Your desired text color */
}

.rating-text .rating-number {
  color: #007bff; /* Your desired rating number color */
  font-weight: bold;
}

.reviews-count {
  color: #333; /* Your desired review count color */
  font-weight: bold;
  text-decoration: underline; /* If you want underline */
}

.saving-text {
  font-size: 1.5em;
  color: #333; /* Your desired text color */
  font-weight: bold;
}

.saving-detail {
  color: #333; /* Your desired detail text color */
  text-decoration: underline; /* If you want underline */
}

button {
  background-color: #0ccdf0; /* Button background color */
  color: white; /* Button text color */
  border: none;
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #09b1c5; /* Button hover state color */
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

<body>
<?php require_once('nav_bar.php'); ?>
<!-- Home Hero -->


<?php if (isset($errors['DATABASE'])) { ?>
  

  <div id="database-error" class="modal" bis_skin_checked="1" style="display: block;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="relative modal-content" style="height: 550px;" bis_skin_checked="1">
    
    <span class="text-md font-semibold text-lg" style="float: right;">[<a href="javascript:void(0)" onclick="document.getElementById('database-error').style.display = 'none';">x</a>]</span>
    <a href="javascript:void(0)"><img src="img/logo2.png" alt="logo" class='w-40 mb-10' /></a>
    <p class="text-center text-3xl font-extrabold"><?= $errors['DATABASE'] ?></p>
    <p>With out this connection, the web appliocaiton can not operate, and no information can move in or out.</p>
    </div>
  </div>
</div>

  <?php } ?>

<?php if (!isset($_SESSION['user_id'])) { ?>


  <div id="login-pop-up" class="modal" bis_skin_checked="1" style="display: <?= (isset($_GET['login']) ? 'block' : 'none' ) ?>;">
  <div role="document" class="modal-dialog modal-dialog-centered" bis_skin_checked="1">
    <div class="relative modal-content" style="height: 550px;" bis_skin_checked="1">
    
    <span class="text-md font-semibold text-lg" style="float: right;">[<a href="javascript:void(0)" onclick="document.getElementById('login-pop-up').style.display = 'none';">x</a>]</span>
    <a href="javascript:void(0)"><img src="img/logo2.png" alt="logo" class='w-40 mb-10' /></a>
    
    <div id="register_view" style="position: absolute; left: 15%; background-color: white; width: 400px; margin: 0 auto; height: 350px; display: none;">
      <form action method="POST">
        <input type="hidden" name="register" value="add">
        <div class="space-y-6">
          <div>
            <label class="text-sm mb-2 block">Name</label>
            <input name="name" type="text" class="bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter name" />
          </div>
          <div>
            <label class="text-sm mb-2 block">Email</label>
            <input name="email" type="text" class="bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter email" />
          </div>
          <div>
            <label class="text-sm mb-2 block">Password</label>
            <input name="password" type="password" class="bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" placeholder="Enter password" />
          </div>
          <div>
            <label class="text-sm mb-2 block">Type</label>
            <input name="checkbox" type="partner" class="bg-white border border-gray-300 w-full text-sm px-4 py-3 rounded-md outline-blue-500" />
          </div>
        </div>
        <div class="!mt-10">
          <button type="submit" class="w-full py-3 px-4 text-sm font-semibold rounded text-white bg-blue-500 hover:bg-blue-600 focus:outline-none">
            Create an account
          </button>
        </div>
        <p class="text-sm mt-6 text-center">Already have an account? <a href="javascript:void(0);" onclick="toggleViews();" class="text-blue-600 font-semibold hover:underline ml-1">Login here</a></p>
      </form>
    </div>
    
    <div id="login_view" style="position: absolute; left: 15%; background-color: white; height: 400px; width: 400px; margin: 0 auto;">
      <h2 class="text-center text-3xl font-extrabold">Log in to your account</h2>
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
            <label for="remember-me" class="ml-3 block text-sm">Remember me</label>
          </div>
          <div>
            <a href="javascript:void(0);" class="text-sm text-blue-600 hover:text-blue-500">Forgot Password?</a>
          </div>
        </div>
        <div class="!mt-5">
          <button type="submit" class="w-full py-2.5 px-4 text-sm rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Log in</button>
        </div>
      </form>
      <div class="!mt-5">
        <button type="button" onclick="toggleViews();" class="w-full py-2.5 px-4 text-sm rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Register</button>
      </div>
    </div>
    
    </div>
  </div>
</div>

<script>
function toggleViews() {
  var loginView = document.getElementById('login_view');
  var registerView = document.getElementById('register_view');
  if (loginView.style.display === 'none') {
    loginView.style.display = 'block';
    registerView.style.display = 'none';
  } else {
    loginView.style.display = 'none';
    registerView.style.display = 'block';
  }
}
</script>


<?php } ?>

<!-- Saparate Pages-->

<?php

if (isset($_GET['page']) && !empty($_GET['page'])) { ?>

  <div style="height: 500px; margin-top: 75px;">
    First page of many 
  </div>
  
  <?php } elseif (isset($_GET['create-invitation'])) { ?>

<div style="height: 500px; margin-top: 75px;">
  First page of many 
</div>

<?php } else { ?>



  <section
  class="relative bg-[url(https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80)] bg-cover bg-center bg-no-repeat"
  style="height: 700px; position: relative; margin-top: 0;"
>
  <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0, 0, 0, 0.7);"></div>
  <div
    style="position: absolute; width: 100%; max-width: 1280px; height: 100%; display: flex; flex-direction: column; justify-content: center; padding-left: 32px; margin: auto;"
  >
    <h1 style="color: #0ccdf0; font-size: 3rem; font-weight: bold; margin: 0;">
      Let us find your Forever Home.
    </h1>
    <p style="color: white; font-size: 1rem; margin: 20px 0;">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
      numquam ea!
    </p>
    <div style="display: flex; gap: 20px;">
      <a
        href="#"
        style="display: block; background-color: #0ccdf0; padding: 12px 24px; color: white; border-radius: 8px; text-decoration: none;"
      >
        Get Started
      </a>
      <a
        href="#"
        style="display: block; background-color: white; padding: 12px 24px; color: #0ccdf0; border-radius: 8px; text-decoration: none;"
      >
        Learn More
      </a>
    </div>
  </div>
</section>

<!-- Service category options -->
<section class="trending-categories">

  <h2>Trending Categories</h2>
  <p>Easily find, connect with, and buy from great businesses near you</p>
  <div class="categories-container">
    <!-- Category 1 -->
    <div class="category">
      <div class="icon"></div>
      <img src="img/plumber.png" alt="Handyman Icon" />
      <h3>Plumbers</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <button>Discover</button>
    </div>
    <div class="category">
      <img src="img/electrician.png" alt="Handyman Icon" />
      <h3>Electriveans</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <button>Discover</button>
    </div>
    <div class="category">
      <img src="img/technician1.png" alt="Handyman Icon" />
      <h3>Painters</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <button>Discover</button>
    </div>
    <div class="category">
      <img src="img/technician.png" alt="Handyman Icon" />
      <h3>Handyman</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <button>Discover</button>
    </div>
  </div>
</section>

<!-- Section Below -->
<section>
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-16">
      <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:order-last lg:h-full">
        <img
          alt=""
          src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
          class="absolute inset-0 h-full w-full object-cover"
        />
      </div>

      <div class="lg:py-24">
        <h2 class="text-3xl font-bold sm:text-4xl">Grow your audience</h2>

        <p class="mt-4 text-gray-600">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut qui hic atque tenetur quis
          eius quos ea neque sunt, accusantium soluta minus veniam tempora deserunt? Molestiae eius
          quidem quam repellat.
        </p>

        <a
          href="#"
          class="mt-8 inline-block rounded bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-yellow-400"
        >
          Get Started Today
        </a>
      </div>
    </div>
  </div>
</section>
<!-- changing text -->

<section id="dynamic-text-section">
  <div class="text-container">
    We've done the <span class="text-change">reference checks</span> so you don't have to
  </div>
</section>

  <section class="reviews-section">
  <div class="review-item">
    <img src="path-to-your-icon.png" alt="Happy face icon" class="icon" />
    <p class="rating-text">Our pros are rated <span class="rating-number">4.6 ★</span> on average from over</p>
    <p class="reviews-count">85 000 Reviews</p>
  </div>

  <div class="review-item">
    <img src="path-to-your-icon.png" alt="Wallet icon" class="icon" />
    <p class="saving-text">Put money back in your pocket.</p>
    <p class="saving-detail">Kandua customers use small businesses and pay 30% less on average.</p>
  </div>
</section>

<!-- testimonial  -->

<!-- FOOTER -->

<?php } ?>

<div  style="position: relative;">
<?php require_once('footer.php'); ?>

</div>

<script>
  const phrases = ["background checks", "quality checks", "skill assessments", "interviews"];
  let currentPhraseIndex = 0;
  const textChangeElement = document.querySelector('.text-change');

  function updateText() {
    textChangeElement.classList.remove('enter');
    textChangeElement.classList.add('exit');

    setTimeout(() => {
      textChangeElement.textContent = phrases[currentPhraseIndex];
      textChangeElement.classList.remove('exit');
      textChangeElement.classList.add('enter');
      currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
    }, 250); // Halfway through the exit animation
  }

  setInterval(updateText, 3000); // Change every 3 seconds to see the animation
  textChangeElement.classList.add('enter');
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript" src="javascript/app.js.php"></script>

<script type="text/javascript">

<?php if (!empty($_GET)) { ?>
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
<?php } ?>
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

      $(document).ready(function(){
        console.log('test');

        });
  </script>
</body>

</html>