<?php
include "db.php";

$id = intval($_GET['dish_id']);
$dish = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM dishes WHERE id = $id")
);

if (isset($_POST['order'])) {
    $qty = intval($_POST['quantity']);
    $table = intval($_POST['table_number']);

    mysqli_query(
        $conn,
        "INSERT INTO orders (dish_id, quantity, table_number)
         VALUES ($id, $qty, $table)"
    );

    header("Location: menu.php?ordered=1");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<title>Order <?= htmlspecialchars($dish['name']) ?></title>
</head>
<body>

<div class="card order-card">
    <img src="images/<?= htmlspecialchars($dish['image']) ?>" class="food-img">

    <h2><?= htmlspecialchars($dish['name']) ?></h2>
    <p class="price">$<?= $dish['price'] ?></p>

    <form method="post">
        <input type="number" name="table_number" placeholder="Table number" min="1" required>
        <input type="number" name="quantity" min="1" value="1" required>

        <button name="order" class="btn">Confirm Order</button>
    </form>
</div>

</body>
</html>
