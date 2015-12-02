from selenium import webdriver
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.support.ui import WebDriverWait
import time

driver = webdriver.Firefox()
driver.set_window_size(360, 900);
driver.get("http://www.ubup.com")

driver2 = webdriver.Firefox()
driver2.set_window_size(360, 900);
dirver2.get("http://www.ubup.com/index.html?geschlecht=Damen")