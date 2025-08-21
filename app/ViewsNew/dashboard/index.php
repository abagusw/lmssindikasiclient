<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <style id="sections-styles">
/* CSS for section section:header */
.site-header {
    background-color: var(--color-bg-white);
    border-bottom: 1px solid var(--color-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 24px;
    gap: 24px;
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
    font-family: 'Calistoga', serif;
    font-size: 20px;
    line-height: 20px;
    color: var(--color-text-dark);
  }
  .search-form {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: var(--color-bg-white);
    border: 1px solid var(--color-border);
    border-radius: 100px;
    padding: 10px 16px;
    flex-grow: 1;
    max-width: 320px;
  }
  .search-icon {
    width: 16px;
    height: 16px;
  }
  .search-input {
    border: none;
    outline: none;
    background: transparent;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: var(--color-text-light);
    width: 100%;
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
  .icon-button {
    background: transparent;
    border: none;
    padding: 6px;
    border-radius: 6px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .icon-button:hover {
    background-color: var(--color-bg-light);
  }
  .icon-button img {
    width: 16px;
    height: 16px;
  }
  .user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 8px;
  }

/* CSS for section section:notification */
.notification-bar {
    background-color: var(--color-bg-dark);
    padding: 12px 24px;
    text-align: center;
  }
  .notification-bar p {
    margin: 0;
    color: var(--color-text-white);
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
  }

/* CSS for section section:dashboard */
.dashboard-layout {
    display: flex;
  }
  .sidebar {
    width: 269px;
    background-color: var(--color-bg-white);
    border-right: 1px solid var(--color-border);
    padding: 16px 12px;
    box-sizing: border-box;
    flex-shrink: 0;
  }
  .sidebar-nav {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }
  .menu-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }
  .menu-group-title {
    font-size: 12px;
    font-weight: 500;
    line-height: 16px;
    color: var(--color-text-light);
    padding: 8px 12px;
    margin: 0;
  }
  .menu-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    color: var(--color-text-dark);
    transition: background-color 0.2s;
  }
  .menu-item:hover {
    background-color: var(--color-bg-light);
  }
  .menu-item.active {
    background-color: var(--color-text-dark);
    color: var(--color-text-white);
    font-weight: 500;
  }
  .menu-item.active img {
    filter: brightness(0) invert(1);
  }
  .menu-item img {
    width: 16px;
    height: 16px;
  }
  .main-content {
    flex-grow: 1;
    padding: 40px 48px;
    display: flex;
    flex-direction: column;
    gap: 32px;
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
  }
  .welcome-text p {
    margin: 0;
    font-size: 16px;
    line-height: 24px;
  }
  .payment-process {
    display: flex;
    gap: 0;
    box-shadow: 0px 1px 3px 0px rgba(0, 0, 0, 0.1), 0px 1px 2px 0px rgba(0, 0, 0, 0.06);
    border-radius: 24px;
  }
  .checklist-card {
    background-color: var(--color-bg-white);
    padding: 32px;
    border-radius: 24px 0 0 24px;
    border: 1px solid var(--color-border);
    border-right: none;
    display: flex;
    flex-direction: column;
    gap: 32px;
    flex-basis: 420px;
    flex-shrink: 0;
  }
  .checklist-header {
    display: flex;
    align-items: center;
    gap: 16px;
  }
  .checklist-header h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    line-height: 28px;
  }
  .checklist-icon-wrapper {
    border: 1px solid var(--color-border);
    border-radius: 8px;
    padding: 4px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .checklist-icon-wrapper img {
    width: 24px;
    height: 24px;
  }
  .checklist-items {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .checklist-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 500;
    line-height: 24px;
  }
  .checklist-item.selected {
    background-color: var(--color-bg-light);
  }
  .checklist-item img {
    width: 24px;
    height: 24px;
  }
  .payment-card {
    background-color: var(--color-bg-white);
    padding: 32px 40px;
    border-radius: 0 24px 24px 0;
    border: 1px solid var(--color-border);
    display: flex;
    flex-direction: column;
    gap: 24px;
    flex-grow: 1;
  }
  .payment-intro h3 {
    margin: 0 0 16px 0;
    font-size: 20px;
    font-weight: 600;
    line-height: 28px;
  }
  .payment-intro p {
    margin: 0;
    font-size: 16px;
    line-height: 24px;
    color: var(--color-text-light);
  }
  .payment-box {
    border: 1px solid var(--color-border);
    border-radius: 16px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    gap: 32px;
  }
  .payment-details {
    display: flex;
    flex-direction: column;
    gap: 24px;
  }
  .payment-details h4 {
    margin: 0;
    font-size: 18px;
    font-weight: 600;
    line-height: 28px;
  }
  .price {
    margin: 0;
    font-size: 36px;
    font-weight: 700;
    line-height: 40px;
  }
  .payment-button-container {
    position: relative;
    height: 44px;
    cursor: pointer;
  }
  .payment-button-bg-a, .payment-button-bg-b, .payment-button-bg-c {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    background-color: var(--color-primary);
  }
  .payment-button-bg-a {
    border: 1px solid var(--color-primary);
  }
  .payment-button-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: var(--color-text-white);
    font-size: 14px;
    font-weight: 500;
    line-height: 20px;
    white-space: nowrap;
  }
  .benefits-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .benefits-list li {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .benefits-list img {
    width: 24px;
    height: 24px;
  }
  .benefits-list p {
    margin: 0;
    font-size: 16px;
    line-height: 24px;
    color: var(--color-text-light);
  }
  .benefits-list p strong {
    font-weight: 600;
    color: var(--color-text-light);
  }

/* CSS for section section:footer */
.site-footer {
    background-color: var(--color-bg-white);
    border-top: 1px solid var(--color-border);
    padding: 20px 24px;
  }
  .site-footer-content {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    line-height: 20px;
    color: var(--color-text-dark);
  }
  .footer-copyright {
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
  </style>
    <section id="welcome-banner" class="welcome-banner">
      <img src="<?=ASSETS_URL?>assets_fe/images/fd3feb21b24afe6be4c58f8ca0b6efe733243138.png" alt="Welcome illustration" class="welcome-image">
      <div class="welcome-text">
        <h2>Selamat bergabung, Kawan!</h2>
        <p>Kamu resmi jadi bagian dari gerakan kolektif kita! Langkah awalmu dimulai di sini. Lakukan pembayaran awal, ikuti materi pelatihan dasar agar semakin paham tujuan kita bersama, dan nantinya kamu akan menerima ID anggota resmi.<br><br>Bersama kita kuat — ayo mulai perjalanan ini bersama!</p>
      </div>
    </section>
      <?php
      if($user_logged_in['isregisterpaid'] == 1){
        $iconPaid = "2178_165785";
        $ketPaid = "<div class='d-flex align-items-center'>
      <strong class='me-2'>Iuran Awal</strong>
      <span class='badge rounded-pill bg-success'>Lunas</span>
      </div>";
      }else{
        $iconPaid = "1846_153086";
        $ketPaid = "";
      }
      if($user_logged_in['isfoundationalcoursecomplete'] == 1){
        $iconFoundational = "2178_165785";
      }else{
        $iconFoundational = "1846_153086";
      }
  ?>
    <section id="payment-process" class="payment-process">
      <div class="checklist-card">
        <div class="checklist-header">
          <div class="checklist-icon-wrapper">
            <img src="<?=ASSETS_URL?>assets_fe/images/1840_152787.svg" alt="Checklist Icon">
          </div>
          <h3>Checklist Pengaturan</h3>
        </div>
        <div class="checklist-items">
          <div class="checklist-item selected">
            <img src="<?=ASSETS_URL?>assets_fe/images/<?= $iconPaid; ?>.svg" alt="Checkbox icon">
            <span>Pembayaran awal</span>
          </div>
          <div class="checklist-item">
            <img src="<?=ASSETS_URL?>assets_fe/images/<?= $iconFoundational; ?>.svg" alt="Checkbox icon">
            <span>Pendidikan dasar</span>
          </div>
        </div>
      </div>
      <div class="payment-card">
        <div class="payment-intro">
          <h3>Pembayaran Iuran Awal</h3>
          <p>Sebagai bentuk komitmen awal dan dukungan terhadap gerakan bersama, silakan lakukan pembayaran iuran awal. Iuran ini membantu mendukung operasional serikat dan memastikan setiap anggota mendapatkan akses penuh ke manfaat, pelatihan, dan kegiatan komunitas.</p>
        </div>
        <?php
          $tagihan = "<p class='price'>Rp. 75,000</p>";
            ?>
        <div class="payment-box">
          <?php if($user_logged_in['isregisterpaid'] == 1){
          ?>

          <?php }else{
            ?>
          <div class="payment-details">
            <h4>Iuran Awal</h4>
            <?=  $tagihan; ?>
            <!--merged image-->
            <div class="payment-button-container">
              <div class="payment-button-bg-a"></div>
              <div class="payment-button-bg-b"></div>
              <div class="payment-button-bg-c"></div>
              <a href="#" class="payment-button-text" id="<?= $idButton; ?>">Bayar sekarang</a>
            </div>
          </div>
           <?php } ?>
          <ul class="benefits-list">
            <li>
              <img src="<?=ASSETS_URL?>assets_fe/images/1846_152835.svg" alt="Checkmark">
              <p>Dapat mulai mengakses <strong>“Pendidikan Dasar Serikat”</strong> Sindikasi</p>
            </li>
            <li>
              <img src="<?=ASSETS_URL?>assets_fe/images/1846_152839.svg" alt="Checkmark">
              <p>Termasuk iuran wajib anggota selama 3 bulan</p>
            </li>
          </ul>
        </div>
      </div>
    </section>

<?= $this->endSection(); ?>