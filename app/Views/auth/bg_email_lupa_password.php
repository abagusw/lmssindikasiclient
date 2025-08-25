<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reset Your Password</title>
  <style>
    .button {
      display: inline-block;
      padding: 12px 24px;
      font-size: 16px;
      color: #ffffff;
      background-color: #007bff;
      text-decoration: none;
      border-radius: 6px;
    }
    .container {
      max-width: 600px;
      margin: auto;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      border: 1px solid #e0e0e0;
      border-radius: 10px;
    }
    .footer {
      margin-top: 30px;
      font-size: 12px;
      color: #888888;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Atur Ulang Password</h2>
  <p>Halo, <?= esc($nama_lengkap) ?></p>
  <p>Kami menerima permintaan untuk mengatur ulang password akun Anda. 
     Silakan klik tombol di bawah ini untuk membuat password baru.</p>
  <p style="margin: 30px 0;">
    <a href="<?= base_url() ?>set-password?accountregister=<?= $ciphertext; ?>" class="cta-button">Buat Password</a>
  </p>
  <p>Apabila Anda tidak merasa melakukan permintaan ini, abaikan halaman ini atau hubungi tim support kami.</p>
  <p class="footer">Demi keamanan, tautan ini hanya berlaku selama 24 jam.</p>
</div>

</body>
</html>