<!-------------------------------------------------------
       calling the logout function to end the session  
---------------------------------------------------------->
<?php

require_once('includes/functions.php');

logoutUser();
redirect('login.php');
