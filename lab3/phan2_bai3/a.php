<?php
include 'db_connect.php';

$sql = "SELECT id, name, description, price FROM products";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td>
                        <a href="c.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Edit</button></a>
                    </td>
                    <td>                       
                        <a href="d.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$conn->close();
?>