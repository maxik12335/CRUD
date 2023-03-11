<?php

require_once "../config/connect.php";
// INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES (NULL, 'test', 'test3', 'test2')

$title = null;
$price = null;
$description = null;

if(isset($_POST)) {
  $title = $_POST['title'];
  $price = $_POST['price'];
  $description = $_POST['description'];
}

mysqli_query($connect, "INSERT INTO `products` (`id`, `title`, `price`, `description`) VALUES (NULL, '$title', '$price', '$description')");

header('Location: ../index.php');
?>
