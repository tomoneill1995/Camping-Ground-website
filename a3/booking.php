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
    }

    else{


      //Data validated, add it to our session variable and move forwards.
  
      $_SESSION["booking"] = $_POST;
      echo("Sesion:");
      print_r($_SESSION["booking"]);
      //Add the finalisation bookin page here

      

    }
  
    


?>


<body>


<?php echo $header; ?>

 
<main>


</main>


  
<?php 
  echo $footer;
?>


</body>

</html>