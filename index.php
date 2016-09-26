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
 else {
     $tasks =[];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name']) && isset($_POST['description'])){
        $tasks[] = new Task($_POST['name'], $_POST['description'] );
        $_SESSION['tasks'] = serialize($tasks);
    }
}
var_dump($tasks);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form action="addTask.php" method="POST">
        <label>
            <input type="submit" name="new" value='Add new task'>
        </label>
    </form>       
</body>
</html>


