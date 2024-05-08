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

if (isset($_GET['terms'])) { ?>

<div style="margin: 100px auto; width: 1000px;">
<h2 class="text-1xl font-bold sm:text-4xl">Terms and Conditions</h2>

<p>Welcome to Resolve! These terms and conditions outline the rules and regulations for the use of Resolve's Website, located at Resolve</p>
</br >
<p>By accessing this website, we assume you accept these terms and conditions. Do not continue to use Resolve if you do not agree to take all of the terms and conditions stated on this page.</p>
</br >
<p>The following terminology applies to these Terms and Conditions, Privacy Statement, and Disclaimer Notice and all Agreements: "Client", "You", and "Your" refer to you, the person logging onto this website and compliant with the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our", and "Us" refer to our Company. "Party", "Parties", or "Us" refer to both the Client and ourselves. All terms refer to the offer, acceptance, and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect to the provision of the Company’s stated services, in accordance with and subject to prevailing law of [Country]. Any use of the above terminology or other words in the singular, plural, capitalization, and/or he/she or they, are taken as interchangeable and therefore as referring to the same.</p>

<h2 class="text-1xl font-bold sm:text-2xl">Cookies</h2>
</br >
<p>We employ the use of cookies. By accessing Resolve, you agree to use cookies in agreement with Resolve's Privacy Policy.
</br >
Most interactive websites use cookies to let us retrieve the user’s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

<h2 class="text-1xl font-bold sm:text-2xl">License</h2>
</br >
<p>Unless otherwise stated, Resolve and/or its licensors own the intellectual property rights for all material on Resolve. All intellectual property rights are reserved. You may access this from Resolve for your own personal use, subject to restrictions set in these terms and conditions.</p>

<h2 class="text-1xl font-bold sm:text-2xl">You must not:</h2>
</br >
<p>Republish material from Resolve
Sell, rent, or sub-license material from Resolve
Reproduce, duplicate, or copy material from Resolve
Redistribute content from Resolve
This Agreement shall begin on the date hereof.</p>
</br >
<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. Resolve does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of Resolve, its agents, and/or affiliates. Comments reflect the views and opinions of the person who posts their views and opinions. To the extent permitted by applicable laws, Resolve shall not be liable for the Comments or for any liability, damages, or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>
</br >
<p>Resolve reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive, or causes a breach of these Terms and Conditions.</p>

<h2 class="text-1xl font-bold sm:text-2xl">You warrant and represent that:</h2>
</br >
<p>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;
The Comments do not invade any intellectual property right, including without limitation copyright, patent, or trademark of any third party;
The Comments do not contain any defamatory, libelous, offensive, indecent, or otherwise unlawful material which is an invasion of privacy
The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.
You hereby grant Resolve a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce, and edit any of your Comments in any and all forms, formats, or media.</p>
</br >
</div>

  <?php } elseif(isset($_GET['about'])) { ?>
    <div style="margin: 100px auto; width: 1000px;"> 
  About Resolve

Welcome to Resolve – Your Trusted Partner in Home Services!

At Resolve, we understand the importance of finding reliable and skilled professionals for your home service needs. Whether you're looking to repair a leaky faucet, renovate your kitchen, or install new flooring, we're here to help you connect with top-notch service providers who deliver quality workmanship and exceptional service.

Our Mission

Our mission at Resolve is simple: to make home services easy, reliable, and hassle-free for homeowners like you. We strive to provide a platform where you can find trusted professionals who are passionate about their craft and dedicated to exceeding your expectations.

Why Choose Resolve?

Vetted Service Providers: We carefully vet all service providers on our platform to ensure they meet our high standards of professionalism, expertise, and reliability. You can trust that the professionals you find on Resolve are skilled craftsmen who take pride in their work.
Transparent Reviews: We believe in transparency and accountability. That's why we provide transparent reviews and ratings from real customers, so you can make informed decisions when choosing a service provider.
Convenient Booking: Booking a service on Resolve is quick and easy. Simply browse through our list of available professionals, read reviews, and book the one that best fits your needs – all from the comfort of your home.
Secure Payments: Your safety and security are our top priorities. With Resolve, you can rest assured that your payments are processed securely, and your personal information is kept safe and confidential.
Our Services

At Resolve, we offer a wide range of home services to meet your needs, including:

Plumbing
Electrical
Carpentry
Painting
Flooring
Home Renovations
Appliance Repair
And much more!
No matter the size or scope of your project, we're here to help you find the right professional for the job.

Get Started Today!

Ready to tackle that home improvement project? Let Resolve be your partner every step of the way. Browse our list of trusted service providers, read reviews, and book your next service with confidence.

Thank you for choosing Resolve – Where Home Services Meet Excellence!
</div>
  <?php } elseif (isset($_GET['faq'])) { ?>

<div style="margin: 100px auto; width: 1000px;">
<h2 class="text-1xl font-bold sm:text-4xl">Frequently Asked Questions</h2>

<h2 class="text-1xl font-bold sm:text-2xl">How do you ensure the service providers are reliable?</h2>

<p>Ensuring accountability is our priority. Each service provider undergoes a meticulous vetting process:</p>

<li>They come highly recommended, either by a homeowner or by one of our trusted service providers.</li>
<li>We conduct thorough quality checks on service providers through various methods:</li>
<li> We contact their references and publish their experiences online, including detailed feedback and trustworthiness ratings. Only Pros with an average rating of 4 stars and above are approved.</li>
<li>We request a portfolio showcasing previous work, accompanied by testimonials and supporting documents.</li>
<li>For providers in sensitive fields, we require a valid license or practice number.</li>
<li>We personally meet with service providers to assess their suitability.</li>
</p>

<p>Do you have inquiries about our Resolve service providers? Feel free to ask, and we'll provide answers!</p>

<h2 class="text-1xl font-bold sm:text-2xl">What are the charges for using Resolve?</h2>

<p>Using Resolve is entirely free. Pros (service providers) pay a nominal fee to connect with relevant customers.</p>

<h2 class="text-1xl font-bold sm:text-2xl">What happens to my information when shared with Resolve?</h2>

<p>To match you with a suitable Pro, we collect your contact details and ask a few questions regarding your requirements. Your job details are then shared with Pros possessing the right skills in your vicinity.</p>
Rest assured, your contact information is securely stored and only shared with a maximum of five Pros. This enables them to reach out to you for a quote.</p>
Upon contacting you, Pros will provide their contact details along with a link to their Resolve profile, where you can view photos and reviews of their work.</p>
<h2 class="text-1xl font-bold sm:text-2xl">What if circumstances change, or I find an alternative service provider?</h2>

<p>If you no longer require assistance or have found another provider, simply check your email from Resolve for a link to freeze your job. This notifies Pros that you're currently unavailable for new quotes.</p>

<p>If you've already been connected with Pros, you're under no obligation to accept a quote. Just inform them of your alternative arrangement.</p>

<p>Pros appreciate feedback as they invest in providing quotes, hence informing them helps avoid further contact.</p>

<h2 class="text-1xl font-bold sm:text-2xl">I want clarity on pricing for my job. Can I obtain this through Resolve?</h2>
<p>Resolve connects you with up to five Pros possessing the necessary skills in your area to provide quotes tailored to your specific needs. This is the typical process for most jobs on Resolve</p>
<p>Through our Resolve Fixed Price service, we've established pre-negotiated prices for standard services. Learn more about Resolve Fixed Price below.</p>

<h2 class="text-1xl font-bold sm:text-2xl">What is Resolve Fixed Price?</h2>
<p>Resolve Fixed Price simplifies and makes standard home services and repairs more affordable by:
- Negotiating predetermined prices for a range of standard services.
- Selecting top Pros to perform the work.
- Generating instant quotes when your requirements align with our standard services.
- Facilitating online payment to reserve services.
- Directly connecting you with a top Pro to arrange the work.
- Releasing payment to your Pro once you confirm satisfaction with the job.</p>

<h2 class="text-1xl font-bold sm:text-2xl">How can I be assured of fair pricing?</h2>
<p>Negotiating prices can be inefficient and frustrating. After overseeing numerous projects, we recognized the need for a more effective approach.</p>
<p>By analyzing over 30,000 quotes and negotiating with a vast base of vetted service providers, we've secured competitive prices. This provides better value for everyone involved.</p>

<h2 class="text-1xl font-bold sm:text-2xl">Can I trust the quality of work?</h2>
<p>Each eligible service provider undergoes rigorous vetting, and their work is inspected on-site to ensure it meets our standards.</p>
<p>Only the best service providers are approved. Our pool of providers is also utilized for exclusive installations on behalf of one of the world's largest hardware stores, Leroy Merlin.</p>

<h2 class="text-1xl font-bold sm:text-2xl">Why is upfront payment required?</h2>
<p>To maintain competitive prices and ensure secure transactions, we hold funds in escrow as a neutral third party. Payment is only released to the assigned Pro upon your confirmation of job completion and satisfaction.</p>
<p>In rare instances of issues, you're eligible for a full refund, offering greater protection than conventional methods.</p>
<p>Furthermore, upfront payment entitles you to a generous 10% discount!</p>

<h2 class="text-1xl font-bold sm:text-2xl">Is it possible to pay after the job is completed instead of upfront?</h2>
<p>Opting to pay at the time of booking grants you a 10% discount. Resolve securely holds the funds, and payment to the Pro is only made once you've approved the job. However, if you prefer to pay upon job completion, that option is available too!</p>

<h2 class="text-1xl font-bold sm:text-2xl">How does pay-after-service function?</h2>
<p>With pay-after-service, you settle payment only after the Pro has successfully completed the job and you've approved their work. </p>
<p>Resolve now offers two pay-after-service options:
- Pay After by card: A nominal upfront charge of R1 verifies the validity and creditworthiness of your card. Upon job completion and your confirmation, the remaining balance is automatically charged.
- Pay After by cash: Payment is made directly to the Pro upon satisfactory completion of the job.
</p>
<h2 class="text-1xl font-bold sm:text-2xl">Is online payment safe?</h2>
<p>We and our payment partners utilize 2,048-bit SSL encryption with secure handover, ensuring your online transactions are as secure as possible. Verify the lock symbol next to the web address in your browser for confirmation.</p>
<h2 class="text-1xl font-bold sm:text-2xl">What if I'm dissatisfied with the job?</h2>
<p>If the job isn't completed to your satisfaction, we'll work to rectify the situation or provide a refund. Refer to the following question for terms and conditions.</p>

<h2 class="text-1xl font-bold sm:text-2xl">How can I request a refund?</h2>
<p>Refunds are applicable under the following circumstances:
- For appliance repair projects, if a replacement part is discontinued or cannot be sourced after a site inspection, a R250.00 callout fee is deducted from the upfront payment. The remaining balance is refunded within 14 working days.
- If a service provider cancels for specific reasons after payment, Resolve assigns another provider on the same day. Failure to do so entitles you to a full refund.
- Cancellation within 24 hours of the appointment incurs a cancellation fee. Note: A 10% late cancellation fee applies, with the remainder refunded.</p>
Please note that payment processing times vary depending on your bank.
Should the Pro visit your location, a R250.00 callout fee is retained.
If the Pro doesn't visit, a R150.00 admin fee is held for refund processing.</p>

<h2 class="text-1xl font-bold sm:text-2xl">What if my estimated hours/units are incorrect?</h2>
<p>For efficient coordination, we create a WhatsApp group comprising you, the Pro, and a member of our Resolve team. This enables timely management of additional charges in case of underestimation and facilitates refunds for overestimated needs.</p>
A minimum service level applies to all jobs; refer to your quote or contact us for clarification.</p>

<h2 class="text-1xl font-bold sm:text-2xl">How can I leave a review for a Pro?</h2>
<p>Reviews on Resolve aid local businesses in establishing their reputation and attracting more customers. They also ensure accountability for quality work and service.</p>
<p>To leave a review for your Pro, visit their Resolve profile and click on "Add a Review." If you require the link, your Pro will gladly provide it.</p>

<h2 class="text-1xl font-bold sm:text-2xl">Can I recommend a service provider?</h2>
<p>Certainly! Sharing is caring. Exceptional jobs and pros merit recognition. By rewarding them with opportunities, we benefit everyone. It's the Resolve spirit—share it, show it, spread it! Click here to nominate a pro.</p>

<h2 class="text-1xl font-bold sm:text-2xl">Which areas do you serve?</h2>
<p>Currently, we cover Gauteng, Cape Town, and Durban.</p>
<h2 class="text-1xl font-bold sm:text-2xl">What motivates Resolve to provide this service?</h2>
<p>We aim to empower excellent service providers to build their reputation while ensuring accountability for subpar services.
By eliminating anonymity, we promote transparency and quality in service provision.</p>
<br>
<a href="services.php" style="background-color: #0ccdf0; padding: 12px 24px; color: white; border-radius: 8px; text-decoration: none;">
        Get Started
      </a>
</div>


<?php } else { ?>


<?php if (empty($_GET)) { ?>}
  <section
  class="relative bg-[url(https://images.unsplash.com/photo-1604014237800-1c9102c219da?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80)] bg-cover bg-center bg-no-repeat"
  style="height: 700px; position: relative; margin-top: 0;"
>
  <div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; background: rgba(0, 0, 0, 0.7);"></div>
  <div
    style="position: absolute; width: 100%; max-width: 1280px; height: 100%; display: flex; flex-direction: column; justify-content: center; padding-left: 32px; margin: auto;"
  >
    <h1 style="color: #0ccdf0; font-size: 3rem; font-weight: bold; margin: 0;">
     Helping small service businesses grow
    </h1>
    <p style="color: white; font-size: 1rem; margin: 20px 0;">
    Shortening the distance between
having a skill and making a living from it
    </p>
    <div style="display: flex; gap: 20px;">
      <a
        href="?faq"
        style="display: block; background-color: #0ccdf0; padding: 12px 24px; color: white; border-radius: 8px; text-decoration: none;"
      >
        Get Started
      </a>
      <a
        href="?about"
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
      <a href="SingleService.php?page=plumbers"><button>Discover</button></a>
    </div></a>
    <div class="category">
      <img src="img/electrician.png" alt="Handyman Icon" />
      <h3>Electriveans</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <a href="SingleService.php?page=washing-machine-repair"><button>Discover</button></a>
    </div>
    <div class="category">
      <img src="img/technician1.png" alt="Handyman Icon" />
      <h3>Painters</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <a href="SingleService.php?page=home-deep-cleaning"><button>Discover</button></a>
    </div>
    <div class="category">
      <img src="img/technician.png" alt="Handyman Icon" />
      <h3>Handyman</h3>
      <p>Find a top trader to fix or replace your pipes & appliances</p>
      <a href="SingleService.php?page=maid-service"><button>Discover</button></a>
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
<?php } ?>
<?php require_once('footer.php'); ?>


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