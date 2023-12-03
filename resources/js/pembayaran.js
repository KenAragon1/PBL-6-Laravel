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
