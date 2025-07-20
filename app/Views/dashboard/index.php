<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <div class="banner d-flex">
    <img src="https://i.imgur.com/VZ2okQb.png" alt="emoji tangan" class="me-3" style="width: 80px; height: auto;">
    <div>
      <h5 class="fw-bold">Selamat bergabung, Kawan!</h5>
      <p class="mb-0">Kamu resmi jadi bagian dari gerakan kolektif kita! Lakukan pembayaran awal, ikuti materi pelatihan dasar agar semakin paham tujuan kita bersama, dan nantinya kamu akan menerima ID anggota resmi.</p>
      <p class="mb-0">Bersama kita kuat — ayo mulai perjalanan ini bersama!</p>
    </div>
  </div>

  <!-- Isi utama -->
  <div class="row mt-4">
    <!-- Checklist -->
    <div class="col-md-4">
      <div class="section-box">
        <h6 class="mb-3">Checklist Pengaturan</h6>
        <div class="form-check mb-2">
          <input class="form-check-input" type="radio" name="checklist" checked>
          <label class="form-check-label">Pembayaran awal</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="checklist">
          <label class="form-check-label">Pendidikan dasar</label>
        </div>
      </div>
    </div>

    <!-- Pembayaran -->
    <div class="col-md-8">
      <div class="section-box">
        <h5>Pembayaran Iuran Awal</h5>
        <p class="text-muted">Sebagai bentuk komitmen awal dan dukungan terhadap gerakan bersama, silakan lakukan pembayaran iuran awal. Iuran ini membantu mendukung operasional server dan memungkinkan semua anggota mendapatkan akses penuh ke manfaat, pelatihan, dan kegiatan komunitas.</p>

        <div class="payment-price mt-3">Rp. 75,000</div>
        <button class="btn btn-orange w-100 mt-3 mb-3" id="pay-button">Bayar sekarang</button>
        <div id="result-jsons">JSON result will appear here after payment:<br></div>

        <input type="hidden" id="resultJson" name="resultJson">

        <ul class="text-muted">
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Dapat mulai mengakses <strong>“Pendidikan Dasar Sindikasi”</strong></li>
          <li><i class="bi bi-check-circle-fill text-success me-2"></i>Tersambut masuk wilayah anggota selama 3 bulan</li>
        </ul>
      </div>
    </div>
  </div>

      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= Midtrans_ClientKey ?>"></script>
<!--     <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // SnapToken acquired from previous step
        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script> -->
    <script>
    const baseUrl = "<?= base_url() ?>";
    document.getElementById('pay-button').addEventListener('click', function () {
        fetch(baseUrl +'/dashboard/token', {
        credentials: 'same-origin' 
    })
            .then(response => response.json())
            .then(data => {
              console.log("Snap Token:", data.token);
                snap.pay(data.token, {
                    onPending: function (result) {
                    // alert('oke');
                        // console.log("Pending", result);
                        // $('#resultJson').val(JSON.stringify(result));
                       saveDatabase(result);
                        //alert("Menunggu pembayaran.");
                    },
                    onSuccess: function (result) {

                        //console.log("Success", result);
                      saveDatabase(result);
                        //alert("Pembayaran berhasil!");
                    },

                    onError: function (result) {
                       // console.log("Error", result);
                        //$('#resultJson').val(JSON.stringify(result));
                        //alert("Pembayaran gagal.");
                       saveDatabase(result);
                    }


                });
            })

    });

    function saveDatabase(result) {
      fetch(baseUrl + '/dashboard/insert_transaksi', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify(result)
      })
      .then(res => res.json())
      .then(data => {

          $.ambiance({message: 'Transaksi berhasil !',
                    type: "success",
                    fade: false});
    });
    }
    </script>
      <!-- /.row (main row) -->
<?= $this->endSection(); ?>