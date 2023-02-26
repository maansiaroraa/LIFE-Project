<?php require_once('includes/functions.php'); ?>


<!DOCTYPE html>  
<html>  
     <head>
          <title>Registration | LIFE</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <link rel="stylesheet" type="text/css" href="styles/registration.css">
          
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <link href="https://fonts.cdnfonts.com/css/gt-walsheim" rel="stylesheet">
     </head>
     <body>  
          <div class = containernav>
               <!-------------------------------------------------------
                    calling navbar here -  fragment file
               ---------------------------------------------------------->
               <?php require_once("includes/navbar.php"); ?>

               <!-------------------------------------------------------
                    adding login form here
               ---------------------------------------------------------->
               <?php require_once("includes/login_form.php"); ?> 
          </div>
          
          <!-------------------------------------------------------
          adding footer fragment file here
          ---------------------------------------------------------->
          <?php require_once('includes/footer.php'); ?>

     </body>
</html>
