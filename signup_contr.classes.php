<?php
    // require_once ('functions.php');

    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>
<?php
    class SignupContr extends Signup{
       
        private $firstName;
        private $lastName;
        private $staffID;
        private $department;
        private $unit;
        private $password;
        private $password_conf;

        public function __construct($firstName, $lastName, $staffID, $department, $unit, $password, $password_conf){
            $this->firstName       = $firstName;
            $this->lastName        = $lastName;
            $this->staffID         = $staffID;
            $this->department      = $department;
            $this->unit            = $unit;
            $this->password        = $password;
            $this->password_conf   = $password_conf;
        }

        public function signupUser() {
            if($this->emptyInput() == false) {
                // echo "Empty input!";
                header("location: ../createAccount.php?error=emptyinput");
                exit();
            }
            if($this->invalidSid() == false) {
                // echo "Invalid username!";
                header("location: ../createAccount.php?error=staffid");
                exit();
            }
            // if($this->invalidPassword() == false) {
            //     // echo "Invalid email!";
            //     header("location: ../createAccount.php?error=incorrectPasswordFormat");
            //     exit();
            // }
            if($this->pwdMatch() == false)
            {
                // echo "Passwords don't match!";
                header("location: ../createAccount.php?error=passwordmatch");
                exit();
            }
            if($this->sidTakenCheck() == false)
            {
                // echo "Username or email taken!";
                header("location: ../createAccount.php?error=useroremailtaken");
                exit();
            }
    
            $this->setUser($this->firstName, $this->lastName, $this->staffID, $this->department, $this->unit, $this->password);
        }

        private function emptyInput() {
            $result;
            if(empty($this->firstName) || empty($this->lastName) || empty($this->staffID) || empty($this->department) || empty($this->unit) || empty($this->password) || empty($this->password_conf)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function invalidSid() {
            $result;
            if (!preg_match("/^[a-zA-Z0-9]*$/", $this->staffID)) 
            {
                $result = false;
            }
            else 
            {
                $result = true;
            }
            return $result;
        }

        // private function invalidPassword() {
        //     $result;
        //     if (!preg_match("/^[a-zA-Z0-9]*$/", $this->password, $this->password_conf)) 
        //     {
        //         $result = false;
        //     }
        //     else 
        //     {
        //         $result = true;
        //     }
        //     return $result;
        // }

        private function pwdMatch() {
            $result;
            if ($this->password !== $this->password_conf) 
            {
                $result = false;
            }
            else 
            {
                $result = true;
            }
            return $result;
        }

        private function sidTakenCheck() {
            $result;
            if (!$this->checkUser($this->staffID)) 
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