<?php

    class Patient extends Dbh{
        public function getPatientInfo(){
            $stmt = $this->connect()->prepare('SELECT * FROM patientdirectory');

            if(!$stmt->execute(array())) {
                $stmt = null;
                header("location: patientdiretory.php?error=stmtfailed");
                exit();
            }
    
            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: patientdiretory.php?error=patientnotfound");
                exit();
            }
    
            $requestData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $requestData;
        }

       
    }