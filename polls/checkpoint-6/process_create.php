<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating new poll...</title>
</head>
<body>
    <?php
        require("../db_info.php");

        $connect = mysqli_connect($server, $username, $password, $db);

        if(!$connect) {
            die("Connection to database failed!");
        }        

        $pollQuestion = trim($_POST["pollQuestion"]);
        $pollResponse1 = trim($_POST["pollResponse1"]);
        $pollResponse2 = trim($_POST["pollResponse2"]);
        $pollResponse3 = trim($_POST["pollResponse3"]);
        $pollResponse4 = trim($_POST["pollResponse4"]);

        if(empty($pollQuestion) || empty($pollResponse1) || empty($pollResponse2)) {
            echo "ERROR: The poll must contain atleast two responses, and a question!";
            echo "<meta http-equiv=\"refresh\" content=\"3; URL='//mthscs.net/vsenthil/polls/checkpoint-6/create.php'\">";
            exit();
        }

        $query = "INSERT INTO poll (poll_question, poll_response1, poll_response2, poll_response3, poll_response4) VALUES ('$pollQuestion', '$pollResponse1', '$pollResponse2', '$pollResponse3', '$pollResponse4')";

        if(mysqli_query($connect, $query)) {
            echo "Created poll successfully";
        }
        else {
            echo "Poll creation failed";
        }
    ?>

    <meta http-equiv="refresh" content="2; URL='//mthscs.net/vsenthil/polls/checkpoint-6'">
</body>
</html>