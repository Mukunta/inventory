<?php
// Include database connection file
include('db_connect.php');

if(isset($_POST['submit'])){
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $transaction_date = $_POST['transaction_date'];

    // Insert query
    $query = "INSERT INTO transactions (item_name, quantity, price, transaction_date) VALUES ('$item_name', '$quantity', '$price', '$transaction_date')";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Transaction added successfully');</script>";
    }
}
?>
