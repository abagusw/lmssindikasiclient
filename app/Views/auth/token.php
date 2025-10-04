<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Token Login - Sindikasi Membership</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f3f3f3;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 40px auto;
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .title {
      font-size: 24px;
      font-weight: bold;
      color: #343a40;
      margin-bottom: 20px;
    }
    .token-box {
      font-size: 28px;
      background-color: #f1f3f5;
      padding: 16px;
      text-align: center;
      border-radius: 8px;
      letter-spacing: 2px;
      font-weight: bold;
      color: #212529;
      margin-bottom: 20px;
    }
    .note {
      font-size: 14px;
      color: #6c757d;
      margin-top: 10px;
    }
    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 13px;
      color: #adb5bd;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="title">Token Login Anda</div>
    <p>Gunakan token berikut untuk login ke aplikasi <strong>Membership SINDIKASI</strong>:</p>

    <div class="token-box"><?= $token; ?></div>

    <p class="note">Token ini hanya berlaku sampai dengan tanggal <?= date('d-m-Y H:i:s', strtotime($exp_date)) ?> Jangan berikan token ini kepada siapa pun.</p>

    <div class="footer">
      &copy; 2025 Membership SINDIKASI. Semua hak dilindungi.
    </div>
  </div>
</body>
</html>