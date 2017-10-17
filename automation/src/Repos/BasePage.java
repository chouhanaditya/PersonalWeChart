package Repos;

import org.openqa.selenium.WebDriver;

public class BasePage {
	private static String BaseUrl = "http://localhost/wechart/public/";
	
	protected static void GoToPageUrl(WebDriver driver, String PagePath) {
		driver.get(BaseUrl + PagePath);
	}
}
