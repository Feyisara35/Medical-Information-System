
<?php
    
    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>

<?php
    if(isset($_POST["submit"])){
        //Grabbing Data from the Form
        $firstName      = $_POST["ac_firstName"];
        $lastName       = $_POST["ac_lastName"];
        $staffID        = $_POST["ac_staffID"];
        $department     = $_POST["ac_department"];
        $unit           = $_POST["ac_unit"];
        $password       = $_POST["ac_password"];
        $password_conf  = $_POST["ac_password_conf"];


        //Instantiating SignupContr Class
        include "../classes/dbh.classes.php";
        include "../classes/signup.classes.php";
        include "../classes/signup_contr.classes.php";
        $signup = new SignupContr($firstName, $lastName, $staffID, $department, $unit, $password, $password_conf);

        //Run error handlers 
        $signup->signupUser();

        // Going to back to front page
        header("location: ../adminLogin.php?error=none");
    }