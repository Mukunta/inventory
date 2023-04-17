<?php
// Include database connection file
include('db_connect.php');

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $transaction_date = $_POST['transaction_date'];

    // Update query
    $query = "UPDATE transactions SET item_name='$item_name', quantity='$quantity', price='$price', transaction_date='$transaction_date' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Transaction updated successfully');</script>";
    }
}
?>
