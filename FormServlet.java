import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 * Servlet implementation class for processing user inputs from login, signup, and posting (items for sale)
 */
@WebServlet("/FormServlet")
public class FormServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public FormServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		response.getWriter().append("Served at: ").append(request.getContextPath()).append(", method= ").append(request.getMethod());;
				response.setContentType("text/html");
				PrintWriter out = response.getWriter(); 
				
				// Session is made and session data is inputed
			HttpSession session = request.getSession(true);
			Date createTime = new Date(session.getCreationTime());
			
		if (request.getParameter("login-submit")!= null ) {
			session.setAttribute("semail", request.getParameter("inputEmail"));
			out.println("<br/>" + "Session Email: " + session.getAttribute("semail") + "<br/>");
			out.println("Session Creation Time: " + createTime + "<br/>");
			
			out.println("<br/><br/><html>" +
                    "   <body>" +
                    "      HTML Login Form Data: " + "Email: "  + request.getParameter("inputEmail") + ", " 
                    + "Password: " + request.getParameter("inputPassword") +                    
                    "   </body>" +
					"</html>" ); 	
			out.println("<p>Redirect Link:<a href=\"http://localhost/FindItUVA/landing.html\">Click here to redirect to the home page</a></p>");
		}
		
		if (request.getParameter("signup-submit")!=null) {
			session.setAttribute("semail", request.getParameter("inputEmailSignUp"));
			out.println("<br/>" + "Session Email: " + session.getAttribute("semail") + "<br/>");
			out.println("Session Creation Time: " + createTime + "<br/>");
			
			out.println("<br/><br/><html>" +
                    "   <body>" +
                    "      HTML Signup Form Data: " + "Email: "  + request.getParameter("inputEmailSignUp") 
                    + ", " + "Password: " + request.getParameter("inputPasswordSignUp") 
                    + ", " + "Phone Number: " + request.getParameter("phoneNumberSignUp") +                    
                    "   </body>" +
                    "</html>" ); 	
			out.println("<p>Redirect Link:<a href=\"http://localhost/FindItUVA/landing.html\">Click here to redirect to the home page</a></p>");
		}
		if (request.getParameter("posting-submit")!=null) {
			if (request.getParameter("inputEmailSignUp")!=null) {
				session.setAttribute("semail", request.getParameter("inputEmailSignUp"));
			}
			if (request.getParameter("inputEmail")!=null){
				session.setAttribute("semail", request.getParameter("inputEmail"));

			}
			out.println("<br/>" + "Session Email: " + session.getAttribute("semail") + "<br/>");
			out.println("Session Creation Time: " + createTime + "<br/>");
			
			out.println("<br/><br/><html>" +
                    "   <body>" +
                    "      HTML Signup Form Data: " + "Item Name: "  
                    + request.getParameter("itemName") 
                    + ", " + "Item Price: " + request.getParameter("itemPrice") + ", "
                    + "Item Category: " + request.getParameter("itemCategory") + ", " 
                    +  "Item Description: " + request.getParameter("itemDescription") +                  
                    "   </body>" +
                    "</html>" ); 	
			out.println("<p>Redirect Link:<a href=\"http://localhost/FindItUVA/posting.html\"> You have successfully posted the item!  Click here to redirect back to the posting page</a></p>");
		}
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doPost(request, response);
	}

} 