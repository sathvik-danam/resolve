<?php include('../../config/config.php'); 

header('Content-Type: text/javascript;');

?>




    document.addEventListener('DOMContentLoaded', (event) => {
<?php if (!isset($_SESSION['user_id'])) { ?>
      document.getElementById('get_started').addEventListener('click', function() {
        var loginPopup = document.getElementById('login-pop-up');
        if (loginPopup.style.display === 'none') {
          loginPopup.style.display = 'block';
        } else {
          loginPopup.style.display = 'none';
        }
      });
<?php } ?>
    });
