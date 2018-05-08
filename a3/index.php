<!DOCTYPE html>
<html lang='en'>

  <?php 
  
    require_once("tools.php"); 
    session_start(); 
    $_POST = $_SESSION["Booking"];
    
  ?>


<head>
  <meta charset="utf-8">
  <meta name="Tom O'Neill" content="Assignment 2">
  <title>Open Bay Caravan Park</title>
  <link type="text/css" rel="stylesheet" href="/css/wireframe.css"/>
  <link href="https://fonts.googleapis.com/css?family=Cabin|Port+Lligat+Sans" rel="stylesheet">
  <!-- We will cover style later. Skip down to the body tag -->
  
</head>

<body>

    <?php
    // This PHP code inserts CSS to style the "current page" link in the nav area
    $here = $_SERVER['SCRIPT_NAME']; 
    $bits = explode('/',$here); 
    $filename = $bits[count($bits)-1]; 
    echo "nav a[href$='$filename'] {
    box-shadow: 1px 1px 1px 2px navy;
  }";
  ?>



  <header>
    
    <img src="../media/Logo.png" alt="Logo" class="logo">
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://pngtree.com/so/cartoon-tent -->
      <nav>
        <a class="active"  href="/~s3488614/wp/a2/index.html" > Home </a> 
        <a href="/~s3488614/wp/a2/accommodation.html" > Accommodation </a> 
        <a href="/~s3488614/wp/a2/rates.html" > Rates </a> 
        <a href="/~s3488614/wp/a2/contact.html" > Contact </a> 
      </nav>
    </header>
    <div  id="indexhead">
      <h1>Open Bay Caravan Park</h1>

      <p id="indexdescription">Experience adventure at Open Bays Caravan Park, home of beautiful lakes, peaceful forestry, and family friendly camping grounds.  
      Located within Portarlington, its perfect for those who want to get back to nature, without being far from a bustling seaside town for those who need their morning coffee.
      <br><br>
      Our caravan park comes with many different types of accomodation, you can choose between small and medium <br>
      camping grounds, powered and unpowered, or book out one of our caravan sites.
    </p>
      <img src="../media/portarlington.png" alt="Portarlington" class="portarlington">
    <!-- Original Image below sourced for educational purposes: -->
      <!-- http://portarlingtonvillage.com.au/wp-content/uploads/2014/08/contact-portarlington1.jpg-->
      
      <br><br><br>
    </div>
  
  <br><br><br>
  <div id="indextravel">
    <h2 id="gettingthere">Getting There</h2>
    <img src="../media/ferrymap.jpg" alt="ferry map" class="ferrymap">
    <!-- Original Image below sourced for educational purposes: -->
      <!-- http://portarlingtonvillage.com.au/wp-content/uploads/2014/08/portarlington-map2-1.jpg-->
    
    <p id="ferrytext"> 
      Book tickets for ferry to Queenscliff <br>
      Board ferry <br>
      Travel to Portarlington!

      
    </p>
    <img src="../media/googlemap.png" alt="googlemap" class="googlemap">
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.google.com.au/maps-->
    <p id="maptext"> 
      From Geelong to here, follow road C123!<br>
      It should take around 30 minutes.<br>
      From Melbourne to here, follow the signs!<br>
      It will take around 90 minutes.
    </p>
      <br><br><br><br><br><br><br><br><br>

  </div>
  <footer>
    &copy;<script>
      document.write(new Date().getFullYear());
    </script> Craig Robinson - s3488614 Tom O'Neill - s3542941 - Starch Industries<br>
    Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.
    <br>
    Maintain links to your working <a href='/~s3488614/wp/a2/style-guide.pdf'>style guide</a>, your <a href='../mailing.txt'>products spreadsheet</a> and <a href='../orders.txt'>orders spreadsheet</a> here.
</footer>


</body>

</html>