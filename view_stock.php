<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Inventory Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="dashboard.html">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Stock</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transact.html">Transact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_stock.html">Add New Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.html">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
    <div class="container-fluid">
        <h1 class="text-center mt-5 mb-4">Inventory</h1>
        <div class="row">
          <div class="col-md-12">
            <?php
              // connect to the database
              include 'connect.php';
              
              // query the database for the list of items
              $sql = "SELECT * FROM stock_item";
              $result = mysqli_query($conn, $sql);
              
              // start building the HTML table
              echo '<table class="table table-striped">';
              echo '<thead><tr><th>Item ID</th><th>Name</th><th>Description</th><th>Price</th><th>Quantity</th></tr></thead>';
              echo '<tbody>';
              
              // iterate over the result set and add rows to the table
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '</tr>';
              }
              
              // close the HTML table
              echo '</tbody></table>';
              
              // close the database connection
              mysqli_close($conn);
            ?>

          </div>
        </div>
      </div>
      
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
