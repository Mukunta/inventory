<?php
// Include database connection file
include('db_connect.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];

    // Delete query
    $query = "DELETE FROM transactions WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if($result){
        echo "<script>alert('Transaction deleted successfully');</script>";
    }
}
?>
