@extends('templates.nav-footer')

@section('content')


    {{-- toggle modal alamat --}}
    <div class="d-flex justify-content-end mx-5 mb-3">
        <a href="/keranjang/{{ Auth::user()->id_pengguna }}" class="btn btn-success ">Kembali</a>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="container mb-4 shadow card p-4">
        <div class="row align-items-center">
            @if (session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('sukses') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class=" col-10 text-start">

                <h3>Alamat Pengiriman</h3>
                <p>
                    {{ Auth::user()->nama }}, ({{ Auth::user()->nohp }}) <br>
                    {{ Auth::user()->alamat }}
                </p>

                <p></p>
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
            @foreach ($produks as $produk)
                <div class="row text-center fs-6 d-flex align-items-center mb-2">
                    <div class="col-md-1 col-sm-1">
                        <img src="{{ asset('images/foto-produk/' . $produk->foto_produk) }}" class="img-fluid rounded-3"
                            alt="" />
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <p class="fw-normal mb-1">{{ $produk->nama_produk }}</p>
                        {{-- <p><span class="text-muted">Warna: </span>Hitam</p> --}}
                    </div>
                    <div class="col-md-2 col-sm-2">
                        <p>@php
                            foreach ($produksArray as $key => $jumlah) {
                                if ($produk->id_produk == $key) {
                                    echo $jumlah;
                                }
                            }
                        @endphp</p>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <h6>Rp {{ $produk->harga }} ,-</h6>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <h6 class="">Rp @php
                            foreach ($produksArray as $key => $jumlah) {
                                if ($produk->id_produk == $key) {
                                    $totalHarga = $jumlah * $produk->harga;
                                    echo $totalHarga;
                                }
                            }

                        @endphp,-</h6>
                    </div>
                </div>
            @endforeach


            <!-- isi produk di pesan end -->
        </div>
    </div>

    {{-- pembayaran --}}
    <div class="container mb-5 shadow card p-4">
        <div class="row">
            <h2>Pembayaran</h2>
            {{-- !FORM PEMESANAN --}}
            <form action="{{ url('/pemesanan') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <div class="col-md-12">
                        @foreach ($produks as $produk)
                            <input type="text" name="id_produk[]" value="{{ $produk->id_produk }}"hidden>
                            <input type="text" name="id_pengguna[]" value="{{ Auth::user()->id_pengguna }}"hidden>
                            <input type="text" name="jumlah_produk[]"
                                value="@php
foreach ($produksArray as $key => $jumlah) {
                                if ($produk->id_produk == $key) {
                                    echo $jumlah;
                                }
                            } @endphp"hidden>
                            <input type="number" name="total_transaksi[]"
                                value="@php
foreach ($produksArray as $key => $jumlah) {
                                    if ($produk->id_produk == $key) {
                                        $totalHarga = $jumlah * $produk->harga;
                                        echo $totalHarga;
                                    }
                                } @endphp"
                                hidden>
                        @endforeach

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="COD" required
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                COD
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_pembayaran" value="TransferBank"
                                required id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Transfer Bank
                            </label>
                        </div>
                        <input type="date" name="estimasi_waktu" value="" id="" hidden>


                    </div>
                </div>
                <div class="row mb-3" id="js-pembayaran" style="max-width: 40rem"></div>

                <button type="submit" class="btn btn-success p-3 w-100">Buat Pesanan</button>
            </form>
        </div>
    </div>

    {{-- modal isi alamat --}}
    <div class="modal fade" id="modal-alamat">
        <div class="modal-dialog modal-lg">
            <form action="/checkout/alamat/{{ Auth::user()->id_pengguna }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-content">
                    <div class="modal-header">Isi Alamat</div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Provinsi </label>
                                <select name="provinsi" id="" class="form-control">
                                    <option value="ACEH">ACEH</option>
                                    <option value="SUMATERA UTARA">SUMATERA UTARA</option>
                                    <option value="SUMATERA BARAT">SUMATERA BARAT</option>
                                    <option value="RIAU">RIAU</option>
                                    <option value="JAMBI">JAMBI</option>
                                    <option value="SUMATERA SELATAN">SUMATERA SELATAN</option>
                                    <option value="BENGKULU">BENGKULU</option>
                                    <option value="LAMPUNG">LAMPUNG</option>
                                    <option value="KEPULAUAN BANGKA BELITUNG">KEPULAUAN BANGKA BELITUNG</option>
                                    <option value="KEPULAUAN RIAU">KEPULAUAN RIAU</option>
                                    <option value="DKI JAKARTA">DKI JAKARTA</option>
                                    <option value="JAWA BARAT">JAWA BARAT</option>
                                    <option value="JAWA TENGAH">JAWA TENGAH</option>
                                    <option value="DI YOGYAKARTA">DI YOGYAKARTA</option>
                                    <option value="JAWA TIMUR">JAWA TIMUR</option>
                                    <option value="BANTEN">BANTEN</option>
                                    <option value="BALI">BALI</option>
                                    <option value="NUSA TENGGARA BARAT">NUSA TENGGARA BARAT</option>
                                    <option value="NUSA TENGGARA TIMUR">NUSA TENGGARA TIMUR</option>
                                    <option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
                                    <option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
                                    <option value="KALIMANTAN SELATAN">KALIMANTAN SELATAN</option>
                                    <option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
                                    <option value="SULAWESI UTARA">SULAWESI UTARA</option>
                                    <option value="SULAWESI SELATAN">SULAWESI SELATAN</option>
                                    <option value="SULAWESI TENGGARA">SULAWESI TENGGARA</option>
                                    <option value="GORONTALO">GORONTALO</option>
                                    <option value="SULAWESI BARAT">SULAWESI BARAT</option>
                                    <option value="MALUKU">MALUKU</option>
                                    <option value="MALUKU UTARA">MALUKU UTARA</option>
                                    <option value="PAPUA">PAPUA</option>
                                    <option value="PAPUA BARAT">PAPUA BARAT</option>
                                    <option value="SULAWESI TENGAH">SULAWESI TENGAH</option>
                                    <option value="KALIMANTAN UTARA">KALIMANTAN UTARA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">kota</label>
                                <input type="text" name="kota" id="" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Kecamatan</label>
                                <input type="text" name="kecamatan" id="" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label for="">Kode Pos</label>
                                <input type="number" name="kodepos" id="" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Nama Jalan, Gedung, No.Rumah</label>
                                <textarea name="detail1" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Detail lainnya</label>
                                <textarea name="detail2" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
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
