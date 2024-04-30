

<div style="position: fixed; top: 0; left: 0; right: 60%; height: 60px; background-color: white; width: 100vw; z-index: 1;"  >

<div style="margin: 0 auto; width: 1280px;">
<div style="position: relative; display: inline-block; width: 350px; padding-top: 0; ">
  <a href="index.php" style="position: absolute; top: -35px;"><img style="width: 280px; height: 46px;"src="img/logo2.png" class="h-8" alt="Resolve Logo"></a>

</div>

<div style="display: inline-block; width: 600px; ">
                    <ul style="padding-top: 20px;">
                        <li style="display: inline-block; padding-right: 50px;" >
                            <a href="#" style="color: blue;" class="" aria-current="page">Home</a>
                        </li>
                        <li style="display: inline-block; padding-right: 50px;">
                            <a href="Professional.php" style="color: black;" class="">Become A Professional</a>
                        </li>
                        <li  style="display: inline-block; padding-right: 50px;">
                            <a href="#" style="color: black;" class="">Create Invitation</a>
                        </li>
                        <li  style="display: inline-block; padding-right: 50px;">
                            <a href="services.php" style="color: black;" class="">Service</a>
                        </li>
                    </ul>
                </div>

<div style="position: relative; display: inline; width: 100px;">
  <div id="login_dropdown" style="position: relative; float: right; width: 150px;  padding-top: 15px; z-index: 1;">
                    <?php if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) { ?>



                    <a href="dashboard.php" style="margin: 0 auto;"><img class="w-8 h-8 rounded-full" src="/resolve/img/profile_picture.jpg" alt="user photo"></a>

<?php } else { ?>
                    <button id="get_started" type="button" style="margin: 0 auto;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
<?php } ?>
<div id="login_menu" style="position: absolute; top: 65px; left: -100px; background-color: white; border: 1px solid #000; width: 200px;">

<div style="display: inline; float: right;">My Profile</div><br />
<div style="display: inline; float: right;">My Events</div><br />
<div style="display: inline; float: right;"><a href="?logout">Logout</a></div>

</div>

</div>


</div>
</div>



</div>

</div>




