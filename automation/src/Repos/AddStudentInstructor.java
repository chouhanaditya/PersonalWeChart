package Repos;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;

public class AddStudentInstructor extends BasePage{
	
	private static String Url = "home";
	
	public static void GoToPage(WebDriver driver) {
		BasePage.GoToPageUrl(driver, Url);
	}
	
	public static WebElement AddStudentButton (WebDriver driver) {
		return driver.findElement(By.id("addStudentEmails"));
	}
	
	public static WebElement AddMoreStudentButton (WebDriver driver) {
		return driver.findElement(By.id("AddMoreStudentEmails"));
	}
	
	public static WebElement RemoveStudentButton (WebDriver driver) {
		return driver.findElement(By.id("RemoveStudentEmails"));
	}
		
	
	public static WebElement BackToDashboardButton (WebDriver driver) {
		return driver.findElement(By.id("Back"));
	}
	
	public static WebElement AddInstructorButton (WebDriver driver) {
		return driver.findElement(By.id("addInstructorEmails"));
	}
	
	public static WebElement AddMoreInstructorButton (WebDriver driver) {
		return driver.findElement(By.id("AddMoreInstructorEmails"));
	}
	
	public static WebElement RemoveInstructorButton (WebDriver driver) {
		return driver.findElement(By.id("RemoveInstructorEmails"));
	}
	
	public static WebElement EnterEmailAddress(WebDriver driver) {
		return driver.findElement(By.xpath(".//*[@id='email[]']"));
	}
		
	public static WebElement EnterEmailAddress2(WebDriver driver) {
		return driver.findElement(By.xpath("(.//*[@id='email[]'])[2]"));
	}
	
	public static WebElement Submit(WebDriver driver) {
		return driver.findElement(By.cssSelector("button[type='submit']"));
	}
	
	
	public static void AddingStudent (WebDriver driver) {
		AddStudentInstructor.EnterEmailAddress(driver).sendKeys("");
		AddStudentInstructor.Submit(driver).click();
	}	
	
	public static void AddingMoreStudent (WebDriver driver) {
		AddStudentInstructor.EnterEmailAddress2(driver).sendKeys("");
		AddStudentInstructor.Submit(driver).click();
	}	
		
			
	public static void AddingInstuctor (WebDriver driver) {
		AddStudentInstructor.EnterEmailAddress(driver).sendKeys("");
		AddStudentInstructor.Submit(driver).click();
	}	
		
	public static void AddingMoreInstructor (WebDriver driver) {
		AddStudentInstructor.EnterEmailAddress2(driver).sendKeys("");
		AddStudentInstructor.Submit(driver).click();
	}
	}


