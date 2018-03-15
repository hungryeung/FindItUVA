<?php

// form handler and form -- same file -- sometimes refer to as "sticky form" 

$inputEmail = $inputPassword = $feedback = NULL;

if (!empty($_POST['login-submit'])) {
   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      if (empty($_POST['inputEmail']) || !(filter_var($_POST['inputEmail'], FILTER_VALIDATE_EMAIL)) )
         echo "<font color='red'><i>Email address is a required field. Please enter a valid virginia.edu email address to log in.</i></font> <br />";
      else if (empty($_POST['inputPassword']))
         echo "<font color='red'><i>Password is a required field. Please enter a password to log in.</i></font> <br />";
      else 
      {   	
         $inputEmail = trim($_POST['inputEmail']); // trim() remove leading space
         $inputPassword = trim($_POST['inputPassword']);  

         $feedback = "<font color='green'>You have entered valid data in all required fields. </font>";
      }      
   }

   if ($feedback != NULL){
         header('Refresh:5; url=landing.html');
   	   echo "<hr/>";
         echo "Redirecting you to the home page in the next few seconds... <br/>";
   	   echo $feedback;
   	   echo "You answered <br/> <i> $inputEmail </i>  <br/> ";
         echo "You answered <br/> <i> $inputPassword </i>  <br/> ";
         // header('Location: landing.html');
         exit;
   }
}
?>