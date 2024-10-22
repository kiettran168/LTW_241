<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>lab3</title>
</head>

  <body>
    <table style="border:1px solid; border-collapse:collapse; background:yellow;">
    <?php
    for ($i = 1; $i < 8; $i++) {
        echo "<tr style=\"border:1px solid;\">";
        for ($j = 1; $j < 8; $j++) {
            echo "<td style=\"border:1px solid; text-align:center;\">".$i * $j."</td>";
        }
        echo "</tr>";
    }
    ?>
    </table>
  </body>
</html>