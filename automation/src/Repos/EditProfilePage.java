package Repos;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;

public class EditProfilePage extends BasePage{
private static String Url = "EditProfile";
	
	public static void GoToPage(WebDriver driver) {
		BasePage.GoToPageUrl(driver, Url);
	}
	public static WebElement editEmail(WebDriver driver) {
		return driver.findElement(By.id("email"));
	}
	public static WebElement editDepartment(WebDriver driver) {
		return driver.findElement(By.id("departmentName"));
	}	
	public static WebElement editFirstName(WebDriver driver) {
		return driver.findElement(By.id("firstname"));
	}	
	public static WebElement editLastName(WebDriver driver) {
		return driver.findElement(By.id("lastname"));
	}
	public static WebElement editContactNo(WebDriver driver) {
		return driver.findElement(By.id("contactno"));
	}	
	public static WebElement Submit(WebDriver driver) {
		return driver.findElement(By.xpath("//button[@type='submit']"));
	}
	
	public static WebElement BackToDash(WebDriver driver) {
		return driver.findElement(By.partialLinkText("Back to Dashboard"));
	}
	
	public static String[] getDetails(WebDriver driver)
	{
		String beforeEditDetails[] = new String[5];
		String email = EditProfilePage.editEmail(driver).getAttribute("value");
		beforeEditDetails[0] = email;
		String firstName = EditProfilePage.editFirstName(driver).getAttribute("value");
		beforeEditDetails[1] = firstName;
		String lastName = EditProfilePage.editLastName(driver).getAttribute("value");
		beforeEditDetails[2] = lastName;
		String contactNo = EditProfilePage.editContactNo(driver).getAttribute("value");
		beforeEditDetails[3] = contactNo;
		String department = EditProfilePage.editDepartment(driver).getAttribute("value");
		beforeEditDetails[4] = department;
		return (beforeEditDetails);
	}
		
	/*public void editDetails(WebDriver driver)
	{
		EditProfilePage.editFirstName(driver).sendKeys("");
		EditProfilePage.editLastName(driver).sendKeys("");
		EditProfilePage.editContactNo(driver).sendKeys("");
		EditProfilePage.editDepartment(driver).sendKeys("");
		EditProfilePage.Submit(driver).click();
	}*/
}
