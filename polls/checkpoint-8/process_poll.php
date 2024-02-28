<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting on a poll...</title>
</head>
<body>
    <?php
        require("../db_info.php");

        $connect = mysqli_connect($server, $username, $password, $db);

        if(!$connect) {
            die("Connection to database failed!");
        }

        $ip = $_POST["ip"];
        $id = $_POST["id"];
        $response = $_POST["response"];
        
        $query = "INSERT INTO poll_results (ip_address, poll_id, response) VALUES ('$ip', '$id', '$response')";

        if(mysqli_query($connect, $query)) {
            echo "Voted successfully!";
        }
        else {
            echo "Voting process failed!";
        }
    ?>

    <meta http-equiv="refresh" content="2; URL='//mthscs.net/vsenthil/polls/checkpoint-8'">
</body>
</html>