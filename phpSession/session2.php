<?php
    session_start();
?>
<html>
    <body>
        <?php
            if(isset($_SESSION["state"])) {
                echo "<p> Your word: ". $_SESSION["word"] ."</p>";
                echo "<p> Your word reversed: ". strrev($_SESSION["word"]) ."</p>";
            }
            else {
                echo "Your session is inactive!";
            }
        ?>
        <a href="index.php">End Session</a>
    </body>
</html>