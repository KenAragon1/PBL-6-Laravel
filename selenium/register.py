from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime
from selenium.webdriver.support.ui import Select

driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/")

login = driver.find_element(By.ID, 'tombolLogin')

login.click()
time.sleep(3)

register = driver.find_element(By.XPATH, '//a[@href="/register"]')
register.click()
time.sleep(3)

# jenisUser = driver.find_element(By.ID, 'jenis_pengguna' )
jenisUser = Select(driver.find_element(By.ID, 'jenis_pengguna'))
nama = driver.find_element(By.NAME, 'nama' )
email = driver.find_element(By.NAME, 'email' )
username = driver.find_element(By.NAME, 'username' )
nohp = driver.find_element(By.NAME, 'nohp' )
password = driver.find_element(By.NAME, 'password' )

jenisUser.select_by_value('Penjual')
time.sleep(2)
nama.send_keys("Kamisato Ayaka")
time.sleep(2)
email.send_keys("ayaka11@gmail.com")
time.sleep(2)
username.send_keys("ayaka")
time.sleep(2)
nohp.send_keys("8123456789")
time.sleep(2)
password.send_keys("ayaka123")
time.sleep(2)

btnRegister = driver.find_element(By.ID, "tombolRegister")
btnRegister.click()
time.sleep(2)


current_url = driver.current_url

if '/login' in current_url:
  status = "Registration Successful"
elif '/register' in current_url:
  status = "Registration Failed!"
else:
  status = "Failed! Unknown Error!"

waktu_skrg = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

with open('selenium/hasil/testing_register.txt', 'a') as file:
  if '<h1>Internal Server Error</h1>' in driver.page_source:
    file.write(f"Fitur Registerasi - diuji pada : {waktu_skrg} - Status : Error - Internal Server Error\n")
  else:
    file.write(f"Fitur Registrasi - diuji pada : {waktu_skrg} - Status : {status}\n")

driver.quit()




