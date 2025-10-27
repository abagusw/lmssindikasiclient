<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verifikasi Token - Sindikasi Membership</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">

  <style>
    body {
      background-color: #fff;
    }
    .card-wrapper {
      max-width: 600px;
      margin: 60px auto;
      border-radius: 16px;
      text-align: center;
      padding: 30px;
    }
    .logo {
      width: 50px;
      margin-bottom: 1px;
    }
    .icon-img {
      width: 20%;
      margin: 20px 0;
    }
    .alert-box {
      border: 1px solid #ddd;
      border-left: 4px solid #0d6efd;
      background-color: #f9f9f9;
      padding: 20px;
      text-align: left;
      border-radius: 10px;
    }
    .btn-orange {
      background-color: #ff5c00;
      color: #fff;
      border-radius: 8px;
      padding: 10px 25px;
      font-weight: 500;
    }
    .btn-orange:hover {
      background-color: #e04f00;
    }
    .rounded-corner {
      border-radius: 20px;
    }

    /* Add padding to the input fields */
    .form-control {
      padding: 15px 20px; /* Added padding */
      font-size: 1rem;
    }

    .form-label {
      font-weight: bold;
    }

    /* Adjust button size */
    .btn-orange {
      padding: 12px 20px;
      font-size: 1rem;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="card-wrapper shadow rounded-corner">

    <!-- Logo -->
    <img src="<?= ASSETS_URL ?>login/logo_sindikasi.png" alt="Logo Sindikasi" class="logo">
    <br>

    <!-- Icon -->
    <img src="<?= ASSETS_URL ?>login/connection.png" alt="Icon Token" class="icon-img">

    <!-- Judul -->
    <h3 class="fw-bold">Verifikasi Token</h3>
    <p class="text-muted">Silakan masukkan token yang telah dikirim ke email Anda: <strong><?= $dataKey->email ?></strong></p>

    <!-- Form Token -->
    <form method="post" action="<?= base_url('auth/verifikasi-token') ?>" class="mt-4">
      <div class="mb-3 text-start">
        <label for="token" class="form-label">Token Verifikasi</label>
        <input type="text" class="form-control text-center fw-bold" id="token" name="token" placeholder="Contoh: 123456" required>
      </div>
      <input type="hidden" name="email" value="<?= $dataKey->email ?>">
      <button type="button" onclick="verifikasiTokenLogin()" class="btn btn-orange w-100">Verifikasi Token</button>
    </form>

    <!-- Info -->
    <div class="alert-box mt-4 mb-4">
      <h6 class="fw-bold"><i class="bi bi-info-circle-fill text-primary"></i> Belum menerima token?</h6>
      <p class="mb-0">
        Cek folder spam atau gunakan tombol di bawah ini untuk mengirim ulang token ke email <strong><?= $dataKey->email ?></strong>.<br><br>
      </p>
      <form>
        <input type="hidden" name="email" value="<?= $dataKey->email ?>">
        <button type="button" onclick="resendTokenLogin()" class="btn btn-outline-primary btn-sm">Kirim Ulang Token</button>
      </form>
    </div>

    <!-- Tombol -->
    <!-- <a href="<?= base_url('/') ?>" class="btn btn-outline-secondary w-100">Kembali ke Beranda</a> -->
  </div>
</div>

<!-- Bootstrap & Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>

<script>
  function isValidEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
  }

  function resendTokenLogin(){
        $.ajax({
            type: 'POST',
            data: {email:'<?= $dataKey->email ?>','<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('resend-token-login')?>",
            async: false,
            success: function(data) {
                $.ambiance({message: 'Token Berhasil dikirim !',
                    type: "success",
                    fade: false});
            }
        });
  }

  function verifikasiTokenLogin(){
    var token = $("#token").val();
        $.ajax({
            type: 'POST',
            data: {email:'<?= $dataKey->email ?>',token:token,'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('verifikasi-token-login')?>",
            async: false,
            dataType: 'JSON',
            success: function(response) {
              if(response.respCode == 0){
                top.location.href="<?php echo base_url('dashboard')?>";
                $.ambiance({message: "Login Sukses",
                  type: "success",
                  fade: false});
              }else if(response.respCode == 2){
                top.location.href="<?php echo base_url('payment/index')?>";
                $.ambiance({message: "Login Sukses",
                  type: "success",
                  fade: false});
              }else{
                $.ambiance({message: response.respMessage,
                  type: "error",
                  fade: false});
              }
            }
        });
  }
</script>
</body>
</html>
