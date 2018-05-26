<?php 

  require_once("tools.php");
  session_start(); 


  echo $head;

  echo("POST:");
  print_r($_POST);
  
  $aid;
  $date;
  $days;
  $adults;
  $children;

  $valid = false;


  function checkExists2() {
      
      if(  !(isset($_POST["aid"]) && !empty($_POST["aid"])) ) {
        return false;
      }  
      if(  !(isset($_POST["date"]) && !empty($_POST["date"])) ) {
        return false;
      }     
  
      if( !(isset($_POST["days"]) && !empty($_POST["days"])) ) {
        return false;
      }
   
      if( !(isset($_POST["adults"]) && !empty($_POST["adults"])) ) {
        return false;
      }
      if(!(isset($_POST["adults"]) && !empty($_POST["adults"])) ) {
        return false;
      }  
  
      $postArray = array('aid'=>$_POST["aid"],
                         'date'=>$_POST["date"], 
                         'days'=>$_POST["days"],
                         'adults'=>$_POST["adults"],
                         'children'=>$_POST["children"]);
  
      if(checkInputValidation($postArray) == false) {
        echo "It failed mate";
        return false;
      }
      echo "got here2";
      return true;
    }  
  
    if(checkExists2() == false) {
      echo "It failed mate2";
    }
    else{
      $valid = true;
      $aid = $_POST["aid"];
      $date = $_POST["date"];
      $days = $_POST["days"];
      $adults = $_POST["adults"];
      $children = $_POST["children"];
    }





  

  function checkExists($input,$output) {

    if(validatePostInput($input) == false) { //Check isset and empty
      //handle the error
      echo("Vailed at Post Input");
      return false;
    }
    else {
      $output = htmlspecialchars($input); //Ensure input is now checked from special chars
      return true;
    }
  }

  function validatePostInput ($postVar) {
    if(isset($postVar) && !empty($postVar) ) {
      return true;
    }           
  }
 
  function checkAID($aid) {
    if ($aid == "US" || $aid == "UM" || $aid == "PS" || $aid == "PM" || $aid == "C") {
      return true;
    }
    else{  
      return false;
    }
  }

  function checkDateInput($date) {

    $splitDate = explode("-", $date);

    if(checkdate($splitDate[1],  $splitDate[2], $splitDate[0])  ) {
      return true;
    }
    else{  
      echo("failed at checkinput date");
      return false;
    }
  }

  function checkDays($days) {
    if ($days >= 1 && $days <= 14 ) {
      return true;
    }
    else{  
      return false;
    }
  }

  function checkAdults($adults) {
    if ($adults >= 1 && $adults <= 10 ) {
      return true;
    }
    else{  
      return false;
    }
  }

  function checkChildren($children) {
    if ($children >= 0 && $children <= 10 ) {
      return true;
    }
    else{  
      return false;
    }
  }


  function checkInputValidation($postArray) {
    foreach($postArray as $value) {
      $value = htmlspecialchars($value); //Ensure input is now checked from special chars
    }
  
      if(!(is_string($postArray["aid"]))) { //aid is not what we expect
        //do something to handle error
        echo("failed at aid");
        return false;
      }
      else {
        if(checkAID($postArray["aid"]) == false ){ 
          echo("failed at aid2");
          return false;
        }
      }

      if(!(is_string($postArray["date"]))) { //days is not what we expect
        //do something to handle error
        echo("failed at date");
        return false;
      } 
      else{
        if(checkDateInput($postArray["date"]) == false) { 
          echo("failed at date2");
          return false;
        }
      }
  
      if(!(is_numeric($postArray["days"]))) { //days is not what we expect
        //do something to handle error
        echo("failed at days");
        return false;
      }
      else {
        if(checkDays($postArray["days"]) == false) { 
          echo("failed at days2");
          return false;
        }
      }
  
      if(!(is_numeric($postArray["adults"]))) { //adult is not what we expect
        //do something to handle error
        echo("failed at adults");
        return false;
      }
      else {
        if(checkAdults($postArray["adults"]) == false) { 
          echo("failed at adults2");
          return false;
        }
      }
  
      if(!(is_numeric($postArray["children"]))) { //chuldren is not what we expect
        //do something to handle error
        echo("failed at children");
        return false;
      }
      else {
        if(checkChildren($postArray["children"]) == false) { 
          echo("failed at children2");
          return false;
        }
      }
      echo "Got here";
      return true;
    }


    if($valid == false){
      echo ("Data issue, please navigate back");
   
      echo '
        <form id="dataRedirectAccommodation" action="/accomodation.php" method="post">
          <input type="hidden" name="dataFailed" id="aid" value = "Yes">
        </form>
        <script type="text/javascript">
           document.getElementById("dataRedirectAccommodation").submit();
        </script>
        '



      //  header('Location: /accommodation.php');

    }

    else{


      //Data validated, add it to our session variable and move forwards.
  
      $_SESSION["booking"] = $_POST;
      echo("Sesion:");
      print_r($_SESSION["booking"]);
      //Add the finalisation bookin page here

     
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
  

?>


<body>


<?php 

  echo $header;

?>

 
<main>

  <div id="Booking" class="button inlineFlex"> 
  
  <p class="white"> Customer Name:</p>
  <p class="white"> Email: </p>
  <p class="white"> phone: </p>

  <p class="white"> Campsite: <?php echo $namePerID[$aid];  ?> </p>
  <p class="white"> Arrival Date: <?php echo $date; ?> </p>
  <p class="white"> Duration of Stay: <?php echo $days; ?> </p>
  <p class="white"> Number of Adults:<?php echo $adults; ?>  </p>
  <p class="white"> Number of Children: <?php echo $children; ?>  </p>
  <p class="white"> Total Cost: $ <?php echo $totalCost; ?> <br> </p>
  <p class="white"> Total GST: $ <?php echo number_format(($totalCost/11), 2, '.', ''); ?>  </p>

    <form onsubmit="return validateBooking()" method="POST" action="/accommodation.php">
      <input type="hidden" name="aid" id="aid" value = "">
      <input type="hidden" name="date" value =""> 
      <input type="hidden" name="days" id="days" value="">  
      <input type="hidden" name="adults" id="adults" value=""> 
      <input type="hidden" name="children" id="children" value=""> 
      <input type="submit" class="submitButton" value="CANCEL Booking">
    </form>
  </div>

</main>


  
<?php 
  echo $footer;
?>


</body>

</html>