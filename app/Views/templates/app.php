<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SINDIKASI</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>
<!--   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Bootstrap 4 JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <link rel="stylesheet" href="<?= ASSETS_URL ?>assets_fe/bundle.css?v=1"> -->
<!-- Baru stylesheet kamu -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="<?=ASSETS_URL?>assets_fe/global.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



  <style id="sections-styles">
/* CSS for section section:header */
.top-header {
    background-color: var(--color-surface);
    border-bottom: 1px solid var(--color-border);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px;
    flex-wrap: wrap;
  }

  .logo-container {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .logo-img {
    width: 35px;
    height: 32px;
  }

  .logo-text {
    font-family: var(--font-display);
    font-size: 20px;
    line-height: 1;
  }

  .search-container {
    flex-grow: 1;
    max-width: 320px;
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: 100px;
    padding: 10px 16px;
    box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.06);
  }

  .search-icon {
    width: 16px;
    height: 16px;
  }

  .search-input {
    border: none;
    outline: none;
    background: transparent;
    width: 100%;
    font-size: 14px;
    color: var(--color-text-secondary);
  }
  .search-input::placeholder {
    color: var(--color-text-secondary);
  }

  .user-actions {
    display: flex;
    align-items: center;
    gap: 24px;
  }

  .action-icons {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .action-icons a {
    padding: 6px;
  }
  .action-icons img {
    width: 16px;
    height: 16px;
  }

  .user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 8px;
  }
  
  @media (max-width: 768px) {
    .top-header {
      flex-direction: column;
      align-items: stretch;
    }
    .search-container {
      max-width: 100%;
    }
  }

/* CSS for section section:main */
.main-layout {
    display: flex;
    flex-direction: column;
  }

  .sidebar {
    background-color: var(--color-surface);
    border-right: 1px solid var(--color-border);
    padding: 16px 12px;
    display: none; /* Hidden on mobile by default */
  }

  .sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .nav-group {
    padding: 8px;
  }

  .nav-group-title {
    font-size: 12px;
    font-weight: 500;
    color: var(--color-text-secondary);
    padding: 8px 12px;
    margin-bottom: 4px;
  }

  .nav-list {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .nav-item a {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 400;
    color: var(--color-text-primary);
  }
  .nav-item a:hover {
    background-color: var(--color-background);
  }
  .nav-item.active a {
    background-color: var(--color-text-primary);
    color: var(--color-text-on-dark);
    font-weight: 500;
  }
  .nav-item.active img {
    filter: brightness(0) invert(1);
  }

.content-area {
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 24px;
    overflow-y: auto;
    background-color: #f3f3f3; /* Add a white background */
    border-radius: 8px; /* Optional: rounded corners */
    border: 1px solid #ddd; /* Soft border to differentiate it */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

  .content-header {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    padding: 20px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    flex-wrap: wrap;
  }

  .content-title-group {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-grow: 1;
  }
  .back-button img {
    width: 24px;
    height: 24px;
  }
  .content-title {
    font-size: 20px;
    font-weight: 600;
    line-height: 28px;
  }

  .btn-primary {
    background-color: var(--color-primary);
    color: var(--color-text-on-dark);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    padding: 10px 16px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
  }

  .card {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    border-radius: 16px;
    padding: 32px;
    box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.06);
    position: relative;
  }
  .card-indicator {
    position: absolute;
    left: 0;
    top: 32px;
    width: 4px;
    height: 28px;
    background-color: var(--color-text-primary);
    border-radius: 0px 8px 8px 0px;
  }
  .card-content {
    display: flex;
    flex-direction: column;
    gap: 12px;
    padding-left: 32px;
  }
  .card-title {
    font-size: 18px;
    font-weight: 600;
    line-height: 28px;
  }

  .progress-summary {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .progress-description {
    font-size: 16px;
    line-height: 24px;
  }
  .progress-percentage {
    font-size: 16px;
    font-weight: 600;
    line-height: 24px;
  }
  .progress-bar-container {
    background-color: var(--color-background);
    border-radius: 100px;
    height: 16px;
    overflow: hidden;
    margin-top: 12px;
  }
  .progress-bar-track {
    background-color: var(--color-text-primary);
    height: 100%;
  }

  .materials-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
  }
  .materials-info {
    font-size: 14px;
    color: var(--color-text-tertiary);
    display: flex;
    gap: 16px;
  }

  .materials-list {
    display: flex;
    flex-direction: column;
  }
  .material-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px;
    border: 1px solid var(--color-border);
    margin-top: -1px;
    font-size: 16px;
    line-height: 24px;
  }
  .material-item:first-child {
    border-radius: 12px 12px 0 0;
    margin-top: 0;
  }
  .material-item:last-child {
    border-radius: 0 0 12px 12px;
  }
  .item-details {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .item-duration {
    color: var(--color-text-tertiary);
  }

  .content-footer {
    background-color: var(--color-surface);
    border: 1px solid var(--color-border);
    padding: 20px 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    margin-top: auto;
  }
  .footer-logo-group {
    display: flex;
    align-items: center;
    gap: 4px;
  }
  .footer-logo {
    width: 26px;
    height: 24px;
  }
  .footer-separator {
    width: 1px;
    height: 16px;
    background-color: var(--color-border);
  }

  @media (min-width: 1024px) {
    .main-layout {
      display: grid;
      grid-template-columns: 269px 1fr;
      grid-template-areas: "sidebar content";
    }
    .sidebar {
      grid-area: sidebar;
      display: block;
    }
    .content-area {
      grid-area: content;
    }
  }
  
  @media (max-width: 768px) {
    .content-header {
        flex-direction: column;
        align-items: flex-start;
    }
    .material-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    .content-footer {
        flex-direction: column;
    }
  }

  .notification-bar {
    background: var(--color-bg-dark, #111827); 
    padding: 12px 24px;
    text-align: center;
  }
  .notification-bar p {
    margin: 0;
    color: var(--color-text-white, #ffffff);
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
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

    .active-card {
      border: 2px solid #f97316 !important;
      background-color: #fff7ed;
    }
    .btn-orange {
      background-color: #f97316;
      color: white;
    }
    .btn-orange:hover {
      background-color: #ea580c;
    }
    .next-payment {
      background-color: #fff;
      border-left: 4px solid #f97316;
    }
    .badge-success {
      background-color: #16a34a;
    }

  /* ==== FIX SIDEBAR NAV ==== */
  .sidebar-nav{display:flex;flex-direction:column;gap:8px;padding:12px}
  .sidebar-nav ul{list-style:none;margin:0;padding:0}

  /* label grup */
  .sidebar-nav .menu-group-title{
    margin:12px 0 6px 8px;
    font-size:12px;font-weight:500;color:#6b7280;line-height:1.2;
  }

  /* item */
  .sidebar-nav .menu-item{
    display:flex;align-items:center;gap:10px;
    padding:8px 12px;border-radius:8px;text-decoration:none;
    color:#111827;line-height:1.4; /* cegah tinggi baris kebesaran */
  }
  .sidebar-nav .menu-item:hover{background:#f5f5f5}
  .sidebar-nav .menu-item.active{background:#111827;color:#fff;font-weight:500}

  /* ikon – kunci ulang supaya tidak ketimpa reset di global.css */
  .sidebar-nav .menu-item .bi{
    font-family:"bootstrap-icons" !important;
    font-style:normal;font-weight:normal;line-height:1;display:inline-block;
    font-size:16px; width:16px; min-width:16px; text-align:center;
  }

  /* kalau ada img ikon */
  .sidebar-nav .menu-item img{width:16px;height:16px}

  /* spasi antar grup */
  .sidebar-nav .menu-group{margin-bottom:6px}

.logo-link {
  display: flex;
  align-items: center; /* bikin img & text rata tengah */
  text-decoration: none; /* biar ga ada underline */
}

.logo-img {
  height: 40px;   /* atur sesuai ukuran */
  margin-right: 8px;
}

.logo-text {
  font-size: 20px;
  color: #333;   /* contoh warna */
}

 .welcome-banner {
    background: linear-gradient(176deg, rgba(39, 39, 42, 0.8) 0%, #27272a 128.27%);
    border-radius: 24px;
    padding: 32px;
    display: flex;
    align-items: center;
    gap: 32px;
    color: var(--color-text-white);
  }
  .welcome-image {
    width: 127px;
    height: 127px;
    border-radius: 6px;
    flex-shrink: 0;
  }
  .welcome-text h2 {
    margin: 0 0 4px 0;
    font-size: 20px;
    font-weight: 600;
    line-height: 28px;
    color:#ffffff;
  }
  .welcome-text p {
    margin: 0;
    font-size: 16px;
    line-height: 24px;
    color:#ffffff;
  }




  </style>
<style>
  /* Sidebar rapi saat ≥ lg */
  @media (min-width: 992px) {
    #sidebarNav.offcanvas-lg {
      position: static !important;
      transform: none !important;
      visibility: visible !important;
      border-right: 1px solid rgba(0,0,0,.075);
      width: 260px; /* Lebih sempit */
      max-width: 260px;
      background-color: #fff; /* Tambahkan background putih */
    }

}
     /* Tambahkan background putih saat sidebar tertutup di mobile */

     #sidebarNav.offcanvas-lg {
    background-color: white !important;
    }

</style>



</head>
<body>
  <?php
  $session = service('session');
  ?>
<!-- <header class="border-bottom d-flex align-items-center justify-content-between px-3 py-2">
  <button class="btn btn-outline-secondary d-lg-none" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-label="Toggle menu">
    ☰
  </button>
</header> -->
<header id="header" class="top-header border-bottom d-flex align-items-center justify-content-between px-3 py-2">
    <button class="btn btn-outline-secondary d-lg-none" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#sidebarNav" aria-controls="sidebarNav" aria-label="Toggle menu">
    ☰
  </button>
  <div class="logo-container">
    <a href="<?= base_url() ?>" class="logo-link">
      <img src="<?= ASSETS_URL ?>assets_fe/images/9fcd3c04308bf53c70c2817d1712d6f94b733228.png" 
           alt="Kolektaria Logo" 
           class="logo-img">
      <span class="logo-text">SINDIKASI</span>
    </a>
  </div>
  <div class="search-container">
    <img src="<?= ASSETS_URL ?>assets_fe/images/I2178_165835_171_2594_152_2294.svg" alt="Search Icon" class="search-icon">
    <input type="text" placeholder="Search" class="search-input">
  </div>
  <div class="user-actions">
<!--     <div class="action-icons">
      <a href="#" aria-label="Chat"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_165838_208_27044.svg" alt="Chat"></a>
      <a href="#" aria-label="Notifications"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_165839_208_27044.svg" alt="Notifications"></a>
    </div> -->
    <a href="#" aria-label="User Profile" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="<?= ASSETS_URL ?>assets_fe/images/29c9e3543a0bc3d9befd55d562c0a441cf65ca65.png" alt="User Avatar" class="user-avatar">
    </a>
    <ul class="dropdown-menu dropdown-menu-end text-small shadow" aria-labelledby="dropdownUser">

      <!-- Detail user -->
      <li class="dropdown-header">
        <strong><?= esc($session->get('nama_lengkap')); ?></strong><br>
        <small class="text-muted"><?= esc($session->get('profesi')); ?></small>
      </li>

      <li><hr class="dropdown-divider"></li>

      <!-- Menu -->
      <li><a class="dropdown-item" href="<?= base_url(); ?>user/profile">Profile</a></li>
      <!-- <li><a class="dropdown-item" href="#">Settings</a></li> -->
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item text-danger" href="<?= base_url(); ?>auth/logout">Logout</a></li>
    </ul>
  </div>
</header>
      <?php
if($user['isregisterpaid'] <> 1){
  ?>
<section id="notification" class="notification-bar">
  <p>Kamu belum membayar iuran awal. Segera lakukan pembayaran agar dapat mulai mengakses portal Sindikasi secara lengkap</p>
</section>
<?php } ?>

<div id="main" class="main-layout">
  <?= $this->include('templates/sidebar'); ?>

  <main class="content-area">
  <?= $this->renderSection('content'); ?>

    <footer class="content-footer">
      <div class="footer-logo-group">
        <span>2025 © </span>
        <img src="<?= ASSETS_URL ?>assets_fe/images/9fcd3c04308bf53c70c2817d1712d6f94b733228.png" alt="Sindikasi Logo" class="footer-logo">
      </div>
      <div class="footer-separator"></div>
      <span>Berserikat melawan sekat!</span>
    </footer>
  </main>
</div>
</body>
</html>