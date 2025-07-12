<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kolektaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
    }

    .sidebar {
      background-color: #fff;
      border-right: 1px solid #ddd;
      height: 100vh;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: #000;
      padding: 10px 20px;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #f2f2f2;
      font-weight: 600;
    }

    .topbar {
      background-color: #fff;
      padding: 10px 20px;
      border-bottom: 1px solid #ddd;
    }

    .banner {
      background-color: #111;
      color: #fff;
      padding: 16px;
      border-radius: 8px;
      margin-bottom: 20px;
    }

    .main-content {
      padding: 30px;
    }

    .section-box {
      background-color: #fff;
      padding: 24px;
      border-radius: 12px;
      border: 1px solid #ddd;
    }

    .payment-price {
      font-size: 26px;
      font-weight: bold;
      color: #000;
    }

    .btn-orange {
      background-color: #f97316;
      color: #fff;
      border: none;
    }

    .btn-orange:hover {
      background-color: #ea580c;
    }

    .footer {
      font-size: 14px;
      color: #777;
      padding: 15px;
    }

    .nav-label {
      font-size: 13px;
      text-transform: uppercase;
      font-weight: bold;
      margin: 15px 0 5px 20px;
      color: #555;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-2 sidebar d-none d-md-block">
      <h5 class="text-center mb-3">🧩 kolektaria</h5>
      <div class="d-grid">
        <a href="#" class="btn btn-dark mx-3 mb-2">Mulai sekarang!</a>
      </div>

      <div class="nav-label">LMS</div>
      <a href="#" class="nav-link">Lini Masa</a>
      <a href="#" class="nav-link">Course</a>

      <div class="nav-label">Payment</div>
      <a href="#" class="nav-link">Pembayaran</a>

      <div class="nav-label">Event</div>
      <a href="#" class="nav-link">Acara</a>

      <div class="nav-label">Membership</div>
      <a href="#" class="nav-link">Direktori Anggota</a>

      <div class="nav-label">Bantuan</div>
      <a href="#" class="nav-link">Dokumentasi</a>
      <a href="#" class="nav-link">Panduan</a>
    </div>

    <!-- Main -->
    <div class="col-md-10">
      <!-- Top bar -->
<!-- Header Main -->
      <div class="bg-white px-4 py-2 border-bottom d-flex justify-content-between align-items-center">
        <!-- Search -->
        <form class="d-none d-md-block w-50">
          <input type="text" class="form-control rounded-pill px-4" placeholder="Search">
        </form>

        <!-- Icons -->
          <div class="d-flex align-items-center">
            <i class="bi bi-gear mx-3 fs-5"></i>
            <i class="bi bi-bell mx-3 fs-5"></i>

            <!-- User Dropdown -->
            <div class="dropdown">
              <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://i.pravatar.cc/32" alt="User" class="rounded-circle" width="32" height="32">
              </a>
              <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="<?= base_url(); ?>auth/logout">Logout</a></li>
              </ul>
            </div>
          </div>
      </div>

      <!-- Banner Hitam -->
      <div class="bg-dark text-white text-center py-2 px-3 fw-medium">
        Kamu belum membayar iuran awal. Segera lakukan pembayaran agar dapat mulai mengakses portal Sindikasi secara lengkap
      </div>

      <div class="main-content">
        <!-- Banner -->
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
              <button class="btn btn-orange w-100 mt-3 mb-3">Bayar sekarang</button>

              <ul class="text-muted">
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Dapat mulai mengakses <strong>“Pendidikan Dasar Sindikasi”</strong></li>
                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Tersambut masuk wilayah anggota selama 3 bulan</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="text-center footer mt-5">
          2025 © 🐝 Bersekut melawan sekat!
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
