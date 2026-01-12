<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>

<?php
if($getCekPaymentSukses == 0){
  ?>
  <div id="lesson-empty-notification" class="alert alert-warning text-center mt-4" role="alert">
    <i class="bi bi-exclamation-circle-fill me-2"></i>
    <strong>Belum ada pembayaran</strong>
    <div class="mt-3">
      <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm btn-secondary">
        <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Dashboard
      </a>
    </div>
  </div>
  <?php
}else{
  ?>
<div class="container py-5">
<?php
$today = date('Y-m-d');
$todaySeminggu = date('Y-m-d', strtotime($today . ' +7 days'));
$expired_dateOri = $rowData->expired_date;
$expired_date = date('Y-m-d', strtotime($expired_dateOri));
// echo $today."<br>";
// echo $expired_date;
?>
  <div class="row">
    <!-- Paket Pilihan -->
    <div class="col-lg-8 mb-4">
      <h5 class="mb-3">Pilih Pembayaran</h5>
      <div class="mb-3">
        <!-- <button class="btn btn-outline-dark me-2 active" id="iuranAnggota" onclick="setFlag(0)">Iuran Anggota</button> -->
        <!-- <button class="btn btn-outline-secondary" id="bpjsTK" onclick="setFlag(1)">Iuran + BPJS TK</button> -->
      </div>
        <input type="hidden" id="flagInput" value="0" />
      <div class="list-group">
                <!-- Iuran 3 Bulan (Active) -->
        <label class="list-group-item d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start">
          <div>
            <strong>Pendataran Anggota + Iuran 2 Bulan</strong>
            <div class="text-muted small">Iuran awal untuk anggota baru yang akan mengikuti pendidikan dasar.</div>
          </div>
          <div class="text-end mt-2">
            <div class="fw-bold fs-5">Rp 50,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="50000" data-periode="2">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>
        <!-- Iuran 3 Bulan (Active) -->
        <label class="list-group-item d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start">
          <div>
            <strong>Iuran 3 Bulan</strong>
            <div class="text-muted small">Untuk anggota aktif/terdaftar. Terhitung sejak tanggal pembayaran.</div>
          </div>
          <div class="text-end mt-2">
            <div class="fw-bold fs-5">Rp 75,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="75000" data-periode="3">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

        <!-- Paket lainnya -->
        <label class="list-group-item d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start">
          <div>
            <strong>Iuran 6 Bulan</strong>
            <div class="text-muted small">Untuk anggota aktif/terdaftar. Terhitung sejak tanggal pembayaran.</div>
          </div>
          <div class="text-end mt-2">
            <div class="fw-bold fs-5">Rp 150,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar"
            data-amount="150000"  data-periode="6">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

        <label class="list-group-item d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start">
          <div>
            <strong>Iuran 12 Bulan</strong>
            <div class="text-muted small">Untuk anggota aktif/terdaftar. Terhitung sejak tanggal pembayaran.</div>
          </div>
          <div class="text-end mt-2">
            <div class="fw-bold fs-5">Rp 300,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="300000" data-periode="12">Bayar Iuran</button>

            <?php } ?>
          </div>
        </label>

        <label class="list-group-item d-flex flex-column flex-md-row justify-content-start justify-content-md-between align-items-start">
          <div>
            <strong>Iuran 24 Bulan</strong>
            <div class="text-muted small">Untuk anggota aktif/terdaftar. Terhitung sejak tanggal pembayaran.</div>
          </div>
          <div class="text-end mt-2">
            <div class="fw-bold fs-5">Rp 600,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>
            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="600000" data-periode="24">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

<!--         <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Iuran lainnya</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 75,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>
            <button class="btn btn-orange btn-sm mt-2 btn-bayar"
            data-amount="75000"  data-periode="lainnya">Bayar Iuran</button>
          <?php } ?>
          </div>
        </label> -->
      </div>
    </div>

    <!-- Informasi Pembayaran -->
    <div class="col-lg-4">
      <div class="p-3 border rounded next-payment mb-3">
        <div class="d-flex align-items-center mb-2">
          <div class="me-2">
            <i class="bi bi-clock-history fs-4 text-warning"></i>
          </div>
          <div>
            <?php 
            if($today < $expired_date){
              ?>
              <small class="text-muted">Pembayaran Iuran Selanjutnya</small><br>
              <strong><?= date('d M Y', strtotime($expired_dateOri)); ?></strong>
            <?php }else{?>
              <strong>Anda belum membayar iuran anggota</strong>
          <?php } ?>
          </div>
        </div>
      </div>

      <div class="border p-3 rounded bg-white">
        <h6 class="mb-3">Riwayat Pembayaran</h6>
        <div class="mb-2">
          <?php
          if($rowData->jenis == 0){
            $jnFlag = "[Iuran Anggota]";
          }else{
            $jnFlag = "[Iuran BPJS]";
          }
          ?>
          <span class="badge badge-success">Lunas</span>
          <div class="fw-bold">Rp <?php echo number_format($rowData->gross_amount, 0, ',', '.'); ?></div>
          <div class="small text-muted">Pembayaran <?= $rowData->jenis_transaksi; ?> bulan <?= $jnFlag; ?></div>
          <div class="text-muted small"><?= date('d M Y H:i:s', strtotime($transaction_time)); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= Midtrans_ClientKey ?>"></script>

<script>
  document.querySelectorAll('.btn-bayar').forEach(function(button) {
    button.addEventListener('click', function () {
      const amount = this.dataset.amount;
      const periode = this.dataset.periode;
      const flag = document.getElementById('flagInput').value;  // Ambil nilai dari input hidden


      fetch("<?= base_url('payment/bayar') ?>", {
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          // Jika kamu pakai CSRF di CI4, tambahkan token di sini juga
        },
        body: `gross_amount=${amount}&periode=${encodeURIComponent(periode)}&flag=${flag}`
      })
      .then(response => response.json())
      .then(data => {
        if (data.token) {
          snap.pay(data.token);
        } else {
          alert("Gagal mendapatkan token.");
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert("Terjadi kesalahan saat memproses pembayaran.");
      });
    });
  });
</script>

<script>
  // Fungsi untuk mengubah status tombol aktif dan menyetel flag
  function setFlag(flag) {
    // Hapus kelas 'active' dari kedua tombol
    document.querySelectorAll('.btn').forEach(function(button) {
      button.classList.remove('active');
    });

    // Tambahkan kelas 'active' pada tombol yang dipilih
    if (flag === 0) {
      document.getElementById('iuranAnggota').classList.add('active');
    } else {
      document.getElementById('bpjsTK').classList.add('active');
    }

    // Set nilai input flag sesuai pilihan tombol
    document.getElementById('flagInput').value = flag;
  }
</script>
<?= $this->endSection(); ?>