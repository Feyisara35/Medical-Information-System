<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data from the form
    $pid = htmlspecialchars($_POST["pid"], ENT_QUOTES, 'UTF-8');
    $test = htmlspecialchars($_POST["test"], ENT_QUOTES, 'UTF-8');
    $scan = htmlspecialchars($_POST["scan"], ENT_QUOTES, 'UTF-8');
    $urgency = htmlspecialchars($_POST["urgency"], ENT_QUOTES, 'UTF-8');
    $department = htmlspecialchars($_POST["department"], ENT_QUOTES, 'UTF-8');
    $date = $_POST["date"];

     // Instantiate SignupContr class
     include "../classes/dbh.classes.php";
     include "../classes/newRequest.classes.php";
     include "../classes/newRequest_contr.classes.php";

     $request = new NewRequestContr($pid, $scan, $test, $urgency, $department, $date);

     //Running error handlers and user signup
    $request->createTestScan();

    header("location: ../newRequest.php?error=none");
 
}