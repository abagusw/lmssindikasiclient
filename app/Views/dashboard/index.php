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
  <!-- Checklist Kiri -->
  <div class="col-md-4">
    <div class="list-group">
      <a href="#pembayaran" class="list-group-item list-group-item-action active d-flex align-items-center" data-bs-toggle="tab">
        <i class="<?= $iconPaid; ?>"></i> Pembayaran awal
      </a>
      <a href="#pendidikan" class="list-group-item list-group-item-action d-flex align-items-center" data-bs-toggle="tab">
        <i class="bi bi-circle text-muted me-2"></i> Pendidikan dasar
      </a>
    </div>
  </div>

  <!-- Konten Kanan -->
  <div class="col-md-8">
    <div class="tab-content">

      <!-- Tab Pembayaran -->
      <div class="tab-pane fade show active" id="pembayaran">
        <div class="card border-success rounded-4 shadow-sm p-4">
          <h5 class="fw-bold">Pembayaran Iuran Awal</h5>
          <p>Sebagai bentuk komitmen awal dan dukungan terhadap gerakan bersama, silakan lakukan pembayaran iuran awal. Iuran ini membantu mendukung operasional server dan memungkinkan semua anggota mendapatkan akses penuh ke manfaat, pelatihan, dan kegiatan komunitas.</p>
          
          
          <?php
          $tagihan = "<h3 class='fw-bold'>Rp. 75,000</h3>";
          
        if($user_logged_in['isregisterpaid'] == 1){
          ?>
          <div class="d-flex align-items-center mb-2">
            <strong class="me-2">Iuran Awal</strong>
            <span class="badge bg-success">Lunas</span>
          </div>

          <?=  $tagihan; ?>
          <button class="btn btn-outline-secondary w-100 mt-3 mb-3">
            Lihat rincian
          </button><?php }
        else{
          ?>
          <?=  $tagihan; ?>
          <button class="btn btn-orange w-100 mt-3 mb-3" id="<?= $idButton; ?>">Bayar sekarang</button> <?php } ?>

          <div>
            <ul class="list-unstyled text-muted">
              <li class="mb-2">
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                Dapat mulai mengakses <strong>“Pendidikan Dasar Sindikasi”</strong>
              </li>
              <li>
                <i class="bi bi-check-circle-fill text-success me-2"></i>
                Termasuk iuran wajib anggota selama 3 bulan 
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Tab Pendidikan -->
      <div class="tab-pane fade" id="pendidikan">
        <div class="card rounded-4 shadow-sm p-4">
          <h5 class="fw-bold">Pendidikan Dasar</h5>
          <?php if($user_logged_in['isregisterpaid'] == 1){
            ?>
          <p class="text-muted mb-4">
            Luangkan waktumu sejenak untuk menyelesaikannya—ini adalah fondasi penting untuk langkah-langkah ke depan sebagai anggota aktif!
          </p>

          <div class="card border rounded-4 p-3">
            <div class="mb-2">
              <h6 class="fw-semibold mb-1">Pendidikan Dasar Serikat</h6>
              <small class="text-muted">by Sindikasi &nbsp;•&nbsp; 25 menit &nbsp;•&nbsp; 6 materi</small>
            </div>

            <div class="mb-2">
              <span class="badge bg-secondary rounded-pill me-1">Pendidikan Dasar</span>
              <span class="badge bg-secondary rounded-pill me-1">Serikat 101</span>
              <span class="badge bg-secondary rounded-pill">AD/ART</span>
            </div>

            <div class="my-3">
              <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                <iframe src="https://www.youtube.com/embed/YOUTUBE_ID" title="Video Pendidikan Dasar" allowfullscreen></iframe>
              </div>
            </div>

            <p class="text-muted">
              <strong>Diksarser 🎶</strong> atau Pendidikan Dasar Serikat adalah forum berbagi pengetahuan & kapasitas, khususnya tentang keorganisasian SINDIKASI. Pengetahuan dalam konteks ini juga bukan dalam posisi yang hierarkis, untuk siapa yang lebih tahu dan tidak,
              tetapi untuk berefleksi pada kondisi kerja kita masing-masing dan kemudian membayangkan apa aja yang bisa kita
              lakukan bareng-bareng untuk memperjuangkan hak kita sebagai pekerja media dan industri kreatif.
            </p>

            <div class="mt-4">
              <a href="<?= base_url('materi/pendidikan-dasar') ?>" class="btn btn-orange w-100 rounded-3 fw-semibold py-2">
                Lihat materi
              </a>
            </div>
          </div>


          <?php }else{?>
           <p class="text-danger">Silakan melakukan pembayaran terlebih dahulu untuk mengakses pendidikan dasar.</p>
           <?php
          }?>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="paymentSuccessModal" tabindex="-1" aria-labelledby="paymentSuccessLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4 border-0" style="border-radius: 1rem;">
      
      <!-- Close Button -->
      <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

      <!-- Icon -->
      <div class="mb-3">
        <img src="<?=ASSETS_URL?>assets/images/payment_success.png" alt="Icon Pembayaran" width="60">
      </div>

      <!-- Title -->
      <h5 class="fw-bold">Pembayaran berhasil!</h5>

      <!-- Description -->
      <p class="text-muted mb-0">
        Pembayaran <strong>Iuran 3 Bulan</strong> kamu sudah berhasil dibayar dan diverifikasi
      </p>

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
                  const myModal = new bootstrap.Modal(document.getElementById('paymentSuccessModal'));
                  myModal.show();
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