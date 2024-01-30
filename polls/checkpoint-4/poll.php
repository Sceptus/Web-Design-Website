<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for a Poll</title>
</head>
<body>
    <h1>MTHS CS Polls</h1>
    <hr />
    <a href="//mthscs.net/vsenthil/polls/checkpoint-4">Home</a>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="//mthscs.net/vsenthil/polls/checkpoint-4/create.php">Create Poll</a>
    <br />
    <hr />
    <br />

    <?php
        require("../db_info.php");

        $connect = mysqli_connect($server, $username, $password, $db);

        if(!$connect) {
            die("Connection to database failed!");
        }

        $id = $_GET["id"];
        
        $query = "SELECT * FROM poll WHERE poll_id='$id'";
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $pollQuestion = $row["poll_question"];
            $pollResponse1 = $row["poll_response1"];
            $pollResponse2 = $row["poll_response2"];
            $pollResponse3 = $row["poll_response3"];
            $pollResponse4 = $row["poll_response4"];
        }
    ?>

    <p><?php echo $pollQuestion; ?></p>

    <form action="process_poll.php" method="post">
        <input type="radio" name="response" value="1" checked><?php echo $pollResponse1; ?><br/><br/>
        <input type="radio" name="response" value="2"><?php echo $pollResponse2; ?><br/><br/>
        <input type="radio" name="response" value="3"><?php echo $pollResponse3; ?><br/><br/>
        <input type="radio" name="response" value="4"><?php echo $pollResponse4; ?><br/><br/>
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" value="Vote">
    </form>
</body>
</html>