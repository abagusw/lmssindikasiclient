<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>

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
        <label class="list-group-item d-flex justify-content-between align-items-center active-card">
          <div>
            <input class="form-check-input me-2" type="radio" name="paket" checked>
            <strong>Iuran 3 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="text-end">
            <div class="fw-bold">Rp 75,000</div>
            <button class="btn btn-orange btn-sm mt-2">Bayar Iuran</button>
          </div>
        </label>

        <!-- Paket lainnya -->
        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input class="form-check-input me-2" type="radio" name="paket">
            <strong>Iuran 6 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="fw-bold">Rp 150,000</div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input class="form-check-input me-2" type="radio" name="paket">
            <strong>Iuran 12 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="fw-bold">Rp 300,000</div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input class="form-check-input me-2" type="radio" name="paket">
            <strong>Iuran 24 Bulan</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="fw-bold">Rp 600,000</div>
        </label>

        <label class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <input class="form-check-input me-2" type="radio" name="paket">
            <strong>Iuran lainnya</strong>
            <div class="text-muted small">Full features, highest limits and priority support</div>
          </div>
          <div class="fw-bold">Rp 75,000</div>
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
            <strong>4 Desember 2025</strong>
          </div>
        </div>
      </div>

      <div class="border p-3 rounded">
        <h6 class="mb-3">Riwayat Pembayaran</h6>
        <div class="mb-2">
          <span class="badge badge-success">Lunas</span>
          <div class="fw-bold">Rp 75,000</div>
          <div class="small text-muted">Pembayaran Iuran Awal</div>
          <div class="text-muted small">4 September 2025 10:38AM</div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>