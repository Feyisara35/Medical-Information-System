<?php
    // require_once ('functions.php');

    // include "../functions.php";

    require_once "../functions.php";

    echo makePageStart('Create New Account', 'design.css');

    echo makeHeader(array("adminLogin.php" => "ZT"));

    echo startMain();
?>

<?php
    if(isset($_POST["submit"]))
    {

        // Grabbing the data
        $staffID = $_POST["ca_staffID"];
        $password = $_POST["ca_password"];

        // Instantiate SignupContr class
        include "../classes/dbh.classes.php";
        include "../classes/login.classes.php";
        include "../classes/login_contr.classes.php";
        $login = new loginContr($staffID, $password);

        // Running error handlers and user signup
        $login->loginUser();

        // Going to back to front page
        header("location: ../dashboard.php?error=none");
    }

?>