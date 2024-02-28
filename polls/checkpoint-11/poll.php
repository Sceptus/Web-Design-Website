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
    <a href="//mthscs.net/vsenthil/polls/checkpoint-11">Home</a>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="//mthscs.net/vsenthil/polls/checkpoint-11/create.php">Create Poll</a>
    <br />
    <hr />
    <br />

    <?php
        require("../db_info.php");

        $connect = mysqli_connect($server, $username, $password, $db);

        if(!$connect) {
            die("Connection to database failed!");
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        } 

        $id = $_GET["id"];

        $voted = false;
        $votesR1 = 0;
        $votesR2 = 0;
        $votesR3 = 0;
        $votesR4 = 0;
        $totalVotes = 0;
        $duplicateVote = false;

        $ip_query = "SELECT * FROM poll_results WHERE poll_id='$id'";
        $ip_result = mysqli_query($connect, $ip_query);

        while($row = mysqli_fetch_assoc($ip_result)) {
            if($row["response"] == 1) {
                $votesR1++;
            }
            else if($row["response"] == 2) {
                $votesR2++;
            }
            else if($row["response"] == 3) {
                $votesR3++;
            }
            else if($row["response"] == 4) {
                $votesR4++;
            }

            $totalVotes++;

            if($ip_address == $row["ip_address"] && !$duplicateVote) {
                echo "You have already voted from: ". $ip_address;
                $voted = true;
                $duplicateVote = true;
            }
        }
        
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
        <?php
            if($voted) {
                echo $pollResponse1 ." ". $votesR1 ." votes (". number_format(($votesR1/$totalVotes) * 100, 2 ) ."%)<br/><br/>";
                echo $pollResponse2 ." ". $votesR2 ." votes (". number_format(($votesR2/$totalVotes) * 100, 2 ) ."%)<br/><br/>";

                if($pollResponse3 != "") {
                    echo $pollResponse3 ." ". $votesR3 ." votes (". number_format(($votesR3/$totalVotes) * 100, 2 ) ."%)<br/><br/>";
                }
                if($pollResponse4 != "") {
                    echo $pollResponse4 ." ". $votesR4 ." votes (". number_format(($votesR4/$totalVotes) * 100, 2 ) ."%)<br/><br/>";
                }
            } else {
                echo "IP-Address: ". $ip_address ."<br /><br />";

                if($pollResponse1 != "") {
                    echo "<input type=\"radio\" name=\"response\" value=\"1\" checked>". $pollResponse1 ."<br/><br/>";
                }
                if($pollResponse2 != "") {
                    echo "<input type=\"radio\" name=\"response\" value=\"2\">". $pollResponse2 ."<br/><br/>";
                }
                if($pollResponse3 != "") {
                    echo "<input type=\"radio\" name=\"response\" value=\"3\">". $pollResponse3 ."<br/><br/>";
                }
                if($pollResponse4 != "") {
                    echo "<input type=\"radio\" name=\"response\" value=\"4\">". $pollResponse4 ."<br/><br/>";
                }
                echo "<input type=\"hidden\" name=\"ip\" value=\"". $ip_address ."\">";
                echo "<input type=\"hidden\" name=\"id\" value=\"". $id ."\">";
                echo "<input type=\"submit\" value=\"Vote\">";
            }
        ?>
    </form>
</body>
</html>