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
                <input type='text' size='34' maxlength="30" name='name'>
            </label>
            <br>
            <label>
                Task description:<br>
                <textarea rows="10" cols="30" maxlength="100" name='description'></textarea>
            </label>
            <br>
            <label>Priority</label><br>
                <select name="priority">
                    <option value="none">None</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select><br>
            <label>Data</label><br>
                <input type="date" name="date"><br>
            <input type='submit' value="Add task">
        </form>
    </fieldset>
</body>
</html>

