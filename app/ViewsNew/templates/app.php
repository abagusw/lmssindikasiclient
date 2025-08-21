<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generated Page</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Calistoga&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=ASSETS_URL?>assets_fe/global.css">
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


  </style>
  <script src="<?=ASSETS_URL?>assets_fe/global.js" defer></script>
</head>
<body>
<header id="header" class="top-header">
  <div class="logo-container">
    <img src="<?=ASSETS_URL?>assets_fe/images/9fcd3c04308bf53c70c2817d1712d6f94b733228.png" alt="Kolektaria Logo" class="logo-img">
    <span class="logo-text">kolektaria</span>
  </div>
  <div class="search-container">
    <img src="<?=ASSETS_URL?>assets_fe/images/I2178_165835_171_2594_152_2294.svg" alt="Search Icon" class="search-icon">
    <input type="text" placeholder="Search" class="search-input">
  </div>
  <div class="user-actions">
    <div class="action-icons">
      <a href="#" aria-label="Chat"><img src="<?=ASSETS_URL?>assets_fe/images/I2178_165838_208_27044.svg" alt="Chat"></a>
      <a href="#" aria-label="Notifications"><img src="<?=ASSETS_URL?>assets_fe/images/I2178_165839_208_27044.svg" alt="Notifications"></a>
    </div>
    <a href="#" aria-label="User Profile">
      <img src="<?=ASSETS_URL?>assets_fe/images/29c9e3543a0bc3d9befd55d562c0a441cf65ca65.png" alt="User Avatar" class="user-avatar">
    </a>
  </div>
</header>
<div id="main" class="main-layout">
  <?= $this->include('templates/sidebar'); ?>
  <main class="content-area">
      <?= $this->renderSection('content'); ?>

    <footer class="content-footer">
      <div class="footer-logo-group">
        <span>2025 © </span>
        <img src="<?=ASSETS_URL?>assets_fe/images/9fcd3c04308bf53c70c2817d1712d6f94b733228.png" alt="Sindikasi Logo" class="footer-logo">
      </div>
      <div class="footer-separator"></div>
      <span>Berserikat melawan sekat!</span>
    </footer>
  </main>
</div>
</body>
</html>