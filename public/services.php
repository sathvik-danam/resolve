<?php include('../config/config.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/styles.css">


    <style type="text/css">
        nav {
            position: absolute;
            display: block;
            width: 100vw;
            /* 100% */
            z-index: 1;
            background-color: white;
        }


    </style>
</head>

<!-- Main body -->


<body>
<?php require_once('nav_bar.php'); ?>
</body>
<!-- FOOTER -->

<?php require_once('footer.php'); ?>


<script type="text/javascript" src="javascript/app.js.php"></script>