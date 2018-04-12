<html>
<head>
 <title>Contact Seller</title>
</head>
<body>



<center><h1>CS 4640: Mail Service</h1></center>
<form action="http://localhost:8080/TomcatAssign/MailServlet" method="post">
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
