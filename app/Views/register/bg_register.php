<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-container {
      max-width: 900px;
      margin: 60px auto;
      background-color: #fff;
      border-radius: 16px;
      overflow: hidden;
      display: flex;
      box-shadow: 0 0 30px rgba(0,0,0,0.2);
    }
    .login-form {
      flex: 1;
      padding: 40px;
    }
    .login-form input.form-control:focus {
      border-color: #f97316;
      box-shadow: 0 0 0 0.2rem rgba(249, 115, 22, 0.25);
    }
    .login-image {
      flex: 1;
      background-color: #f5f5f5;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-image img {
      max-width: 100%;
      height: auto;
    }
    .small-text {
      font-size: 0.9rem;
    }
    .btn-orange {
      background-color: #f97316;
      color: white;
    }
    .btn-orange:hover {
      background-color: #ea580c;
    }
  </style>
</head>
<body>

<div class="login-container">
  <!-- Form Login -->
  <div class="login-form">
    <center>
        <img src="<?= ASSETS_URL ?>login/logo_sindikasi.png" alt="Logo" width="120" class="mb-4">
        <h5>Berserikat melawan sekat!</h5>
    </center>
    <form>
      <div class="mb-3 mt-4">
        <label for="fullname" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukkan nama lengkap Anda">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Alamat email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email">
      </div>
      <div class="d-grid mt-4">
        <button type="button" onclick="inputFormRegiser()" class="btn btn-orange">Daftar</button>
      </div>
    </form>
    <div class="mt-3 text-muted">
      <p>
        <span>Sudah memiliki akun? <a href="<?=base_url()?>auth" class="text-decoration-none text-warning fw-semibold">Masuk</a></span>
      </p>
    </div>
  </div>

  <!-- Ilustrasi -->
  <div class="login-image">
    <img src="<?= ASSETS_URL ?>login/logo_register.png" alt="Ilustrasi Login">
  </div>
</div>

<!-- Footer -->
<div class="text-center text-light small mt-4">
  Dengan mengklik lanjutkan, Anda menyetujui <a href="#" class="text-decoration-none text-light">Persyaratan Layanan</a> dan <a href="#" class="text-decoration-none text-light">Kebijakan Privasi</a> kami
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  function inputFormRegiser(){
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        
        $.ajax({
            type: 'POST',
            data: {fullname:fullname,email:email},
            url: "<?php echo base_url('register/proseRegister')?>",
            async: false,
            success: function(response) {
              if(response == 1){
                alert("Email sudah pernah didaftarkan !, silahkan untuk menggunakan email lain");
              }else{
                top.location.href="<?= base_url() ?>form-register-next?token="+response;
              }
            }
        });
  }
</script>

