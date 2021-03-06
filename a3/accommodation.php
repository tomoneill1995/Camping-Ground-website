<?php 
    
    require_once("tools.php"); 
    
 

    if( isset($_POST) && !empty($_POST) ){
      $_SESSION["booking"] = $_POST; 
    }    
    

   


    if(isset($_POST['cancel']) && !empty($_POST['cancel']) && $_POST['cancel'] == "Yes") {


      echo "booking removed";
      unset($_SESSION['booking']);

    }     

    echo $head;
  
  ?>


  <script>
  
    function setCurrentlyPressed(pressed) {
      
      var aid = document.getElementById("aid").value; 

      if (aid == pressed.id) {  //if current pressed is 'deslected'
        pressed.classList.remove("AIDPressed");
        document.getElementById("aid").value = ""; //default aid is empty, check this before submission 
      }
      else { //else select the newly pressed button

        var oldPressed = document.getElementsByClassName("AIDPressed"); //Clear the currently selected value
        for(var i = 0; i < oldPressed.length; i++) {
          oldPressed[i].classList.remove("AIDPressed");
        }
        pressed.classList.add("AIDPressed"); //Add the new pressed button
        document.getElementById("aid").value = pressed.id; //add the new aid

      }

    }

    function validateBooking() {
      //check aid
      var aid = document.getElementById("aid").value; 
      if (aid == "US" || aid == "UM" || aid == "PS" || aid == "PM" || aid == "C"){
        
        return true;
      }
      else {
        document.getElementById("errorTag").innerHTML = "Campsite Not Set";
        return false;
      }

    }

    function calculateCost() {

      var days = parseInt(document.getElementById("days").value);
      var adults = parseInt(document.getElementById("adults").value);
      var children = parseInt(document.getElementById("children").value);
      var totalCost = document.getElementById("totalCost").value;
      var totalGST = document.getElementById("totalGST").value;
      
      var nightsPerID = {US:35.25,UM:40.50,PS:50.25,PM:60.50,C:100}; //Match the selected AID to a nightly rate
      var adultsPerID = 10;
      var adultsPerID = 5;

      var aid = document.getElementById("aid").value;

      if((isNaN(days) || isNaN(adults) || isNaN(children) || aid == "")) { //if days,adults,children, or AID are unset, leave the function
        document.getElementById("totalCost").innerHTML = "Total: $";
        document.getElementById("totalGST").innerHTML = "GST: $";
        return false;
      }

      if (aid == 'C') {
        totalCost = (nightsPerID[aid] * days);  //base rate * nights, number of people don't count
      }
      
      else if((adults + children) <= 2) {
        totalCost = (nightsPerID[aid] * days); //base rate * nights, by minimum number of people
      } 

      else {
        if (adults >= 2 ) {  //if theres two adults, that counts our minimum cost, then calculate the rest
          totalCost = (nightsPerID[aid] * days);
          totalCost += ((adults - 2) *  10);
          totalCost += ((children) *  5); 
        }
        else { //Otherwise we have only 1 adult and the rest are children, this takes care of the other edge case
          totalCost = (nightsPerID[aid] * days);
          totalCost += ((adults - 1 ) *  10);
          totalCost += ((children -1 ) *  5);
        }
      } 

      document.getElementById("totalCost").innerHTML = "Total: $" + totalCost.toFixed(2);
      document.getElementById("totalGST").innerHTML = "GST: $" + (totalCost/11).toFixed(2);
      
    }

    setInterval(function() { calculateCost(); }, 200);
  
  </script>


<body>

  <?php 
    echo $header;

    if(isset($_POST['dataFailed']) && !empty($_POST['dataFailed']) && $_POST['dataFailed'] == "Yes") {
      echo "<p> Data failure from Booking page, please resubmit </p>";
    }           

  ?>

  <main>
    <br>
    <article class="noPadding">
      <h1 class="white headerPadding"> Accommodation</h1>

      <h1 class="white headerPadding"> We have several different options for accomodation. 
          Here's what's on offer.</h1>
    </article>

    <br>

    <article class="accHeading">
      <h1 class="white"> Unpowered</h1>
    </article>

    <button type="button" class="button" id="US" onclick="setCurrentlyPressed(this);">
      <img src="../media/Tent.png" alt="Tent" class="placeholder"> 
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.kisspng.com/png-camping-tent-campsite-campfire-clip-art-sick-dog-c-667961/download-png.html -->
      <p class="white"> 
        Small Unpowered Site <br> <br>
        Small Unpowered Site <br>
        6m x 6m <br>
        $30.25 Per Day <br>
        $10.00 Per Additional Adult <br>
        $5.00 Per addtional Child</p>  
    </button>

    <button type="button" class="button" id="UM" onclick="setCurrentlyPressed(this);">
      <img src="../media/Tent.png" alt="Tent" class="placeholder"> 
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.kisspng.com/png-camping-tent-campsite-campfire-clip-art-sick-dog-c-667961/download-png.html -->
      <p class="white">
          Medium Unpowered Site <br> <br>

          Medium Unpowered Site <br>
          9m x 9m <br>
          
          $40.50 Per Day <br>
          $10.00 Per Additional Adult <br>
          $5.00 Per addtional Child </p>  
    </button>

    <article class="accHeading"> 
      <h1 class="white"> Powered </h1>
    </article>

    <button type="button" class="button" id="PS" onclick="setCurrentlyPressed(this);">
      <img src="../media/Tent.png" alt="Tent" class="placeholder"> 
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.kisspng.com/png-camping-tent-campsite-campfire-clip-art-sick-dog-c-667961/download-png.html -->
      <p class="white" 
         >Small Powered Site <br> <br>
          Small Powered Site <br>
          6m x 6m <br>
          2x 240v Sources <br>
          $50.25 Per Day <br>
          $10.00 Per Additional Adult <br>
          $5.00 Per Addtional Child </p>
    </button>

    <button type="button" class="button" id="PM" onclick="setCurrentlyPressed(this);">
      <img src="../media/Tent.png" alt="Tent" class="placeholder"> 
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.kisspng.com/png-camping-tent-campsite-campfire-clip-art-sick-dog-c-667961/download-png.html -->
      <p class="white"> 
          Medium Powered Site <br> <br>
          Medium Powered Site <br>
          12m x 12m <br>
          2x 240v Sources <br>
          
          $60.50 Per Day <br>
          $10.00 Per Additional Adult <br>
          $5.00 Per Addtional Child</p>
  </button>

    <article class="accHeading"> 
      <h1 class="white"> Caravan and Booking </h1>
    </article>
  
    <button type="button"  class="button" id="C" onclick="setCurrentlyPressed(this);">
      <img src="../media/Caravan.png" alt="Caravan" class="placeholder">
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://www.pinterest.co.uk/pin/96545985745543687/ -->
      
      <p class="white"> 
          Caravan Site <br> <br>
          Caravan Site <br>
          10m x 10m <br>
          $100.00 Per Day <br>
          Free Per Additional Adult <br>
          Free Per Addtional Child </p>
  </button>

    <div id="Booking" class="button alignRight inlineFlex"> 
      <form onsubmit="return validateBooking()" method="POST" action="/~s3488614/wp/a3/booking.php">
        <input type="hidden" name="aid" id="aid">
        <label>Arrival Date: </label> <input type="date" name="date" class="dateInput" required> <br>

        <label>Duration of Stay: </label>
          <select id="days" name="days" class="Width150" required>  
            <option value=""># Of Days </option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
            <option value="11" >11</option>
            <option value="12" >12</option>
            <option value="13" >13</option>
            <option value="14" >14</option>
          </select> <br>

          <label>Number of Adults:  </label>  
          <select id="adults" name="adults" class="Width150" required> 
            <option value=""># Of Adults </option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
          </select>  
          <br>

          <label>Number of Children:  </label>  
          <select id="children" name="children" class="Width150" required> 
            <option value=""># Of Children </option>
            <option value="0" >0</option>
            <option value="1" >1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5" >5</option>
            <option value="6" >6</option>
            <option value="7" >7</option>
            <option value="8" >8</option>
            <option value="9" >9</option>
            <option value="10" >10</option>
          </select>    

        <p id="totalCost" class="white">Total:</p> <!-- ID Added for A3, dynamic calculation -->
        <br>  
        <p id="totalGST" class="white">GST:</p>  <!-- ID Added for A3, dynamic calculation -->
        <p id="errorTag" class="red"> </p>
        <input type="submit" class="submitButton" value="Submit Booking">
      </form>
    </div>
  
  </main>

  <?php 
  
    footer();  

  ?>

</body>

</html>
