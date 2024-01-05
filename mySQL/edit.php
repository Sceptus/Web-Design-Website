<?php
	require("db_info.php");
	
	$connect = mysqli_connect($server, $username, $password, $db);
	
	if(!$connect) {
		die("Connection to Database Failed!");
    }

	$id = $_GET["id"];
	
	$query = "SELECT * FROM contacts WHERE id='$id'";
	$result = mysqli_query($connect, $query);
	
	while($row = mysqli_fetch_assoc($result)) {
		$firstName = $row["firstName"];
        $lastName = $row["lastName"];
        $email = $row["email"];
    }
?>

<html>
    <body>
        <form action="process_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        First Name: 
        <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br/>
        Last Name: 
        <input type="text" name="lastName" value="<?php echo $lastName; ?>"><br/>
        E-Mail: 
        <input type="text" name="email" value="<?php echo $email; ?>"><br/><br/>
        
        <input type="submit" value="Update">
        </form>
    </body>
</html>