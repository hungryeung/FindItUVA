<?php

// form handler and form -- same file -- sometimes refer to as "sticky form" 

$inputEmail = $inputPassword = $feedback = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   if (empty($_POST['inputEmail']))
      echo "<font color='red'><i>Email address is a required field. Please enter a valid virginia.edu email address to log in.</i></font> <br />";
   if (empty($_POST['inputPassword']))
      echo "<font color='red'><i>Password is a required field. Please enter a password to log in.</i></font> <br />";
   else 
   {   	
      $inputEmail = trim($_POST['inputEmail']); // trim() remove leading space
      $inputPassword = trim($_POST['inputPassword']);  

      $feedback = "<font color='green'>You have entered valid data in all required fields. </font>";
   }      
}

if ($feedback != NULL)
	{
	   echo "<hr/>";
	   echo $feedback;
	   echo "You answered <br/> <i> $inputEmail </i>  <br/> ";
      echo "You answered <br/> <i> $inputPassword </i>  <br/> ";
      echo "<a href= landing.html>Click on this link to redirect to the home page.</a>";
      // header('Location: landing.html');
      exit;
	}
?>