<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $id = $_SESSION["staffid"];
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];
    $department = $_SESSION["department"];
    $unit = $_SESSION["unit"];

    include "../classes/dbh.classes.php";
    include "../classes/profilePage.classes.php";
    include "../classes/profilePage_contr.classes.php";
    $profileInfo = new ProfileInfoContr($id, $firstname, $lastname, $department, $unit);

   

    header("location: ../profilePage.php?error=none");
}