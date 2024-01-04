from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime

driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/")

def login() :

  try:
    login = driver.find_element(By.ID, 'tombolLogin')

    login.click()
    time.sleep(3)


    username = driver.find_element(By.NAME, 'username')
    password = driver.find_element(By.NAME, 'password')
    login_btn = driver.find_element(By.XPATH, '//button[@type="submit"]')

    username.send_keys("ayaka")
    time.sleep(2)
    password.send_keys("ayaka123")
    time.sleep(2)
    login_btn.click()
    time.sleep(3)

    current_url = driver.current_url

    if '/' in current_url:
      status = "Login Successful"
    elif '/login' in current_url:
      status = "Login Failed!"
    else:
      status = "Failed! Unknown Error!"
    

  except Exception as e:
    status = "Gagal"
    print(f"Terjadi Kesalahan : {e}")

  finally:
    with open('selenium/hasil/testing_login.txt', 'a') as file:
      waktu_skrg = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
      if '<h1>Internal Server Error</h1>' in driver.page_source:
        file.write(f"Fitur Login - diuji pada : {waktu_skrg} - Status : Error - Internal Server Error\n")
      else:
        file.write(f"Fitur Login - diuji pada : {waktu_skrg} - Status : {status}\n")

driver.quit()




