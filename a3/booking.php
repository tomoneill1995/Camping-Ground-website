<?php 

  require_once("tools.php");

  echo $head;

  echo("POST:");
  print_r($_POST);

  $name;
  $email;
  $phone;
  
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


    if(isset($_SESSION["booking"]["aid"]) && !empty($_SESSION["booking"]["aid"]) ) {
      $aid = $_SESSION["booking"]["aid"];
      $date = $_SESSION["booking"]["date"];
      $days = $_SESSION["booking"]["days"];
      $adults = $_SESSION["booking"]["adults"];
      $children = $_SESSION["booking"]["children"];
      $valid = true;
    } 

    if($valid == false) {
      //Accommodation Issues, Need to create one for contact details
      // Need to check if the data is set, if it is, accept it? 
      echo ("Data issue, please navigate back");
   
      echo '
        <form id="dataRedirectAccommodation" action="/accommodation.php" method="post">
          <input type="hidden" name="dataFailed" id="datafailed" value = "Yes">
        </form>
        <script type="text/javascript">
           document.getElementById("dataRedirectAccommodation").submit();
        </script>
        ';
      
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


<script>


  function validateReceipt() {


      var name = document.getElementById("name").value;
      var regexName = /^[a-zA-Z]+$/;
   
      if (!(regexName.test(name))) {
        document.getElementById("nameError").innerHTML = "Please only enter characters";
        return false;
      }
      else{
        document.getElementById("nameError").innerHTML = ""; 
      }

      var email = document.getElementById("email").value;
      var regexEmail = /^[a-zA-Z0-9]+@[a-zA-Z]+.[a-zA-Z]+$/;
      if (!(regexEmail.test(email))) {
        console.log("emailerror");
        document.getElementById("emailError").innerHTML = "Please enter a correct email";
        return false;
      }
      else{
        document.getElementById("emailError").innerHTML = ""; 
      }

      var phone = document.getElementById("phone").value;
      var regexPhone = /^(\(04\)|04|\+614)[ ]?\d{4}[ ]?\d{4}$/ ;
      if (!(regexPhone.test(phone))) {
        console.log("phoneError");
        document.getElementById("phoneError").innerHTML = "Please enter a correct phone number";
        return false;
      }
      else{
        document.getElementById("phoneError").innerHTML = ""; 
      }
      return true;
  }



  window.onload = function(e){ 

    if (localStorage.getItem("name") !== null) {
        var name = localStorage.getItem("name");
        document.getElementById("name").value = name;
    }
    if (localStorage.getItem("email") !== null) {
        var email = localStorage.getItem("email");
        document.getElementById("email").value = email;
    }
    if (localStorage.getItem("phone") !== null) {
        var phone = localStorage.getItem("phone");
        document.getElementById("phone").value = phone;
    }
     
 }


</script>


<body>


<?php 

  echo $header;

?>

 
<main>

    <article class="accHeading">
      <h1 class="white"> Booking Information</h1>
    </article>

  <div id="Booking" class="button inlineFlex width100Percent"> 

  <p class="white"> Campsite: <?php echo $namePerID[$aid];  ?> </p> <br>
  <p class="white"> Arrival Date: <?php echo $date; ?> </p> <br>
  <p class="white"> Duration of Stay: <?php echo $days; ?> </p> <br>
  <p class="white"> Number of Adults: <?php echo $adults; ?>  </p> <br>
  <p class="white"> Number of Children: <?php echo $children; ?>  </p> <br>
  <p class="white"> Total Cost: $<?php echo number_format(($totalCost), 2, '.', ''); ?> <br> </p> <br>
  <p class="white"> Total GST: $<?php echo number_format(($totalCost/11), 2, '.', ''); ?>  </p> <br>

    <form onsubmit="" method="POST" action="/accommodation.php">
      <input type="hidden" name="aid" id="aid" value = "">
      <input type="hidden" name="date" value =""> 
      <input type="hidden" name="days" id="days" value="">
      <input type="hidden" name="adults" id="adults" value=""> 
      <input type="hidden" name="children" id="children" value="">
      <input type="hidden" name="cancel" id="cancel" value="Yes"> 
      <br>
      <br>
      <input type="submit" class="submitButton cancelButton" value="CANCEL Booking">
    </form>

    <br>
    <br> 
    </div>

    <article class="accHeading">
      <h1 class="white"> Customer Information</h1>
    </article>

    <div id="Booking" class="button inlineFlex width100Percent"> 


      

      <form onsubmit="return validateReceipt()" method="POST" action="/receipt.php">
     
        <label>Customer Name: </label> 
          <input type="text" id="name" name="name" class="Width150" required > 
          <p id="nameError" class="red"></p>  <br>

        <label>Email: </label> 
          <input type="text" id="email" name="email" placeholder="abc@rmit.com" class="Width150" required> 
          <p id="emailError" class="red"></p> <br> 

        <label>Phone: </label>
           <input type="text" id="phone" name="phone" placeholder="04 1234 5678" class="Width150" required> 
           <p id="phoneError" class="red"></p> <br>

        <input type="hidden" name="aid" id="aid" value = "<?php echo $aid ?>">
        <input type="hidden" name="date" value = "<?php echo $date ?>"> 
        <input type="hidden" name="days" id="days" value="<?php echo $days ?>">  
        <input type="hidden" name="adults" id="adults" value="<?php echo $adults ?>"> 
        <input type="hidden" name="children" id="children" value="<?php echo $children ?>"> 
        <br>
        <br>
        <input type="submit" class="submitButton" value="Accept Booking">
      </form>

    </div>

  

</main>


  
<?php 
  footer();  
?>


</body>

</html>