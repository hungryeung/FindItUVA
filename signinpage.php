<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->


<!-- The main sign in page -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>FindItUVA</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Extenral Style Sheet -->
    <link rel = "stylesheet" type = "text/css" href = "signinpage.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <!-- Form for login  -->

  <body>
     <div class="container">
      <form class="form-signin" onsubmit = "(verifyLogIn(this))" method = "post">
        <h2 class="form-signin-heading">Log In to FindItUVA</h2>
        <label for="inputEmail">Email address</label>
        <input type="email" name = "inputEmail" id="inputEmail" class="form-control" placeholder="UVA email address (computingID@virginia.edu)" pattern=".+@virginia.edu" required autofocus>
        <label for="inputPassword">Password</label>
        <input type="password" name = "inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <input type = "submit" name = "login-submit" value = "Log In" class="btn btn-lg btn-primary btn-block" formnovalidate>
        <?php require 'loginverification.php' ?>
      </form>

    </div> <!-- /container -->

  <!-- Form for signup -->
    <div class = "container">
      <form class = "form-signin" onsubmit= "(verifySignUp(this))" method = "post">
        <h2 class = "form-signin-heading"> Don't Have an Account Yet?</h2>
          <label for="inputEmail">Email address</label>
          <input type="email" name = "inputEmailSignUp" id="inputEmailSignUp" class="form-control" placeholder="UVA email address (computingID@virginia.edu)" pattern=".+@virginia.edu" required autofocus>
          <label for="inputPassword">Password</label>
          <input type="password" name = "inputPasswordSignUp" id="inputPasswordSignUp" class="form-control" placeholder="Password" required>
          <label for="inputPassword">Confirm Password</label>
          <input type="password" name = "confirmPasswordSignUp" id="confirmPasswordSignUp" class="form-control" placeholder="Confirm Password" required>
          <label for="inputPhoneNumber">Phone Number (to contact seller/buyer)</label>
          <input type = "tel" name = "phoneNumberSignUp" id="phoneNumberSignUp" class="form-control" placeholder="XXX-XXX-XXXX" required>
          <input type="submit" name = "signup-submit" value = "Sign Up" class="btn btn-lg btn-primary btn-block" formnovalidate>
          <?php require 'signupverification.php' ?>
      </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script language="javascript">
          /*checks whether data fields have been entered for signupform */
            function verifySignUp(form) {
                if(document.getElementById("inputEmailSignUp").value === '' || document.getElementById("inputPasswordSignUp").value ==='' || document.getElementById("confirmPasswordSignUp").value ==='' || document.getElementById("phoneNumberSignUp").value ===''){
                    alert("Please enter data in all required fields.");
                    return false;
                }
                else{
                  return true;
                }
            }

           function verifyLogIn(form) {
              if(document.getElementById("inputEmail").value === '' || document.getElementById("inputPassword").value === ''){
                  alert("Please enter data in all required fields.");
                  return false;
              }
              else {
                return true;
              }
            }
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--     <script src="js/bootstrap.min.js"></script>
 --></body>
</html>
