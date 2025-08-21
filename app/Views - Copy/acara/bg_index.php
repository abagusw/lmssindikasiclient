<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <style>
    body {
      background-color: #f5f5f5;
    }

    .event-card {
      border: 1px solid #ddd;
      border-radius: 1rem;
      padding: 1rem;
      background-color: #fff;
      margin-bottom: 1.5rem;
      display: flex;
      flex-wrap: wrap;
      align-items: flex-start;
      gap: 1rem;
    }

    .event-date {
      text-align: center;
      background-color: #ff5722;
      color: white;
      border-radius: 0.5rem;
      padding: 0.5rem 1rem;
      font-weight: bold;
      min-width: 60px;
    }

    .event-date .day {
      font-size: 1.5rem;
      line-height: 1;
    }

    .event-image {
      max-width: 120px;
      border-radius: 0.5rem;
      object-fit: cover;
    }

    .event-details {
      flex: 1;
    }

    .event-meta {
      font-size: 0.9rem;
      color: #666;
    }

    .event-title {
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 0.3rem;
    }

    .rsvp-badge {
      background-color: #ff5252;
      color: white;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      margin-left: 0.5rem;
    }

    .month-title {
      font-size: 1.2rem;
      font-weight: bold;
      margin: 2rem 0 1rem;
    }

    .filter-bar {
      margin-bottom: 2rem;
    }
  </style>
  <div class="container py-4">

    <!-- Filter -->
    <div class="filter-bar row align-items-center mb-4">
      <div class="col-md-4 mb-2">
        <select class="form-select">
          <option>Semua acara</option>
          <option>Akan datang</option>
          <option>Yang Berlalu</option>
        </select>
      </div>
      <div class="col-md-4 mb-2">
        <input type="text" class="form-control" placeholder="Masukkan kata kunci...">
      </div>
      <div class="col-md-4 mb-2">
        <select class="form-select">
          <option>Urutan: Terbaru</option>
          <option>Urutan: Terlama</option>
        </select>
      </div>
    </div>

    <!-- Bulan: Juni 2025 -->
    <div class="month-title">Juni 2025</div>

    <!-- Acara 1 -->
    <div class="event-card">
      <div class="event-date">
        <div class="day">28</div>
        <div class="month">Jun</div>
      </div>
      <img src="https://via.placeholder.com/120x90?text=Union+Hall" alt="Union Hall" class="event-image">
      <div class="event-details">
        <div class="event-meta">19:00 PM - 20:00 PM</div>
        <div class="event-title">Festival Solidaritas Buruh: Suara untuk Perubahan</div>
        <div class="event-desc">Peluang bertukar, dampak, dan cara mewujudkan kolaborasi berbasis gender demi menciptakan dunia kerja yang setara.</div>
        <div class="event-meta mt-1">📍 Online Event · <a href="#">meet.google.com/xxx</a></div>
      </div>
    </div>

    <!-- Acara 2 -->
    <div class="event-card">
      <div class="event-date">
        <div class="day">15</div>
        <div class="month">Jun</div>
      </div>
      <img src="https://via.placeholder.com/120x90?text=Workshop+Union" alt="Workshop" class="event-image">
      <div class="event-details">
        <div class="event-meta">19:00 PM - 20:00 PM</div>
        <div class="event-title">Workshop Peningkatan Keterampilan & Produktivitas Pekerja</div>
        <div class="event-desc">Belajar skill baru untuk keberlanjutan gender dan kerja yang setara.</div>
        <div class="event-meta mt-1">📍 Online Event · <a href="#">zoom.us/j/456LJskd90</a></div>
      </div>
    </div>

    <!-- Bulan: Mei 2025 -->
    <div class="month-title">Mei 2025</div>

    <!-- Acara 3 -->
    <div class="event-card">
      <div class="event-date">
        <div class="day">30</div>
        <div class="month">May</div>
      </div>
      <img src="https://via.placeholder.com/120x90?text=Diskusi+Publik" alt="Diskusi Publik" class="event-image">
      <div class="event-details">
        <div class="event-meta">19:00 PM - 20:00 PM <span class="rsvp-badge">RSVP</span></div>
        <div class="event-title">Diskusi Publik: Masa Depan Pekerja di Era Digital</div>
        <div class="event-desc">Refleksi, analisis data, dan mewujudkan keberadaan berbasis gender demi menciptakan tempat kerja yang lebih baik.</div>
        <div class="event-meta mt-1">📍 Live Event · OYO Hotel No. 666 Jakarta Pusat</div>
      </div>
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