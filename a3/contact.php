<!DOCTYPE html>
<html lang='en'>

<?php 

  require_once("tools.php"); 
  session_start(); 
  $_POST = $_Session["Booking"];

?>

<head>
  <meta charset="utf-8">
  <meta name="Tom O'Neill" content="Assignment 2">
  <title>Contact</title>
  <link type="text/css" rel="stylesheet" href="../css/wireframe.css"/>
  <link href="https://fonts.googleapis.com/css?family=Cabin|Port+Lligat+Sans" rel="stylesheet">
  <!-- We will cover style later. Skip down to the body tag -->
  
</head>

<body>

  <header>
    
    <img src="../media/Logo.png" alt="Logo" class="logo">
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://pngtree.com/so/cartoon-tent -->
      <nav>
        <a href="/~s3488614/wp/a2/index.html" > Home </a> 
        <a href="/~s3488614/wp/a2/accommodation.html" > Accommodation </a> 
        <a href="/~s3488614/wp/a2/rates.html" > Rates </a> 
        <a class="active" href="/~s3488614/wp/a2/contact.html" > Contact </a> 
      </nav>
    </header>
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