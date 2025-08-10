  <!-- Header -->
<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
   .profile-header {
      background-image: url('<?= base_url("public/assets/images/keyboard.png"); ?>');
      background-size: cover;
      background-position: center;
      height: 180px;
      position: relative;
    }

    .profile-avatar {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
      border: 3px solid white;
      position: absolute;
      bottom: -50px;
      left: 20px;
    }

    .profile-info {
      margin-left: 140px;
    }

    .badge-role {
      background-color: #6610f2;
    }

    .section-box {
      background-color: white;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .section-header {
      background-color: #333;
      color: white;
      padding: 10px 15px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .form-section {
      margin-bottom: 40px;
    }
    .form-control:invalid {
      /*border-color: #dc3545;*/
    }
    .form-text-error {
      color: #dc3545;
      font-size: 0.875em;
    }
    .section-box {
      max-width: 900px;
      margin: 30px auto;
      background: #fff;
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .section-title {
      background-color: #1f1f1f;
      color: #fff;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: 600;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }

    .section-title i {
      margin-right: 10px;
    }

    .card-radio {
      border: 1.5px solid #f97316;
      border-radius: 12px;
      padding: 15px 20px;
      position: relative;
      transition: 0.3s;
      cursor: pointer;
      height: 100%;
    }

    .card-radio:hover {
      background-color: #fff8f0;
    }

    .card-radio input[type="radio"] {
      position: absolute;
      top: 15px;
      right: 15px;
      transform: scale(1.3);
    }

    .card-radio .title {
      font-weight: bold;
      color: #dc2626;
    }

    .required-note {
      font-size: 0.85rem;
      color: #dc2626;
      margin-top: 5px;
    }

    .btn-orange-outline {
      border: 2px solid #f97316;
      color: #f97316;
      background-color: white;
      border-radius: 12px;
      font-weight: 500;
    }

    .btn-orange-outline:hover {
      background-color: #fff3e0;
      color: #f97316;
    }

    .btn-orange {
      background-color: #f97316;
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: 500;
    }

    .btn-orange:hover {
      background-color: #ea580c;
    }

    .section-card {
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      padding: 20px;
      background-color: #fff;
      margin-bottom: 20px;
    }
    .section-title {
      font-weight: bold;
      margin-bottom: 15px;
    }
    .tag {
      background-color: #f1f1f1;
      border-radius: 20px;
      padding: 5px 12px;
      margin-right: 5px;
      font-size: 14px;
      display: inline-block;
    }
    .experience-item,
    .education-item {
      border: 1px solid #e5e5e5;
      border-radius: 8px;
      padding: 10px 15px;
      margin-bottom: 10px;
      background-color: #fafafa;
    }
    .btn-add {
      color: #ff5722;
      font-weight: bold;
      background: none;
      border: none;
    }
    .btn-add:hover {
      text-decoration: underline;
    }
    .card-kta {
        background: linear-gradient(145deg, #111, #222);
        color: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        width: 260px;
        margin: auto;
        position: relative;
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    .card-kta h5 {
        margin-top: 20px;
        font-weight: bold;
    }
    .card-kta p {
        margin: 5px 0;
    }
    .side-text {
        position: absolute;
        left: -45px;
        top: 50%;
        transform: translateY(-50%) rotate(-90deg);
        font-weight: bold;
        font-size: 1.2rem;
        letter-spacing: 2px;
        color: rgba(255,255,255,0.2);
    }
    .info-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background: #f8f9fa;
    }
  </style>
  <div class="profile-header">
    <img src="<?= base_url() ?>public/assets/images/user.avif" class="profile-avatar" alt="Avatar">
  </div>

  <!-- Main Content -->
  <div class="container mt-5 pt-4">
    <!-- Nama dan Role -->
    <div class="d-flex align-items-start mb-4">
      <div class="profile-info">
        <h4 class="mb-1"><?= $user_logged_in['nama_lengkap']; ?> <span class="badge badge-role text-white">Aktif</span></h4>
        <small class="text-muted"><?= $user_logged_in['profesi']." — ". $getCityById['name']." — Bergabung ".date('M Y', strtotime($user_logged_in['approval_date']))?></small>
      </div>
      <div class="ms-auto">
        <button class="btn btn-warning btn-sm"> Simpan Profil</button>
      </div>
    </div>

      <div class="row">
        <!-- Sidebar -->
          <div class="col-lg-3 mb-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" 
                   id="list-personal-list" data-bs-toggle="list" 
                   href="#list-personal" role="tab">Data Personal</a>
                <a class="list-group-item list-group-item-action" 
                   id="list-profils-list" data-bs-toggle="list" 
                   href="#list-profils" role="tab">Data Profil</a>
                <a class="list-group-item list-group-item-action" 
                   id="list-tanda-list" data-bs-toggle="list" 
                   href="#list-tanda" role="tab">Data Tanda Anggota</a>
                <a class="list-group-item list-group-item-action" 
                   id="list-password-list" data-bs-toggle="list" 
                   href="#list-password" role="tab">Atur Kata Kunci</a>
                <a class="list-group-item list-group-item-action" 
                   id="list-otentikasi-list" data-bs-toggle="list" 
                   href="#list-otentikasi" role="tab">Otentikasi</a>
            </div>
          </div>

          <div class="col-lg-9">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-personal" role="tabpanel">
                <p>
                  <div class="section-header">📄 Data Pribadi</div>
                  <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label required">Nama lengkap</label>
                          <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $user_logged_in['nama_lengkap'] ?>" required>
                          <div class="form-text-muted">Sesuai dengan yang tertera di KTP</div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Nama panggilan <small>(opsional)</small></label>
                          <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control">
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Nama anggota yang mereferensikan <small>(opsional)</small></label>
                          <input type="text" name="referensi" id="referensi" class="form-control">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label required">Alamat email</label>
                          <input type="email" name="email" id="email" class="form-control" value="<?= $user_logged_in['email'] ?>" required>
                          <div class="form-text-muted">Contoh: namakamu@gmail.com</div>
                          <div class="form-text-muted text-warning">Pastikan anda menggunakan alamat email yang valid karena proses aktivasi akan dilakukan melalui email</div>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label required">Nomor ponsel</label>
                          <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="tel" name="telp" id="telp" class="form-control" placeholder="Type here" required>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label required">Gender</label>
                          <select class="form-select" name="gender" id="gender" required>
                            <option selected disabled>Pilih</option>
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label required">Kota kelahiran</label>
                          <select class="form-select" name="kota_kelahiran" id="kota_kelahiran" required>
                            <option selected disabled>Pilih</option>
                          <?php 
                              foreach($getCity as $city){
                                echo"
                              <option value=".$city['id'].">".$city['name']."</option>";}
                          ?>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="form-label required">Tanggal lahir</label>
                          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label required">Kota domisili</label>
                          <select class="form-select" name="kota_domisili" id="kota_domisili" required>
                            <option selected disabled>Pilih</option>
                            <?php 
                              foreach($getCity as $city){
                                echo"
                              <option value=".$city['id'].">".$city['name']."</option>";}
                            ?>
                          </select>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label required">Pendidikan terakhir</label>
                          <select class="form-select" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                            <option selected disabled>Pilih</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label required">Nama instansi pendidikan</label>
                          <input type="text" name="nama_instansi_pendidikan" id="nama_instansi_pendidikan" class="form-control" placeholder="Ketik di sini" required>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Pengalaman organisasi <small>(opsional)</small></label>
                          <textarea name="pengalaman_organisasi" id="pengalaman_organisasi" class="form-control" rows="3" maxlength="200" placeholder="Tulis pengalaman organisasi jika ada"></textarea>
                          <div class="form-text text-end"><small>0/200</small></div>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Disabilitas <small>(opsional)</small></label>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna netra" id="netra">Tuna Netra</div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna rungu" id="rungu">Tuna rungu</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna grahita" id="grahita">Tuna grahita</label></div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna laras" id="laras">Tuna laras</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna wicara" id="wicara">Tuna wicara</label></div>
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Spektrum autisme" id="spektrum">Spektrum autisme</label></div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Lainnya" id="lainnya">Lainnya</label></div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Jenis disabilitas lainnya</label>
                          <input type="text" class="form-control" id="disabilitas_lainnya" name="disabilitas_lainnya" placeholder="Ketik di sini">
                        </div>

                  </div>
                </p>
              </div>

              <div class="tab-pane fade" id="list-profils" role="tabpanel">
                  <div class="section-header">Data Profil</div>
                  <div class="mb-3">
                    <label class="form-label">Bahasa yang dikuasai</label>
                    <input type="text" class="form-control" placeholder="Contoh: Indonesia, English, French">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Biografi</label>
                    <textarea class="form-control" rows="3" placeholder="Tulis biografi singkat..."></textarea>
                  </div>
                  <!-- Keahlian -->
                  <div class="section-card">
                    <div class="section-title">Keahlian</div>
                    <div class="mb-3">
                      <input type="text" class="form-control" placeholder="Tambahkan keahlian...">
                    </div>
                    <div>
                      <span class="tag">Product Design</span>
                      <span class="tag">UX Design</span>
                      <span class="tag">UI Design</span>
                    </div>
                  </div>

                  <!-- Pengalaman -->
                  <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="section-title">Pengalaman</div>
                      <button class="btn-add">+ Tambah pengalaman</button>
                    </div>
                    <div class="experience-item">
                      <strong>Lead UI/UX Designer</strong> <span class="text-muted">(2020 - Sekarang)</span>
                    </div>
                    <div class="experience-item">
                      <strong>Freelance UI/UX Designer</strong> <span class="text-muted">(2018 - 2020)</span>
                    </div>
                  </div>

                  <!-- Pendidikan -->
                  <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="section-title">Pendidikan</div>
                      <button class="btn-add">+ Tambah pendidikan</button>
                    </div>
                    <div class="education-item">
                      <strong>Sarjana - Teknik Informatika</strong> <span class="text-muted">(2015 - 2019)</span>
                    </div>
                    <div class="education-item">
                      <strong>Diploma III - Engineering</strong> <span class="text-muted">(2012 - 2015)</span>
                    </div>
                  </div>

                  <!-- Media Sosial -->
                  <div class="section-card">
                    <div class="section-title">Media Sosial</div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label">Link Instagram (pilihan)</label>
                          <input type="text" id="link_instagram" name="link_instagram" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Link X (Twitter) (pilihan)</label>
                          <input type="text" id="link_twitter" name="link_twitter" class="form-control">
                        </div>
                      </div>
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label">Link Facebook (pilihan)</label>
                          <input type="text" id="link_facebook" name="link_facebook" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Link LinkedIn (pilihan)</label>
                          <input type="text" id="link_linkedin" name="link_linkedin" class="form-control">
                        </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="list-tanda" role="tabpanel">
                <div class="container">
                    <div class="text-center mb-4">
                        <h4>Kartu Tanda Anggota (KTA)</h4>
                    </div>

                    <div class="card-kta">
                        <div class="side-text">SINDIKASI</div>
                        <h6 class="mb-4">KARTU ANGGOTA</h6>
                        <h5><?= $user_logged_in['nama_lengkap']; ?></h5>
                        <p><?= $user_logged_in['nomor_anggota']; ?></p>
                        <small>Sindikat Desain</small>
                    </div>

                    <div class="info-box mt-4">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <span class="text-primary fw-bold fs-5">📍</span>
                            </div>
                            <div>
                                <strong>Unduh Kartu Tanda Anggota (KTA) kamu di sini</strong>
                                <p class="mb-2">Kartu Tanda Anggota merupakan identitas resmi yang menandakan Anda sebagai bagian dari Kartu Sindikasi.</p>
                                <ul>
                                    <li>Kartu dapat digunakan sebagai tanda resmi keanggotaan.</li>
                                    <li>Anda bisa mencetaknya atau menyimpan versi digital di ponsel.</li>
                                    <li>Pastikan informasi di kartu sesuai dengan data Anda.</li>
                                </ul>
                                <a href="#" class="btn btn-primary btn-sm">📥 Unduh KTA</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="tab-pane fade" id="list-password" role="tabpanel">
                  <div class="card-body">
                      <h5 class="card-title mb-4">Atur Kata Kunci</h5>
                      <form>
                          <div class="mb-3">
                              <label for="currentPassword" class="form-label">
                                  <span class="text-danger">*</span> Kata kunci saat ini
                              </label>
                              <input type="password" class="form-control" id="currentPassword" placeholder="">
                          </div>

                          <div class="mb-3">
                              <label for="newPassword" class="form-label">
                                  <span class="text-danger">*</span> Kata kunci baru
                              </label>
                              <input type="password" class="form-control" id="newPassword" placeholder="">
                          </div>

                          <div class="mb-3">
                              <label for="confirmPassword" class="form-label">
                                  <span class="text-danger">*</span> Ulangi kata kunci
                              </label>
                              <input type="password" class="form-control" id="confirmPassword" placeholder="">
                          </div>

                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
              </div>
              <div class="tab-pane fade" id="list-otentikasi" role="tabpanel">
                  <div class="container">
                    
                    <!-- Alamat Email -->
                    <div class="card mb-4">
                      <div class="card-body">
                        <h5 class="mb-3">Alamat Email</h5>
                        
                        <!-- Email -->
                        <div class="mb-3">
                          <label for="email" class="form-label">Alamat email <span class="text-danger">*</span></label>
                          <input type="email" id="email" class="form-control" value="<?= $user_logged_in['email']; ?>" readonly>
                        </div>

                        <!-- Nomor Ponsel -->
                        <div>
                          <label for="phone" class="form-label">Nomor ponsel <span class="text-danger">*</span></label>
                          <div class="input-group">
                            <span class="input-group-text">+62</span>
                            <input type="text" id="phone" class="form-control" value="<?= $user_logged_in['no_hp']; ?>" readonly>
                          </div>
                          <small class="text-muted">Nomor aktif yang terhubung dengan WhatsApp</small>
                        </div>
                      </div>
                    </div>

                    <!-- Nonaktifkan Akun -->
                    <div class="card border-danger">
                      <div class="card-body">
                        <h5 class="text-danger mb-3">Nonaktifkan Akun</h5>
                        <p class="mb-4">
                          <strong>Hati-hati!</strong> Aksi ini akan menonaktifkan akun kamu secara permanen di Koletkaria Sindikasi saat ini. 
                          Kamu tidak akan lagi memiliki akses ke kolektaria ini setelah kamu melakukannya. 
                          Akun Koletkaria Sindikasi kamu akan tetap aktif, memastikan akses ke komunitas lain yang berlangganan.
                        </p>
                        <button class="btn btn-danger">
                          Nonaktifkan akun saya
                        </button>
                      </div>
                    </div>

                  </div>
              </div>
            </div>
          </div>
      </div>
  </div> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('#list-tab a').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();

    // hapus semua active
    document.querySelectorAll('#list-tab a').forEach(el => el.classList.remove('active'));
    this.classList.add('active');

    // sembunyikan semua tab
    document.querySelectorAll('.tab-content-item').forEach(tab => tab.style.display = 'none');

    // tampilkan tab yang dipilih
    const targetId = this.getAttribute('data-target');
    document.getElementById(targetId).style.display = 'block';
  });
});
</script>


<?= $this->endSection() ?>