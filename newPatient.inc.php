<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data from the form
    $patid = htmlspecialchars($_POST["patid"], ENT_QUOTES, 'UTF-8');
    $pLastName = htmlspecialchars($_POST["pat_lastname"], ENT_QUOTES, 'UTF-8');
    $pFirstName = htmlspecialchars($_POST["pat_firstname"], ENT_QUOTES, 'UTF-8');
    $page = htmlspecialchars($_POST["pat_age"], ENT_QUOTES, 'UTF-8');
    $pemail = htmlspecialchars($_POST["pat_email"], ENT_QUOTES, 'UTF-8');
    // $date = $_POST["date"];
    

     // Instantiate SignupContr class
     include "../classes/dbh.classes.php";
     include "../classes/newPatient.classes.php";
     include "../classes/newPatient_contr.classes.php";

     $patient = new NewPatientContr($pLastName, $pFirstName, $patid, $page, $pemail);

     //Running error handlers and user signup
    $patient->createPatient();

    header("location: ../newPatient.php?error=none");
 
}