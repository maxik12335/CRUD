<?php

  require_once "config/connect.php";

  if(isset($_GET)) {
    $productId = $_GET['id'];
    $product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$productId'");
    $productFetch = mysqli_fetch_assoc($product);
  }

  $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$productId'");
  $commentsFetch = mysqli_fetch_all($comments);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Product page</title>
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="header-title">Product page</h1>
      <a href="./index.php" class="header-link">Главная</a>
    </div>
  </header>

  <section class="section-product">
    <div class="container">
      <div class="product">
        <h2 class="product-title"><?php echo $productFetch['title'] ?></h2>
        <p class="product-description"><?php echo $productFetch['description'] ?></p>
        <p class="product-price"><?php echo $productFetch['price'] ?></p>
      </div>

      
      <div class="product-comments">
        <h2 class="product-comments__title">
          List comments product <?php echo $productFetch['title'] ?>
        </h2>

        <ul class="product-comments__list">
          <?php
            if(count($commentsFetch) > 0) {
              foreach($commentsFetch as $key => $comment) {
                $key += 1;
                echo "
                  <li class='product-comment'>
                    <h3 class='product-comment__number'>$key. comments <a href='vendor/delete_comment.php?id=$comment[0]&product_id=$comment[1]'>delete</a></h3>
                    <p class='product-comment__body'>$comment[2]</p>
                  </li>
                ";
              }
            } else {
              echo "<h2 class='product-comments__title'>No comments</h2>";
            }
          ?>
        </ul>
      </div>

    </div>
  </section>

  <!-- комментарии -->
  <section class="section-form">
    <div class="container">

    <button class="submit submit-create">Create product</button>

    <div class="submit-form__create">
      <h2 class="form-title">Form add comments</h2>
      <button class="close close-create">close</button>
      <form action="vendor/add_comment.php" class="form" method="post">
        <input type="hidden" name="id" value="<?php echo $productFetch['id'] ?>">
        <label class="form-label" for="comment">add comment</label>
        <textarea class="form-input form-input__comment" type="text" name="comment" id="comment"></textarea>

        <button class="form-button form-button__comment" type="submit">Add comment</button>
      </form>
    </div>

    </div>
  </section>

  <section class="section-form">
    <div class="container">

    <button class="submit submit-update">Update product</button>

      <div class="submit-form__update">
        <h2 class="form-title">Form update</h2>
        <button class="close close-update">close</button>
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

    </div>
  </section>

  <script src="js/show-forms__product.js"></script>
</body>
</html>