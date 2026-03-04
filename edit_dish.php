<?php
include "db.php";
$id = intval($_GET['id']);
mysqli_query($conn,"DELETE FROM orders WHERE dish_id=$id");
mysqli_query($conn,"DELETE FROM dishes WHERE id=$id");
header("Location: menu.php");




