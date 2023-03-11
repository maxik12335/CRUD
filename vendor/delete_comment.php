<?php

require_once "../config/connect.php";

$id = null;
$prodoct_id = null;

if(isset($_GET)) {
  $id = $_GET['id'];
  $product_id = $_GET['product_id'];
}

mysqli_query(
  $connect,
  "DELETE FROM `comments` WHERE `comments`.`id` = '$id'"
);

header('Location: ../product.php?id=' . $product_id);
?>
