
<?php
$nomor_anggota = session()->get('nomor_anggota');
?>
    <!-- Sidebar -->
  <aside class="sidebar">
    <nav class="sidebar-nav">
      <div class="nav-group">
        <ul class="nav-list">
          <li class="nav-item"><a href="<?= base_url() ?>linimasa/list"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166561_208_27317_205_2607_204_2602.svg" alt="">Linimasa</a></li>
        </ul>
      </div>
      <?php if($nomor_anggota != ""){
        ?>
      <div class="nav-group">
        <h3 class="nav-group-title">LMS</h3>
        <ul class="nav-list">
          <li class="nav-item"><a href="<?= base_url() ?>course/list"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166566_264_4496_208_27317_205_2607_204_2602.svg" alt="">Course</a></li>
        </ul>
      </div>
      <?php } ?>
      <?php if($nomor_anggota != ""){
        ?>
      <div class="nav-group">
        <h3 class="nav-group-title">Payment</h3>
        <ul class="nav-list">
          <li class="nav-item"><a href="<?= base_url() ?>payment/index"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166567_264_4496_208_27317_205_2607_204_2602.svg" alt="">Pembayaran</a></li>
        </ul>
      </div>
      <?php } ?>
      <div class="nav-group">
        <h3 class="nav-group-title">Event</h3>
        <ul class="nav-list">
          <li class="nav-item"><a href="<?= base_url() ?>event/list"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166568_264_4496_208_27317_205_2607_204_2602.svg" alt="">Acara</a></li>
        </ul>
      </div>
      <div class="nav-group">
        <h3 class="nav-group-title">Membership</h3>
        <ul class="nav-list">
          <li class="nav-item"><a href="<?= base_url() ?>anggota/list"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166569_264_4496_208_27317_205_2607_204_2602.svg" alt="">Direktori Anggota</a></li>
        </ul>
      </div>
      <div class="nav-group">
        <h3 class="nav-group-title">Bantuan</h3>
        <ul class="nav-list">
          <li class="nav-item"><a href="#"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166570_264_4496_208_27317_205_2607_204_2602.svg" alt="">Dokumentasi</a></li>
          <li class="nav-item"><a href="#"><img src="<?= ASSETS_URL ?>assets_fe/images/I2178_166570_264_4589_208_27317_205_2607_204_2602.svg" alt="">Panduan</a></li>
        </ul>
      </div>
    </nav>
  </aside>

    