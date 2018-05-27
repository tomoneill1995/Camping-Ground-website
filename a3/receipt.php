<?php 

// Add the recept page here
    require_once("tools.php");
    session_start(); 


    //validate these
    $name;
    $email;
    $phone;

   

    if ($_POST["aid"] == "US" || $_POST["aid"] == "UM" || 
        $_POST["aid"]== "PS" || $_POST["aid"] == "PM" || $_POST["aid"] == "C") {
        
      }
      else{  
        header("Location: /accommodation.php");
      }
    
    $aid = $_SESSION["booking"]["aid"];
    $date = $_SESSION["booking"]["date"];
    $days = $_SESSION["booking"]["days"];
    $adults = $_SESSION["booking"]["adults"];
    $children = $_SESSION["booking"]["children"];


    

    //$_SESSION["booking"] = $_POST;
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

            $name = $_POST["name"];
          
        }
        else{
            header("Location: /accommodation.php");
        }  
    }
    else {
        header("Location: /accommodation.php");
    }

    $regexEmail = "/^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]+$/";
    if(isset($_POST["email"]) && !empty($_POST["email"]) ) {

        if (preg_match($regexEmail, $_POST["email"])) {
            $email = $_POST["email"];
            
        }
        else{
            header("Location: /accommodation.php");
        }  
    }
    else {
        header("Location: /accommodation.php");
    }

    $regexPhone = "/^(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$/";
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) ) {
        
        if (preg_match($regexPhone, $_POST["phone"])) {
            $phone = $_POST["phone"];

        }
        else {
            header("Location: /accommodation.php");
        }  
    }
    else {
        header("Location: /accommodation.php");
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
  


    $myfile = fopen("bookings.txt", "a") or die("Unable to open file!");
    $txt = $name . "\t" . $phone . "\t" . $email . "\t" . $date . "\t" . $days . "\t" . $adults . "\t" . $children . "\t" ;
    fwrite($myfile, PHP_EOL . $txt);
    fclose($myfile);




    


?>

<script>

   // Remove background image
   // Remove styles from body
   //

    


    
   

</script>



  <main class = "receipt">

    <label>Customer Name: <?php echo $name; ?> <br> </label> 
    <label>Email: <?php echo $email; ?> <br> </label>
    <label>Phone: <?php echo $phone; ?> <br> </label>
    
    <p class="white"> Campsite: <?php echo $namePerID[$aid];  ?> </p> <br>
    <p class="white"> Arrival Date: <?php echo $date; ?> </p> <br>
    <p class="white"> Duration of Stay: <?php echo $days; ?> </p> <br>
    <p class="white"> Number of Adults: <?php echo $adults; ?>  </p> <br>
    <p class="white"> Number of Children: <?php echo $children; ?>  </p> <br>

    <p class="white"> Total Cost: $<?php echo number_format(($totalCost), 2, '.', ''); ?> <br> </p> <br>
    <p class="white"> Total GST: $<?php echo number_format(($totalCost/11), 2, '.', ''); ?>  </p> <br>


  </main>


  <?php 
    echo $footer;
  ?>