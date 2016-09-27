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
    if(isset($_POST['name']) && isset($_POST['description']) &&
            strlen(trim($_POST['name'])) > 0 && 
            strlen(trim($_POST['description'])) > 0){
        $tasks[] = new Task(trim($_POST['name']), trim($_POST['description']));
        $_SESSION['tasks'] = serialize($tasks);
    }
} else if($_SERVER['REQUEST_METHOD'] == 'GET')  {
    foreach($_GET as $key => $val) {
            $tasks[$key]->finishTask();
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
        echo "<form action='index.php' method='GET'><table>";
        echo '<tr><th>Task name</th><th>Task description</th></tr>';
        foreach ($tasks as $key=>$task) {
            echo '<tr>';
            $task->showTaskInArrayRow();
        echo "<td><input type='submit' class='button' name='$key' value='Finish'></td></tr>";
        }
        echo '</table></form>';
    }
?>
    <form action="addTask.php" method="POST">
        <label>
            <input type="submit" name="new" value='Add new task'>
        </label>
    </form>       
</body>
</html>


