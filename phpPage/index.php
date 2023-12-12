<html lang="en">
  <head>
    <title>PHP Page</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <h1>My Table</h1>
    <?php   
      echo "<table>";
      for($i = 1; $i <= 100; $i++) {
        if($i % 2 == 0) {
          echo "<tr><td style=\"background-color: rgb(220, 220, 220);\">". $i ."</td><tr>";
        } else {
          echo "<tr><td style=\"background-color: white;\">". $i ."</td><tr>";
        }
      }
      echo "</table>";
    ?>
  </body>
</html>