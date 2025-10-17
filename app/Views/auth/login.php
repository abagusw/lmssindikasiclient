<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Make sure to include this for Bootstrap Icons -->
  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      font-family: 'Segoe UI', sans-serif;
      margin-left: 1rem;
      margin-right: 1rem;
    }
    .login-container {
      max-width: 500px;
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
      display: none;
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
    .password-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="login-container">
  <!-- Form Login -->
  <div class="login-form">
    <center>
        <img src="<?= ASSETS_URL ?>login/logo_sindikasi.png" alt="Logo" width="120" class="mb-4">
        <h5>Masuk ke akun member</h5>
    </center>
    <form id="loginForm">
      <div class="mb-3 mt-4 position-relative">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda">
      </div>
      <div class="mb-3 position-relative">
        <label for="password" class="form-label">Kata Kunci</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata kunci">
        <div class="password-toggle" onclick="togglePassword()">
          <i class="bi bi-eye" id="eyeIcon"></i>
        </div>
        <div class="text-end mt-1">
          <a href="<?= base_url() ?>forget-password" class="small-text text-decoration-none">Lupa kata kunci?</a>
        </div>
      </div>
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-orange">Masuk</button>
      </div>
    </form>
    <div class="mt-3 text-muted">
      <span>Belum memiliki akun? <a href="<?= base_url() ?>register" class="text-decoration-none text-warning fw-semibold">Daftar</a></span>
    </div>
  </div>

  <!-- Ilustrasi -->
  <div class="login-image">
    <img src="<?= ASSETS_URL ?>login/logo_login.png" alt="Ilustrasi Login">
  </div>
</div>

<!-- Footer -->
<div class="text-center text-light small mt-4">
  Dengan mengklik lanjutkan, Anda menyetujui <a href="#" class="text-decoration-none text-light">Persyaratan Layanan</a> dan <a href="#" class="text-decoration-none text-light">Kebijakan Privasi</a> kami
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>

<script>
  function isValidEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
  }

  function togglePassword() {
    var passwordField = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');
    if (passwordField.type === "password") {
      passwordField.type = "text";
      eyeIcon.classList.remove("bi-eye");
      eyeIcon.classList.add("bi-eye-slash");
    } else {
      passwordField.type = "password";
      eyeIcon.classList.remove("bi-eye-slash");
      eyeIcon.classList.add("bi-eye");
    }
  }

  $('#loginForm').on('submit', function(e) {
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();

    if (email == "" || password == "") {
        $.ambiance({message: "Email atau password harus diisi !", type: "error", fade: false});
    } else if (!isValidEmail(email)) {
        $.ambiance({message: "Email tidak valid", type: "error", fade: false});
    } else {
        $.ajax({
            type: 'POST',
            data: {email: email, password: password, '<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('auth/cekLogin')?>",
            dataType: 'json',
            async: false,
            success: function(data) {
                if (data.respCode == 0) {
                    $.ambiance({message: data.respMessage, type: "success", fade: false});
                    top.location.href = "<?= base_url() ?>form-token-login?rsp=" + data.rsp;
                } else {
                    $.ambiance({message: data.respMessage, type: "error", fade: false});
                }
            }
        });
    }
  });
</script>

</body>
</html>
