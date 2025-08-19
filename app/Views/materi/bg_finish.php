<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendidikan Dasar Serikat</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  .kta-card {
    width: 100%;
    max-width: 240px; /* Sesuaikan ukuran kartu dengan gambar pertama */
    border-radius: 16px; /* Menjaga sudut kartu tetap melengkung */
    overflow: hidden;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Shadow yang lebih halus */
    margin-bottom: 20px;
  }

  .kta-image {
    height: 220px; /* Sesuaikan tinggi gambar */
    background: #ffffff url('<?= base_url("public/assets/images/kta_finish.png"); ?>') center/cover no-repeat;
    background-size: contain; /* Agar gambar tidak terdistorsi */
  }

  .kta-body {
    padding: 20px 16px; /* Menambahkan ruang pada bagian bawah */
    background-color: #000;
    color: #fff;
    text-align: center;
  }

  .kta-body h3 {
    font-size: 18px; /* Ukuran font nama yang lebih sesuai */
    font-weight: bold;
    margin: 8px 0;
    text-transform: uppercase; /* Menambah kesan tegas */
  }

  .kta-body p {
    font-size: 14px;
    color: #f0f0f0;
    margin-top: 4px;
  }

  .btn-orange {
    background-color: #f2550e;
    color: #fff;
    border-radius: 8px;
    padding: 8px 16px;
    margin-top: 10px;
    text-transform: uppercase;
  }

  .btn-orange:hover {
    background-color: #d94b0c;
  }
</style>


</head>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold" href="#">kolektaria</a>
    <form class="d-flex d-none d-md-block" role="search" style="width: 300px;">
      <input class="form-control rounded-pill" type="search" placeholder="Search" aria-label="Search">
    </form>
    <div class="d-flex align-items-center gap-3">
      <a href="#" class="text-decoration-none text-orange fw-semibold d-none d-md-block">Tampilkan daftar materi</a>
      <img src="https://i.pravatar.cc/32" class="rounded-circle" alt="Avatar">
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container text-center my-5">
  <h5 class="fw-semibold mb-2">Selamat bergabung dengan Sindikasi, <?= $user_logged_in['nama_panggilan']; ?>!</h5>
  <p class="text-muted mx-auto" style="max-width: 600px;">
    Terima kasih telah menyelesaikan pendidikan dasar. Kini kamu telah menjadi anggota penuh Serikat Sindikasi—sebuah komunitas solidaritas pekerja yang saling mendukung dan memperjuangkan hak bersama.
  </p>

  <!-- Card section -->
  <div class="d-flex flex-wrap justify-content-center my-4">
      <!-- Card section -->
    <div class="kta-card" id="ktaArea">
      <div class="kta-image"></div>
      <div class="kta-body text-center">
        <h6 class="mb-1"><?= $user_logged_in['nama_lengkap']; ?></h6>
        <small><?= $user_logged_in['nomor_anggota']; ?></small>
      </div>
    </div>
  </div>

  <!-- Download Button -->
  <div class="mb-3">
    <a href="#" id="downloadKTA" class="btn btn-orange px-4">⬇ Unduh KTA</a>
  </div>

  <!-- Back to Home -->
  <a href="#" class="btn btn-outline-secondary">Kembali ke beranda</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
document.getElementById("downloadKTA").addEventListener("click", function () {
  html2canvas(document.getElementById("ktaArea")).then(function (canvas) {
    const link = document.createElement('a');
    link.download = 'kta.png';
    link.href = canvas.toDataURL();
    link.click();
  });
});
</script>

</body>
</html>
