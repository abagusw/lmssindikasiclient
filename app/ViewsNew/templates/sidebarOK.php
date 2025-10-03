
<?php
$nomor_anggota = session()->get('nomor_anggota');
?>
    <!-- Sidebar -->
    <div class="col-md-2 sidebar d-none d-md-block">
      <a href="<?= base_url() ?>"><h5 class="text-center mb-3">SINDIKASI</h5></a>
      <?php if($nomor_anggota == ""){
        ?>
      <div class="d-grid">
        <a href="<?= base_url() ?>" class="btn btn-dark mx-3 mb-2">Mulai sekarang!</a>
      </div><?php } ?>

      <div class="nav-label">LMS</div>
      <a href="<?= base_url() ?>linimasa/list" class="nav-link">Lini Masa</a>
      <?php if($nomor_anggota != ""){
        ?>

      <a href="<?= base_url() ?>course/list" class="nav-link">Course</a>
      <?php } ?>

      <?php if($nomor_anggota != ""){
        ?>
      <div class="nav-label">Payment</div>
      <a href="<?= base_url() ?>payment/index" class="nav-link">Pembayaran</a>
      <?php } ?>
      <!-- <div class="nav-label">Event</div>
      <a href="<?= base_url() ?>event/list" class="nav-link">Acara</a> -->

       <!-- <div class="nav-label">Membership</div>
      <a href="<?= base_url() ?>anggota/list" class="nav-link">Direktori Anggota</a> -->

      <div class="nav-label">Bantuan</div>
      <a href="#" class="nav-link">Dokumentasi</a>
      <a href="#" class="nav-link">Panduan</a>
    </div>