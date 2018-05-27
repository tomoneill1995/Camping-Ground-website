<?php 

      require_once("tools.php"); 

    $mailing;
    $name;
    $email;
    $phone;
    $message;
    $remember;
  
    echo $head;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $phone = test_input($_POST["phone"]);
      $message = test_input($_POST["message"]);
      $mailing = test_input($_POST["mailing"]);
      $remember = test_input($_POST["rememberme"]);
    
      if($mailing == "on"){
        $myfile = fopen("mailing.txt", "a") or die("Unable to open file!");
        $txt = $name . "  " . $email . "  " . $phone;
        fwrite($myfile, PHP_EOL . $txt);
        fclose($myfile);
        header("Location: /a3/index.php");
        exit;
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }


    
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
        <form id="contactform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            
           <label>
             Name:
             <input required id="inputname" type="text" name="name" placeholder="Full name" pattern="[a-zA-Z\s'-.]+">
           </label>
            <br>
            <br>
            
            <label>Email:
            <input required id="inputemail" type="email" name="email" placeholder="Email">
            </label>
            <br>
            <br>

            <label> Number:
            <input required id="inputphone" type="tel" name="phone" placeholder="Phone Number" pattern"^(\(04\)|04|\+614)([ ]?\d){8}$">
            </label>
            <br>
            <br>
            
          <label>Message:
            <textarea required id="messagebox" name="message" rows="5" columns="50" placeholder="Enter message here!"></textarea> 
          </label>
            <br>
            <br>   
            <br><br><br>
            <label>  <input type="checkbox" name="mailing" id="mailbox"><p id="mailcheck">Do you want to sign up to the mailing list?</p><br>
            </label>
            <label>  <input type="checkbox" name="rememberme" id="remembercheck" checked onclick="storedetails()"><p id="mailcheck">Remember me</p><br>
            </label>
              <input type="submit" value="Submit" id="submitbutton" name="SubmitButton" onclick="storedetails()">
            
        </form>

      </div>

    </div>
  
  <br><br><br>


  </main>


  
 <?php 
   footer();  
 ?>


</body>
<script>

function storedetails() {
 if(document.getElementById("remembercheck").checked) {
  localStorage.setItem("name", document.getElementById('inputname').value);
  localStorage.setItem("email", document.getElementById('inputemail').value);
  localStorage.setItem("phone", document.getElementById('inputphone').value);
  localStorage.setItem("mail", document.getElementById('mailbox').checked);
 } else {
  localStorage.removeItem("name");
  localStorage.removeItem("email");
  localStorage.removeItem("phone");
  localStorage.removeItem("mail");
 }
};

document.addEventListener('DOMContentLoaded', function(){
    // do something
 document.getElementById("inputname").value = localStorage.getItem("name");
 document.getElementById("inputemail").value = localStorage.getItem("email");
 document.getElementById("inputphone").value = localStorage.getItem("phone");
 var checked = JSON.parse(localStorage.getItem('mail'));
 if (checked == false) {
    document.getElementById("mailbox").checked = false;
 } else {
    document.getElementById("mailbox").checked = true;
 }

});
</script>
</html>