<?php include('../config/config.php');
//die(var_dump($_SESSION));
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <base href="/resolve/">

    <link rel="stylesheet" href="css/styles.css">


    <style type="text/css">

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
    </style>
</head>

<body>
<?php require_once('nav_bar.php'); ?>
<!-- Home Hero -->

<?php if (!isset($_SESSION['user_id'])) { ?>

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
  <style>.trending-categories {
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
</style>
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
<style>
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
</style>
</head>
<body>

<section id="dynamic-text-section">
  <div class="text-container">
    We've done the <span class="text-change">reference checks</span> so you don't have to
  </div>
</section>

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
<!-- 2*2 section -->
<style>.reviews-section {
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
</style>
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

<?php require_once('footer.php'); ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script type="text/javascript" src="javascript/app.js.php"></script>

<script>
      $(document).ready(function(){
        console.log('test');

        });
  </script>
</body>

</html>