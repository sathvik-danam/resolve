

<div style="position: fixed; top: 0; left: 0; right: 60%; height: 60px; background-color: white; width: 100vw; z-index: 1;">
    <div id="show_error_notice" style="display: none; position: absolute; left: 40%; top: 50px; width: 300px; background-color: white; text-align: center; color: red; font-weight: bold;">This is the login error. <a href="<?= APP_URL_BASE . '?login' ?>">Click Here.</a></div>
    <div style="margin: 0 auto; width: 1280px;">
        <div style="position: relative; display: inline-block; width: 350px;">
            <a href="index.php" style="position: absolute; top: -35px;"><img style="width: 280px; height: 46px;" src="img/logo2.png" alt="Resolve Logo"></a>
        </div>

        <!-- Navigation Links -->
        <div style="display: inline-block; width: 600px;">
            <ul style="padding-top: 20px;">
                <li style="display: inline-block; padding-right: 50px;">
                    <a href="<?= APP_URL_BASE ?>" style="color: blue;">Home</a>
                </li>

                <li style="display: inline-block; padding-right: 50px;">
                    <a href="<?= APP_URL_BASE ?>?create-invitation" style="color: black;">How It Works</a>
                </li>

                <li style="display: inline-block; padding-right: 50px;">
                    <a href="<?= APP_URL_BASE ?>?create-invitation" style="color: black;">About</a>
                </li>
                <li style="display: inline-block; padding-right: 50px;">
                    <a href="services.php" style="color: black;">Service</a>
                </li>
            </ul>
        </div>

        <!-- User Profile and Dropdown -->
        <div style="position: relative; display: inline; width: 100px;">
            <div id="login_dropdown" style="position: relative; float: right; width: 150px; padding-top: 15px; z-index: 1;">
                <?php if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) { ?>
                    <a href="javascript:void(0);" onclick="toggleDropdown()" style="margin: 0 auto;"><img class="w-8 h-8 rounded-full" src="/resolve/img/profile_picture.jpg" alt="user photo"></a>
                    <div id="login_menu" style="display: none; position: absolute; top: 65px; left: -100px; background-color: white; border: 1px solid #000; width: 200px;">
                        <div style="padding: 10px;"><a href="dashboard.php?profile">My Profile</a></div>
                        <div style="padding: 10px;"><a href="dashboard.php?my_events">My Events</div>
                        <div style="padding: 10px;"><a href="?logout">Logout</a></div>
                    </div>
                <?php } else { ?>
                    <button id="get_started" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">Get started</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
function toggleDropdown() {
    var menu = document.getElementById('login_menu');
    menu.style.display = (menu.style.display === 'none' ? 'block' : 'none');
}
</script>
