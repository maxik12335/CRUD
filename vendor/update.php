<?php

require_once "../config/connect.php";

$id = null;
$title = null;
$price = null;
$description = null;

if(isset($_POST)) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
}

mysqli_query(
  $connect,
  "UPDATE `products` SET `title` = '$title', `price` = '$price', `description` = '$description' WHERE `products`.`id` = '$id'"
);

header('Location: ../product.php?id=' . $id);
?>
