<?php
    session_start();
    $user = $_SESSION["user"];
?>

<html>
    <body>
        <?php
            if($user != null) {
                echo "<strong>Welcome ". $_SESSION["user"] ."!</strong>";
            }
            else {
                echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=index.php\">";
                exit();
            }
        ?>

        <a href="index.php">Logout</a>
    </body>
</html>