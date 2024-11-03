<?php
include 'db_connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, name, description, price, image FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <nav class="navbar bg-primary">
                    <div class="container-fluid">
                      <a class="navbar-brand text-bg-primary h1">Site Title</a>
                      <a class="link text-bg-primary" href="#">Categories</a>
                      <div>|</div>
                      <a class="link text-bg-primary" href="#">Contact us</a>
                      <div>|</div>
                      <a class="link text-bg-primary" href="#">Follow us</a>
                      <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-2 bg-light">
                <div class="text-bg-secondary d-flex justify-content-center">
                    <div>Category</div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 5</a>
                    </li>
                </ul>
                <div class="text-bg-secondary d-flex justify-content-center">
                    <div>Top Products</div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Item 5</a>
                    </li>
                </ul>
            </div>
            <div class="col-8">
                <div class="container">
                    <div class="row">
                        Home > Main Category > Sub Category
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <?php echo "<img class='img-fluid border' src='" . $row["image"] . "' >";?> 
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
                        <div><?php echo $row["description"];?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 160px; height:600px; border:solid;">
                <img src="ref/ad.png" class="img-fluid" alt="This is an ad" style="height:100%; width:auto;">
            </div>
        </div>
        <div class="row text-bg-light d-flex justify-content-center" style="min-height: 5rem;">
            Footer
            <div class="container d-flex justify-content-center">
                <a href="#" class="btn btn-link active" aria-current="page">Link 1</a>
                <a href="#" class="btn btn-link">Link 2</a>
                <a href="#" class="btn btn-link">Link 3</a>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$stmt->close();
} 
$conn->close();
?>