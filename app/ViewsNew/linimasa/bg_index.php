<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <style>

    .card img {
      max-height: 200px;
      object-fit: cover;
    }

    .hero-banner img {
      width: 100%;
      border-radius: 1rem;
      margin-bottom: 2rem;
    }

    .post-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      margin-bottom: 2rem;
      overflow: hidden;
    }

    .post-card img {
      width: 100%;
      object-fit: cover;
    }

    .post-meta {
      font-size: 0.85rem;
      color: #6c757d;
    }

    .btn-view-all {
      border-radius: 30px;
    }
  </style>
  <div class="container py-4">
    
    <!-- Hero Banner -->
    <div class="hero-banner">
      <img src="<?= base_url() ?>public/assets/images/snd_open_graph.webp" alt="Selamat datang di Kolektaria Sindikasi" class="img-fluid">
      
    </div>

    <!-- Card 1 -->
    <!--<div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title fw-bold">Perdana: Kolektiva Sindikasi 101</h5>
        <p class="card-text">
          Kolektiva Sindikasi adalah ruang belajar bersama untuk memahami dasar-dasar berorganisasi, hak pekerja, dan perjuangan kolektif. Di sini, kamu akan menemukan materi perkenalan yang membantumu memahami latar belakang pentingnya berserikat.
        </p>
      </div>
      <img src="https://via.placeholder.com/600x200?text=DIKSARSER" class="card-img-bottom" alt="Diksarser">
    </div> -->

    <!-- Card 2 -->
    <!-- <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title fw-bold">Selamat datang kawan-kawan!</h5>
        <p class="card-text">
          Kolektiva Sindikasi hadir sebagai ruang belajar bagi anggota baru untuk mengenal sejarah gerakan buruh, pentingnya kontrak kerja, dan praktik berserikat. Yuk pelajari bersama!
        </p>
      </div>
      <img src="https://via.placeholder.com/600x200?text=Union+Poster" class="card-img-bottom" alt="Union">
    </div> -->

    <!-- Card 3 -->
    <!-- <div class="card mb-4 shadow-sm">
      <div class="card-body">
        <h5 class="card-title fw-bold">Selamat datang kawan-kawan!</h5>
        <p class="card-text">
          Kami menyambut kamu di ruang ini. Di sini kita belajar bareng, berbagi cerita dan pengalaman seputar dunia kerja, serta berjejaring. Selamat belajar!
        </p>
      </div>
      <img src="https://via.placeholder.com/600x200?text=Ilustrasi+Anggota" class="card-img-bottom" alt="Ilustrasi Anggota">
    </div> -->

    <!-- Button -->
    <!-- <div class="text-center my-4">
      <a href="#" class="btn btn-outline-dark">Lihat semua materi</a>
    </div> -->

  </div>

<?= $this->endSection(); ?>