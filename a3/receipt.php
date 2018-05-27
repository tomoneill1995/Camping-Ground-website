<?php 

// Add the recept page here
    require_once("tools.php");
    session_start(); 


    //validate these
    $name;
    $email;
    $phone;
    
    $aid = $_SESSION["booking"]["aid"];
    $date = $_SESSION["booking"]["date"];
    $days = $_SESSION["booking"]["days"];
    $adults = $_SESSION["booking"]["adults"];
    $children = $_SESSION["booking"]["children"];


    $_SESSION["booking"] = $_POST;
    print_r($_SESSION["booking"]);


    echo $head;



    






    echo $footer;



?>

<script>

   //if exists 

    


    
   

</script>