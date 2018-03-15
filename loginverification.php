<?php

//Used to verify that login inputs are correct and have been entered on the sign in screen.  This will be processed on the server side.

$inputEmail = $inputPassword = $feedback = NULL;


//checks if values are empty and also if email entered is a valid email address.  If not, display an error message onto the screen for the user.
//the first line will check which submit button has been pressed so that we know which post requests to process.
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

//if the feedback is not null, then we know that the inputs have been entered correctly.  Display the inputs to the user and then redirect the user to the main home page.
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