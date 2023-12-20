<html>
    <body>
        <?php
            require("db_info.php");

            $connect = mysqli_connect($server, $username, $password, $db);

            $firstName = $_POST["newFirstName"];
            $lastName = $_POST["newLastName"];
            $email = $_POST["newEmail"];

            $query = "INSERT INTO contacts (firstName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";
            if(mysqli_query($connect, $query)) {
                echo "Inserted successfully";
            } else {
                echo "ERROR";
            }
        ?>

        <meta http-equiv="refresh" content="3; URL = 'index.php'">
    </body>
</html>