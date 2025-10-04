<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
    }
    .card-wrapper {
      max-width: 800px;
      margin: 60px auto;
      border-radius: 16px;
      text-align: center;
    }
    .logo {
      width: 50px;
      margin-bottom: 1px;
    }
    .icon-img {
      width: 20%;
      margin: 20px 0;
    }
    .alert-box {
      border: 1px solid #ddd;
      border-left: 4px solid #0d6efd;
      background-color: #f9f9f9;
      padding: 20px;
      text-align: left;
      border-radius: 10px;
    }
    .btn-orange {
      background-color: #ff5c00;
      color: #fff;
      border-radius: 8px;
      padding: 10px 25px;
      font-weight: 500;
    }
    .btn-orange:hover {
      background-color: #e04f00;
    }
    .rounded-corner {
      border-radius: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card-wrapper shadow rounded-corner">

    <!-- Logo -->
<!--     <img src="<?= ASSETS_URL ?>login/logo_sindikasi.png" alt="Logo Sindikasi" class="logo">
    <br> -->

    <!-- Icon -->
    <img src="<?= ASSETS_URL ?>login/regsuclogo.png" alt="Icon Megafon" class="icon-img">

    <!-- Judul -->
    <h3 class="fw-bold">Pendaftaran berhasil!</h3>
    <p class="text-muted m-3">Sekretariat Nasional SINDIKASI akan segera memproses permintaan Anda dalam kurun waktu <strong>maksimal 3 hari kerja</strong></p>

    <!-- Alert Box -->
    <div class="alert-box m-3">
      <h6 class="fw-bold"><i class="bi bi-info-circle-fill text-primary"></i> Cara Aktivasi Akun</h6>
      <p class="mb-0">
        Setelah admin memverifikasi permintaan Anda, tautan aktivasi akan dikirim ke alamat email 
        <strong><?= $dataKey->email ?></strong> yang Anda daftarkan. Silakan cek alamat email tersebut secara reguler 
        untuk dapat mengaktifkan akun dan mulai mengakses portal member.
      </p>
    </div>

    <!-- Tombol -->
    <a href="<?= base_url('/') ?>" class="btn btn-orange mb-3">Kembali</a>
  </div>
</div>

<!-- Bootstrap & Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
