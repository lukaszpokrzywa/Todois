<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add task</title>
</head>
<body>
    <form action="index.php" method="POST">
        <fieldset> <!-- fieldset i legend powinny byc wewnątrz formularza -->
            <legend>Add new task</legend>
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
            <label>Priority<br> <!-- label aby działał prawidłowo powinien obejmować także selecta -->
                <select name="priority">
                    <option value="none">None</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select><br>
            </label>
            <label>Data<br> <!-- taka sama sytuacja z labelem jak wyżej -->
                <input type="date" name="date"><br>
            </label>
            <input type='submit' value="Add task">
        </fieldset>
    </form>
</body>
</html>

