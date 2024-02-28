<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Polls - Checkpoint #11</title>
</head>
<body>
    <h1>MTHS CS Polls</h1>
    <hr />
    <a href="//mthscs.net/vsenthil/polls/checkpoint-11">Home</a>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="//mthscs.net/vsenthil/polls/checkpoint-11/create.php">Create Poll</a>
    <br />
    <hr />
    <br />

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th><a href="index.php?sort=poll">Poll</a></th>
            <th><a href="index.php?sort=date">Date Created</a></th>
            <th>Voted</th>
        </tr>
        <?php
            require("../db_info.php");

            $connect = mysqli_connect($server, $username, $password, $db);

            if(!$connect) {
                die("Connection to database failed!");
            }

            $v = "No";

            if($_GET['sort'] == "poll") {
                $query = "SELECT * FROM poll ORDER BY poll_question ASC";
            } else {
                $query = "SELECT * FROM poll ORDER BY poll_timestamp DESC";
            }

            $result = mysqli_query($connect, $query);

            while($row = mysqli_fetch_assoc($result)) {
                $q = "SELECT ip_address FROM poll_results WHERE poll_id = '$row[poll_id]' AND ip_address = '$ip_address'";
                $r = mysqli_query($connect, $q);
                if(mysqli_num_rows($r) > 0) {
                    $v = "Yes";
                }
                echo "<tr><td><a href=\"poll.php?id=". $row["poll_id"] ."\">". $row["poll_question"] ."</a></td><td>". $row["poll_timestamp"] ."</td><td>". $v ."</td></tr>";
            }
        ?>
    </table> 
</body>
</html>