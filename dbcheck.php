<?php session_start();

require "dbutil.php";

$db = DbUtil::loginConnection();
$stmt = $db->stmt_init();
$username = $_POST['inputEmail'];
$password = $_POST['inputPassword'];

//echo $checked;
//echo $username;
//echo $password;
//echo $user;

if($stmt->prepare("SELECT * FROM Users WHERE username = '".$username."'")) {
                $stmt->execute();
                $stmt->bind_result($user, $pass, $num);
                $stmt->fetch();
                if ($username != $user || $password != $pass){
                        echo "Wrong Email or Password";
                    echo "<meta http-equiv=REFRESH CONTENT=1;url='signinpage.html'>";
                    }
               
            }
            else{
                echo "dead";
                echo "<meta http-equiv=REFRESH CONTENT=1;url='signinpage.html'>";
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

    <div class="container">
      <form name = "loginform" class="form-signin" action = "http://localhost:8080/TomcatAssign5/FormServlet" method = "post">
        <h2 class="form-signin-heading">Confirm User?</h2>
        <label for="inputEmail">Email address</label>
        <input type="email" name = "inputEmail" id="inputEmail" class="form-control" value = <?php echo $username ?> readonly>
        <label for="inputPassword">Password</label>
        <input type="password" name = "inputPassword" id="inputPassword" class="form-control" value = <?php echo $password ?> readonly>
        <input type = "submit" name = "login-submit" value = "Log In" class="btn btn-lg btn-primary btn-block" formnovalidate>
      </form>
  </div>

</body>