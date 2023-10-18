 <?php
  session_start();
  ?>
  <!DOCTYPE html PUBLIC
    "-//W3C//DTD XHTML 1.0 Strict//EN"

    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <html>
 <head>
  <title>Listing 20.3 Accessing Session Variables</title>

</head>

 <body>

<div>

 <?php

 print "Your chosen products are:\n\n";

 ?>

 <ul>

 <li><?php print $_SESSION['product1'] ?></li>

 <li><?php print $_SESSION['product2'] ?></li>

 </ul>

 </div>

 </body>

 </html>