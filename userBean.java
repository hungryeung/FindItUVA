package beanexample;

public class userBean {
	private String email;
	private int sessionCounter;
	private int sessionIter;
	private boolean posted;
	
	public userBean() {
		sessionCounter = 0;
		sessionIter = 1;
		
	}
	public String getEmail() {
		return email;
	}
	public void setEmail(String em) {
		this.email = em;
	}	
	public boolean getPosted() {
		return posted;
	}
	public void setPosted(boolean var) {
		this.posted = var  ;
	}
	public void setSessionCounter(int val) {
		sessionCounter = val;
	}
	public int getSessionCounter() {
		sessionCounter += sessionIter;
		return sessionCounter;
	}
}
