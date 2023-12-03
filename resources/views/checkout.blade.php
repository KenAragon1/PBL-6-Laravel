@extends('templates.nav-footer')

@section('content')


    {{-- toggle modal alamat --}}
    <div class="container mb-4 shadow card p-4">
        <div class="row align-items-center">
            <div class=" col-10 text-start">
                <h3>Alamat Pengiriman</h3>
                <p>isi alamat pengiriman terlebih dahulu</p>
                <a href="" data-bs-toggle="modal" data-bs-target="#modal-alamat" class="stretched-link"></a>
            </div>
            <div class="col-2">
                <button class="btn btn-success">Ubah Alamat</button>
            </div>
        </div>
    </div>

    {{-- produk di checkout --}}
    <div class="container mb-4 shadow card p-4">
        <div class="row">
            <h2 class="mb-4">Produk Dipesan</h2>
            <div class="row text-center mb-3 border-bottom">
                <div class="col-md-4">
                    <p>Produk</p>
                </div>
                <div class="col-md-2">
                    <p>Jumlah</p>
                </div>
                <div class="col-md-3">
                    <p>Harga per unit</p>
                </div>
                <div class="col-md-3">
                    <p>Harga Total</p>
                </div>
            </div>
            <!-- isi produk di pesan start -->
            <div class="row text-center fs-6 d-flex align-items-center">
                <div class="col-md-1 col-sm-1">
                    <img src="/images/products/produk1.jpg" class="img-fluid rounded-3" alt="Cotton T-shirt" />
                </div>
                <div class="col-md-3 col-sm-3">
                    <p class="fw-normal mb-1">Laptop Gaming</p>
                    <p><span class="text-muted">Warna: </span>Hitam</p>
                </div>
                <div class="col-md-2 col-sm-2">
                    <p>1</p>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h6>Rp 13.500.000,-</h6>
                </div>
                <div class="col-md-3 col-sm-3">
                    <h6 class="">Rp 13.500.000,-</h6>
                </div>
            </div>
            <!-- isi produk di pesan end -->
        </div>
    </div>

    {{-- pembayaran --}}
    <div class="container mb-5 shadow card p-4">
        <div class="row">
            <h2>Pembayaran</h2>
            <div class="mb-3">
                <div class="col-md-12">
                    <input type="radio" class="btn-check" name="metode-pemabayaran" id="cod" autocomplete="off"
                        onclick="pembayaran('cod')" />
                    <label class="btn btn-outline-success mr-1" for="cod">COD</label>
                    <input type="radio" class="btn-check" name="metode-pemabayaran" id="kartu-kredit" autocomplete="off"
                        onfocus="pembayaran('kartu-kredit')" />
                    <label class="btn btn-outline-success mx-1" for="kartu-kredit">Kartu Kredit</label>

                </div>
            </div>
            <div class="row mb-3" id="js-pembayaran" style="max-width: 40rem"></div>
            <a href="" class="btn btn-success p-3">Buat Pesanan</a>
        </div>
    </div>

    {{-- modal isi alamat --}}
    <div class="modal fade" id="modal-alamat">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">Isi Alamat</div>
                <div class="modal-body">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="">No Telepon</label>
                            <input type="Number" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Provinsi </label>
                            <select name="" id="" class="form-control">
                                <option value="11">ACEH</option>
                                <option value="12">SUMATERA UTARA</option>
                                <option value="13">SUMATERA BARAT</option>
                                <option value="14">R I A U</option>
                                <option value="15">J A M B I</option>
                                <option value="16">SUMATERA SELATAN</option>
                                <option value="17">BENGKULU</option>
                                <option value="18">LAMPUNG</option>
                                <option value="19">KEPULAUAN BANGKA BELITUNG</option>
                                <option value="21">KEPULAUAN RIAU</option>
                                <option value="31">DKI JAKARTA</option>
                                <option value="32">JAWA BARAT</option>
                                <option value="33">JAWA TENGAH</option>
                                <option value="34">DI YOGYAKARTA</option>
                                <option value="35">JAWA TIMUR</option>
                                <option value="36">B A N T E N</option>
                                <option value="51">BALI</option>
                                <option value="52">NUSA TENGGARA BARAT</option>
                                <option value="53">NUSA TENGGARA TIMUR</option>
                                <option value="61">KALIMANTAN BARAT</option>
                                <option value="62">KALIMANTAN TENGAH</option>
                                <option value="63">KALIMANTAN SELATAN</option>
                                <option value="64">KALIMANTAN TIMUR</option>
                                <option value="71">SULAWESI UTARA</option>
                                <option value="73">SULAWESI SELATAN</option>
                                <option value="74">SULAWESI TENGGARA</option>
                                <option value="75">GORONTALO</option>
                                <option value="76">SULAWESI BARAT</option>
                                <option value="81">MALUKU</option>
                                <option value="82">MALUKU UTARA</option>
                                <option value="94">PAPUA</option>
                                <option value="91">PAPUA BARAT</option>
                                <option value="72">SULAWESI TENGAH</option>
                                <option value="65">KALIMANTAN UTARA</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">kota</label>
                            <input type="text" name="" id="" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Kecamatan</label>
                            <input type="text" name="" id="" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label for="">Kode Pos</label>
                            <input type="number" name="" id="" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nama Jalan, Gedung, No.Rumah</label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Detail lainnya</label>
                            <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </body>

    <script>
        let metodeBayar = document.querySelector("#js-pembayaran");

        function pembayaran(metode) {
            if (metode === "cod") {
                metodeBayar.innerHTML = `
    <h3 class="text-muted mt-3">Cash On Delivery</h3>
    `;
            }

            if (metode === "kartu-kredit") {
                metodeBayar.innerHTML = `
    <h3 class="text-muted mt-3">Rincian Kartu</h3>
    <div class="col-md-12">
      <label for="">Nomor Kartu</label>
      <input class="form-control" type="number" maxlength="19">
    </div>
    <div class="col-md-8">
      <label for="">Tanggal Kadaluwarsa</label>
      <input class="form-control" type="number" maxlength="19">
    </div>
    <div class="col-md-4">
      <label for="">CCV</label>
      <input class="form-control" type="number" maxlength="19">
    </div>
    <div class="col-md-12">
      <label for="">Nama di Kartu</label>
      <input class="form-control" type="text" maxlength="19">
    </div>
    
    <h3 class="text-muted mt-3">Alamat Tagihan</h3>
    <div class="col-md-12">
      <label for="">Alamat</label>
      <input class="form-control" type="text" maxlength="19">
    </div>
    <div class="col-md-12">
      <label for="">Kode Pos</label>
      <input class="form-control" type="number" maxlength="19">
    </div>`;
            }
            if (metode === "transfer-bank") {
                metodeBayar.innerHTML = `
    <h3 class="text-muted mt-3">Pilih Bank</h3>

    <div class="col-md-12 d-flex align-items-center mb-2">
      <input
        type="radio"
        name="bank"
        id="seabank"
        class="form-check-input"
      />
      <label for="seabank"
        ><img
          src="images/assets/seabank.png"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="seabank">Seabank</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input type="radio" name="bank" id="bca" class="form-check-input" />
      <label for="bca"
        ><img
          src="images/assets/bca.png"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="bca">Bank BCA</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input
        type="radio"
        name="bank"
        id="mandiri"
        class="form-check-input"
      />
      <label for="mandiri"
        ><img
          src="images/assets/mandiri.png"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="mandiri">Bank Mandiri</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input type="radio" name="bank" id="bni" class="form-check-input" />
      <label for="bni"
        ><img
          src="images/assets/bni.png"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="bni">Bank BNI</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input type="radio" name="bank" id="bri" class="form-check-input" />
      <label for="bri"
        ><img
          src="images/assets/bri.png"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="bri">Bank BRI</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input type="radio" name="bank" id="bsi" class="form-check-input" />
      <label for="bsi"
        ><img
          src="images/assets/bsi.jpeg"
          class="border p-1 mx-3 img-fluid"
          style="min-width: 2.6rem"
      /></label>
      <label for="bsi">Bank Syariah Indonesia</label>
    </div>
    <div class="col-md-12 d-flex align-items-center mb-2">
      <input
        type="radio"
        name="bank"
        id="lain"
        class="form-check-input"
      />
      <label for="lain"
        ><img
          src="images/assets/lainnya.png"
          class="border p-1 mx-3 img-fluid"
          style="width: 2.6rem"
      /></label>
      <label for="lain">Bank Lainnya</label>
    </div>`;
            }
        }
    </script>

@stop
