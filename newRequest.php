<?php
    session_start();

    if(isset($_SESSION["accountid"]))
    {
    require_once ('functions.php');

    echo makePageStart('New Request', 'design.css');

    echo makeHeader(array("dashboard.php" => "ZT"));

    
    echo makeNavMenu(array("includes/logout.inc.php" => "Logout", "dashboard.php" => "Home", "patientdirectory.php" => "Patient Directory", "requestdirectory.php" => "Request Directory"));
    }


    echo startMain();
?>

<body>
    <div id= "newRequest-border">
        <div id="pageTittle">
                    <h1>New Request Page</h1>
        </div>
        <div id= newRequestForm>
            <form action="includes/newRequest.inc.php" method= "post">
                <label for="patientid"> Patient ID:</label>    
                <input type="text" name = "pid" placeholder = "Patient ID">

                <br>
                <label for="test">Test Type</label>
                <select name="test" id="test">
                    <option value="">    </option>
                    <option value="Urine">Urine Test</option>
                    <option value="Blood">Blood Sugar Test</option>
                </select>
                <br>
                <br>
                <label for="scan">Scan Type</label>
                <select name="scan" id="scan">
                    <option value="">    </option>
                    <option value="Pelvic">Pelvic Scan</option>
                    <option value="Mri">MRI</option>
                </select>
                <br>
                <br>
                <label for="urgency"> Urgency Level</label>
                <select name="urgency" id="urgency">
                <option value=""> </option>
                <option value="High">High</option>
                <option value="Regular">Regular</option>
                </select>
                <br>
                <br>
                <label for="department">Department receiving test</label>
                <input type="text" name = "department" placeholder = "Send Test to:">

                <br>
                <br>
                <label for="date">Date of Submission</label>
                <input type="date" name = "date">
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
                        }
                    ?>
                </span>
                
            </form>
        </div>
    </div>
</body>
