<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atur Kata Kunci</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .password-box {
      max-width: 700px;
      margin: auto;
      padding: 30px 20px;
    }
    .security-tips {
      background-color: #f8f9fa;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 25px;
      border: 1px solid #e0e0e0;
    }
    .btn-orange {
      background-color: #f28c6a;
      color: #fff;
      border: none;
    }
    .btn-orange:hover {
      background-color: #e67856;
    }
    .input-icon {
      position: absolute;
      right: 10px;
      top: 70%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #aaa;
    }
  </style>
</head>
<body>

  <div class="container py-5">
    <div class="password-box text-center">
      <h4><strong>Atur Kata Kunci</strong></h4>
      <span class="badge bg-light text-dark mt-2 mb-4"><i class="bi bi-envelope"></i> <?= $dataKey->email; ?></span>

      <!-- Tips Keamanan -->
      <div class="security-tips text-start">
        <div class="d-flex align-items-start mb-2">
          <img src="<?= ASSETS_URL ?>login/setuppass.png" alt="Kunci" width="100" class="me-3">
          <div>
            <strong>Tips Keamanan</strong>
            <ul class="mb-0 ps-3 mt-2">
              <li class="text-secondary">Gunakan minimal 8 karakter</li>
              <li class="text-secondary">Kombinasikan huruf besar, huruf kecil, angka, dan simbol (opsional)</li>
              <li class="text-secondary">Jangan gunakan tanggal lahir atau informasi pribadi yang mudah ditebak</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Form Kata Kunci -->
      <div id="response-message"></div>
      <form id="form">
        <div class="mb-3 position-relative text-start">
          <label for="password" class="form-label">Kata kunci</label>
          <input type="password" class="form-control" id="password" name="password">
          <i class="bi bi-eye input-icon" onclick="togglePassword('password', this)"></i>
        </div>
        <div id="password-strength" class="mb-3"></div>
        <div class="mb-4 position-relative text-start">
          <label for="confirmPassword" class="form-label">Ulangi kata kunci</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
          <i class="bi bi-eye input-icon" onclick="togglePassword('confirmPassword', this)"></i>
        </div>

        <button type="submit" class="btn btn-orange w-100 rounded-pill">Simpan</button>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(inputId, icon) {
      const input = document.getElementById(inputId);
      const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
      input.setAttribute('type', type);
      icon.classList.toggle('bi-eye');
      icon.classList.toggle('bi-eye-slash');
    }
  </script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

  function checkPasswordStrength(password) {
    let strength = 0;
    let strengthText = '';
    let strengthColor = '';

    // Minimal 8 karakter
    if(password.length >= 8) strength++;

    // Huruf besar
    if(/[A-Z]/.test(password)) strength++;

    // Huruf kecil
    if(/[a-z]/.test(password)) strength++;

    // Angka
    if(/[0-9]/.test(password)) strength++;

    // Simbol
    if(/[^A-Za-z0-9]/.test(password)) strength++;

    // Tentukan teks dan warna
    switch(strength) {
      case 0:
      case 1:
      case 2:
        strengthText = 'Lemah';
        strengthColor = 'red';
        break;
      case 3:
      case 4:
        strengthText = 'Sedang';
        strengthColor = 'orange';
        break;
      case 5:
        strengthText = 'Kuat';
        strengthColor = 'green';
        break;
    }

    $('#password-strength').html(
      `<small style="color:${strengthColor}; font-weight:bold">Kekuatan Password: ${strengthText}</small>`
    );

    return strength;
  }

  // Cek kekuatan password saat mengetik
  $('#password').on('input', function() {
    const password = $(this).val();
    checkPasswordStrength(password);
  });

  $('#form').submit(function(e) {
    e.preventDefault();

    var password = $('#password').val();
    var confirm = $('#confirmPassword').val();
    var csrfName = '<?= csrf_token() ?>';
    var csrfHash = $('input[name="<?= csrf_token() ?>"]').val();
    var id       = <?= $dataKey->id; ?>;
    
    // Validasi frontend
    if (password != confirm) {
      $('#response-message').html('<div class="alert alert-danger">Password dan konfirmasi tidak sama!</div>');
      return;
    }

    $.ajax({
      url: "<?= base_url('register/simpan-password') ?>",
      method: "POST",
      data: {
        password: password,
        confirm_password: confirm,
        id: id,
        [csrfName]: csrfHash
      },
      dataType: "json",
      success: function(response) {
        if (response.status === 'success') {
          $('#response-message').html('<div class="alert alert-success">' + response.message + '</div>');
          top.location.href="<?php echo base_url('set-password-success')?>";

          $('#form')[0].reset();
        } else {
          $('#response-message').html('<div class="alert alert-danger">' + response.message + '</div>');
        }

        // Perbarui token CSRF jika dikirim
        if (response.csrf) {
          $('input[name="<?= csrf_token() ?>"]').val(response.csrf);
        }
      },
      error: function(xhr) {
        $('#response-message').html('<div class="alert alert-danger">Terjadi kesalahan server.</div>');
      }
    });
  });
</script>
</body>
</html>
