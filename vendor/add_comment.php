<?php

require_once "../config/connect.php";

$id = null;
$comment = null;

if(isset($_POST)) {
  $id = $_POST['id'];
  $comment = $_POST['comment'];
}

mysqli_query(
  $connect,
  "INSERT INTO `comments` (`id`, `product_id`, `body`) VALUES (NULL, '$id', '$comment')"
);

header('Location: ../product.php?id=' . $id);
?>
