<html>
    <head>
        <title>mySQL</title>
        <link rel="stylesheet" href="index.css" />
    </head>
    <body>
        <?php
            require("db_info.php");

            $connect = mysqli_connect($server, $username, $password, $db);

            if(!$connect) {
                die("Connection to database failed!");
            }

            $query = "SELECT * FROM contacts ORDER BY lastName ASC";
            $result = mysqli_query($connect, $query);

            while($row = mysqli_fetch_assoc($result)) {
                echo $row["firstName"] ." ". $row["lastName"] ."&nbsp;&nbsp;&nbsp;&nbsp;". $row["email"] . 
                "&nbsp;<a href=\"edit.php?id=". $row["id"] ."\">Edit</a> 
                &nbsp;<a href=\"delete.php?id=". $row["id"] ."\">Delete</a> <br /><br />";
            }
        ?>

        <a href="create.php">Add Contact</a>
    </body>
</html>