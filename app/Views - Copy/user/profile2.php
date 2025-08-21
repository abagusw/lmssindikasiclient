  <!-- Header -->
<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
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
        <button class="btn btn-warning btn-sm">✏️ Edit Profil</button>
      </div>
    </div>

      <div class="row">
        <!-- Sidebar -->
          <div class="col-lg-3 mb-3">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-personal-list" data-bs-toggle="list" href="#list-personal" role="tab">Data Personal</a>
      <a class="list-group-item list-group-item-action" id="list-profil-list" data-bs-toggle="list" href="#list-profil" role="tab">Data Profil</a>
      <a class="list-group-item list-group-item-action" id="list-tanda-list" data-bs-toggle="list" href="#list-tanda" role="tab">Data Tanda Anggota</a>
      <a class="list-group-item list-group-item-action" id="list-kegiatan-list" data-bs-toggle="list" href="#list-kegiatan" role="tab">Kegiatan DPS</a>
      <a class="list-group-item list-group-item-action" id="list-checklist-list" data-bs-toggle="list" href="#list-checklist" role="tab">Checklist</a>
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
                  </div>
                </p>
              </div>
              <div class="tab-pane fade" id="list-profil" role="tabpanel">
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
                <h4>Data Tanda Anggota</h4>
                <p>Isi data tanda anggota di sini...</p>
              </div>
              <div class="tab-pane fade" id="list-kegiatan" role="tabpanel">
                <h4>Kegiatan DPS</h4>
                <p>Isi kegiatan DPS di sini...</p>
              </div>
              <div class="tab-pane fade" id="list-checklist" role="tabpanel">
                <h4>Checklist</h4>
                <p>Isi checklist di sini...</p>
              </div>
            </div>
          </div>
      </div>
  </div> 
  </DIV> 


<?= $this->endSection() ?>