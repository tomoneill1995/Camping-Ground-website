<?php 
  
    require_once("tools.php"); 
    $_SESSION["booking"] = $_POST;
  

    echo $head;

  ?>

<body>


  <?php echo $header; ?>

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
  
  <?php 
   footer();  
  ?>


</body>

</html>