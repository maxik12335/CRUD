<?php 

// CRUD

// Create
// Read
// Update
// Delete

require_once "config/connect.php";

$products = mysqli_query($connect, "SELECT * FROM `products`");
$productsFetch = mysqli_fetch_all($products);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="main.css">
  <title>Products</title>
</head>
<body>
  <header class="header">
    <div class="container">
      <h1 class="header-title">Products</h1>
    </div>
  </header>
  <section class="section-products">
    <div class="container">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>TItle</th>
          <th>Description</th>
          <th>Price</th>
          <th>Product</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        <?php
          foreach($productsFetch as $product) {
            echo "
              <tr>
                <td>$product[0]</td>
                <td>$product[1]</td>
                <td>$product[3]</td>
                <td>$product[2]</td> 
                <td><a href='product.php?id=$product[0]'>product page</a></td> 
                <td><a href='update.php?id=$product[0]'>update</a></td> 
                <td><a href='vendor/delete.php?id=$product[0]'>delete</a></td> 
              </tr>
            ";
          }
        ?>
      </table>
    </div>
  </section>

  <section class="section-form">
      <div class="container">

        <button class="submit">Create product</button>

        <div class="submit-form">
          <h2 class="form-title">Create product</h2>
          <button class="close">close</button>
          <form action="vendor/create.php" class="form" method="post">
            <label class="form-label" for="title">Title</label>
            <input class="form-input" type="text" name="title" id="title">

            <label class="form-label" for="description">Description</label>
            <textarea  class="form-input" type="text" name="description" id="description"></textarea>

            <label class="form-label" for="price">Price</label>
            <input  class="form-input" type="number" name="price" id="price">

            <button class="form-button" type="submit">Submit</button>
          </form>
        </div>

      </div>
    </section>

    <script src="js/show-form.js"></script>
</body>
</html>

