<?php
    session_destroy();
    setcookie(session_name(), '', 0, '/');
    session_regenerate_id(true);
?>
<html>
    <body>
        <h1>My Session</h1>
            <form action="session1.php" method="post">
                <p> Enter your name: </p>
                <input type="text" name="name">
                <br />

                <p> Enter a word: </p>
                <input type="text" name="word">

                <input type="submit">
            </form>
    </body>
</html>