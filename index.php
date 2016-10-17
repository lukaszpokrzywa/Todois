<?php
session_start();
require_once 'Task.php';
/*    Zadanie 2
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
} else { //dla pewności jeżeli nie ma zadań można zainicjować $tasks jako pustą tablicę
    $tasks = [];
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['name']) && isset($_POST['description']) &&
        strlen(trim($_POST['name'])) > 0 && 
        strlen(trim($_POST['description'])) > 0 &&
        isset($_POST['priority']) && isset($_POST['date'])){
        //dodałem sprawdzenie czy na formularzu są pola priority i date
        $tasks[] = new Task(trim($_POST['name']), trim($_POST['description']),
                $_POST['priority'], $_POST['date']);
        $_SESSION['tasks'] = serialize($tasks);
    }
} else if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['finishTask']))  {
//    foreach($_GET as $key => $val) {
    /* 
     * Tutaj pętla nie jest potrzebna bo wiemy, że zawsze w będziemy kończyć 
     * tylko jedno zadanie. Dodatkowo gdyby w URL-u pojawiłby się inne parametry
     * poza numerem zadania do skończenia mógłby pojawić się błąd odwołania do
     * nieistniejącego elementu w tablicy $tasks.
     * Z tego też powodu nie powinniśmy szukac numeru zadania 
     * do skończenia w całej tablicy $_GET ale pod konkretnym kluczem z $_GET,
     * np. $_GET['finishTask']
     * 
     */
            $tasks[$_GET['finishTask']]->finishTask();
            $_SESSION['tasks'] = serialize($tasks);
//    }
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
    if(count($tasks) > 0){
        echo "<table>";
        echo '<tr><th>Task name</th><th>Task description</th>'
        . '<th>Priority</th><th>Date</th></tr>';
        
        /* 
         * można byłoby się pokusić o wyświetlanie zadań zgodnie z ich
         * priorytetem, czyli najpierw te z priorytetm high, potem medium itd.
         */
        foreach ($tasks as $key=>$task) {
            /* 
             * zgodnie z dobrą praktyką każde zadanie powinno mieć oddzielny 
             * formularz do kończenia
             */
            $styleRow = ($task->getDate() != '' && $task->getDate() < date('Y-m-d')) ? "style='color:red'" : ""; 
            echo "<tr $styleRow >";
            $task->showTaskInArrayRow();
            echo "<td><form action='index.php' method='GET'>"
            . "<input type='submit' class='button' value='Finish'>"
            . "<input type='hidden' name='finishTask' value='$key'>"
            . "</form></td></tr>";
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


