<?php
    session_start();
?>

<html>
    <body>
        <?php
            $_SESSION["state"] = "active";
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["word"] = $_POST["word"];

            echo $_SESSION["name"]. ", your session is ". $_SESSION["state"] ."!";

            echo "<p> Your word: ". $_SESSION["word"] ."</p>";
            echo "<p> Your word reversed: ". strrev($_SESSION["word"]) ."</p>";
        ?>

        <a href="session2.php">Continue Session</a>
    </body>
</html>