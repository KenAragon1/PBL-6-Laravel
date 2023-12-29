from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime
from selenium.webdriver.support import expected_conditions as ExpectedCondition
from selenium.webdriver.support.wait import WebDriverWait

driver = webdriver.Chrome()
driver.maximize_window()
wait = WebDriverWait(driver,10) 
try:
    driver.get("http://127.0.0.1:8000/login")

    # karna menggunakan auth maka wajib login terlebih dahulu
    # login element
    input_username = driver.find_element(By.ID, "username")
    input_password = driver.find_element(By.ID, "password")

    # otomasi login
    input_username.send_keys('afdholdzikri')
    time.sleep(2)
    input_password.send_keys('afdhol')
    time.sleep(2)
    login_btn = driver.find_element(By.ID, "login")
    time.sleep(2)
    login_btn.click()
    time.sleep(5)

    tombol_keranjang = driver.find_element(By.ID, "tombol-keranjang")
    tombol_keranjang.click()
    time.sleep(3)

    checkbox_produk = driver.find_element(By.NAME, "id_produk[]")
    checkbox_produk.click()
    time.sleep(2)

    tombol_checkout = driver.find_element(By.ID, "js-checkout-btn")
    tombol_checkout.click()
    time.sleep(2)

    edit_alamat = driver.find_element(By.ID, "ubah-alamat")
    edit_alamat.click()
    time.sleep(3)
    
    input_kota = driver.find_element(By.ID, "kota")
    input_kecamatan = driver.find_element(By.ID, "kecamatan")
    input_kodepos = driver.find_element(By.ID, "kodepos")
    input_detail1 = driver.find_element(By.ID, "detail1")
    input_detail2 = driver.find_element(By.ID, "detail2")
    simpan_alamat = driver.find_element(By.ID, "simpan-alamat")

    input_kota.send_keys('Banda Aceh')
    time.sleep(1)
    
    input_kecamatan.send_keys('Pango Deah')
    time.sleep(1)

    input_kodepos.send_keys('29439')
    time.sleep(1)

    input_detail1.send_keys('Gang Raflesia')
    time.sleep(1)

    input_detail2.send_keys("Blok AA1 No 8")
    time.sleep(1)

    simpan_alamat.click()
    time.sleep(2)

    pembayaran_cod = driver.find_element(By.XPATH, "//input[@value='COD']")
    driver.execute_script("arguments[0].click();", pembayaran_cod)
    time.sleep(3)

    buat_pesanan = driver.find_element(By.XPATH, "//button[@id='buat-pesanan']")
    driver.execute_script("arguments[0].click();", buat_pesanan)
    time.sleep(5)

    detail_cod = driver.find_element(By.ID, "bukti-cod")
    detail_cod.click()
    time.sleep(7)

    if "pesanan" in driver.current_url:
        status = "Sukses Menambahkan checkout.."
    else:
        status = "Gagal menambahkan checkout.."

    
except Exception as e:
    status = "Gagal"
    print(f"Terjadi Kesalahan : {e}")
finally:
    with open("selenium/hasil/hasil-checkout-cod.txt", "a") as file:
        waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
        driver.quit()