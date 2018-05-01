<?php session_start();

require "dbutil.php";
$db = DbUtil::loginConnection();

$stmt = $db->stmt_init();
$username = $_POST['inputEmailSignUp'];
$password = $_POST['inputPasswordSignUp'];
$number = $_POST['phoneNumberSignUp'];




if($stmt->prepare("SELECT * FROM Users WHERE username = '$username' ") or die(mysqli_error($db))) {
				$stmt->execute();
                $stmt->bind_result($user, $pass, $num);
                $stmt->fetch();
              if ($user == null and $pass == null){
                		
                        $stmt->prepare("INSERT INTO Users VALUES ('$username', '$password', '$number')");
                		$stmt->execute();
                }

            else{
            	echo 'user already exists';
            	echo "<meta http-equiv=REFRESH CONTENT=1;url='signinpage.html'>";
            }
        }

?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="utf-8">
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Extenral Style Sheet -->
    <link rel = "stylesheet" type = "text/css" href = "signinpage.css">


</head>

<body>
   <div class = "container">
<form name = "signupform" class = "form-signin" action = "http://localhost:8080/TomcatAssign5/FormServlet" onsubmit= "return (verifySignUp(this))" method = "post">
        <h2 class = "form-signin-heading"> Confirm?</h2>
          <label for="inputEmail">Email address</label>
          <input type="email" name = "inputEmailSignUp" id="inputEmailSignUp" class="form-control" value = <?php echo $username ?> readonly>
          <label for="inputPassword">Password</label>
          <input type="password" name = "inputPasswordSignUp" id="inputPasswordSignUp" class="form-control" value = <?php echo $password ?> readonly>
          <label for="inputPassword">Confirm Password</label>
          <input type="password" name = "confirmPasswordSignUp" id="confirmPasswordSignUp" class="form-control" value = <?php echo $password ?> readonly>
          <label for="inputPhoneNumber">Phone Number (to contact seller/buyer)</label>
          <input type = "tel" name = "phoneNumberSignUp" id="phoneNumberSignUp" class="form-control" value = <?php echo $number ?> readonly>
          <input type="submit" name = "signup-submit" value = "Sign Up" class="btn btn-lg btn-primary btn-block" formnovalidate>
        </form>
  </div>


</body>