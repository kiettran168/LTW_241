<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // You can also use isset($_POST)
?>
<div class="container">
    <div class="h1">Calculator</div>
    <form id="calculator-form" action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text">Enter first number:</span>
            <input type="text" name="num1" id="num1" class="form-control" placeholder="First number" required>
        </div>

        <select class="form-select mb-3" id="operation" name="operation">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">x</option>
            <option value="divide">÷</option>
            <option value="power">^</option>
        </select>
        
        <div class="input-group mb-3">
            <span class="input-group-text">Enter second number:</span>
            <input type="text" name="num2" id="num2" class="form-control" placeholder="Second number" required>
        </div>
    
        <button type="submit" class="btn btn-success mb-3">Calculate</button>
    </form>

</div>

<?php
    }
    else {
        echo "<div class=\"input-group mb-3\">";
        echo "<span class=\"input-group-text\" id=\"result\">Result: ";
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        switch ($_POST['operation']) {
            case "add":
                echo $num1 + $num2;
                break;
            case "subtract":
                echo $num1 - $num2;
                break;
            case "multiply":
                echo $num1 * $num2;
                break;
            case "divide":
                echo $num1 / $num2;
                break;
            default:
                echo $num1 ** $num2;
        }
        echo "</span>";
        echo "</div>";
    }
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>