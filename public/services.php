<?php include('../config/config.php');
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/styles.css">
<style>
    body {
    font-family: Arial, sans-serif;
}

.category {
    margin: 20px;
}

.category h2 {
    color: #333;
}

.services {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
}

.service {
    text-align: center;
    margin: 10px;
}

.service img {
    width: 200px; /* Adjust based on your actual image sizes */
    height: 120px;
    object-fit: cover;
}

.service p {
    font-size: 14px;
    color: #666;
}
h1 {
    font-family: 'Merriweather', Georgia, serif; /* This prioritizes Merriweather if available */
    font-size: 24px; /* This can be adjusted based on your exact needs */
    font-weight: normal;
    color: black;
}


</style>
</head>

<!-- Main body -->


<body>
<?php require_once('nav_bar.php'); ?>


<!-- section 1  -->
<div style="width: 1300px; margin: 0 auto;">
<?php $stm = $pdo->prepare("SELECT DISTINCT `category` FROM `posts`;");
$stm->execute();

// Initialize the array to hold the categories
$categories = [];

// Fetch all rows and add each category to the categories array
while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    $categories[] = $row['category'];
}
//dd($categories);

foreach($categories as $key => $category) { ?>

  <div class="category" style="margin-top: 75px;">
    <h1 class="text-lg md:text-xl"><?= $category ?></h1>
    <div class="services">

<?php
$stm = $pdo->prepare("SELECT `profession`, `photo1`, `slug` FROM `posts` WHERE `category` = '" . $category . "';");
$stm->execute();

while ($row = $stm->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="service">
            <a href="2020/<?= $row['slug'] ?>"><img src="img/profession/<?= $row['photo1'] ?>" alt="<?= $row['profession'] ?>"></a>
            <p><?= $row['profession'] ?></p>
        </div>
<?php } ?>

    </div>
  </div>
<?php } ?>
</div>
</body>
<!-- FOOTER -->

<?php require_once('footer.php'); ?>


<script type="text/javascript" src="javascript/app.js.php"></script>