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



    function check($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $inputdata;
      }




    echo $head;





    //validate POST of local storage variables
    $regexName = "/^[a-zA-Z]+$/";
    if(isset($_POST["name"]) && !empty($_POST["name"]) ) {
        
        if (preg_match($regexName, $_POST["name"])) {

        }
        else{
            //error
        }  
    }
    else {
         //redirect with error
    }

    $regexEmail = "/^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]+$/";
    if(isset($_POST["email"]) && !empty($_POST["email"]) ) {

        if (preg_match($regexEmail, $_POST["email"])) {

        }
        else{
            //error
        }  
    }
    else {
         //redirect with error
    }

    $regexPhone = "/^(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$/";
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) ) {
        
        if (preg_match($regexPhone, $_POST["phone"])) {

        }
        else {
            //error
        }  
    }
    else {
         //redirect with error
    }

    
    
    $nightsPerID = array('US'=>35.25,'UM'=>40.50,'PS'=>50.25,'PM'=>60.50,'C'=>100); //Match the selected AID to a nightly rate
    $namePerID = array('US'=>"Unpowered Small Site",'UM'=>"Unpowered Medium Site",
                       'PS'=>"Powered Small Site",'PM'=>"Powered Medium Site",
                       'C'=>"Caravan Site");
    $adultsPerID = 10;
    $adultsPerID = 5;

    $totalCost;
    $aid = $GLOBALS["aid"];
    $days = $GLOBALS["days"];
    $adults = $GLOBALS["adults"];
    $children = $GLOBALS["children"];

    if ($aid == 'C') {
      $totalCost = ($nightsPerID[$aid] * $days);  //base rate * nights, number of people don't count
    }
    
    else if(($adults + $children) <= 2) {
      $totalCost = ($nightsPerID[$aid] * $days); //base rate * nights, by minimum number of people
    } 

    else {
      if ($adults >= 2 ) {  //if theres two adults, that counts our minimum cost, then calculate the rest
        $totalCost = ($nightsPerID[$aid] * $days);
        $totalCost += (($adults - 2) *  10);
        $totalCost += (($children) *  5); 
      }
      else { //Otherwise we have only 1 adult and the rest are children, this takes care of the other edge case
        $totalCost = ($nightsPerID[$aid] * days);
        $totalCost += (($adults - 1 ) *  10);
        $totalCost += (($children -1 ) *  5);
      }
    } 
  }





    echo $footer;



?>

<script>

   //if exists 

    


    
   

</script>



  <main>

    <p class="white"> Total Cost: $<?php echo number_format(($totalCost), 2, '.', ''); ?> <br> </p> <br>
    <p class="white"> Total GST: $<?php echo number_format(($totalCost/11), 2, '.', ''); ?>  </p> <br>


  </main>