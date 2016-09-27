<?php
class Task {
    private $taskName;
    private $taskDescript;
    private $finished;
    
    public function __construct($name, $descript){
        $this->setTaskName($name);
        $this->setTaskDescript($descript);
        $this->finished = false;
    }
    
    public function setTaskName($newName){
        $this->taskName = (is_string($newName) && strlen(trim($newName)) > 0) ? trim($newName) : null;
        return $this;
        
    }
    
    public function getTaskName() {
        return $this->taskName;
    }
    
    public function setTaskDescript($newDescript){
        $this->taskDescript = (is_string($newDescript) && strlen(trim($newDescript)) > 0) ? trim($newDescript) : null;
        return $this;
        
    }
    
    public function getTaskDescript() {
        return $this->taskDescript;
    }
    
    public function getFinished() {
        $this->finished;
    }
    public function finishTask() {
        $this->finished = true;
    }
    
    public function showTask() {
        echo "$this->taskName - $this->taskDescript<br>";
    }
    //Wyświetla zadania w tabeli na dwa sposoby
    public function showTaskInArrayRow() {
        if ($this->finished == false) {
            echo "<td>" . $this->getTaskName() . "</td><td>"
            . $this->getTaskDescript() . "</td>";
        } else {
            echo "<td><del>" . $this->getTaskName() . "</del></td><td><del>"
            . $this->getTaskDescript() . "</del></td>";
        }
    }
           
    
    
}

