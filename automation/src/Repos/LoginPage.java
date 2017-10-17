package Repos;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;


public class LoginPage extends BasePage {

	private static String Url = "/";
	
	public static void GoToPage(WebDriver driver) {
		BasePage.GoToPageUrl(driver, Url);
	}
	
	public static WebElement UserName(WebDriver driver) {
		return driver.findElement(By.id("email"));
	}
		
	public static WebElement Password(WebDriver driver) {
		return driver.findElement(By.id("password"));
	}
	
	public static WebElement Submit(WebDriver driver) {
		return driver.findElement(By.cssSelector("button[type='submit']"));
	}
	
	public static void LoginAsStudent(WebDriver driver) {
		LoginPage.UserName(driver).sendKeys("harsha@gmail.com");
		LoginPage.Password(driver).sendKeys("aaaaaa");
		LoginPage.Submit(driver).click();
	}
	
	public static void LoginAsAdmin(WebDriver driver) {
		LoginPage.UserName(driver).sendKeys("Admin@wechart.com");
		LoginPage.Password(driver).sendKeys("wechartadmin");
		LoginPage.Submit(driver).click();
	}
	
	public static void LoginAsInstructor(WebDriver driver) {
		LoginPage.UserName(driver).sendKeys("");
		LoginPage.Password(driver).sendKeys("");
		LoginPage.Submit(driver).click();
	}
	
}
