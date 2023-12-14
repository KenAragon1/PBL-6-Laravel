from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime

driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/dashboard/produk")

login = driver.find_element(By.ID, 'tambahProduk')

login.click()
time.sleep(3)



current_url = driver.current_url

if '/' in current_url:
  status = "Login Successful"
elif '/login' in current_url:
  status = "Login Failed!"
else:
  status = "Failed! Unknown Error!"

# waktu_skrg = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

# with open('hasil/testing_login.txt', 'a') as file:
#   if '<h1>Internal Server Error</h1>' in driver.page_source:
#     file.write(f"Fitur Login - diuji pada : {waktu_skrg} - Status : Error - Internal Server Error\n")
#   else:
#     file.write(f"Fitur Login - diuji pada : {waktu_skrg} - Status : {status}\n")

driver.quit()




