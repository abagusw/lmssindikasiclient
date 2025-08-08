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
      width: 240px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .kta-image {
      height: 160px;
      background: #f0f0f0 url('https://via.placeholder.com/240x160') center/cover no-repeat;
    }
    .kta-body {
      padding: 16px;
      background-color: #000;
      color: #fff;
    }
    .btn-orange {
      background-color: #f2550e;
      color: #fff;
      border-radius: 8px;
    }
    .btn-orange:hover {
      background-color: #d94b0c;
    }

  </style>
</head>
<body>

<!-- Header (opsional) -->
<nav class="navbar bg-white border-bottom shadow-sm">
  <div class="container-fluid px-4">
    <a class="navbar-brand fw-bold" href="<?= base_url() ?>">kolektaria</a>
    <form class="d-flex d-none d-md-block" role="search" style="width: 300px;">
      <input class="form-control rounded-pill" type="search" placeholder="Search" aria-label="Search">
    </form>
    <div class="d-flex align-items-center gap-3">
      <a href="#" class="text-decoration-none text-orange fw-semibold d-none d-md-block">Tampilkan daftar materi</a>
      <img src="https://i.pravatar.cc/32" class="rounded-circle" alt="Avatar">
    </div>
  </div>
</nav>

<!-- Konten Utama -->
<div class="container text-center my-5">
  <h5 class="fw-semibold mb-2">Selamat bergabung dengan Sindikasi, <?= $user_logged_in['nama_panggilan']; ?>!</h5>
  <p class="text-muted mx-auto" style="max-width: 600px;">
    Terima kasih telah menyelesaikan pendidikan dasar. Kini kamu telah menjadi anggota penuh Serikat Sindikasi—sebuah komunitas solidaritas pekerja yang saling mendukung dan memperjuangkan hak bersama.
  </p>

  <div  class="d-flex justify-content-center my-4">
    <div class="kta-card" id="ktaArea">
      <div class="kta-image">
        <!-- Gambar header KTA -->
      </div>
      <div class="kta-body text-center">
        <h6 class="mb-1"><?= $user_logged_in['nama_lengkap']; ?></h6>
        <small><?= $user_logged_in['nomor_anggota']; ?></small>
      </div>
    </div>
  </div>

  <div class="mb-3">
    <a href="#" id="downloadKTA" class="btn btn-orange px-4">⬇ Unduh KTA</a>
  </div>

  <a href="<?= base_url(); ?>" class="btn btn-outline-secondary">Kembali ke beranda</a>
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
