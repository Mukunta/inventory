<?php

include 'connect.php';

// get form data
$item_name = $_POST['item_name'];
$description = $_POST['item_description'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$supplier = $_POST['supplier'];

// insert data into database
$sql = "INSERT INTO stock_item (name, description, quantity, price, supplier)
VALUES ('$item_name','$description', '$quantity','$price', '$supplier')";

if ($conn->query($sql) === TRUE) {
  // redirect to stock page
  header('Location: view_stock.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
