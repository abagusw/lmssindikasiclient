<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atur Kata Kunci</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #fff;
      font-family: 'Segoe UI', sans-serif;
    }
    .password-box {
      max-width: 500px;
      margin: auto;
      padding: 30px 20px;
    }
    .security-tips {
      background-color: #f8f9fa;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 25px;
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
      top: 50%;
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
      <span class="badge bg-light text-dark mt-2 mb-4"><i class="bi bi-envelope"></i> sutamichaerul@gmail.com</span>

      <div class="security-tips text-start">
        <div class="d-flex align-items-center mb-2">
          <img src="https://em-content.zobj.net/thumbs/120/apple/354/mechanic_1f9d1-200d-1f527.png" width="40" alt="emoji" class="me-2">
          <strong>Tips Keamanan</strong>
        </div>
        <ul class="mb-0 ps-3">
          <li>Gunakan minimal 8 karakter</li>
          <li>Kombinasikan huruf besar, huruf kecil, angka, dan simbol (opsional)</li>
          <li>Jangan gunakan tanggal lahir atau informasi pribadi yang mudah ditebak</li>
        </ul>
      </div>

      <form>
        <div class="mb-3 position-relative text-start">
          <label for="password" class="form-label">Kata kunci</label>
          <input type="password" class="form-control border-danger" id="password">
          <i class="bi bi-eye input-icon"></i>
        </div>

        <div class="mb-4 position-relative text-start">
          <label for="confirmPassword" class="form-label">Ulangi kata kunci</label>
          <input type="password" class="form-control" id="confirmPassword">
          <i class="bi bi-eye input-icon"></i>
        </div>

        <button type="submit" class="btn btn-orange w-100 rounded-pill">Simpan</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.js"></script>
</body>
</html>