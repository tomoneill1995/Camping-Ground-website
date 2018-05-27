<?php 
  
    require_once("tools.php"); 
    if( isset($_POST) && !empty($_POST) ){
      $_SESSION["booking"] = $_POST; 
    } 
    


  echo $head;


  ?>

<body>

    <?php
      // This PHP code inserts CSS to style the "current page" link in the nav area
      $here = $_SERVER['SCRIPT_NAME']; 
      $bits = explode('/',$here); 
      $filename = $bits[count($bits)-1]; 
      echo "nav a[href$='$filename'] {
           box-shadow: 1px 1px 1px 2px navy;
      }";


       echo $header;



     ?>


    <main>

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


    </main>

    


   <?php 
     footer();  
   ?>

</body>

</html>