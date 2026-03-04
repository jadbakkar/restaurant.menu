<?php
include "db.php";

if(isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = strtolower(trim($_POST['category']));
    $image = $_POST['image'];

    mysqli_query($conn,
        "INSERT INTO dishes (name,price,category,image)
         VALUES ('$name','$price','$category','$image')"
    );

    header("Location: menu.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Add Dish</title>
</head>
<body>

<div class="form-box">
<h2>Add Dish</h2>
<form method="post">
<input name="name" placeholder="Name" required>
<input name="price" placeholder="Price" required>
<select name="category" required>
    <option value="pizza">Pizza</option>
    <option value="burger">Burger</option>
    <option value="drinks">Drinks</option>
    <option value="desserts">desserts</option>
    <option value="salads">Salads</option>
     
</select>
<input name="image" placeholder="image.jpg" required>
<button name="add" class="btn">Add Dish</button>
</form>
<a href="menu.php">Back</a>
</div>

</body>
</html>





