<?php include('../config/config.php'); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css">
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
    </style>
</head>
<body>
    <?php require_once('nav_bar.php'); ?>

    <div id="content">
        <?php if (!isset($_SESSION['user_id'])) { ?>
            <!-- Login Prompt Section -->
            <div id="login-prompt-container">
                <h2>Please Login / Sign Up to Continue</h2>
                <button class="login-signup-btn">LOGIN / SIGN UP</button>
            </div>
        <?php } ?>
    </div>

    <?php require_once('footer.php'); ?>

    <script type="text/javascript" src="javascript/app.js.php"></script>
</body>
</html>
