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
  <?php
  if($user_logged_in['isregisterpaid'] == 1){
    $iconPaid = "bi bi-check-circle-fill text-success me-2";
    $ketPaid = "<div class='d-flex align-items-center'>
  <strong class='me-2'>Iuran Awal</strong>
  <span class='badge rounded-pill bg-success'>Lunas</span>
</div>";
  }else{
    $iconPaid = "bi bi-circle me-2";
    $ketPaid = "";
  }
  ?>
  <!-- Isi utama -->
  <div class="row mt-4">
    <!-- Checklist -->
    <div class="col-md-4">
      <div class="card-checklist">
        <h6>Checklist Pengaturan</h6>
        <ul class="list-group list-group-flush mt-3">
          <li class="list-group-item d-flex align-items-center">
            <i class="<?= $iconPaid; ?>"></i> Pembayaran awal
          </li>
          <li class="list-group-item d-flex align-items-center text-muted">
            <i class="bi bi-circle me-2"></i> Pendidikan dasar
          </li>
        </ul>
      </div>
    </div>

    <!-- Pembayaran -->
    <div class="col-md-8">
      <div class="section-box">
        <h5>Pembayaran Iuran Awal</h5>
        <p class="text-muted">Sebagai bentuk komitmen awal dan dukungan terhadap gerakan bersama, silakan lakukan pembayaran iuran awal. Iuran ini membantu mendukung operasional server dan memungkinkan semua anggota mendapatkan akses penuh ke manfaat, pelatihan, dan kegiatan komunitas.</p>
        <?= $ketPaid; ?>
        <div class="payment-price mt-3">Rp. 75,000</div>
        <?php
        if($user_logged_in['isregisterpaid'] == 1){
          ?>
          <button class="btn btn-grey w-100 mt-3 mb-3">Lihat rincian</button> <?php }
        else{
          ?>
          <button class="btn btn-orange w-100 mt-3 mb-3" id="<?= $idButton; ?>">Bayar sekarang</button> <?php } ?>
        <!-- <div id="result-jsons">JSON result will appear here after payment:<br></div> -->

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
    <script type="text/javascript">
    const baseUrl = "<?= base_url() ?>";
    // document.getElementById('pay-button').addEventListener('click', function () {
    //     fetch(baseUrl +'/dashboard/token', {
    //     credentials: 'same-origin' 
    // })
    //         .then(response => response.json())
    //         .then(data => {
    //           console.log("Snap Data:",data.va_number);
    //           console.log("Snap Token:", data.token);
    //             snap.pay(data.token, {



    //                 onPending: function (result) {
    //                   getDataByToken(result.order_id); 
    //                 // alert('oke');
    //                     // console.log("Pending", result);
    //                     // $('#resultJson').val(JSON.stringify(result));
    //                    saveDatabase(result);
    //                     //alert("Menunggu pembayaran.");
    //                 },
    //                 onSuccess: function (result) {

    //                     //console.log("Success", result);
    //                   saveDatabase(result);
    //                     //alert("Pembayaran berhasil!");
    //                 },

    //                 onError: function (result) {
    //                    // console.log("Error", result);
    //                     //$('#resultJson').val(JSON.stringify(result));
    //                     //alert("Pembayaran gagal.");
    //                    saveDatabase(result);
    //                 }


    //             });
    //         })

    // });

        document.getElementById('pay-button').onclick = function(){
          console.log("Token", "<?php echo $snapToken?>");
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snapToken?>', {

                // Optional
                onSuccess: function(result){
                  console.log("Success", result);
                    /* You may add your own js here, this is just example */ 
                    //document.getElementById('result-jsons').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onPending: function(result){
                    /* You may add your own js here, this is just example */
                    console.log("Pending", result); 
                    //document.getElementById('result-jsons').innerHTML += JSON.stringify(result, null, 2);
                },
                // Optional
                onError: function(result){
                  console.log("Error", result);
                    /* You may add your own js here, this is just example */ 
                   // document.getElementById('result-jsons').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };



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

    function getDataByToken(token){
        $.ajax({
            type: 'POST',
            data: {token:token,'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('dashboard/getDataByToken')?>",
            async: false,
            success: function(response) {
              

            }

        });
      
    }
    </script>

    <script>
        $('#failed-button').click(function() {
        $.ambiance({
            message: 'Masih terdapat transaksi yang belum diselesaikan !',
            type: "error",
            fade: false
        });
    });
  </script>
      <!-- /.row (main row) -->
<?= $this->endSection(); ?>