<?php

class NewPatientContr extends newPatient{
    private $patid;
    private $pLastName;
    private $pFirstName;
    private $page;
    private $pemail;
    // private $date;
   

    public function __construct($pLastName, $pFirstName, $patid, $page, $pemail){
        $this->patid = $patid;
        $this->pLastName = $pLastName;
        $this->pFirstName = $pFirstName;
        $this->page = $page;
        $this->pemail = $pemail;
        // $this->date = $date;
    }

    public function createPatient(){
        if($this->emptyInput() == false){
            header("location: ../newPatient.php?error=emptyinput");
            exit();
        }
        if($this->pidTakenCheck() == false)
            {
                // echo "Username or email taken!";
                header("location: ../newPatient.php?error=idtaken");
                exit();
            }

        $this->newPatient($this->pLastName, $this->pFirstName, $this->patid, $this->page, $this->pemail);
    }

    private function emptyInput() {
        $result;
        if(empty($this->patid) || empty($this->pLastName) || empty($this->pFirstName) || empty($this->page) || empty($this->pemail)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    private function pidTakenCheck() {
        $result;
        if (!$this->checkPatient($this->patid)) 
        {
            $result = false;
        }
        else 
        {
            $result = true;
        }
        return $result;
    }
}