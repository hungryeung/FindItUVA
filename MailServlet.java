/** mailService servlet for FindItUVA contacting seller form */


//Import Servlet Libraries
import javax.servlet.annotation.WebServlet;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;


//import mail service libraries
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.AddressException;
import javax.mail.internet.InternetAddress;
import  javax.mail.internet.MimeMessage ;
import javax.mail.PasswordAuthentication;

//Import Java Libraries
import  java.io. * ;
import java.util.Properties;

@WebServlet("/MailServlet")
public class MailServlet extends HttpServlet 
{
   /**
	 * 
	 */
	private static final long serialVersionUID = 1L;
// This is a bogus email created for this example 
   // To allow any program (e.g., this servlet) to login and send email from a gmail account,
   // please go to the gmail account >> sign-in and security >> turn on the "less security" option. 
	
   private String username = "dylan.nguyen.aos@gmail.com";   // ask me for username and password used for this example
   private String password = "Dylan0211";
			
   private String default_email = "dylan.nguyen.aos@gmail.com";    // (i.e., from_email)
   private String cc_email = "dcn3en@virginia.edu";
	   
   private String str_cofm = "";
	
   private String url = "http://localhost:8080/TomcatAssign5/MailServlet";   // local 
   
   protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException 
   {
      res.setContentType ("text/html");
      PrintWriter out = res.getWriter ();  
      
      String seller_email = req.getParameter("seller_email");
      String email_subj = req.getParameter("email_subject");
      String email_msg = req.getParameter("email_msg");
                             
      out.println("<html>");
      out.println("<head>\n <title>FindItUVA Mail Service</title>\n</head>");
      out.println("<body>");
      out.println("  <h1>FindItUVA Mail Service</title></h1>");
      
      send_email(seller_email, email_subj, email_msg);
      out.println(str_cofm);    // print confirmation 
	  out.println("<p>Redirect Link:<a href=\"http://localhost/FindItUVA/landing.html\">Click here to redirect to the home page</a></p>");

      out.print ("</body>\n");
      out.print ("</html>\n");

      out.close ();	      
   }
   
   private void send_email(String email_address, String email_subject, String email_message) 
   {
      Properties props = new Properties();
      
      // Specifies the IP address of your default mail server
      // for example, if you are using gmail server as an email sever
      // you will pass smtp.gmail.com as value of mail.smtp.host 
      props.put("mail.smtp.auth", "true");
      props.put("mail.smtp.starttls.enable", "true");
      props.put("mail.smtp.host", "smtp.gmail.com");
      props.put("mail.smtp.port", "587");      
      // pass properties object and authenticator object
      // for authentication to Session instance

      Session session = Session.getInstance(props, new javax.mail.Authenticator() {
            protected PasswordAuthentication getPasswordAuthentication() {
               return new PasswordAuthentication(username, password);
         }
      });      
            
      if (email_address.length() > 0 && email_message.length() > 0)
      {
    	  System.out.println("Sent.");
         try 
         {
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(default_email));     // from which email address
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(email_address));  // send to which email address
            message.setSubject(email_subject);         // set a subject of an email 
            message.setContent(email_message, "text/html; charset=utf-8");   // set a message of an email 
            
            Transport.send(message);                              
               
            // always provide feedback, so that the users know what happens, what to do next 
            
            str_cofm = "Email notification was sent";    // nothing wrong, confirm to the user so that the user knows the status            
         } catch (MessagingException e) {
        	// if something's wrong, let the user knows  
            str_cofm = "There is a problem while sending an email. " + 
                       "Please check your code and try sending an email again."; 
            throw new RuntimeException(e);
         }
      }    
                  
   }   
}
