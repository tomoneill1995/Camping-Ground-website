<?php 

  require_once("tools.php");
  session_start(); 


  echo $head;

  print_r($_POST);
  



 
 
  
  $aid;
  $date;
  $days;
  $adults;
  $children;

  $_POST["aid"];
  $_POST["date"];
  $_POST["days"];
  $_POST["adults"];
  $_POST["children"];

  $postArray = array('aid'=>$_POST["aid"],
                     'date'=>$_POST["date"], 
                     'days'=>$_POST["days"],
                     'adults'=>$_POST["adults"],
                     'children'=>$_POST["children"]);

  foreach($postArray as $value) {
    
    if(validatePostInput($value) == false) {
      //handle the error
      echo("Vailed at Post Input");
    }

    if(!(is_string($postArray["aid"]) { //aid is not what we expect
      //do something to handle error
      echo("Vailed at aid");
    }

    if(!(is_numeric($postArray["days"]) { //aid is not what we expect
      //do something to handle error
      echo("Vailed at days");
    }

    if(!(is_numeric($postArray["adults"]) { //aid is not what we expect
      //do something to handle error
      echo("Vailed at adults");
    }

    if(!(is_numeric($postArray["children"]) { //aid is not what we expect
      //do something to handle error
      echo("Vailed at children");
    }
  }


  //Data validated, add it to our session variable and move forwards.

  
  $_SESSION["booking"] = $_POST ;

  print_r($_SESSION["booking"]);
  //Add the finalisation bookin page here


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