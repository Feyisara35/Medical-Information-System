<?php
    session_start();

    if(isset($_SESSION["accountid"]))
    {
    require_once ('functions.php');

    echo makePageStart('New Patient Request', 'design.css');

    echo makeHeader(array("dashboard.php" => "ZT"));

    
    echo makeNavMenu(array("includes/logout.inc.php" => "Logout", "dashboard.php" => "Home","profilePage.php" => "Profile",   "patientdirectory.php" => "Patient Directory", "requestdirectory.php" => "Request Directory"));
    }


    echo startMain();
?>

<body>
    <div id= "newRequest-border">
        <div id="pageTittle">
                <h1>New Patient Page</h1>
        </div>
        <div id= newPatientForm>
            <form action="includes/newPatient.inc.php" method= "post">
                <label for="patid"> Patient ID:</label>    
                <input type="text" name = "patid" placeholder = "Patient ID">

                <br>
                <br>
                <label for="pat_lastname">Last Name</label>
                <input type="text" name = "pat_lastname" placeholder = "Last Name">
                <br>
                <br>
                <label for="pat_firstname">First Name</label>
                <input type="text" name = "pat_firstname" placeholder = "First Name">
                <br>
                <br>
                <label for="pat_age">Age</label>
                <input type="int" name = "pat_age" placeholder = "Age">
                <br>
                <br>
                
                <label for="pat_email">Email</label>
                <input type="email" name = "pat_email" placeholder = "Email">
                <br>
                <br>
                
                <br>
                <button id= "submit" type = "submit" name= "submit">Generate Request</button>
                <span id= error>
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "emptyinput"){
                                echo "<p>Fields cannot be empty!</p>";
                            }
                            if($_GET["error"] == "idtaken"){
                                echo "<p>Patient ID Taken!</p>";
                            }
                        }
                    ?>
                </span>
                
            </form>
        </div>
    </div>
</body>