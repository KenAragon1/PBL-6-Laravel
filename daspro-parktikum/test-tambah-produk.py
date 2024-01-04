from selenium import webdriver
from selenium.webdriver.common.by import By
import time
import datetime
import random
import string

driver = webdriver.Chrome()
driver.maximize_window()


def tambahProduk():
    list_produk = {
        "nama produk": ["LAPTOP ASUS", "Redragon Mechanical Gaming Keyboard", "Logitech G203 Mouse Gaming", "Processor Intel Core I7 10700F" , "Headset Headphone Kabel JETE HB2 "],
        "kategori": [9, 1, 2, 10, 5],
        "harga produk": [7000000, 336000, 259000, 3415000, 78500],
        "deskripsi": ["Prosesor : Intel core i5 1135G7 ( 4 Core,8 Trade) Up to 4.20Ghz", "Removeable keycap and mechanical switch", "Optimalkan waktu bermainmu dengan G203 gaming mouse yang dilengkapi dengan teknologi LIGHTSYNC, sensor kelas gaming, dan desain klasik 6 tombol. Ceriakan game-mu dan mejamu.", "Processor Intel Core I7 10700F Box Comet Lake Socket LGA 1200", "Headset Super Bass JETE-HB2 menghasilkan suara yang memberikan  pengalaman mendengarkan audio yang lebih istimewa."],
        "stok": [10, 3, 5, 10, 13],
        "foto": ["laptop.jpeg", "keyboard.jpeg", "mouse.jpeg", "cpu.jpeg", "headphone.jpeg"]
    }

    i = random.randint(0, len(list_produk["nama produk"]) - 1)

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

        dropdown_btn = driver.find_element(By.ID, "pengguna")

        dropdown_btn.click()
        time.sleep(5)

        dashboard_btn = driver.find_element(By.ID, "dashboard-btn")
        dashboard_btn.click()
        time.sleep(5)

        produk_btn = driver.find_element(By.ID, "penjual-produk")
        produk_btn.click()
        time.sleep(5)
        # tambah produk element
        tambah_produk_btn = driver.find_element(By.ID, "tambahProduk")
        input_nama_produk = driver.find_element(By.ID, "nama")
        input_kategori_produk = driver.find_element(By.ID, "kategori")
        input_harga_produk = driver.find_element(By.ID, "harga")
        input_deskripsi_produk = driver.find_element(By.ID, "deskripsi")
        input_stok_produk = driver.find_element(By.ID, "stok")
        input_foto_produk = driver.find_element(By.ID, "foto")

        # otomasi tambah produk
        tambah_produk_btn.click()
        time.sleep(5)

        input_nama_produk.send_keys(list_produk["nama produk"][i])
        time.sleep(3)

        input_kategori_produk.click()
        time.sleep(3)
        kategori = driver.find_element(
            By.XPATH, f'//option[@value="{list_produk["kategori"][i]}"]')
        kategori.click()
        time.sleep(3)

        input_harga_produk.send_keys(list_produk["harga produk"][i])
        time.sleep(3)

        input_deskripsi_produk.send_keys(list_produk["deskripsi"][i])
        time.sleep(3)

        input_stok_produk.send_keys(list_produk["stok"][i])
        time.sleep(3)

        input_foto_produk.send_keys(
            f'C:\\Users\\THINKPAD\\pbl\\public\\images\\foto-produk\\{list_produk["foto"][i]}')
        tambah = driver.find_element(
            By.XPATH, "//button[text()='Tambahkan Produk']")
        tambah.click()
        time.sleep(5)

        if "dashboard/produk" in driver.current_url:
            status = "Sukses Menambahkan Produk Baru.."
        else:
            status = "Gagal menambahkan Produk.."

    except Exception as e:
        status = "Gagal"
        print(f"Terjadi Kesalahan : {e}")
    finally:
        with open("selenium/hasil/hasil-tambah-produk.txt", "a") as file:
            waktu_uji = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            file.write(f"{waktu_uji} - Fitur CRUD - Status : {status} \n ")
            driver.quit()


if __name__ == "__main__":
    tambahProduk()
