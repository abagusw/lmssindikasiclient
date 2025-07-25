<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Materi Kolektaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f9fafb;
    }

    .topbar {
      background-color: white;
      border-bottom: 1px solid #ddd;
      padding: 0.75rem 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .sidebar {
      min-width: 260px;
      max-width: 300px;
      background-color: #fff;
      border-left: 1px solid #e5e7eb;
      height: 100vh;
      padding: 1.5rem;
      position: sticky;
      top: 72px;
      overflow-y: auto;
    }

    .main-content {
      padding: 2rem;
      background-color: #fff;
      border-radius: 12px;
      border: 1px solid #e5e7eb;
      margin-top: 2rem;
    }

    .text-orange {
      color: #f97316;
    }

    .text-orange:hover {
      color: #ea580c;
    }

    .btn-orange {
      background-color: #f97316;
      color: white;
    }

    .btn-orange:hover {
      background-color: #ea580c;
    }

    .active-materi {
      background-color: #f3f4f6;
      font-weight: bold;
      color: #111827;
    }
  </style>
</head>
<body>

<!-- TOPBAR -->
<div class="topbar d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center gap-3">
   <!--  <img src="<?= base_url('logo.png') ?>" alt="logo" height="32"> -->
    <strong class="me-3">🧩 kolektaria</strong>
    <span class="text-muted">Pendidikan Dasar Serikat</span>
    <a href="#" id="toggleSidebar" class="text-orange ms-4 small">Sembunyikan daftar materi</a>
  </div>
  <div class="d-flex align-items-center gap-3">
    <input type="text" class="form-control form-control-sm" placeholder="Search" style="width: 200px;">
    <img src="<?= base_url('user-avatar.png') ?>" alt="avatar" class="rounded-circle" width="32" height="32">
  </div>
</div>



<!-- MAIN SECTION -->
<div class="container-fluid">
  <div class="row">
    <!-- KONTEN -->
    <div class="col-lg-9 p-4">
      <div class="main-content">
        <p class="text-muted small">Materi 6 dari 6</p>
        <h4 class="fw-bold mb-4"><?= $getData['title']; ?></h4>

        <img src="<?= $getData['feature_image']; ?>" class="img-fluid rounded mb-4" alt="Ilustrasi">

        <?= $getData['html']; ?>

        <div class="text-center mt-5">
          <button class="btn btn-orange px-4 rounded-pill">Selesai dibaca</button>
        </div>
      </div>
    </div>

    <!-- SIDEBAR -->
    <div class="col-lg-3 border-start px-4" id="sidebarBox">
      <h6 class="fw-semibold mt-4 mb-3">Daftar Materi</h6>
      <div class="list-group list-group-flush small">
        <?php
      foreach($dataLesson as $lesson){
        $key = ApiKeyGhost; // Ganti dengan API key kamu
        $url = URLGhost."/ghost/api/content/posts/?key=$key&filter=uuid:[".$lesson['uuid']."]&limit=1";

        $client = \Config\Services::curlrequest();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);
        if (!empty($data['posts'][0])) {
            $title = $data['posts'][0]['title'];
            $slug = $data['posts'][0]['slug'];
           // echo 'Judul: ' . $title;
        } else {
          $slug = "N/A";
          $title = "N/A";
           // echo 'Data tidak ditemukan.';
        }
        ?>
        <a href="<?= base_url()?>materi/konten/<?= $data['posts'][0]['uuid'] ?>" class="list-group-item list-group-item-action"><i class="bi bi-check-circle-fill text-success me-2"></i><?= $title; ?></a>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

<script>
  const toggleSidebar = document.getElementById('toggleSidebar');
  const sidebarBox = document.getElementById('sidebarBox');

  toggleSidebar.addEventListener('click', function (e) {
    e.preventDefault();
    sidebarBox.classList.toggle('d-none');
    toggleSidebar.textContent = sidebarBox.classList.contains('d-none') ? 'Tampilkan daftar materi' : 'Sembunyikan daftar materi';
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
