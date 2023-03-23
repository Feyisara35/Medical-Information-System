<?php

class newPatient extends Dbh{
    protected function newPatient($pLastName, $pFirstName, $patid, $page, $pemail){
        $stmt = $this->connect()->prepare('INSERT INTO patientdirectory (patient_firstName, patient_lastName, patient_ID, patient_age, patient_email) VALUES (?, ?, ?, ?, ?);');

        if(!$stmt->execute(array($pLastName, $pFirstName, $patid, $page, $pemail))){
            $stmt = null;
            header("location: ../newPatient.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;
    }

    protected function checkPatient($patid) {
        $stmt = $this->connect()->prepare('SELECT patient_ID FROM patientdirectory WHERE patient_ID = ?;');

        if(!$stmt->execute(array($patid))) {
            $stmt = null;
            header("location: ../createAccount.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

}