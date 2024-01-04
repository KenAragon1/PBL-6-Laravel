from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime

driver = webdriver.Chrome()
driver.maximize_window()

def hapusProduk() :
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



        hapus = driver.find_element(By.XPATH, "//button[text()='Hapus']")
        driver.execute_script("arguments[0].click();", hapus)
        time.sleep(5)

        if "dashboard/produk" in driver.current_url:
            status = "Sukses Menghapus Produk.."
        else:
            status = "Gagal Menghapus Produk.."

    except Exception as e:
        status = "Gagal"
        print(f"Terjadi Kesalahan : {e}")

    finally:
        with open("selenium/hasil/hasil-hapus-produk.txt", "a") as file:
            waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
        driver.quit()
if __name__ == "__main__":
    hapusProduk()