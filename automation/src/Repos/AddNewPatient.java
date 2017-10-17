package Repos;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class AddNewPatient extends BasePage{
	
	private static String Url = "add_patient";
	
	public static void GoToPage(WebDriver driver) {
		BasePage.GoToPageUrl(driver, Url);
	}
	
	public static WebElement AgeText(WebDriver driver) {
		return driver.findElement(By.id("age"));
	}
	public static WebElement HeightText(WebDriver driver) {
		return driver.findElement(By.id("height"));
	}
	
	public static WebElement WeightText(WebDriver driver) {
		return driver.findElement(By.id("weight"));
	}
	public static WebElement visitDateText(WebDriver driver) {
		return driver.findElement(By.id("visit_date"));
	}
	public static WebElement moduleIdText(WebDriver driver) {
		return driver.findElement(By.name("module_id"));
	}
	public static WebElement heightUnitText(WebDriver driver) {
		return driver.findElement(By.name("height_unit"));
	}
	public static WebElement weightUnitText(WebDriver driver) {
		return driver.findElement(By.name("weight_unit"));
	}
	public static WebElement SubmitButton(WebDriver driver) {
		return driver.findElement(By.xpath("//button[@type='submit']"));
	}
	public static WebElement MaleRadioButton(WebDriver driver) {
		return driver.findElement(By.id("genderMale"));
	}
	public static WebElement FemaleRadioButton(WebDriver driver) {
		return driver.findElement(By.id("genderFemale"));
	}
	
	
	
	
	
	
	
	
}
