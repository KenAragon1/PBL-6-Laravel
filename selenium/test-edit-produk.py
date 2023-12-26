from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime

driver = webdriver.Chrome()
driver.maximize_window()

try:
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

    dropdown_btn = driver.find_element(By.ID, "pengguna")

    dropdown_btn.click()
    time.sleep(5)

    dashboard_btn = driver.find_element(By.ID, "dashboard-btn")
    dashboard_btn.click()
    time.sleep(5)

    produk_btn = driver.find_element(By.ID, "penjual-produk")
    produk_btn.click()
    time.sleep(5)

    edit_btn = driver.find_element(By.ID, "editBtn")
    time.sleep(5)
    edit_btn.click()
    time.sleep(5)

    input_nama_produk = driver.find_element(By.ID, "nama")
    input_harga_produk = driver.find_element(By.ID, "harga")
    input_deskripsi_produk = driver.find_element(By.ID, "deskripsi")
    input_stok_produk = driver.find_element(By.ID, "stok")

    input_nama_produk.clear()
    time.sleep(3)
    input_nama_produk.send_keys('Mouse Wireless')
    time.sleep(3)

    input_harga_produk.clear()
    time.sleep(3)
    input_harga_produk.send_keys('95000')
    time.sleep(3)

    input_deskripsi_produk.clear()
    time.sleep(3)
    input_deskripsi_produk.send_keys('Mouse Tanpa Kabel')
    time.sleep(3)

    input_stok_produk.clear()
    time.sleep(3)
    input_stok_produk.send_keys("109")
    time.sleep(3)

    edit = driver.find_element(By.XPATH, "//button[text()='Edit']")
    driver.execute_script("arguments[0].click();", edit)
    time.sleep(5)

    if "dashboard/produk" in driver.current_url:
        status = "Sukses Menambahkan Mengedit.."
    else:
        status = "Gagal Mengedit Produk.."

except Exception as e:
    status = "Gagal"
    print(f"Terjadi Kesalahan : {e}")

finally:
    with open("selenium/hasil/hasil-edit-produk.txt", "a") as file:
        waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
        driver.quit()
