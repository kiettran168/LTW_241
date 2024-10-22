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
?>
<div class="container">
    <div class="h1">Register</div>
    <form id="calculator-form" action="" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text">First name:</span>
            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Last name:</span>
            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Email:</span>
            <input type="text" name="email" id="email" class="form-control" placeholder="name@example.com" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Password:</span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Birthday:</span>
            <input type="date" id="birthday" class="form-select" name="birthday">
        </div>
        
        <span>Gender:</span>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" value="male">
            <label class="form-check-label" for="male">
            Male
            </label>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="radio" name="gender" value="female">
            <label class="form-check-label" for="female">
            Female
            </label>
        </div>

        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" type="radio" name="gender" value="none">
            <label class="form-check-label" for="none">
            None
            </label>
        </div>
        
        <div>
            <label for="country">Country:</label>
            <select name="country" id="country" class="form-select mb-3">
                <option value="vn">Vietnam</option>
                <option value="au">Australia</option>
                <option value="us">United States</option>
                <option value="in">India</option>
                <option value="ot">Other</option>
            </select>
        </div>
        

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">About:</label>
            <textarea class="form-control" name="about" id="about" rows="5"></textarea>
        </div>

        <button type="reset" class="btn btn-danger mb-3">Reset</button>
        <button type="submit" class="btn btn-success mb-3">Submit</button>
    </form>
</div>
<?php 
	}
	else {
        $fn = $_POST["first_name"];
        $ln = $_POST["last_name"];
        $email = $_POST["email"];
        $pw = $_POST["password"];
        $about = $_POST["about"];
        $pattern = "/[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+/i";

        if (strlen($fn) < 2 || strlen($fn) > 30)
            echo "First name must be between 2 and 30 characters";
        
        elseif (strlen($ln) < 2 || strlen($ln) > 30)
            echo "Last name must be between 2 and 30 characters";

        elseif (preg_match($pattern, $email) == 0)
            echo "Email has to be in the form of abc@example.com";

        elseif (strlen($pw) < 2 || strlen($pw) > 30)
            echo "Password must be between 2 and 30 characters";

        elseif (strlen($about) > 10000)
            echo "About must be less than 10000 characters";

        else 
            echo "Complete!";
	}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>
