<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
</head>

  <body>
    <?php
    function div5($number) {
        switch ($number % 5) {
            case 4:
                echo "Good-bye";
                break;
            case 3:
                echo "See you later";
                break;
            case 2:
                echo "I'm doing well, thank you";
                break;
            case 1:
                echo "How are you?";
                break;
            default:
                echo "Hello";
        }
    }
    echo div5(0)."<br />";
    echo div5(1)."<br />";
    echo div5(2)."<br />";
    echo div5(3)."<br />";
    echo div5(4)."<br />";
    ?>
  </body>
</html>