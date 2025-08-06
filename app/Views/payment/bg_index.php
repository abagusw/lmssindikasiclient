<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<?php
$today = date('Y-m-d');
$todaySeminggu = date('Y-m-d', strtotime($today . ' +7 days'));
$expired_dateOri = $rowData['expired_date'];
$expired_date = date('Y-m-d', strtotime($expired_dateOri));
// echo $today."<br>";
// echo $expired_date;
?>
<div class="container py-5">
  <div class="row">
    <!-- Paket Pilihan -->
    <div class="col-lg-8 mb-4">
      <h5 class="mb-3">Pilih Paket Anda</h5>
      <div class="mb-3">
        <button class="btn btn-outline-dark me-2 active">Iuran Anggota</button>
        <button class="btn btn-outline-secondary">Iuran + BPJS TK</button>
      </div>

      <div class="list-group">
        <!-- Iuran 3 Bulan (Active) -->
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Iuran 3 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 75,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="75000" data-periode="3">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

        <!-- Paket lainnya -->
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Iuran 6 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 150,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar"
            data-amount="150000"  data-periode="6">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Iuran 12 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 300,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>

            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="300000" data-periode="12">Bayar Iuran</button>

            <?php } ?>
          </div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <strong>Iuran 24 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 600,000</div>
            <?php
            if ($todaySeminggu >= $expired_date){
              ?>
            <button class="btn btn-orange btn-sm mt-2 btn-bayar" 
            data-amount="600000" data-periode="24">Bayar Iuran</button>
            <?php } ?>
          </div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
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
        </label>
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
            <small class="text-muted">Pembayaran Iuran Selanjutnya</small><br>
            <strong><?= date('d M Y', strtotime($expired_dateOri)); ?></strong>
          </div>
        </div>
      </div>

      <div class="border p-3 rounded">
        <h6 class="mb-3">Riwayat Pembayaran</h6>
        <div class="mb-2">
          <span class="badge badge-success">Lunas</span>
          <div class="fw-bold">Rp <?php echo number_format($rowData['gross_amount'], 0, ',', '.'); ?></div>
          <div class="small text-muted">Pembayaran <?= $rowData['jenis_transaksi']; ?> bulan</div>
          <div class="text-muted small"><?= date('d M Y H:i:s', strtotime($rowData['created_at'])); ?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= Midtrans_ClientKey ?>"></script>

<script>
  document.querySelectorAll('.btn-bayar').forEach(function(button) {
    button.addEventListener('click', function () {
      const amount = this.dataset.amount;
      const periode = this.dataset.periode;

      fetch("<?= base_url('payment/bayar') ?>", {
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
          // Jika kamu pakai CSRF di CI4, tambahkan token di sini juga
        },
        body: `gross_amount=${amount}&periode=${encodeURIComponent(periode)}`
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
<?= $this->endSection(); ?>