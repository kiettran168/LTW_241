<?php 
session_start();

if (isset($_SESSION["username"]) || isset($_COOKIE["username"])) {
    header("Location: /info.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]);

    $_SESSION["username"] = $username;

    if ($remember) {
        setcookie("username", $username, time() + (86400 * 30), "/");
    }

    header("Location: /info.php");
     
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="h1">Login</div>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text">Username:</span>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Password:</span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <button type="submit" class="btn btn-success mb-3">Login</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
