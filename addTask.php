<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add task</title>
</head>
<body>
    <fieldset>
        <legend>
            Add new task
        </legend>
        <form action="index.php" method="POST">
            <label>
                Task name:<br>
                <input type='text' size='34' name='name'>
            </label>
            <br>
            <label>
                Task description:<br>
                <textarea rows="10" cols="30" name='description'></textarea>
            </label>
            <br>
            <input type='submit' value="Add task">
        </form>
    </fieldset>
</body>
</html>

