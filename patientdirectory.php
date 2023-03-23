<?php
    include_once "classes/dbh.classes.php";
   
    include_once "classes/patientdirectory.classes.php";

    session_start();

    if(isset($_SESSION["accountid"]))
    {
    require_once ('functions.php');

    echo makePageStart('Patient Directory', 'design.css');

    echo makeHeader(array("dashboard.php" => "ZT"));

    
    echo makeNavMenu(array("includes/logout.inc.php" => "Logout", "dashboard.php" => "Home", "patientdirectory.php" => "Patient Directory", "requestdirectory.php" => "Request Directory"));
    }


    echo startMain();
?>


<body>
    <div id= "dashboard-border">
                <div id="pageTittle">
                    <h1>Patient Directory</h1>
                </div>
            <div id = "patientTable">
                <main>
                    <div>
                        <table>
                            <thead class =tableHeader>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Patient ID</th>
                                <th>Patient Age</th>
                                <th>Patient Email</th>
                                <th>Account Creation Date</th>
                            </thead>
                            <tbody>
                                <?php
                                    $newPatient = new Patient;
                                    $result = $newPatient->getPatientInfo();
                                    if($result){
                                        foreach($result as $row)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $row['pat_ID']?></td>
                                                    <td><?= $row['patient_firstName']?></td>
                                                    <td><?= $row['patient_lastName']?></td>
                                                    <td><?= $row['patient_ID']?></td>
                                                    <td><?= $row['patient_age']?></td>
                                                    <td><?= $row['patient_email']?></td>
                                                    <td><?= $row['submittedOn']?></td>
                                                    <!-- <td>
                                                        <a href="">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="">Delete</a>
                                                    </td> -->
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        "No Request Available";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <br>
                    <button id= "submit">
                        <a href="newPatient.php">Create New Patient</a>
                    </button>
                </main>
        </div>
    </div>
   
</body>