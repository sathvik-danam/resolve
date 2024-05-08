<div style="position: fixed; top: 0; left: 0; right: 0; height: 60px; background-color: white; z-index: 1;">
    <div style="margin: 0 auto; width: 1280px; display: flex; align-items: center; justify-content: space-between;">
        <div>
            <a href="index.php"><img style="width: 280px; height: 46px;" src="img/logo2.png" alt="Resolve Logo"></a>
        </div>
        <!-- Navigation Links -->
        <ul style="display: flex; list-style: none; gap: 50px; margin: 0; padding: 20px 0;">
            <li><a href="<?= APP_URL_BASE ?>" style="color: blue; text-decoration: none;">Home</a></li>
            <li><a href="<?= APP_URL_BASE ?>?faq" style="color: black; text-decoration: none;">How It Works</a></li>
            <li><a href="<?= APP_URL_BASE ?>?about" style="color: black; text-decoration: none;">About</a></li>
            <li><a href="services.php" style="color: black; text-decoration: none;">Service</a></li>
        </ul>
        <!-- User Profile and Dropdown -->
        <div id="login_dropdown" style="position: relative;">
            <?php if (isset($_SESSION['user_id']) && is_int($_SESSION['user_id'])) { ?>
                <a href="javascript:void(0);" onclick="toggleDropdown(true)" ondblclick="toggleDropdown(false)" style="cursor: pointer;">
                    <img class="w-8 h-8 rounded-full" src="/resolve/img/profile_picture.jpg" alt="user photo" style="z-index: 1;">
                </a>
                <div id="login_menu" style="display: none; position: absolute; top: 65px; left: -100px; background-color: white; border: 1px solid #000; width: 200px;">
                    <div style="padding: 10px;"><a href="dashboard.php?profile">My Profile</a></div>
                    <div style="padding: 10px;"><a href="?logout">Logout</a></div>
                </div>
            <?php } else { ?>
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Get started</button>
            <?php } ?>
        </div>
    </div>
</div>

<script>
function toggleDropdown(show) {
    var menu = document.getElementById('login_menu');
    if (show) {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}
</script>
