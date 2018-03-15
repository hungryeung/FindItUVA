<?php

$inputEmailSignUp = $inputPasswordSignUp = $confirmPasswordSignUp = $phoneNumberSignUp = $feedbackSignUp = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['inputEmailSignUp']))
      echo "<font color='red'><i>Email address is a required field. Please enter a valid virginia.edu email address to log in.</i></font> <br />";
   if (empty($_POST['inputPasswordSignUp']))
      echo "<font color='red'><i>Password is a required field. Please enter a password to log in.</i></font> <br />";
   if (empty($_POST['confirmPasswordSignUp']))
      echo "<font color='red'><i>Confirm Password is a required field. Please enter a password to log in.</i></font> <br />";
   if (empty($_POST['phoneNumberSignUp']))
      echo "<font color='red'><i>Phone Number is a required field. Please enter a password to log in.</i></font> <br />";
   else 
   {     
      $inputEmailSignUp = trim($_POST['inputEmailSignUp']); // trim() remove leading space
      $inputPasswordSignUp = trim($_POST['inputPasswordSignUp']);  
      $confirmPasswordSignUp = trim($_POST['confirmPasswordSignUp']);
      $phoneNumberSignUp = trim($_POST['phoneNumberSignUp']);
      $feedback = "<font color='green'>You have entered valid data in all required fields. </font>";
   }      
}

if ($feedback != NULL)
   {
      echo "<hr/>";
      echo $feedback;
      echo "You answered <br/> <i> $inputEmailSignUp</i>  <br/> ";
      echo "You answered <br/> <i> $inputPasswordSignUp </i>  <br/> ";
      echo "You answered <br/> <i> $confirmPasswordSignUp </i>  <br/> ";
      echo "You answered <br/> <i> $phoneNumberSignUp </i>  <br/> ";
      echo "<a href= landing.html>Click on this link to redirect to the home page.</a>";
      // header('Location: landing.html');
      exit;
   }
?>