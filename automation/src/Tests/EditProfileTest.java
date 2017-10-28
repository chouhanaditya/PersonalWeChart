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
import Repos.EditProfilePage;
import org.testng.annotations.*;
import Repos.*;


public class EditProfileTest extends BaseTest {

	WebDriver driver = new FirefoxDriver();
	
	static XSSFWorkbook workBook; 
	static XSSFSheet sheet;
	static XSSFRow row;
	static int i=0;
	static int j=0;
	static Object[][] DataCellValues;


	public EditProfileTest() {
		super();	


	}
	@DataProvider(name="editProfile")
	//@Test
	public static Object[][] dataInputFromExcel() throws Exception
	{
		FileInputStream fs = new FileInputStream("C:\\Users\\sgoen\\Desktop\\logindata.xlsx");
		workBook = new XSSFWorkbook(fs);
		sheet = workBook.getSheet("Edit");

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

//	@org.testng.annotations.BeforeTest
//	public void beforeTest()
//	{
//		LoginPage.GoToPage(driver);
//		LoginPage.LoginAsAdmin(driver);
//	}

	//LoginPage login = new LoginPage();


//	@Test
//	public void testData()
//	{
//		//EditProfilePage editprofile = new EditProfilePage();
//		EditProfilePage.GoToPage(driver);
//		String detailsBeforeEdit [] = EditProfilePage.getDetails(driver);
//		for (int i=0; i<detailsBeforeEdit.length;i++)
//		{
//			System.out.println(detailsBeforeEdit[i]);
//		}
//
//	}




	@Test(dataProvider="editProfile")
	public void AssignValues(String Email,String password,String RFName, String RLName,String RDepartment,String RPhoneNo,String Eemail,String Edepartment,
			String EFName,String ELname,String EcontactNo,String value)
	{

		LoginPage.GoToPage(driver);
		LoginPage.UserName(driver).sendKeys(Email);
		LoginPage.Password(driver).sendKeys(password);
		LoginPage.Submit(driver).click();		
		EditProfilePage.GoToPage(driver);
		String detailsBeforeEdit [] = EditProfilePage.getDetails(driver);
		for (int i=0; i<detailsBeforeEdit.length;i++)
		{
			System.out.println(detailsBeforeEdit[i]);
		}

		assertEquals(detailsBeforeEdit[0], Email);
		assertEquals(detailsBeforeEdit[1], RFName);
		assertEquals(detailsBeforeEdit[2], RLName);
		assertEquals(detailsBeforeEdit[3], RPhoneNo);
		assertEquals(detailsBeforeEdit[4], RDepartment);


		EditProfilePage.editEmail(driver).sendKeys(Eemail);
		assertEquals(EditProfilePage.editEmail(driver).getAttribute("value"), Email);

		EditProfilePage.editFirstName(driver).clear();
		EditProfilePage.editFirstName(driver).sendKeys(EFName);
		EditProfilePage.editLastName(driver).clear();
		EditProfilePage.editLastName(driver).sendKeys(ELname);
		EditProfilePage.editContactNo(driver).clear();
		EditProfilePage.editContactNo(driver).sendKeys(EcontactNo);
		EditProfilePage.editDepartment(driver).clear();
		EditProfilePage.editDepartment(driver).sendKeys(Edepartment);
		EditProfilePage.Submit(driver).click();	

		EditProfilePage.BackToDash(driver).click();
		
		
		EditProfilePage.GoToPage(driver);
		
		String detailsAfterEdit [] = EditProfilePage.getDetails(driver);
		assertEquals(detailsAfterEdit[0], Email);
		assertEquals(detailsAfterEdit[1], EFName);
		assertEquals(detailsAfterEdit[2], ELname);
		assertEquals(detailsAfterEdit[3], EcontactNo);
		assertEquals(detailsAfterEdit[4], Edepartment);

		
		
		


		

	} 


}
