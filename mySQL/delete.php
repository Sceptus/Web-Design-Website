<html>
    <body>
        <?php
            require("db_info.php");

            $connect = mysqli_connect($server, $username, $password, $db);

            if(!$connect) {
                die("Connection to database failed!");
            }

            $id = $_GET["id"];

            $query = "DELETE FROM contacts WHERE id='$id'";

            mysqli_query($connect, $query) or die(mysqli_error("ERROR"));

            echo "Deletion Successful";
        ?>

        <meta http-equiv="refresh" content="3; URL='index.php'">
    </body>
</html>