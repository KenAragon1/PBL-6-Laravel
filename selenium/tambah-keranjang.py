from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime

driver = webdriver.Chrome()
driver.maximize_window()


driver.get("http://127.0.0.1:8000/login")
# karna make auth maka wajib login terlebih dahulu
# login element
input_username = driver.find_element(By.ID, "username")
input_password = driver.find_element(By.ID, "password")
# otomasi login
input_username.send_keys('afdholdzikri')
time.sleep(3)
input_password.send_keys('afdhol')
time.sleep(3)
login_btn = driver.find_element(By.ID, "login")
time.sleep(3)
login_btn.click()
time.sleep(5)
link_produk = driver.find_element(By.XPATH, "//a[@id='link-produk']")
driver.execute_script("arguments[0].click();", link_produk)
time.sleep(5)
tambah_keranjang_btn = driver.find_element(By.ID, "tambah-keranjang")
tambah_keranjang_btn.click()
time.sleep(5)
if "keranjang" in driver.current_url:
    status = "Sukses Menambahkan Produk Baru.."
else:
    status = "Gagal menambahkan Produk.."

with open("selenium/hasil/hasil-tambah-keranjang.txt", "a") as file:
    waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
    driver.quit()