<?php 

// Add the recept page here
    require_once("tools.php");
    session_start(); 
    $_SESSION["booking"] = $_POST;
    print_r($_SESSION["booking"]);


    echo $head;



    






    echo $footer;



?>