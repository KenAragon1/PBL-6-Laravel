from selenium import webdriver
from selenium.webdriver.common.by import By
import time
from datetime import datetime
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import Select


driver = webdriver.Chrome()
driver.get("http://127.0.0.1:8000/")

login = driver.find_element(By.ID, 'tombolLogin')

login.click()

username = driver.find_element(By.NAME, 'username')
password = driver.find_element(By.NAME, 'password')
login_btn = driver.find_element(By.XPATH, '//button[@type="submit"]')

username.send_keys("ayaka")
time.sleep(1)
password.send_keys("ayaka123")
time.sleep(1)
login_btn.click()
time.sleep(1)

# kehalaman profil
user = driver.find_element(By.ID, 'pengguna')
user.click()
time.sleep(1)
profilBtn = driver.find_element(By.ID, 'profilBtn')
profilBtn.click()
time.sleep(1)

# edit profile

editProfil = driver.find_element(By.ID, 'editProfil')

driver.execute_script("arguments[0].click();", editProfil)
time.sleep(5) 
wait = WebDriverWait(driver, 20).until(EC.visibility_of_element_located((By.ID, 'modal-edit')))

ttl = driver.find_element(By.NAME, 'ttl')
jk = Select(driver.find_element(By.NAME, 'jenis_kelamin'))
alamat = driver.find_element(By.NAME, 'alamat')

jk.select_by_value('Perempuan')
ttl.send_keys("10/09/2004")
alamat.send_keys("Inazuma")
time.sleep(3)

ubahBtn = driver.find_element(By.ID, 'ubahBtn')
ubahBtn.click()
time.sleep(5)


current_url = driver.current_url

# ambil id di db
if '/profil_user/864769054' in current_url:
  status = "Mengupdate Profil Berhasil"
elif '/login' in current_url:
  status = "Mengupdate Profil Gagal!"
else:
  status = "Failed! Unknown Error!"

waktu_skrg = datetime.now().strftime("%Y-%m-%d %H:%M:%S")

with open('selenium/hasil/testing_edit_profile.txt', 'a') as file:
  if '<h1>Internal Server Error</h1>' in driver.page_source:
    file.write(f"Fitur Edit Profil - diuji pada : {waktu_skrg} - Status : Error - Internal Server Error\n")
  else:
    file.write(f"Fitur Edit Profil  - diuji pada : {waktu_skrg} - Status : {status}\n")

driver.quit()




