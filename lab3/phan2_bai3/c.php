<?php
include 'db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price = trim($_POST['price']);
        $image = trim($_POST['image']);
        $errors = [];
 
        if (empty($name) || strlen($name) < 5 || strlen($name) > 40) {
            $errors[] = "Name must be between 5 to 40 characters.";
        }

        if (strlen($description) > 5000) {
            $errors[] = "Description must be less than 5000 characters.";
        }

        if (!is_numeric($price) || $price < 0) {
            $errors[] = "Price must be a positive number.";
        }

        if (strlen($image) > 255) {
            $errors[] = "Image link must be less than 255 characters.";
        }

        if (empty($errors)) {
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssdsi", $name, $description, $price, $image, $id);

            if ($stmt->execute()) {
                echo "Item updated successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            foreach ($errors as $error) {
                echo "<p style='color: red;'>$error</p>";
            }
        }
    }

    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $product = $result->fetch_assoc();
} else {
    echo "Invalid ID!";
    exit;
}

$conn->close();
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
        <br>
        <div class="row">
            <a href="a.php"><button class="btn btn-primary">Back</button></a>
        </div>
        <br>
        <div class="row">
            <h1 class="h1">Update item</h1>
        </div>
        <div class="row">
            <form id="calculator-form" action="c.php?id=<?php echo $id; ?>" method="POST">
                <div class="input-group mb-3">
                    <span class="input-group-text">Name:</span>
                    <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($product['name']); ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" rows="5"><?php echo htmlspecialchars($product['description']); ?></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Price:</span>
                    <input type="number" step="0.01" name="price" class="form-control" value="<?php echo htmlspecialchars($product['price']); ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Image:</span>
                    <input type="text" name="image" class="form-control" value="<?php echo htmlspecialchars($product['image']); ?>">
                </div>

                <button type="submit" class="btn btn-success mb-3">Update</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>