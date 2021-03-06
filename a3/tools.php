<?php 

//Add some tools here, branches for all pages etc. 
session_start(); 

$head = <<<HTML

  <!DOCTYPE html>
  <html lang='en'>

  <head>
    <meta charset="utf-8">
    <meta name="Tom O'Neill + Craig Robinson" content="Assignment 3">
    <title>Open Bay Caravan Park</title>
    <link type="text/css" rel="stylesheet" href="../css/wireframe.css"/>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Port+Lligat+Sans" rel="stylesheet">
    <!-- We will cover style later. Skip down to the body tag --> 
 </head>
HTML;


$links = <<<HTML
  <nav>
    <a href="/~s3488614/wp/a3/index.php" > Home </a> 
    <a href="/~s3488614/wp/a3/accommodation.php" > Accommodation </a> 
    <a href="/~s3488614/wp/a3/rates.php" > Rates </a> 
    <a href="/~s3488614/wp/a3/contact.php" > Contact </a> 
  </nav>
HTML;

$header = <<<HTML

  <header> 
    <img src="../media/Logo.png" alt="Logo" class="logo">
    <!-- Original Image below sourced for educational purposes: -->
    <!-- https://pngtree.com/so/cartoon-tent -->
 
    <nav>
    <a href="/~s3488614/wp/a3/index.php" > Home </a> 
    <a href="/~s3488614/wp/a3/accommodation.php" > Accommodation </a> 
    <a href="/~s3488614/wp/a3/rates.php" > Rates </a> 
    <a href="/~s3488614/wp/a3/contact.php" > Contact </a> 
    </nav>
  </header>
HTML;


$footer = <<<HTML
  
  <footer>
    &copy;<script>
      document.write(new Date().getFullYear());
      </script> Craig Robinson - s3488614 Tom O'Neill - s3542941 - Starch Industries<br>
      Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.
      <br>
      Maintain links to your working <a href='/~s3488614/wp/a2/style-guide.pdf'>style guide</a>, your <a href='../mailing.txt'>products spreadsheet</a> and <a href='../orders.txt'>orders spreadsheet</a> here.
  
    </footer>
HTML;

function footer() {
  echo $GLOBALS['footer'];
  debug();
}


function debug() {

  echo $GLOBALS['debug2'];
}
//    $debug= <<<DEBUG

//     <aside id='debug'>
//     <details open>
//       <summary>=Debug Show/Hide</summary>
//         <pre>
//          'SESSION' contains: 
//          {print_r($_SESSION,true)} 

//           'POST'  contains:
//           {print_r($_POST,true)}
//     </pre>
//   </details>
// </aside>  

// DEBUG;

$debug2 = "

<aside id='debug'>
  <details open>
    <summary>=Debug Show/Hide</summary>
    <pre>
      SESSION contains:
        " .  print_r($_SESSION,true) . "

      POST contains:
       " .   print_r($_POST,true) ." 
    </pre>
  </details>
</aside>

";







//Added comment



?>