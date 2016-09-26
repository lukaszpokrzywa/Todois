<?php
class Task {
    private $taskName;
    private $taskDescript;
    
    public function __construct($name, $descript){
        $this->setTaskName($name);
        $this->setTaskDescript($descript);
    }
    
    public function setTaskName($newName){
        $this->taskName = (is_string($newName) && strlen(trim($newName)) > 0) ? trim($newName) : '';
        return $this;
        
    }
    
    public function getTaskName() {
        return $this->taskName;
    }
    
    public function setTaskDescript($newDescript){
        $this->taskDescript = (is_string($newDescript) && strlen(trim($newDescript)) > 0) ? trim($newDescript) : '';
        return $this;
        
    }
    
    public function getTaskDescript() {
        return $this->taskDescript;
    }
    
    public function showTask() {
        echo "$this->taskName - $this->taskDescript<br>";
    }
           
    
    
}

