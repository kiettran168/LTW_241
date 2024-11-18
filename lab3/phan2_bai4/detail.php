<?php
include 'db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the query to get product details
    $sql = "SELECT id, name, description, price, image FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <?php echo "<img class='img-fluid border' src='" . $row["image"] . "' >"; ?> 
                    </div>
                </div>

                <div class="col border">
                    <div class="h3"><?php echo $row["name"]; ?></div>
                    <div class="h6">Price: <?php echo $row["price"]; ?> đ</div>
                    <div class="container d-flex justify-content-center position-relative bottom-0">
                        <button class="btn btn-primary">Buy now</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="h2">Description:</div>
                <div><?php echo $row["description"]; ?></div>
            </div>
        </div>
        <?php
    } else {
        echo "<p>Item details not found.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No item ID specified or invalid ID.</p>";
}

$conn->close();
?>
