<?php
// Include the database connection file
include('connect.php');

// Get the form data
$item_name = $_POST['item_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

// Get the current stock of the item
$sql = "SELECT * FROM stock_item WHERE name='$item_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$stock_quantity = $row['quantity'];

// Check if there is enough stock to sell
if ($stock_quantity < $quantity) {
  // If there is not enough stock, display an error message
  echo "<div class='container mt-3'><div class='alert alert-danger'>There is not enough stock of $item_name to sell $quantity units.</div></div>";
} else {
  // If there is enough stock, update the stock and transaction tables
  $new_stock_quantity = $stock_quantity - $quantity ;
  $total_price = $quantity * $price;

  // Update the stock table
  $sql = "UPDATE stock_item SET quantity=$new_stock_quantity WHERE name='$item_name'";
  mysqli_query($conn, $sql);

  // Insert the transaction into the transaction table
  $sql = "INSERT INTO transaction (name, quantity, price) VALUES ('$item_name', $quantity, $total_price)";
  mysqli_query($conn, $sql);

  // Display a success message
  echo "<div class='container mt-3'><div class='alert alert-success'>$quantity units of $item_name sold for $total_price.</div></div>";
}

// Close the database connection
mysqli_close($conn);
?>
