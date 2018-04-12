/** mailService servlet for CS4640-S18 inclass exercise */


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
import javax.mail.internet.MimeMessage;
import javax.mail.PasswordAuthentication;

//Import Java Libraries
import java.io.*;
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
   // private String bcc_email = "some@email.com"; 
	   
   private String str_cofm = "";
	
   private String url = "http://localhost:8080/TomcatAssign5/MailServlet";   // local 
   // private String url = "http://labunix03.cs.virginia.edu:8080/your-computingID/mailService";   // labunix
   
   protected void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException 
   {
      res.setContentType ("text/html");
      PrintWriter out = res.getWriter ();  
      
      String seller_email = req.getParameter("seller_email");
      String email_subj = req.getParameter("email_subject");
      String email_msg = req.getParameter("email_msg");
                             
      out.println("<html>");
      out.println("<head>\n <title>Dylan's Mail Service</title>\n</head>");
      out.println("<body>");
      out.println("  <h1>Dylan's Mail Service</title></h1>");
      
      send_email(seller_email, email_subj, email_msg);
      out.println(str_cofm);    // print confirmation 
      
      out.print ("</body>\n");
      out.print ("</html>\n");

      out.close ();	      
   }
   
//   protected void doGet(HttpServletRequest req, HttpServletResponse res) 
//		     throws ServletException, IOException 
//   {	    	   
//      res.setContentType ("text/html");
//      PrintWriter out = res.getWriter();
// 
//      // always a good idea to include title --> telling where we are (in addition to what shows in the body)
//      // and also increase usability when the url to this web component is bookmarked
//      
//      out.println("<html>\n<head>\n <title>CS 4640: Sending mail exercise</title>\n</head>");      
//      out.println("<body>");
//      out.println("<center><h1>CS 4640: Mail Service</h1></center>");
//      out.println("<form action=\"" + url + "\" method=\"post\">");
//      out.println("<center>");
//      out.println("  <table>");
//      out.println("    <tr>");
//      out.println("      <td>");
//      out.println("        Your email address ");   
//      out.println("      </td>");
//      out.println("      <td>");          
//      out.println("        <input type=\"text\" name=\"your_email\" size=30>");
//      out.println("      </td>");
//      out.println("    </tr>");
//      out.println("    <tr>");
//      out.println("      <td>");
//      out.println("        Subject ");
//      out.println("      </td>");
//      out.println("      <td>");     
//      out.println("        <input type=\"text\" name=\"email_subject\" size=30>");
//      out.println("      </td>");
//      out.println("    </tr>");
//      out.println("    <tr>");
//      out.println("      <td>");
//      out.println("        Message ");
//      out.println("      </td>");
//      out.println("      <td>");     
//      // out.println("        <input type=\"text\" name=\"email_msg\" size=30>");
//      out.println("        <textarea name=\"email_msg\" row=4 cols=50></textarea>");
//      out.println("      </td>");
//      out.println("    </tr>");
//      out.println("    <tr>");      
//      out.println("      <td align=\"center\" colspan=2>");     
//      out.println("        <input type=\"submit\" value=\"Send Email\">");
//      out.println("      </td>");
//      out.println("    </tr>");
//      out.println("  </table>");
//      out.println("</center>");
//      out.println("</form>");   
//     
//      out.println("</body>");
//      out.println("</html>");
//      out.close();
//   }
   
   
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
    	  System.out.println("grape");
         try 
         {
            Message message = new MimeMessage(session);
            message.setFrom(new InternetAddress(default_email));     // from which email address
            message.setRecipients(Message.RecipientType.TO, InternetAddress.parse(email_address));  // send to which email address
           //message.addRecipient(Message.RecipientType.CC, new InternetAddress(cc_email));  // add cc recipient
            //message.addRecipient(Message.RecipientType.BCC, new InternetAddress(bcc_email));  // add bcc recipient
            //message.addRecipient(Message.RecipientType.TO, new InternetAddress(email_address));  // add more recipients
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