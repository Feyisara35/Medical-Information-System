<?php

    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>

<?php

class Signup extends Dbh{
    protected function setUser($firstName,  $lastName, $staffID, $department, $unit, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO createaccount (ca_firstName, ca_lastName, ca_staffID, ca_department, ca_unit, ca_password) VALUES (?, ?, ?, ?, ?, ?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($firstName,  $lastName, $staffID, $department, $unit, $hashedPwd))) {
            $stmt = null;
            header("location: ../createAccount.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($staffID) {
        $stmt = $this->connect()->prepare('SELECT ca_staffID FROM createaccount WHERE ca_staffID = ?;');

        if(!$stmt->execute(array($staffID))) {
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