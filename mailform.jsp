<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<head>
 <title>Contact Seller</title>
</head>
<body>

<nav class="navbar navbar-default" style="background-color: lightblue; border-color: lightblue">
  	<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">FindItUVA</a>
    </div>
    
    <ul class="nav navbar-nav">
      <li><a href="http://localhost/FindItUVA/landing.html">Home</a></li>
      <li><a href="http://localhost/FindItUVA/books.html">Books</a></li>
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
    <li class = "active"><a href="http://localhost:8080/TomcatAssign5/mailform.jsp">Contact a Seller</a></li>
    <li><a href="http://localhost/FindItUVA/posting.html">Sell an Item</a></li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> My Account
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="http://localhost:8080/TomcatAssign5/invalidate">Log Out</a></li>
          <li><a href="#">something</a></li>
          <li><a href="#"></a></li>
        </ul>
    </li>
  </ul>
</nav>



<center><h1>CS 4640: Mail Service</h1></center>
<form action="http://localhost:8080/TomcatAssign5/MailServlet" method="post">
<center>
  <table>
    <tr>
      <td>
        Seller email address 
      </td>
      <td>
        <input type="text" name="seller_email" size=30>
      </td>
    </tr>
    <tr>
      <td>
        Subject 
      </td>
      <td>
        <input type="text" name="email_subject" size=30>
      </td>
    </tr>
    <tr>
      <td>
        Message 
      </td>
      <td>
        <textarea name="email_msg" row=4 cols=50></textarea>
      </td>
    </tr>
    <tr>
      <td align="center" colspan=2>
        <input type="submit" value="Send Request">
      </td>
    </tr>
  </table>
</center>
</form>
</body>
</html>
