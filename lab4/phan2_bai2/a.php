<?php 
include 'db_connect.php';

$query = "SELECT * FROM products";
$result = $conn->query($query);
$products = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lab4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function () {
            let id = $(this).data('id');
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: `d.php?id=${id}`,
                    method: 'GET',
                    success: function (response) {
                        if (response.success) {
                            alert(response.message);
                            $(`button[data-id="${id}"]`).closest('tr').remove();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('An error occurred while deleting the item.');
                    }
                });
            }
        });
    });
  </script>
</head>

<body>
  <div class="container">
    <div class="row">
      <h1 class="h1">Item list</h1>
    </div>
    <div class="row">
      <a href="b.php"><button class="btn btn-primary">Add item</button></a>
    </div>
    <br>
    <div class="row">
      <table class="table table-primary table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <tbody id="product-list">
          <?php 
          foreach ($products as $product) {
            echo "<tr>
                    <td>{$product['id']}</td>
                    <td>{$product['name']}</td>
                    <td>{$product['description']}</td>
                    <td>{$product['price']}</td>
                    <td><button class='btn btn-primary edit-btn' data-id='{$product['id']}'>Edit</button></td>
                    <td><button class='btn btn-danger delete-btn' data-id='{$product['id']}'>Delete</button></td>
                  </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
