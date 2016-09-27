<?php
session_start();
require_once 'Task.php';
/*    require_once 'Task.php';
    $task = [];
    $task[] = new Task('Work', 'Go to work');
    $task[] = new Task('Play game', 'Play GTA V all day');
    $task[] = new Task('Drink', 'Drink beer all night');
    var_dump($task);
    foreach ($task as $singleTask ) {
        $singleTask->showTask();
    }
*/
if(isset($_SESSION['tasks'])) {
    $tasks = unserialize($_SESSION['tasks']);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name']) && isset($_POST['description'])){
        $tasks[] = new Task($_POST['name'], $_POST['description'] );
        $_SESSION['tasks'] = serialize($tasks);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
</style>
</head>
<body>
<?php
    if(isset($tasks)){
        echo '<table>';
        echo '<tr><th>Task name</th><th>Task description</th></tr>';
        foreach ($tasks as $task) {
            echo "<tr><td>" . $task->getTaskName() . "</td><td>"
                . $task->getTaskDescript() . "</td></tr>";
        }
        echo '</table>';
    }
?>
    <form action="addTask.php" method="POST">
        <label>
            <input type="submit" name="new" value='Add new task'>
        </label>
    </form>       
</body>
</html>


