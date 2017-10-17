package Tests;
import Repos.*;
import org.testng.annotations.Test;
import org.testng.annotations.DataProvider;
import org.testng.annotations.BeforeTest;
import java.util.*;

import static org.testng.Assert.assertEquals;

import java.io.FileInputStream;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDateTime;

import org.apache.commons.io.filefilter.RegexFileFilter;
import org.apache.commons.lang3.StringUtils;
import org.apache.commons.lang3.time.DateUtils;
import org.apache.poi.ss.usermodel.DataFormatter;
import org.apache.poi.xssf.usermodel.XSSFCell;
import org.apache.poi.xssf.usermodel.XSSFRow;
import org.apache.poi.xssf.usermodel.XSSFSheet;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;
import org.testng.annotations.AfterTest;

public class AddPatient extends BaseTest {
	
	static XSSFWorkbook workBook; 
	static XSSFSheet sheet;
	static XSSFRow row;
	static int i=0;
	static int j=0;
	static Object[][] DataCellValues;
	WebDriver driver = new FirefoxDriver();
	String regexN = "^\\D";
	SimpleDateFormat sd = new SimpleDateFormat("YYYY-MM-DD");
	

	public AddPatient() {
		super();		
	}
	@BeforeTest
	public void beforetest()
	{
		LoginPage.GoToPage(driver);
		LoginPage.LoginAsStudent(driver);
		driver.findElement(By.id("addPatient")).click();
		
		
	}
	
	@DataProvider(name="ap")
	public static Object[][] dataInputFromExcel() throws Exception
	{
		FileInputStream fs = new FileInputStream("C:\\Users\\Harsha Verma\\Desktop\\logindata.xlsx");
		workBook = new XSSFWorkbook(fs);
		sheet = workBook.getSheet("AddPatient");

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
	
	@Test(dataProvider="ap")
	public void assignValues(String module,String age,String height,String hunit,String weight,String wUnit,
			String date,String value) throws Throwable
	{
		
		
		AddNewPatient.FemaleRadioButton(driver).click();
		Select se = new Select(AddNewPatient.moduleIdText(driver));
				se.selectByValue(module);
				
		AddNewPatient.AgeText(driver).sendKeys(age);
		AddNewPatient.HeightText(driver).sendKeys(height);
		
		Select se1 = new Select(AddNewPatient.heightUnitText(driver));		
		se1.selectByValue(hunit);
		
		AddNewPatient.WeightText(driver).sendKeys(weight);
		
		Select se2 = new Select(AddNewPatient.weightUnitText(driver));		
		se2.selectByValue(wUnit);
		
		AddNewPatient.visitDateText(driver).sendKeys(date);
		AddNewPatient.SubmitButton(driver).click();
		
		
		
		
		if(age.isEmpty()||height.isEmpty()||weight.isEmpty()||date.isEmpty())
		{
			assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/add_patient");
		}
		else
		{
			if(!StringUtils.isNumeric(age));
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/add_patient");
			}
			if(!StringUtils.isNumeric(weight));
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/add_patient");
			}
			if(!StringUtils.isNumeric(height));
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/add_patient");
			}
			;
			if(!value.equals(sd.parse(date)))
			{
				assertEquals(driver.getCurrentUrl(), "http://localhost/wechart/public/add_patient");
			}
			if(DateUtils.isSameDay(DateUtils.parseDate(sd.parse(date), )
		}
		
				
	}
	
	
	
	
	
	
	
 

 
}
