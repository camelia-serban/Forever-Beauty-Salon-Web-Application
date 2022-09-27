<?php


function access($type)
{
    if(isset($_SESSION["ACCESS"]) && !$_SESSION["ACCESS"][$type])
    {
        header("Location: denied.php");
        die;
    }
}


$_SESSION["ACCESS"]["ADMIN"] = isset($_SESSION['mytype']) && $_SESSION['mytype'] == "admin";
$_SESSION["ACCESS"]["RECEPTIONIST"] = isset($_SESSION['mytype']) && $_SESSION['mytype'] == "receptionist";
$_SESSION["ACCESS"]["CLIENT"] = isset($_SESSION['mytype']) && $_SESSION['mytype'] == "client";


