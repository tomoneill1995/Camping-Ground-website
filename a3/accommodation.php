<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset="utf-8">
  <title>Assignment 1</title>

  <!-- We will cover style later. Skip down to the body tag -->
  <link type="text/css" rel="stylesheet" href="../css/wireframe.css"/>
  <!-- <link type="text/css" rel="stylesheet" href="/~e54061/css/wireframe.css"/> -->
</head>

<body>

  <header>
    <img src="../media/Logo.png" alt="Logo" class="logo">
    <!-- Original Image below sourced for educational purposes: -->
    <!-- https://pngtree.com/so/cartoon-tent -->
    <nav>
      <a href="/~s3488614/wp/a2/index.html" > Home </a> 
      <a href="/~s3488614/wp/a2/accommodation.html" class="active"> Accommodation </a> 
      <a href="/~s3488614/wp/a2/rates.html" > Rates </a> 
      <a href="/~s3488614/wp/a2/contact.html" > Contact </a> 
    </nav>
  </header>

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

    <button class="button" id="US">
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

    <button id="UM" class="button">
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

    <button id="PS" class="button">
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

    <button id="PM" class="button">
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
  
    <button id="Caravan" class="button">
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
      <form onsubmit="" method="POST" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=accommodation">
        <input type="hidden" name="aid" value="C">
        <label>Arrival Date: </label> <input type="date" name="date" class="dateInput" required> <br>

        <label>Duration of Stay: </label>
          <select  name="days" class="Width150" required> 
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
          <select name="adults" class="Width150" required> 
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
          <select name="children" class="Width150" required> 
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
        <input type="submit" class="submitButton" value="Submit Booking">
      </form>
    </div>
  
  </main>

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
