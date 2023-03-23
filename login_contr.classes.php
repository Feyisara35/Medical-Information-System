<?php
    // require_once ('functions.php');

    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>

<?php

class loginContr extends Login {

    private $staffID;
    private $password;
    
    public function __construct($staffID, $password) {
        $this->staffID = $staffID;
        $this->password = $password;
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            // echo "Empty input!";
            header("location: ../adminLogin.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->staffID, $this->password);
    }

    private function emptyInput() {
        $result;
        if(empty($this->staffID) || empty($this->password)) {
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

}

?>