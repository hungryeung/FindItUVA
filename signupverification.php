<?php

$inputEmailSignUp = $inputPasswordSignUp = $confirmPasswordSignUp = $phoneNumberSignUp = $feedbackSignUp = NULL;

if (!empty($_POST['signup-submit'])) {
   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      if (empty($_POST['inputEmailSignUp']) || empty($_POST['inputPasswordSignUp']) || empty($_POST['confirmPasswordSignUp']) || empty($_POST['phoneNumberSignUp'])) {
         if (empty($_POST['inputEmailSignUp']) || !(filter_var($_POST['inputEmailSignUp'], FILTER_VALIDATE_EMAIL)))
            echo "<font color='red'><i>Email address is a required field. Please enter a valid virginia.edu email address to log in.</i></font> <br />";
         if (empty($_POST['inputPasswordSignUp']))
            echo "<font color='red'><i>Password is a required field. Please enter a password to log in.</i></font> <br />";
         if (empty($_POST['confirmPasswordSignUp']))
            echo "<font color='red'><i>Confirm Password is a required field. Please enter a password to log in.</i></font> <br />";
         if (empty($_POST['phoneNumberSignUp']))
            echo "<font color='red'><i>Phone Number is a required field. Please enter a password to log in.</i></font> <br />";
      }
      else if (!empty($_POST['inputEmailSignUp']) && !(filter_var($_POST['inputEmailSignUp'], FILTER_VALIDATE_EMAIL)))
            echo "<font color='red'><i>Email address is a required field. Please enter a valid virginia.edu email address to log in.</i></font> <br />";
      else {     
            $inputEmailSignUp = trim($_POST['inputEmailSignUp']); // trim() remove leading space
            $inputPasswordSignUp = trim($_POST['inputPasswordSignUp']);  
            $confirmPasswordSignUp = trim($_POST['confirmPasswordSignUp']);
            $phoneNumberSignUp = trim($_POST['phoneNumberSignUp']);
            $feedback = "<font color='green'>You have entered valid data in all required fields. </font>";
      }      
   }

   if ($feedback != NULL){
      header('Refresh:5; url=landing.html');
      echo "<hr/>";
      echo "Redirecting you to the home page in the next few 
      seconds... <br/>";
      echo $feedback;
      echo "You answered <br/> <i> $inputEmailSignUp</i>  <br/> ";
      echo "You answered <br/> <i> $inputPasswordSignUp </i>  <br/> ";
      echo "You answered <br/> <i> $confirmPasswordSignUp </i>  <br/> ";
      echo "You answered <br/> <i> $phoneNumberSignUp </i>  <br/> ";
      // header('Location: landing.html');
      exit;
   }
}
?>