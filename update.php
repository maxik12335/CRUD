<?php

  require_once "config/connect.php";

  if(isset($_GET)) {
    $productId = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$productId'");
    $productFetch = mysqli_fetch_assoc($product);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Update product</title>
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="header-title">Update product</h1>
      <a href="./index.php" class="header-link">Главная</a>
    </div>
  </header>

  <section class="section-form">
    <div class="container">

      <h2 class="form-title">Form submit</h2>

      <form action="vendor/update.php" class="form" method="post">
        <input type="hidden" name="id" value="<?php echo $productFetch['id'] ?>">
        <label class="form-label" for="title">Title</label>
        <input class="form-input" type="text" name="title" id="title" value="<?php echo $productFetch['title'] ?>">

        <label class="form-label" for="description">Description</label>
        <textarea  class="form-input" type="text" name="description" id="description"><?php echo $productFetch['description'] ?></textarea>

        <label class="form-label" for="price">Price</label>
        <input  class="form-input" type="number" name="price" id="price" value="<?php echo $productFetch['price'] ?>">

        <button class="form-button" type="submit">Update</button>
      </form>

    </div>
  </section>
</body>
</html>