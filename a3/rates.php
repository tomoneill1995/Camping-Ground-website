<!DOCTYPE html>
<html lang='en'>

  <?php 
  
    require_once("tools.php"); 
    session_start(); 
    $_POST = $_Session["Booking"];
  
  ?>

<head>
  <meta charset="utf-8">
  <title>Assignment 2</title>

  <!-- We will cover style later. Skip down to the body tag -->
  <link type="text/css" rel="stylesheet" href="../css/wireframe.css"/>
  <link href="https://fonts.googleapis.com/css?family=Cabin|Port+Lligat+Sans" rel="stylesheet">
</head>

<body>

  <header>
   
      <img src="../media/Logo.png" alt="Logo" class="logo">
      <!-- Original Image below sourced for educational purposes: -->
      <!-- https://pngtree.com/so/cartoon-tent -->
    
      <nav>
          <a href="/~s3488614/wp/a2/index.html" > Home </a> 
          <a href="/~s3488614/wp/a2/accommodation.html" > Accommodation </a> 
          <a class="active" href="/~s3488614/wp/a2/rates.html" > Rates </a> 
          <a href="/~s3488614/wp/a2/contact.html" > Contact </a> 
      </nav>

  </header>

  <main>

    <h1>Our Rates</h1>

    <p>Planning your camping trip?<br>
      Stay at Open Bays caravan park for as little as $35.25 a night, with the option to upgrade a larger or even powered site! <br>
      Alternatively bring your own caravan! Stay at one of our caravan sites for $100 a night with no extra charge per person. </p>

    <br><br>
    <article>
      <table>
        <tr>
          <th>Type</th>
          <th>Per Night</th>
          <th>Extra Adult</th>
          <th>Extra Child</th>
        </tr>
      
        <tr>
          <td class="td-name">Unpowered Small Camping Sites </td>
          <td>$35.25</td>
          <td>$10</td>
          <td>$5</td>
        </tr>
      
        <tr>
          <td class="td-name">Unpowered Medium Camping Sites </td>
          <td>$40.50</td>
          <td>$10</td>
          <td>$5</td>
        </tr>
      
        <tr>
          <td class="td-name">Powered Small Camping Sites </td>
          <td>$50.25</td>
          <td>$10</td>
          <td>$5</td>
        </tr>     
      
        <tr>
          <td class="td-name">Powered Medium Camping Sites </td>
          <td>$60.50</td>
          <td>$10</td>
          <td>$5</td>
        </tr>
      
        <tr>
          <td class="td-name">Caravan Sites </td>
          <td>$100.00</td>
          <td>Free</td>
          <td>Free</td>
        </tr>
      </table>

      <br><br>
      <p class="ratesContent">Note: Per Night rate includes 2 adults or 1 adult + child. <br>
      
        Additional Information for camping sites: <br>
        All Prices include GST</p> 
        <br>

    </article>      
    
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