<?php
    require("db_info.php");

    $connect = mysqli_connect($server, $username, $password, $db);

    if(!$connect) {
        die("Connection to database failed!");
    }

    $query = "SELECT food FROM favoriteFoods ORDER BY id ASC";
    $result = mysqli_query($connect, $query);

    while($row = msqli_fetch_assoc($result)) {
        echo $row["food"]."<br />";
    }
?>