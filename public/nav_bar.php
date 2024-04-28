
    <div style="position: relative; margin-top: -100px; padding-top: 100px; width: 100vw; ">
        <nav class="bg-white border-gray-200 w-full">
       
           <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="img/logo2.png" class="h-8" alt="Resolve Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Resolve</span>
                </a>
                <div class="relative flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>

                    </button>
<div id="login_dropdown" style="float: right; width: 150px; height: 100px;  padding-top: 25px; ">
                    <?php if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) { ?>



                    <a href="dashboard.php" style="margin: 0 auto;"><img class="w-8 h-8 rounded-full" src="/resolve/img/profile_picture.jpg" alt="user photo"></a>

<?php } else { ?>
                    <button id="get_started" type="button" style="margin: 0 auto;" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Get started</button>
<?php } ?>
<div id="login_menu" style="position: absolute; top: 80px; left: -60px; background-color: white; border: 1px solid #000; width: 200px;">

<div style="display: inline; float: right;">My Profile</div><br />
<div style="display: inline; float: right;">My Events</div><br />
<div style="display: inline; float: right;"><a href="?logout">Logout</a></div>

</div>

</div>




                    <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  dark:border-gray-700">
                        <li>
                            <a href="#" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue md:dark:hover:bg-transparent dark:border-gray-700">Become A Professional</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue md:dark:hover:bg-transparent dark:border-gray-700">Create Invitation</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-black md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue md:dark:hover:bg-transparent dark:border-gray-700">Service</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
