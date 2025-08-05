<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <style>
    body {
      background-color: #f8f9fa;
    }

    .profile-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      overflow: hidden;
      transition: transform 0.2s;
    }

    .profile-card:hover {
      transform: translateY(-5px);
    }

    .profile-img {
      width: 100%;
      height: 250px;
      object-fit: cover;
    }

    .profile-info {
      padding: 1rem;
    }

    .profile-info h6 {
      margin-bottom: 0.2rem;
      font-weight: bold;
    }

    .profile-info small {
      color: #6c757d;
    }

    .filter-bar {
      margin-bottom: 2rem;
    }
  </style>
  <div class="container py-4">

    <!-- Filter -->
    <div class="row filter-bar align-items-center">
      <div class="col-md-3 mb-2">
        <input type="text" class="form-control" placeholder="🔍 Search...">
      </div>
      <div class="col-md-3 mb-2">
        <select class="form-select">
          <option>Lokasi</option>
          <option>Jakarta</option>
          <option>Bandung</option>
        </select>
      </div>
      <div class="col-md-3 mb-2">
        <select class="form-select">
          <option>Profesi</option>
          <option>Product Manager</option>
          <option>Developer</option>
        </select>
      </div>
      <div class="col-md-3 mb-2">
        <select class="form-select">
          <option>Urutkan: A - Z</option>
          <option>Z - A</option>
        </select>
      </div>
    </div>

    <!-- Grid Anggota -->
    <div class="row g-4">
      <!-- Card Anggota -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="profile-card">
          <img src="https://randomuser.me/api/portraits/men/1.jpg" class="profile-img" alt="Profile">
          <div class="profile-info">
            <h6>Rifqi Fadh</h6>
            <small class="d-block">Product Owner</small>
            <small class="d-block text-muted">📍 Kota Bogor</small>
            <small class="d-block text-muted">🗓️ Bergabung Agustus 2024</small>
          </div>
        </div>
      </div>

      <!-- Duplikasi untuk contoh -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="profile-card">
          <img src="https://randomuser.me/api/portraits/women/1.jpg" class="profile-img" alt="Profile">
          <div class="profile-info">
            <h6>Maria Hermosa</h6>
            <small class="d-block">Business Development</small>
            <small class="d-block text-muted">📍 Yogyakarta</small>
            <small class="d-block text-muted">🗓️ Bergabung Agustus 2024</small>
          </div>
        </div>
      </div>

      <!-- Tambah card sebanyak yang dibutuhkan -->
      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="profile-card">
          <img src="https://randomuser.me/api/portraits/men/5.jpg" class="profile-img" alt="Profile">
          <div class="profile-info">
            <h6>Ngolo Kante</h6>
            <small class="d-block">Football Player</small>
            <small class="d-block text-muted">📍 Kota Depok</small>
            <small class="d-block text-muted">🗓️ Bergabung Agustus 2024</small>
          </div>
        </div>
      </div>

      <!-- Tambah lagi sesuai jumlah data... -->
    </div>

    <!-- Pagination -->
    <nav class="d-flex justify-content-center mt-4">
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>

  </div>

    <?= $this->endSection(); ?>