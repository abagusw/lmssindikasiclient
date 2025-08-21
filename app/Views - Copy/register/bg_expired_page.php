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
    <img src="<?= ASSETS_URL ?>login/error_link.png" alt="Aktivasi" class="success-icon">

    <h3 class="fw-bold mb-3">Tautan Kadaluwarsa!</h3>

    <p class="text-secondary mb-4">
      Maaf, tautan yang anda gunakan saat ini sudah tidak berlaku<br>
      Silahkan hubungi admin Sindikasi untuk meminta tautan baru agar anda dapat melanjutkan.
    </p>

<!--     <a href="http://localhost:8081/course_fe/set-password?accountregister=..." class="btn btn-orange">
      Atur kata kunci
    </a> -->
  </div>
</div>

</body>
</html>
