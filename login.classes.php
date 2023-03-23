<?php
    // require_once ('functions.php');

    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>


<?php

 class Login extends Dbh {

    
    protected function getUser($staffID, $password) {
        //I added the mysqli_query 
        $stmt = $this->connect()->prepare('SELECT ca_password FROM createaccount WHERE ca_staffID = ? OR ca_lastName = ?;');


        if(!$stmt->execute(array($staffID, $password))) {
            $stmt = null;
            header("location: ../adminLogin.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../adminLogin.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        //$pwdHashed = mysqli_fetch_assoc($result);
        $checkPwd = password_verify($password, $pwdHashed[0]["ca_password"]);

        if($checkPwd == false)
        {
            $stmt = null;
            header("location: ../adminLogin.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM createaccount WHERE ca_staffID = ? OR ca_lastName = ? AND ca_password = ?;');

            if(!$stmt->execute(array($staffID, $staffID, $password))) {
                $stmt = null;
                header("location: ../adminLogin.php?error=stmtfailed");
                exit();
            }

           
            if($stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../adminLogin.php?error=passwordfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            

            session_start();
            $_SESSION["accountid"] = $user[0]["ca_ID"];
            $_SESSION["staffID"] = $user[0]["ca_staffID"];

            $stmt = null;
        }
    }
}
?>