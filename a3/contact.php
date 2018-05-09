<?php 

      require_once("tools.php"); 
    session_start(); 
    $_POST = $_SESSION["Booking"];
  
    echo $head;

  ?>

<body>


  <?php echo $header; ?>

   
  <main>

  

  <div  id="contacthead">
      <h1 id="h1contact">Contact</h1>
      <br>

      <p id="contacttext">
          Please Contact us with any and all queries or concerns.<br>
          We will respond as soon as possible. <br><br>
          
          We'd also love to hear feedback from you on what you liked about the park, or what we could do to improve it!
      </p>
      <br><br><br>
      <div id="contactformdiv">
        <form id="contactform" action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php?ref=contact">
            
           <label>
             Name:
             <input required id="inputname" type="text" name="name" placeholder="Full name">
           </label>
            <br>
            <br>
            
            <label>Email:
            <input required id="inputemail" type="email" name="email" placeholder="Email">
            </label>
            <br>
            <br>

            <label> Number:
            <input required id="inputphone" type="tel" name="phone" placeholder="Phone Number">
            </label>
            <br>
            <br>
            
          <label>Message:
            <textarea required id="messagebox" name="message" rows="5" columns="50" placeholder="Enter message here!"></textarea> 
          </label>
            <br>
            <br>   
            <br><br><br>
            <label>  <input type="checkbox" name="mailing"><p id="mailcheck">Do you want to sign up to the mailing list?</p><br>
            </label>
              <input type="submit" value="Submit" id="submitbutton">
            
        </form>

      </div>

    </div>
  
  <br><br><br>


  </main>


  
 <?php 
   echo $footer;
 ?>


</body>

</html>