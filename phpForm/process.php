<html>
    <?php
        $name = $_POST["name"];
        
        echo "<p><b>Your name: </b>". $name ."</p>";
        echo "<p><b>Your name shuffled: </b>". str_shuffle($name) ."</p>";
        echo "<p><b>The number of E's in your name: </b>". substr_count($name, "e") ."</p>"; 
    ?>
</html>