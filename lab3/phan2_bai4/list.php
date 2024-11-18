<?php
include 'db_connect.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <h2>Top Products</h2>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
                        <?php
                        $sql = "SELECT id, name, price, description, image FROM products";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col'>";
                                echo "<div class='card' style='max-width: 10rem;'>";
                                echo "<img src='" . $row["image"] . "' class='card-img-top' alt='This is a product'>";
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>" . $row["name"] . "</h5>";
                                echo "<p class='card-text'>Price:" . $row["price"] . "đ</p>";
                                echo "<button class='btn btn-primary view-details' data-id='" . $row["id"] . "'>Buy now</button>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>

                <div id="itemDetails" class="container mt-3">
                </div>
                
                <div class="container d-flex justify-content-end mt-3">
                    <div class="btn-group ">
                        <a href="#" class="btn btn-secondary">Prev</a>
                        <a href="#" class="btn btn-secondary active" aria-current="page">1</a>
                        <a href="#" class="btn btn-secondary">2</a>
                        <a href="#" class="btn btn-secondary">3</a>
                        <a href="#" class="btn btn-secondary">Next</a>
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

    <script>
    $(document).ready(function() {
        $('.view-details').on('click', function() {
            var itemId = $(this).data('id');

            $.ajax({
                url: 'detail.php',
                type: 'GET',
                data: { id: itemId },
                success: function(response) {
                    $('#itemDetails').html(response);
                },
                error: function() {
                    $('#itemDetails').html('<p>An error occurred while loading details.</p>');
                }
            });
        });
    });
    </script>
  </body>
</html>

<?php
$conn->close();
?>
