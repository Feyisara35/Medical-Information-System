<?php

class NewRequestContr extends newRequest{
    private $pid;
    private $scan;
    private $test;
    private $urgency;
    private $department;
    private $date;

    public function __construct($pid, $scan, $test, $urgency, $department, $date){
        $this->pid = $pid;
        $this->scan = $scan;
        $this->test = $test;
        $this->urgency = $urgency;
        $this->department = $department;
        $this->date = $date;
    }

    public function createTestScan(){
        if($this->emptyInput() == false){
            header("location: ../newRequest.php?error=emptyinput");
            exit();
        }

        $this->newTest($this->pid, $this->scan, $this->test, $this->urgency, $this->department, $this->date);
    }

    private function emptyInput() {
        $result;
        if(empty($this->pid) || empty($this->scan) || empty($this->test) || empty($this->urgency) || empty($this->department) || empty($this->date)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}