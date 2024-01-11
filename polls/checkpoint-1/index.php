<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polls - Checkpoint #1</title>
</head>
<body>
    <h1>MTHS CS Polls</h1>

    <?php
        require("../db_info.php");

        $connect = mysqli_connect($server, $username, $password, $db);

        if(!$connect) {
            die("Connection to database failed!");
        }

        $query = "SELECT * FROM poll ORDER BY poll_timestamp DESC";
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($result)) {
            echo "<a href=\"poll.php?id=". $row["poll_id"] ."\">". $row["poll_question"] ."</a><br /><br />";
        }
    ?>
</body>
</html>