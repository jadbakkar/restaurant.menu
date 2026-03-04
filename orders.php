<?php
session_start();
include "db.php";


$result = mysqli_query($conn, "SELECT * FROM dishes ORDER BY category, name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Our Menu</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="title">Our Menu</h1>


<div class="categories">
    <button data-cat="pizza">Pizza</button>
    <button data-cat="burger">Burger</button>
    <button data-cat="drinks">Drinks</button>
    <button data-cat="desserts">Desserts</button>
    <button data-cat="salads">Salads</button>
</div>


<div class="menu-container">
<?php while ($row = mysqli_fetch_assoc($result)): ?>
    <div class="card" data-category="<?= strtolower(trim($row['category'])) ?>">
        <img src="images/<?= htmlspecialchars($row['image']) ?>" class="food-img" alt="<?= htmlspecialchars($row['name']) ?>">
        <h3><?= htmlspecialchars($row['name']) ?></h3>
        <p class="price">$<?= $row['price'] ?></p>
        <p class="category"><?= htmlspecialchars($row['category']) ?></p>

        <a href="order.php?dish_id=<?= $row['id'] ?>" class="btn">Order</a>

        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
            <a href="edit_dish.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
            <a href="delete_dish.php?id=<?= $row['id'] ?>" class="btn danger" onclick="return confirm('Delete dish?')">Delete</a>
        <?php endif; ?>
    </div>
<?php endwhile; ?>
</div>


<div class="bottom-bar">
<?php if (isset($_SESSION['admin']) && $_SESSION['admin'] === true): ?>
    <a href="add_dish.php" class="btn">Add Dish</a>
    <a href="orders.php" class="btn">View Orders</a>
    <a href="logout.php" class="btn danger">Logout</a>
<?php else: ?>
    <a href="login.php" class="btn">Admin Login</a>
<?php endif; ?>
</div>

<script src="script.js"></script>
</body>
</html>
