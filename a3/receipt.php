<?php 

// Add the recept page here
    require_once("tools.php");



    //validate these
    $name;
    $email;
    $phone;

   

    if ($_POST["aid"] == "US" || $_POST["aid"] == "UM" || 
        $_POST["aid"]== "PS" || $_POST["aid"] == "PM" || $_POST["aid"] == "C") {
        
      }
      else{  
        header("Location: /~s3488614/wp/a3/accommodation.php");
        exit();
      }
    
    $aid = $_SESSION["booking"]["aid"];
    $date = $_SESSION["booking"]["date"];
    $days = $_SESSION["booking"]["days"];
    $adults = $_SESSION["booking"]["adults"];
    $children = $_SESSION["booking"]["children"];



    function check($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $inputdata;
      }




    echo '

    <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="Tom ONeill + Craig Robinson" content="Assignment 3">
    <title>Open Bay Caravan Park</title>
    <link type="text/css" rel="stylesheet" href="../css/receipt.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Port+Lligat+Sans" rel="stylesheet">
    <!-- We will cover style later. Skip down to the body tag --> 
 </head>
    
    ';









    //validate POST of local storage variables
    $regexName = "/^[a-zA-Z]+$/";
    if(isset($_POST["name"]) && !empty($_POST["name"]) ) {
        
        if (preg_match($regexName, $_POST["name"])) {

            $name = $_POST["name"];
          
        }
        else{
            header("Location: /~s3488614/wp/a3/accommodation.php");
            exit();
        }  
    }
    else {
        header("Location: /~s3488614/wp/a3/accommodation.php");
        exit();
    }

    $regexEmail = "/^[a-zA-Z0-9]+@[a-zA-Z0-9]+.[a-zA-Z]+$/";
    if(isset($_POST["email"]) && !empty($_POST["email"]) ) {

        if (preg_match($regexEmail, $_POST["email"])) {
            $email = $_POST["email"];
            
        }
        else{
            header("Location: /~s3488614/wp/a3/accommodation.php");
            exit();
        }  
    }
    else {
        header("Location: /~s3488614/wp/a3/accommodation.php");
        exit();
    }

    $regexPhone = "/^(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$/";
    if(isset($_POST["phone"]) && !empty($_POST["phone"]) ) {
        
        if (preg_match($regexPhone, $_POST["phone"])) {
            $phone = $_POST["phone"];

        }
        else {
            header("Location: /~s3488614/wp/a3/accommodation.php");
            exit();
        }  
    }
    else {
        header("Location: /~s3488614/wp/a3/accommodation.php");
        exit();
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
    $txt = $name . "\t" . $phone . "\t" . $email ."\t" .
       $aid . "\t" . $date . "\t" . $days . "\t" . $adults . "\t" . $children . "\t" ."$" .
        number_format(($totalCost), 2, '.', '') . "\t"  ."$". number_format(($totalCost/11), 2, '.', '') ;
    fwrite($myfile, PHP_EOL . $txt);
    fclose($myfile);




    


?>

<script>

   // Remove background image



   
   // Remove styles from body
   //

    


    
   

</script>



  <main >

  
  
   

  <div id="receipt" class="receipt width100Percent"> 

    <h1 class="white"> Receipt</h1>

    <h1 class="white"> Contact Information</h1>
    <p class="white"> Open Bays Caravan Park</p>
    <p class="white"> Phone: 03 1234 4321</p>
    <p class="white"> Address: Portalington, VIC 3223</p>
    <p class="white"> Email: information@openbays.com.au</p>


    <h1 class="white"> Booking Information</h1>
    <p class="white"> Campsite: <?php echo $namePerID[$aid];  ?> </p> <br>
    <p class="white"> Arrival Date: <?php echo $date; ?> </p> <br>
    <p class="white"> Duration of Stay: <?php echo $days; ?> </p> <br>
    <p class="white"> Number of Adults: <?php echo $adults; ?>  </p> <br>
    <p class="white"> Number of Children: <?php echo $children; ?>  </p> <br>

    <p class="white"> Total Cost: $<?php echo number_format(($totalCost), 2, '.', ''); ?> <br> </p> <br>
    <p class="white"> Total GST: $<?php echo number_format(($totalCost/11), 2, '.', ''); ?>  </p> <br>



    <h1 class="white"> Customer Information</h1>
    <label>Customer Name: <?php echo $name; ?> <br> </label> 
    <label>Email: <?php echo $email; ?> <br> </label>
    <label>Phone: <?php echo $phone; ?> <br> </label> <br> <br>
   
</div>
  </main>


  <?php 
   // footer();  
  ?>