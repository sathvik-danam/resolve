<?php include('../config/config.php'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Your Service Site</title>

    <style type="text/css">

        ul, li {
          
        }
    </style>
</head>
<body class="bg-gray-100">

<?php require_once('nav_bar.php'); ?>


<?php

if (isset($_GET['page']) && $_GET['page'] != '') {     
    $stmt = $pdo->prepare("SELECT `category`, `profession`, `city`, `about`, `photo1` FROM `posts` WHERE `slug` = :page_slug;");
  $stmt->execute(array(':page_slug' => $_GET['page']));
  $row_fetch = $stmt->fetch();


  if (empty($row_fetch)) unset($row_fetch);
?> 


<?php } ?>

<!-- Main hero section -->
<section class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('<?= (isset($row_fetch['photo1']) ? 'img/profession/' . $row_fetch['photo1'] : 'https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80') ?>'); height: 350px;">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative max-w-5xl mx-auto h-full flex items-center pl-8">
        <h1 class="text-cyan-300 text-3xl font-bold"><?= (isset($row_fetch['profession']) ? $row_fetch['profession'] : 'Let us find your Forever Home.') ?></h1>
    </div>
</section>

<!-- Container for content -->
<div class="w-full h-64 bg-black p-8 shadow-lg flex flex-col justify-center items-center font-roboto">
  <div class="text-left mx-auto text-white"> <!-- Added text-white class -->
    <h2 class="text-3xl mb-4"><?= (isset($row_fetch['profession']) ? $row_fetch['profession'] : 'Heading') ?></h2>
    <div style=" font-size: 1.475rem;" class="text-white"><?= (isset($row_fetch['about']) ? $row_fetch['about'] : 'Heading Description') ?></div>
  </div>
</div>



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

<!-- Step cards section -->
<div class="steps-container mx-auto mt-8 px-4">
    <div class="grid grid-cols-3 gap-4">
        <!-- Step 1 -->
        <div class="step-card bg-white p-4 shadow-md rounded-lg relative">
            <h3 class="bg-gray-200 p-2 rounded text-sm absolute -top-3 left-5">STEP ONE</h3>
            <h2 class="text-xl font-semibold text-gray-800 mt-4">Tell us what you need</h2>
            <p class="text-gray-600">Share your contact details & post your enquiry</p>
        </div>
        <!-- Step 2 -->
        <div class="step-card bg-white p-4 shadow-md rounded-lg relative">
            <h3 class="bg-gray-200 p-2 rounded text-sm absolute -top-3 left-5">STEP TWO</h3>
            <h2 class="text-xl font-semibold text-gray-800 mt-4">Review interested businesses</h2>
            <p class="text-gray-600">Let them reach out by phone, email or direct message</p>
        </div>
        <!-- Step 3 -->
        <div class="step-card bg-white p-4 shadow-md rounded-lg relative">
            <h3 class="bg-gray-200 p-2 rounded text-sm absolute -top-3 left-5">STEP THREE</h3>
            <h2 class="text-xl font-semibold text-gray-800 mt-4">Choose your professional</h2>
            <p class="text-gray-600">Compare reviews & book your favourite service</p>
        </div>
    </div>
    <button class="enquiry-button bg-black text-white px-6 py-3 rounded shadow mt-8 mx-auto block">Post an enquiry</button>
</div>
<!-- Tips for finding the best plumbers section -->
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Our competitive advantage</h2>

      <p class="mx-auto max-w-screen-md text-center text-gray-500 md:text-lg">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text but is random or otherwise generated.</p>
    </div>
    <!-- text - end -->

    <div class="grid gap-4 sm:grid-cols-2 md:gap-8 xl:grid-cols-3">
      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Growth</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Security</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Cloud</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Speed</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Support</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->

      <!-- feature - start -->
      <div class="flex divide-x rounded-lg border bg-gray-50">
        <div class="flex items-center p-2 text-indigo-500 md:p-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>

        <div class="p-4 md:p-6">
          <h3 class="mb-2 text-lg font-semibold md:text-xl">Dark Mode</h3>
          <p class="text-gray-500">This is a section of some simple filler text, also known as placeholder text. It shares some characteristics of a real written text.</p>
        </div>
      </div>
      <!-- feature - end -->
    </div>
  </div>
</div>

<!-- Random card  -->
<section class="bg-center" style="position:relative; background-image: url('img/back.jpg'); background-repeat:no-repeat; padding: 100px; margin: 0 auto; width: auto;">
  <div class="mx-auto flex justify-center" style="display: flex; width: 100%;">
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Category</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Your Heading</h1>
        <p class="text text-gray-500 leading-6">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
      </div>
    </div>
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Category</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Your Heading</h1>
        <p class="text text-gray-500 leading-6">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
      </div>
    </div>
    <div class="mx-auto flex w-80 justify-center bg-white rounded-2xl shadow-xl shadow-gray-400/20" style="display: inline-block;">
      <div class="p-6">
        <small class="text-gray-900 text-xs">Category</small>
        <h1 class="text-2xl font-medium text-gray-700 pb-2">Your Heading</h1>
        <p class="text text-gray-500 leading-6">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
      </div>
    </div>
  </div>
  <div style="margin: 10px auto 0 auto; width: 100%;">
  <div class="flex justify-center" style="padding: 25px;">
    <button class="px-5 py-4 text-base font-medium text-center text-white transition duration-500 ease-in-out transform bg-blue-600 lg:px-10 rounded-xl hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Get bundle</button>
  </div>
</div>
</section>

<?php require_once('footer.php'); ?>

</body>
</html>
