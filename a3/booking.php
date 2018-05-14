<?php 

  require_once("tools.php");
  session_start(); 


  echo $head;

  print_r($_POST);
  


  $_POST = $_SESSION["booking"];

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