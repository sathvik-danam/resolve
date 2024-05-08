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
  body, html {
    margin: 0;
    padding: 0;
    overflow-x: hidden;
  }
  .gallery-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  .gallery {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    -webkit-overflow-scrolling: touch;
    gap: 10px;
    padding: 20px;
    margin: 0;
  }
  .gallery img {
    height: 300px;
    scroll-snap-align: start;
    border-radius: 8px;
  }
  .arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    background-color: #fff;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
  }
  .left-arrow {
    left: 10px;
  }
  .right-arrow {
    right: 10px;
  }
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
    font-family: Roboto; 
    font-size: 24px;
    font-weight: bold;
    color: black;
}


</style>
</head>

<!-- Main body -->


<body>
<?php require_once('nav_bar.php'); ?>


<!-- section 1  -->

<!-- Testing the scrollbar  -->
<?php
$stm = $pdo->prepare("SELECT DISTINCT `category_id` FROM `posts`;");
$stm->execute(array());

// Initialize the array to hold the categories
$categories = [];

// Fetch all rows and add each category to the categories array
while ($row = $stm->fetch(PDO::FETCH_ASSOC)) {
    $categories[] = $row['category_id'];
}
//dd($categories);

foreach($categories as $key => $category_id) { ?>
<div class="gallery-container" style="width: 1300px; margin: 75px auto;">
<h1 class="text-1xl font-bold sm:text-3xl"><?php

$stmt_category = $pdo->prepare("SELECT `name` FROM `categories` WHERE `id` = :category_id;");
$stmt_category->execute(array('category_id' => $category_id));
$row_category = $stmt_category->fetch();
?><?= $row_category['name'];?></h1>
  <button class="arrow left-arrow" onclick="scrollLeft()">
    &#8592;
  </button>
  <div class="gallery">
<?php
$stm = $pdo->prepare("SELECT `subcategory_id`, `photo1`, `slug` FROM `posts` WHERE `category_id` = :category_id;");
$stm->execute(array(
':category_id' => $category_id
));

while ($row = $stm->fetch(PDO::FETCH_ASSOC)) { ?>

<a href="SingleService.php?page=<?= $row['slug'] ?>"><img src="img/profession/<?= $row['photo1'] ?>" alt="<?php

$stmt_subcategory = $pdo->prepare("SELECT `name` FROM `subcategories` WHERE `id` = :subcategory_id;");
$stmt_subcategory->execute(array('subcategory_id' => $row['subcategory_id']));
$row_subcategory = $stmt_subcategory->fetch();
?><?= $row_subcategory['name']; ?>"><?= $row_subcategory['name']; ?></a>

<?php } ?>

</div>
  <button class="arrow right-arrow" onclick="scrollRight()">
    &#8594;
  </button>
</div>
<?php } ?>

<script>
  const gallery = document.querySelector('.gallery');
  function scrollLeft() {
    gallery.scrollBy({ left: -300, behavior: 'smooth' });
  }
  function scrollRight() {
    gallery.scrollBy({ left: 300, behavior: 'smooth' });
  }
</script>
</body>
<!-- FOOTER -->

<?php require_once('footer.php'); ?>


<script type="text/javascript" src="javascript/app.js.php"></script>

<script>

</script>