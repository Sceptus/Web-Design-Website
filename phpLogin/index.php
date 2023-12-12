<?php
    session_start();
	session_unset();
	session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
	session_start();

    require("functions.php");

    if (isset($_POST["user"]) && isset($_POST["pass"]))
	{
		$user = strtolower($_POST["user"]);
		$pass = $_POST["pass"];
	
		if (login($user, $pass)) {
			$_SESSION["user"] = $user;
        }
	}

	if (isset($_SESSION["user"]))
	{
		echo "<meta HTTP-EQUIV=\"REFRESH\" content=\"0; url=welcome.php\">";
		exit();
	}
?>

<html>
    <head>
        <title>Pizza Login</title>
        <link rel="shortcut icon" href="pizza_logo.ico">
    </head>
    <body>
        <h1>Pizza Login</h1>
        <table>
            <tr>
                <td><img src="../images/pizza_logo.jpg"></td>
                <td>
                    <form name="login" action="index.php" method="post">
                        <label for="user">Username: </label>
                        <input type="text" id="user" name="user"><br />

                        <label for="pass">Password: </label>
                        <input type="password" id="pass" name="pass"><br />

                        <input type="submit" value="Login">
                    </form>
                </td>
            </tr>
        </table>

        <strong>KEY:</strong> <br />
        <p>Username: Vishal</p>
        <p>Password: letsgo</p>
    </body>
</html>