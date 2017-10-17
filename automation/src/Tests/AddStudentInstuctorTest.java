
package Tests;
import java.sql.Driver;
import java.util.concurrent.TimeUnit;

import org.junit.Test;
import org.openqa.selenium.*;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.htmlunit.HtmlUnitDriver;
import org.openqa.selenium.support.ui.SystemClock;
import org.openqa.selenium.Keys;


import Repos.AddStudentInstructor;
import Repos.AddStudentInstructor;
import Repos.LoginPage;
import net.bytebuddy.implementation.bind.annotation.Super;

public class AddStudentInstuctorTest extends BaseTest {

	public AddStudentInstuctorTest() {
		super();		
	}
	
	
	public void VerifyAddStudent() {
		
		LoginPage.LoginAsAdmin(driver);
		
		
			
		AddStudentInstructor.AddStudentButton(driver).click();
		AddStudentInstructor.AddMoreStudentButton(driver).click();
		AddStudentInstructor.AddMoreStudentButton(driver).click();
		AddStudentInstructor.RemoveStudentButton(driver).click();
		AddStudentInstructor.EnterEmailAddress(driver).sendKeys("Arnav@gmail.com");
		AddStudentInstructor.EnterEmailAddress2(driver).sendKeys("Aakash@gmail.com");
		AddStudentInstructor.Submit(driver).click();
		
		AddStudentInstructor.BackToDashboardButton(driver).click();
								
		AddStudentInstructor.AddInstructorButton(driver).click();
		AddStudentInstructor.AddMoreInstructorButton(driver).click();
		AddStudentInstructor.AddMoreInstructorButton(driver).click();
		AddStudentInstructor.RemoveInstructorButton(driver).click();
		AddStudentInstructor.EnterEmailAddress(driver).sendKeys("Singh@gmail.com");
		AddStudentInstructor.EnterEmailAddress2(driver).sendKeys("Raizada@gmail.com");
		AddStudentInstructor.Submit(driver).click();	
		AddStudentInstructor.BackToDashboardButton(driver).click();				
		
		
		driver.close();
	}

	
}

