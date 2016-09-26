<?php
    require_once 'Task.php';
    $task = [];
    $task[] = new Task('Work', 'Go to work');
    $task[] = new Task('Play game', 'Play GTA V all day');
    $task[] = new Task('Drink', 'Drink beer all night');
    var_dump($task);
    foreach ($task as $singleTask ) {
        $singleTask->showTask();
    }



