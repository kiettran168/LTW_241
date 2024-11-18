<?php include 'db_connect.php'; ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>lab4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#edit-item-form').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
          url: 'c.php?id=<?php echo $_GET['id']; ?>',
          method: 'POST',
          data: $(this).serialize(),
          success: function (response) {
            alert(response.message || 'Item updated successfully!');
            window.location.href = 'a.php';
          },
          error: function (xhr) {
            alert('Error: ' + (xhr.responseJSON?.message || 'Failed to update the item.'));
          }
        });
      });
    });
  </script>
</head>

<body>
  <div class="container">
    <div class="row">
        <a href="a.php"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="row">
      <h1>Edit Item</h1>
    </div>
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM products WHERE id = $id");
        if ($result && $product = $result->fetch_assoc()) {
    ?>
    <div class="row">
      <form id="edit-item-form">
        <div class="input-group mb-3">
          <span class="input-group-text">Name:</span>
          <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description:</label>
          <textarea class="form-control" name="description" rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Price:</span>
          <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Image:</span>
          <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($product['image']); ?>">
        </div>
        <button type="submit" class="btn btn-success mb-3">Update</button>
      </form>
    </div>
    <?php
        } else {
            echo "<p>Item not found.</p>";
        }
    } else {
        echo "<p>Invalid ID.</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $price = $_POST['price'] ?? 0;
        $image = $_POST['image'] ?? '';

        if (strlen($name) >= 5 && strlen($name) <= 40 && $price >= 0) {
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssdsi", $name, $description, $price, $image, $id);

            if ($stmt->execute()) {
                echo json_encode(['message' => 'Item updated successfully']);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Failed to update item: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            http_response_code(400);
            echo json_encode(['message' => 'Invalid input.']);
        }
        $conn->close();
        exit;
    }
    ?>
  </div>
</body>
</html>
