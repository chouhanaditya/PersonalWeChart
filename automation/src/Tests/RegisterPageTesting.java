package Tests;

import static org.testng.Assert.assertEquals;
import static org.testng.Assert.assertTrue;
import static org.testng.Assert.fail;

import java.io.FileInputStream;
import java.sql.Driver;
import java.util.ArrayList;
import java.util.List;

import org.testng.asserts.*;

import org.apache.poi.ss.usermodel.CellType;
import org.apache.poi.ss.usermodel.DataFormatter;
import org.apache.poi.xssf.usermodel.XSSFCell;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.junit.BeforeClass;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;
import org.testng.annotations.*;
import Repos.RegisterPage;
import junit.framework.Assert;

public class RegisterPageTesting extends BaseTest {

	//private static final WebDriver driver = new FirefoxDriver();
	static XSSFWorkbook workBook; 
	static XSSFSheet sheet;
	static XSSFRow row;
	static int i=0;
	static int j=0;
	static Object[][] DataCellValues;
	WebDriver driver = new FirefoxDriver();

	public RegisterPageTesting() {
		super();		
	}

	@DataProvider(name="registration")
	//@Test
	public static Object[][] dataInputFromExcel() throws Exception
	{
		FileInputStream fs = new FileInputStream("C:\\Users\\Harsha Verma\\Desktop\\logindata.xlsx");
		workBook = new XSSFWorkbook(fs);
		sheet = workBook.getSheet("Login");

		int k=sheet.getLastRowNum();//get the number of rows

		int l=sheet.getRow(0).getLastCellNum();//get the number of columns in first row

		//define a string type two dimensional array
		DataCellValues = new Object[k+1][l];
		for(i=0;i<=k;i++)
		{
			row= sheet.getRow(i);
			for(j=0;j<l-1;j++)
			{
				XSSFCell cell= row.getCell(j);	
				if(row.getCell(j)==null)
				{
					DataCellValues[i][j]="";
				}
				else
				{
					DataCellValues[i][j]= new DataFormatter().formatCellValue(row.getCell(j));
				}


			}
		}
		return DataCellValues;

	}
	//	@BeforeTest
	//	public void setURL()
	//	{
	//		RegisterPage.GoToPage(driver);
	//		
	//	}

	@Test(dataProvider="registration")
	public void AssignValues(String Email,String Password,String CPassword,String FName, String LName,
			String PhoneNo,String q1Value,String a1value,String q2Value,String a2value,String q3Value,String a3value,String Value)
	{

		RegisterPage.GoToPage(driver);

		RegisterPage.Email(driver).sendKeys(Email);
		RegisterPage.Password(driver).sendKeys(Password);
		RegisterPage.PasswordConfirm(driver).sendKeys(CPassword);
		RegisterPage.FirstName(driver).sendKeys(FName);
		RegisterPage.LastName(driver).sendKeys(LName);
		RegisterPage.ContactNo(driver).sendKeys(PhoneNo);
		RegisterPage.StudentRole(driver).click();	
		Select se = new Select(RegisterPage.SecurityQ1(driver));
		se.selectByValue(q1Value);
		RegisterPage.SecurityA1(driver).sendKeys(a1value);
		Select se1 = new Select(RegisterPage.SecurityQ2(driver));
		se1.selectByValue(q2Value);
		RegisterPage.SecurityA2(driver).sendKeys(a2value);
		Select se2 = new Select(RegisterPage.SecurityQ3(driver));
		se2.selectByValue(q3Value);
		RegisterPage.SecurityA3(driver).sendKeys(a3value);
		RegisterPage.Submit(driver).click();	
		checkAlert();
		List<String> WebEl = new ArrayList<String>();

		List<WebElement> Elements = driver.findElements(By.className("help-block"));

		for (WebElement we : Elements) {
			we.isDisplayed();
			{
				WebEl.add(we.getText());


			}
			for(int len=0;len<WebEl.size();len++)
			{
				System.out.println(WebEl.get(len));
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");

			}

			WebEl.clear();


		}

		if(Email.isEmpty()||Password.isEmpty()||CPassword.isEmpty()||FName.isEmpty()||LName.isEmpty()||a1value.isEmpty()|| a2value.isEmpty()|| a3value.isEmpty())
		{
			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");

		}
		else
		{

			if( Password.length()<6 ||CPassword.length()<6 )
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");

			}		
			if((Password != CPassword) )
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");

			}

			if(q1Value.equals(q2Value))
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
				//assertTrue(RegisterPage.securityQuestion1Alert(driver).isDisplayed());


			}
			if(q2Value.equals(q3Value))
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
				//	assertTrue(RegisterPage.securityQuestion2Alert(driver).isDisplayed());


			}
			if(q3Value.equals(q1Value))
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
				//			assertTrue(RegisterPage.securityQuestion1Alert(driver).isDisplayed());
				//			assertTrue(RegisterPage.securityQuestion3Alert(driver).isDisplayed());
				//			

			}
		}
	}
	public void checkAlert()
	{		

		if(driver.findElement(By.id("emailidalert")).isDisplayed())
		{
			System.out.println(driver.findElement(By.id("emailidalert")).getText());
		}
		
		
		
//		//email alert
//		if(RegisterPage.EmailIdALert(driver).isDisplayed())
//		{
//			System.out.println(driver.findElement(By.id("emailidalert")));
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//password alert
//		if(RegisterPage.passwordAlert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.passwordAlert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//firstname
//		if(RegisterPage.firstNameAlert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.firstNameAlert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//lastname
//		if(RegisterPage.lastNameAlert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.lastNameAlert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//contactno
//		if(RegisterPage.contactNoAlert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.contactNoAlert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//department
//		if(RegisterPage.departmentNameAlert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.departmentNameAlert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security question 1
//		if(RegisterPage.securityQuestion1Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityQuestion1Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security answer 1
//		if(RegisterPage.securityAnswer1Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityAnswer1Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security question 2
//		if(RegisterPage.securityQuestion2Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityQuestion2Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security answer 2
//		if(RegisterPage.securityAnswer2Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityAnswer2Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security question 3
//		if(RegisterPage.securityQuestion3Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityQuestion3Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
//		//security answer 3
//		if(RegisterPage.securityAnswer3Alert(driver).isDisplayed())
//		{
//			System.out.println(RegisterPage.securityAnswer3Alert(driver).getText());
//			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/register");
//		}
	}








	@AfterClass
	public void closeBrowser()
	{
		driver.close();
	}


}