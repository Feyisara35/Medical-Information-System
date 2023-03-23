
<?php
    session_start();

    if(isset($_SESSION["accountid"]))
    {
    require_once ('functions.php');

    echo makePageStart('Home Page', 'design.css');

    echo makeHeader(array("dashboard.php" => "ZT"));
    
   
   
    echo makeNavMenu(array("includes/logout.inc.php" => "Logout", "patientdirectory.php" => "Patient Directory", "requestdirectory.php" => "Request Directory"));
    }

    echo startMain();
    
?>



<div id= "dashboard-border">
    <main >
        <div id="pageTittle">
            <h1>Welcome,</h1>
        </div>

        <div>
            <div id= "buttons">
                <button id= "dashboard-button" type = "button">
                    <a href="patientDirectory.php"> Patient Repository</a>
                </button>

                <button id= "dashboard-button" type= "button">
                    <a href="requestdirectory.php">Request Directory</a>   
                </button>
            </div>

            <div id= "buttons2">
             <button id= "dashboard-button" type = "button">
                <a href="newRequest.php">Raise New Test/Scan</a>
            </button>
            </div>  
        </div>
          
    </main> 

    <footer id="newAccount">

             <div id="reportBug">
                <a href=" "><h4> Report a bug?</h4></a>
            </div>  
        </footer>
</div>




<?php

//$user_data = check_login($conn);
?>