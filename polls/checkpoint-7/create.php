<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Poll</title>
</head>
<body>
    <h1>MTHS CS Polls</h1>
    <hr />
    <a href="//mthscs.net/vsenthil/polls/checkpoint-7">Home</a>
    &nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="//mthscs.net/vsenthil/polls/checkpoint-7/create.php">Create Poll</a>
    <br />
    <hr />
    <br />

    <form action="process_create.php" method="post">
        <label for="pollQuestion">Poll Question: </label>
        <input id="pollQuestion" type="text" name="pollQuestion">
        <span style="color:#F00">(required)</span>
        <br />

        <label for="pollResponse1">Poll Response #1: </label>
        <input id="pollResponse1" type="text" name="pollResponse1">
        <span style="color:#F00">(required)</span>
        <br />

        <label for="pollResponse2">Poll Response #2: </label>
        <input id="pollResponse2" type="text" name="pollResponse2">
        <span style="color:#F00">(required)</span>
        <br />

        <label for="pollResponse3">Poll Response #3: </label>
        <input id="pollResponse3" type="text" name="pollResponse3">
        <br />

        <label for="pollResponse4">Poll Response #4: </label>
        <input id="pollResponse4" type="text" name="pollResponse4">
        <br /><br />

        <input type="submit" value="Create">
    </form>
</body>
</html>