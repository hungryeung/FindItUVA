<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>JSP examples</title>
</head>
<body>

   <!-- Use a couple of directives to manage the language and imports for this jsp file-->
   <%@ page language="java" %>  
   <%@ page import="beanexample.userBean" %>    
   <%@ page import="javax.servlet.http.HttpSession" %>    
   
   
<!--    static String url = "http://localhost:8080/TomcatAssign5/userBeanTalker.jsp";
 -->  
   <br/><br/>
   <!-- usetwobeans, with different scopes to test out state handling) -->
    <jsp:useBean id="myUserPages" class="beanexample.userBean" scope="page" />
	<jsp:useBean id="myUser" class="beanexample.userBean" scope="session">
  	</jsp:useBean> 
   <br/>
   <hr/>
   <br/>   
   <!-- declare variables to use locally for email and postings  -->
   <%! int postingsCount = 0;%>
   <%! boolean posted_confirm = false;%>
   <%! String userEmail = ""; %>

   <!-- scriptlet; stores the session attribute for email and postings into the declared variables
   userEmail and postingsCount respectively
   -->
   <%
      if (session.getAttribute("semail")!=null)
      {
 		userEmail = session.getAttribute("semail").toString(); 
	  }
      postingsCount = (int)session.getAttribute("postings");
      if (request.getParameter("posting-submit")!=null || postingsCount !=0){
    	  posted_confirm = true;
      }  
   %>
   <br/> 
   <jsp:setProperty name="myUser" property="email" value= "<%=userEmail%>" />  
   <jsp:setProperty name="myUser" property="posted" value= "<%=posted_confirm%>" />   
   <br/><br/>
   <div align="middle">
   <h1>Goodbye, thank you for visiting our page.</h1>
   <p> You have successfully logged out.  The email associated with your account is,     
	 <font color="green"><i><jsp:getProperty name="myUser" property="email"/></i></font></p>
   <br/><br/>   
   <p> Your posting status (whether you have made a post to sell an item) is:       
   <font color="green"><i><jsp:getProperty name="myUser" property="posted"/></i></font></p>
   <p> The number of pages you have visited during this session is,      
   <font color="green"><i><jsp:getProperty name="myUserPages" property="sessionCounter"/></i></font></p>
   <p> The number of sessions you have had is,      
   <font color="green"><i><jsp:getProperty name="myUser" property="sessionCounter"/></i></font></p>
   </div>
   <br/><br/>      
    <a href="http://localhost:8080/TomcatAssign5/invalidate"><b>Click here to invalidate the current session.</b></a>

   <br/>    
   <br/>
   <hr/>
   <br/>      
</body>
</html>