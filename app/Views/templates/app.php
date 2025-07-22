<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kolektaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 4 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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

    <?= $this->include('templates/sidebar'); ?>

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
        <?= $this->renderSection('content'); ?>

        <!-- Footer -->
        <div class="text-center footer mt-5">
          2025 © 🐝 Bersekut melawan sekat!
        </div>
      </div>
    </div>
  </div>
</div>



</body>
</html>
