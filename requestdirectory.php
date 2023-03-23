<?php
    include_once "classes/dbh.classes.php";
   
    include_once "classes/requestdirectory.classes.php";

    session_start();

    if(isset($_SESSION["accountid"]))
    {
    require_once ('functions.php');

    echo makePageStart('Request Directory', 'design.css');

    echo makeHeader(array("dashboard.php" => "ZT"));

    
    echo makeNavMenu(array("includes/logout.inc.php" => "Logout", "dashboard.php" => "Home", "patientdirectory.php" => "Patient Directory", "requestdirectory.php" => "Request Directory"));
    }


    echo startMain();
?>


<body>
    <div id= "dashboard-border">
                <div id="pageTittle">
                    <h1>Request Directory</h1>
                </div>
            <div id = "requestTable">
                <main>
                    <div>
                        <table>
                            <thead class =tableHeader>
                                <th>S/N</th>
                                <th>Patient ID</th>
                                <th>Scan Type</th>
                                <th>Test Type</th>
                                <th>Urgency Level</th>
                                <th>Department recieving request</th>
                                <th>Request Generation Date</th>
                            </thead>
                            <tbody>
                                <?php
                                    $newRequest = new Request;
                                    $result = $newRequest->getRequestInfo();
                                    if($result){
                                        foreach($result as $row)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $row['request_ID']?></td>
                                                    <td><?= $row['request_pID']?></td>
                                                    <td><?= $row['request_scanType']?></td>
                                                    <td><?= $row['request_testType']?></td>
                                                    <td><?= $row['request_urgency']?></td>
                                                    <td><?= $row['request_department']?></td>
                                                    <td><?= $row['request_date']?></td>
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
                        <a href="newRequest.php">Create New Request</a>
                    </button>
                </main>
        </div>
    </div>
   
</body>