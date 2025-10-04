<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aktivasi Akun Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .success-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 40px 20px;
    }
    .success-icon {
      width: 80px;
      height: 80px;
      margin-bottom: 20px;
    }
    .btn-orange {
      background-color: #f28c6a;
      color: #fff;
      border: none;
      border-radius: 999px;
      padding: 10px 30px;
      font-weight: 500;
      margin-top: 25px;
    }
    .btn-orange:hover {
      background-color: #e67856;
    }
  </style>
</head>
<body>

<div class="container success-container">
  <div>
    <img src="<?= ASSETS_URL ?>login/connection.png" alt="Aktivasi" class="success-icon">

    <h3 class="fw-bold mb-3">Atur password akun berhasil!</h3>

    <p class="text-secondary mb-4">
        Silakan login untuk melanjutkan proses pendaftaran.
    </p>

    <a href="<?= base_url() ?>" class="btn btn-orange">
      Login
    </a>
  </div>
</div>

</body>
</html>
