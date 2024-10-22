<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
</head>

  <body>
    <?php
    function odd_for() {
        echo "Odd numbers from 0 to 100 with for:<br />";
        for ($i = 0; $i < 100; $i++) {
            if ($i % 2 != 0) 
                print $i." ";
        }
        echo "<br />";
    }

    function odd_while() {
        echo "Odd numbers from 0 to 100 with while:<br />";
        $i = 0;
        while ($i < 100){
            if ($i % 2 != 0) 
                print $i." ";
            $i++;
        }
        echo "<br />";
    }

    odd_for();
    odd_while();

    ?>
  </body>
</html>