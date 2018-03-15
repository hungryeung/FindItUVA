<!DOCTYPE html>
<html lang ="en">
<head>
	<meta charset="utf-8">
	<title>FindItUVA: Sell an Item</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<link rel="stylesheet" type="text/css" href="posting.css">

</head>

<body>
  <nav class="navbar navbar-default" style="background-color: lightblue; border-color: lightblue">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FindItUVA</a>
    </div>
    
    <ul class="nav navbar-nav">
      <li><a href="landing.html">Home</a></li>
      <li><a href="books.html">Books</a></li>
      <li><a href="#">Furniture</a></li>
      <li><a href="#">Other</a></li>
    </ul>

    <form class="navbar-form navbar-left">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search for..." name="search" style = "width: 400px">
      </div>
      <button type="submit" class="btn btn-default">Search</button>
    </form>
  <ul class="nav navbar-nav navbar-right">
    <li class="active"><a href="posting.html">Sell an Item</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> My Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="signinpage.php">Log Out</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#"></a></li>
        </ul>
    </li>
  </ul>

</nav>
     <div class="container">

      <form class="form-signin" action="<?php $_SERVER['PHP_SELF'] ?>" method = "post" onsubmit = "(verifyFilled(this))">
        <h2 class="form-signin-heading">Post an Item for Sale</h2>
        <div class="col-25">
          <label for="itemName">Item Name</label>
        </div>
        <div class="col-75">
          <input id="itemName" placeholder="What do you want to sell?" name = "itemName" required autofocus>
        </div>
        <br>
        <div class="col-25">
          <label for="itemPrice">Item Price (USD)</label>
        </div>
        <div class="col-75">
          <input id="itemPrice" name = "itemPrice" placeholder="5.00" required>
        </div>
        <br>
        <div class="col-25">
          <label for="itemCategory">Item Category</label>
        </div>
        <div class="col-75">
          <input id="itemCategory" name = "itemCategory" placeholder="(e.g. Book, Furniture, Other, etc.)" required>
        </div>
        <br>
        <div class="col-25">
          <label for="itemDescription">Item Description</label>
        </div>
        <br>
        <div class="col-75">
        <textarea id="itemDescription" name = "itemDescription" class = "mytext" placeholder="Further details..."></textarea>
        </div>
        <br>
        <div class="col-75">
          <input type = "submit" value = "Post Item" formnovalidate>
        </div>
      </form>

     </div> <!-- /container -->

   <script language="javascript">
      /*checks whether data fields have been entered for posting */
       function verifyFilled(form) {
          if(document.getElementById("itemName").value === '' || document.getElementById("itemCategory").value === ''){
              alert("Please enter data in all required fields.");
              return false;
          }
          else {
            return true;
          }
        }

    </script>

<!-- PHP SCRIPT -->
<?php

#Create array to hold error messages
$error_array = array();

#Check to see if the form submission is completed
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $name = $_POST['itemName'];
   $category = $_POST['itemCategory'];
   $price = $_POST['itemPrice'];
   $comment = $_POST['itemDescription'];

#My own form validation which includes checking that the comment length is no longer than 200 charcacters
   #  and that names and categories only include letters as well as the price following a particular regular expression.
   # IF an error is found, then the error message is added to the error array. 
  
  if(strlen($comment)> 200){
  $error_array[] = "<i>comment is too long</i> <br />";
}
if(!ctype_alpha($name)){
  $error_array[] = "Name must be written in letters only <br />";
}
if(!ctype_alpha($category)){
  $error_array[] = "Category must be written in letters only <br />";
}
if(!preg_match("/^[+-]?[0-9]{1,3}(?:,?[0-9]{3})*\.[0-9]{2}$/", $price)){
  $error_array[] = "Price must be in correct format <br />";
}

# The error array is printed if there is any errors inside. 
if (sizeof($error_array) > 0){
  $str = implode(" ", $error_array);
  echo $str;
}
#otherwise there is a message that is an Item Posted. 
else {
echo "Item Posted!";
}
}

?>


</body>
</html>