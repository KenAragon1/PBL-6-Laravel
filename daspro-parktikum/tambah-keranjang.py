from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime
import random

driver = webdriver.Chrome()
driver.maximize_window()


def tambahKeranjang() :
    try:
        driver.get("http://127.0.0.1:8000/login")
        # karna make auth maka wajib login terlebih dahulu
        # login element
        input_username = driver.find_element(By.ID, "username")
        input_password = driver.find_element(By.ID, "password")
        # otomasi login
        input_username.send_keys('KenAragon')
        time.sleep(3)
        input_password.send_keys('qwerty')
        time.sleep(3)
        login_btn = driver.find_element(By.ID, "login")
        time.sleep(3)
        login_btn.click()
        time.sleep(5)
        link_produk = driver.find_elements(By.XPATH, "//a[@id='link-produk']")
        random_link_produk = random.choice(link_produk)
        driver.execute_script("arguments[0].click();", random_link_produk)
        time.sleep(5)
        tambah_keranjang_btn = driver.find_element(By.ID, "tambah-keranjang")
        tambah_keranjang_btn.click()
        time.sleep(5)
        if "keranjang" in driver.current_url:
            status = "Sukses Menambahkan Produk Baru.."
        else:
            status = "Gagal menambahkan Produk.."

    except Exception as e:
        status = "Gagal"
        print(f"Terjadi Kesalahan : {e}")

    finally:
        with open("selenium/hasil/hasil-tambah-keranjang.txt", "a") as file:
            waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
        driver.quit()

if __name__ == "__main__":
    tambahKeranjang()