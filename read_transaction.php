<?php
// Include database connection file
include('db_connect.php');

// Select query
$query = "SELECT * FROM transactions";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)){
        echo "ID: " . $row["id"]. " - Item Name: " . $row["item_name"]. " - Quantity: " . $row["quantity"]. " - Price: " . $row["price"]. " - Transaction Date: " . $row["transaction_date"]. "<br>";
    }
} else {
    echo "0 results";
}
?>
