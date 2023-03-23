<?php

class newRequest extends Dbh{
    protected function newTest($pid, $scan, $test, $urgency, $department, $date){
        $stmt = $this->connect()->prepare('INSERT INTO requestdirectory (request_pID, request_scanType, request_testType, request_urgency, request_department, request_date) VALUES (?, ?, ?, ?, ?, ?);');

        if(!$stmt->execute(array($pid, $test, $scan, $urgency, $department, $date))){
            $stmt = null;
            header("location: ../newRequest.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }
}