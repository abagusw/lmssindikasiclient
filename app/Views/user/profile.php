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

    .kta-card{border:1px solid #e7eaf0;border-radius:14px;background:#fff}
    .cta-panel{border:1px solid #dce7ff;background:#f4f8ff;border-radius:12px}

        .kta-background {
        width: 260px;           
        height: 400px;          
        background-image: url('<?= base_url('public/assets/images/bg_kta.png') ?>');
        background-size: cover;   
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 12px;
        position: relative;
        color: white;
        font-family: sans-serif;
      }

      .kta-text {
        position: absolute;
        bottom: 80px;            
        width: 100%;
        text-align: center;
      }

      .kta-text .name {
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 4%;
        margin-left: 15%;
      }

      .kta-text .line {
        width: 70%;
        height: 1px;
        background-color: white;
        margin: 4px auto;
      }

      .kta-text .number {
        font-size: 0.9rem;
        margin-bottom: 15%;
        margin-left: 15%;
      }
    .cta-title{font-weight:600}
    .mock{width:230px;max-width:70vw;aspect-ratio:3/4;border-radius:14px;
          background:linear-gradient(150deg,#1c1c1f,#2a2d33);box-shadow:0 14px 30px rgba(0,0,0,.15)}
    .mock .brand{position:absolute;inset:auto 0 16px 16px;color:#fff;opacity:.9;font-size:.85rem}
    .hr-soft{height:1px;background:linear-gradient(90deg,transparent,#e9eef7,transparent)}
    @media (min-width:992px){
      .wrap{padding:28px 28px 20px}
    }

    .form-hint{font-size:.875rem;color:#6c757d}
    .char-counter{font-size:.75rem;color:#6c757d;text-align:right}
    .modal-footer .btn{min-width:96px}
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
                    <label for="bahasa" class="form-label">Bahasa yang dikuasai</label>
                    <select id="bahasa" name="bahasa[]" multiple="multiple" style="width: 100%;" class="form-control">
                        <option value="Afrikaans">Afrikaans</option>
                        <option value="Albanian">Albanian</option>
                        <option value="Amharic">Amharic</option>
                        <option value="Arabic">Arabic</option>
                        <option value="Armenian">Armenian</option>
                        <option value="Azerbaijani">Azerbaijani</option>
                        <option value="Basque">Basque</option>
                        <option value="Belarusian">Belarusian</option>
                        <option value="Bengali">Bengali</option>
                        <option value="Bosnian">Bosnian</option>
                        <option value="Bulgarian">Bulgarian</option>
                        <option value="Burmese">Burmese</option>
                        <option value="Catalan">Catalan</option>
                        <option value="Cebuano">Cebuano</option>
                        <option value="Chichewa">Chichewa</option>
                        <option value="Chinese">Chinese</option>
                        <option value="Corsican">Corsican</option>
                        <option value="Croatian">Croatian</option>
                        <option value="Czech">Czech</option>
                        <option value="Danish">Danish</option>
                        <option value="Dutch">Dutch</option>
                        <option value="English">English</option>
                        <option value="Esperanto">Esperanto</option>
                        <option value="Estonian">Estonian</option>
                        <option value="Filipino">Filipino</option>
                        <option value="Finnish">Finnish</option>
                        <option value="French">French</option>
                        <option value="Frisian">Frisian</option>
                        <option value="Galician">Galician</option>
                        <option value="Georgian">Georgian</option>
                        <option value="German">German</option>
                        <option value="Greek">Greek</option>
                        <option value="Gujarati">Gujarati</option>
                        <option value="Haitian Creole">Haitian Creole</option>
                        <option value="Hausa">Hausa</option>
                        <option value="Hawaiian">Hawaiian</option>
                        <option value="Hebrew">Hebrew</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Hmong">Hmong</option>
                        <option value="Hungarian">Hungarian</option>
                        <option value="Icelandic">Icelandic</option>
                        <option value="Igbo">Igbo</option>
                        <option value="Indonesian">Indonesian</option>
                        <option value="Irish">Irish</option>
                        <option value="Italian">Italian</option>
                        <option value="Japanese">Japanese</option>
                        <option value="Javanese">Javanese</option>
                        <option value="Kannada">Kannada</option>
                        <option value="Kazakh">Kazakh</option>
                        <option value="Khmer">Khmer</option>
                        <option value="Kinyarwanda">Kinyarwanda</option>
                        <option value="Korean">Korean</option>
                        <option value="Kurdish">Kurdish</option>
                        <option value="Kyrgyz">Kyrgyz</option>
                        <option value="Lao">Lao</option>
                        <option value="Latin">Latin</option>
                        <option value="Latvian">Latvian</option>
                        <option value="Lithuanian">Lithuanian</option>
                        <option value="Luxembourgish">Luxembourgish</option>
                        <option value="Macedonian">Macedonian</option>
                        <option value="Malagasy">Malagasy</option>
                        <option value="Malay">Malay</option>
                        <option value="Malayalam">Malayalam</option>
                        <option value="Maltese">Maltese</option>
                        <option value="Maori">Maori</option>
                        <option value="Marathi">Marathi</option>
                        <option value="Mongolian">Mongolian</option>
                        <option value="Nepali">Nepali</option>
                        <option value="Norwegian">Norwegian</option>
                        <option value="Odia">Odia</option>
                        <option value="Pashto">Pashto</option>
                        <option value="Persian">Persian</option>
                        <option value="Polish">Polish</option>
                        <option value="Portuguese">Portuguese</option>
                        <option value="Punjabi">Punjabi</option>
                        <option value="Romanian">Romanian</option>
                        <option value="Russian">Russian</option>
                        <option value="Samoan">Samoan</option>
                        <option value="Scots Gaelic">Scots Gaelic</option>
                        <option value="Serbian">Serbian</option>
                        <option value="Sesotho">Sesotho</option>
                        <option value="Shona">Shona</option>
                        <option value="Sindhi">Sindhi</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Slovak">Slovak</option>
                        <option value="Slovenian">Slovenian</option>
                        <option value="Somali">Somali</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Sundanese">Sundanese</option>
                        <option value="Swahili">Swahili</option>
                        <option value="Swedish">Swedish</option>
                        <option value="Tajik">Tajik</option>
                        <option value="Tamil">Tamil</option>
                        <option value="Tatar">Tatar</option>
                        <option value="Telugu">Telugu</option>
                        <option value="Thai">Thai</option>
                        <option value="Turkish">Turkish</option>
                        <option value="Turkmen">Turkmen</option>
                        <option value="Ukrainian">Ukrainian</option>
                        <option value="Urdu">Urdu</option>
                        <option value="Uyghur">Uyghur</option>
                        <option value="Uzbek">Uzbek</option>
                        <option value="Vietnamese">Vietnamese</option>
                        <option value="Welsh">Welsh</option>
                        <option value="Xhosa">Xhosa</option>
                        <option value="Yiddish">Yiddish</option>
                        <option value="Yoruba">Yoruba</option>
                        <option value="Zulu">Zulu</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Biografi</label>
                    <textarea class="form-control" rows="3" placeholder="Tulis biografi singkat..."></textarea>
                  </div>
                  <!-- Keahlian -->
                  <div class="section-card">
                    <div class="section-title">Keahlian</div>
                    <div class="mb-3">
                      <select id="keahlian" name="keahlian[]" multiple="multiple" style="width: 100%;" class="form-control">

                      </select>
                    </div>
<!--                     <div>
                      <span class="tag">Product Design</span>
                      <span class="tag">UX Design</span>
                      <span class="tag">UI Design</span>
                    </div> -->
                  </div>

                  <!-- Pengalaman -->
                  <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="section-title">Pengalaman</div>
                      <button class="btn-add" data-bs-toggle="modal" data-bs-target="#pengalamanModal">+ Tambah pengalaman</button>
                    </div>
                    <div id="experienceList">
                      <?php if (!empty($experiences)): ?>
                        <?php foreach ($experiences as $x): ?>
                          <div class="experience-item mb-2">
                            <strong><?= esc($x['role']) ?> - <?= esc($x['company']) ?></strong>
                            <span class="text-muted">
                              (<?= ($x['start_month']? date('M', mktime(0,0,0,$x['start_month'],1)) . ' ' : '') . esc($x['start_year']) ?>
                              -
                              <?= $x['is_current'] ? 'Sekarang' :
                                  (($x['end_month']? date('M', mktime(0,0,0,$x['end_month'],1)).' ' : '') . esc($x['end_year'])) ?>)
                            </span>
                            <?php if (!empty($x['description'])): ?>
                              <div class="small text-muted mt-1"><?= nl2br(esc($x['description'])) ?></div>
                            <?php endif; ?>
                          </div>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <div class="text-muted">Belum ada pengalaman.</div>
                      <?php endif; ?>
                    </div>
                  </div>

                  <!-- Pendidikan -->
                  <div class="section-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <div class="section-title">Pendidikan</div>
                      <button class="btn-add" data-bs-toggle="modal" data-bs-target="#pendidikanModal">+ Tambah pendidikan</button>
                    </div>
                    <div id="educationList">
                      <?php if (!empty($educations)): ?>
                        <?php foreach ($educations as $e): ?>
                          <div class="education-item mb-2">
                            <strong><?= esc($e['institution']) ?></strong> 
                            <span class="text-muted"> - <?= esc($e['major']) ?></span>
                            <span class="text-muted">
                              (<?= ($e['start_month']? date('M', mktime(0,0,0,$e['start_month'],1)) . ' ' : '') . esc($e['start_year']) ?>
                               -
                              <?= $e['is_current'] ? 'Sekarang' :
                                  (($e['end_month']? date('M', mktime(0,0,0,$e['end_month'],1)).' ' : '') . esc($e['end_year'])) ?>)
                            </span>
                          </div>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <div class="text-muted">Belum ada pendidikan.</div>
                      <?php endif; ?>
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
                  <div class="container py-4 py-lg-5">
                    <div class="row justify-content-center">
                      <div class="col-12 col-lg-8">
                        <div class="kta-card p-3 p-md-4">
                          <h5 class="mb-3">Kartu Tanda Anggota (KTA)</h5>

                          <!-- Kartu mockup -->
                          <div class="d-flex justify-content-center my-3 position-relative">
                            <!-- pakai <img> kalau sudah punya file kartu -->
                            <!-- <img src="path/kartu-anda.png" class="img-fluid" style="max-width:260px;border-radius:14px"> -->
                            <div class="mock position-relative d-flex align-items-center justify-content-center text-white">
                              <div class="text-center">
                               <!--  <div class="fw-semibold">KARTU ANGGOTA</div> -->
                                <div id="ktaCard" class="kta-background">
                                  <div class="kta-text">
                                    <div class="name"><?= esc($user_logged_in['nama_lengkap']) ?></div>
                                    <div class="number"><?= esc($user_logged_in['nomor_anggota']) ?></div>
                                  </div>
                                </div>
                              </div>
                              <div class="brand">SINDIKASI</div>
                            </div>
                          </div>

                          <div class="hr-soft my-3"></div>

                          <!-- Panel informasi + tombol unduh -->
                          <div class="cta-panel p-3 p-md-4">
                            <div class="d-flex align-items-start">
                              <div class="me-3">
                                <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:38px;height:38px">
                                  <i class="bi bi-geo-alt-fill"></i>
                                </div>
                              </div>
                              <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                  <div class="cta-title">Unduh Kartu Tanda Anggota (KTA) kamu di sini!</div>
                                  <button class="btn btn-link text-muted p-0 ms-3" data-bs-toggle="collapse" data-bs-target="#ctaBody" aria-expanded="true" aria-controls="ctaBody">
                                    <i class="bi bi-x-lg"></i>
                                  </button>
                                </div>

                                <div id="ctaBody" class="collapse show">
                                  <p class="text-secondary mb-2 small">
                                    Kartu Tanda Anggota merupakan identitas resmi yang menandakan Anda sebagai bagian dari Serikat Sindikasi.
                                  </p>
                                  <ul class="small text-secondary mb-3">
                                    <li>Digunakan untuk verifikasi identitas saat menghadiri kegiatan resmi.</li>
                                    <li>Bisa ditunjukkan saat registrasi, workshop, rapat, dan kegiatan lain.</li>
                                    <li>Mendukung verifikasi keanggotaan saat berkomunikasi dengan pengurus.</li>
                                    <li>Arsipkan kartu digital ini di ponsel untuk akses cepat.</li>
                                  </ul>

                                  <div class="d-flex flex-wrap gap-2">
                                    <a id="downloadKTA" href="#!" class="btn btn-primary">
                                      <i class="bi bi-download me-1"></i> Unduh KTA (PNG)
                                    </a>
<!--                                     <a href="#" class="btn btn-outline-primary">
                                      <i class="bi bi-filetype-pdf me-1"></i> Unduh PDF
                                    </a>
                                    <button class="btn btn-outline-secondary" onclick="window.print()">
                                      <i class="bi bi-printer me-1"></i> Cetak
                                    </button> -->
                                  </div>
                                  <div class="form-text mt-2">Pastikan Anda mengunduh dan menyimpan KTA digital dalam format yang sesuai untuk keperluan sehari-hari.</div>
                                </div>
                              </div>
                            </div>
                          </div><!-- /cta-panel -->
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="list-password" role="tabpanel">
                <h5 class="mb-3">Atur Kata Kunci</h5>

                <form id="formUbahPassword" action="<?= base_url('profile/update-password') ?>" method="post">
                  <?= csrf_field() ?>
                  <div class="mb-3">
                    <label class="form-label">Kata kunci saat ini <span class="text-danger">*</span></label>
                    <input type="password" name="current_password" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kata kunci baru <span class="text-danger">*</span></label>
                    <input type="password" id="new_password" name="new_password" class="form-control" minlength="8" maxlength="72" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Ulangi kata kunci <span class="text-danger">*</span></label>
                    <input type="password" id="new_password_confirm" name="new_password_confirm" class="form-control" required>
                    <div id="matchHelp" class="form-text"></div>
                  </div>
                  <button id="btnSavePwd" type="submit" class="btn btn-primary">Simpan</button>
                </form>
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

<!-- ========== MODAL: PENGALAMAN (dari sebelumnya) ========== -->
<div class="modal fade" id="pengalamanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Pengalaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <form id="formPengalaman">
        <?= csrf_field() ?>
        <div class="modal-body">
          <p class="form-hint mb-4">Kamu bisa menambahkan daftar pengalaman yang sudah kamu miliki sampai saat ini.</p>

          <div class="mb-3">
            <label class="form-label">Role <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="role" placeholder="Contoh: Product Designer" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="company" placeholder="Contoh: Kementrian Keuangan RI" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Industri <span class="text-danger">*</span></label>
            <select class="form-select" name="industry" required>
              <option value="" selected>Pilih</option>
              <option>Teknologi Informasi</option>
              <option>Keuangan</option>
              <option>Pemerintahan</option>
              <option>Kesehatan</option>
              <option>Pendidikan</option>
              <option>Lainnya</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Mulai <span class="text-danger">*</span></label>
            <div class="row g-2 align-items-center">
              <div class="col-6 col-md-3">
                <select class="form-select" id="expStartMonth" required></select>
              </div>
              <div class="col-6 col-md-3">
                <select class="form-select" id="expStartYear" required></select>
              </div>
              <div class="col-12 col-md-auto d-flex align-items-center gap-2 mt-2 mt-md-0">
                <span class="form-hint">sampai</span>
                <div class="form-check form-switch m-0">
                  <input class="form-check-input" type="checkbox" id="expIsCurrent">
                  <label class="form-check-label" for="expIsCurrent">Saat ini</label>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Berakhir <span class="text-danger">*</span></label>
            <div class="row g-2">
              <div class="col-6 col-md-3">
                <select class="form-select" id="expEndMonth" required></select>
              </div>
              <div class="col-6 col-md-3">
                <select class="form-select" id="expEndYear" required></select>
              </div>
            </div>
          </div>

          <div class="mb-2 d-flex align-items-center gap-2">
            <label class="form-label m-0">Deskripsi pekerjaan</label>
            <span class="form-hint">(pilihan)</span>
          </div>
          <div class="mb-1">
            <textarea class="form-control" id="expDesc" rows="3" maxlength="400" placeholder="Ringkas tapi informatif (tanggung jawab, capaian, tools, dsb)"></textarea>
          </div>
          <div class="char-counter"><span id="expDescCount">0</span>/400</div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" id="btnSaveExp" class="btn btn-primary" disabled>Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ========== MODAL: PENDIDIKAN (baru) ========== -->
<div class="modal fade" id="pendidikanModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow">
      <div class="modal-header">
        <h5 class="modal-title">Pendidikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <form id="formPendidikan">
        <?= csrf_field() ?>
        <div class="modal-body">
          <p class="form-hint mb-4">Kamu bisa menambahkan daftar pendidikan yang sudah kamu tempuh sampai saat ini.</p>

          <div class="mb-3">
            <label class="form-label">Nama Institusi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="institution" placeholder="Contoh: Universitas Indonesia, dll" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Jenjang / Jurusan <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="major" placeholder="Contoh: S1 Teknik Informatika, dll" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Mulai <span class="text-danger">*</span></label>
            <div class="row g-2 align-items-center">
              <div class="col-6 col-md-3">
                <select class="form-select" id="eduStartMonth" required></select>
              </div>
              <div class="col-6 col-md-3">
                <select class="form-select" id="eduStartYear" required></select>
              </div>
              <div class="col-12 col-md-auto d-flex align-items-center gap-2 mt-2 mt-md-0">
                <span class="form-hint">sampai</span>
                <div class="form-check form-switch m-0">
                  <input class="form-check-input" type="checkbox" id="eduIsCurrent">
                  <label class="form-check-label" for="eduIsCurrent">Saat ini</label>
                </div>
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Berakhir <span class="text-danger">*</span></label>
            <div class="row g-2">
              <div class="col-6 col-md-3">
                <select class="form-select" id="eduEndMonth" required></select>
              </div>
              <div class="col-6 col-md-3">
                <select class="form-select" id="eduEndYear" required></select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" id="btnSaveEdu" class="btn btn-primary" disabled>Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

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

  $('#bahasa').select2({
      placeholder: "Pilih Bahasa...",
      allowClear: true
  });

  $('#keahlian').select2({
      placeholder: "Pilih Keahlian...",
      allowClear: true
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  // ========= Shared helpers =========
  const months = ["Bulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

  function fillMonths(sel){
    if(!sel) return;
    sel.innerHTML = ""; // penting: clear agar tidak dobel
    months.forEach((m,i)=>{
      const opt=document.createElement("option");
      opt.value = i===0 ? "" : i;
      opt.textContent=m;
      if(i===0) opt.selected=true;
      sel.appendChild(opt);
    });
  }
  function fillYears(sel){
    if(!sel) return;
    sel.innerHTML = ""; // clear
    const thisYear = new Date().getFullYear();
    const first = thisYear - 50;
    const ph = document.createElement("option");
    ph.value=""; ph.textContent="Tahun"; ph.selected=true;
    sel.appendChild(ph);
    for(let y=thisYear; y>=first; y--){
      const opt=document.createElement("option");
      opt.value=y; opt.textContent=y; sel.appendChild(opt);
    }
  }
  function setupDateFields(prefix){
    fillMonths(document.getElementById(prefix+'StartMonth'));
    fillMonths(document.getElementById(prefix+'EndMonth'));
    fillYears(document.getElementById(prefix+'StartYear'));
    fillYears(document.getElementById(prefix+'EndYear'));
  }
  function setupCurrentToggle(currentId, endMonthId, endYearId, onChange){
    const cur  = document.getElementById(currentId);
    const endM = document.getElementById(endMonthId);
    const endY = document.getElementById(endYearId);
    if(!cur || !endM || !endY){ console.warn('Toggle elemen tidak ditemukan:', currentId, endMonthId, endYearId); return ()=>{}; }

    const apply = ()=>{
      const dis = cur.checked;
      [endM,endY].forEach(el=>{
        el.disabled = dis;
        el.required = !dis;
        if(dis) el.value="";
      });
      onChange && onChange();
    };
    // Pastikan tidak double listener: hapus dulu kalau perlu
    cur.onchange = apply;
    apply();
    return apply; // kembalikan agar bisa dipanggil ulang tanpa daftar listener baru
  }
  function enableIfValid(buttonEl, checks){
    if(!buttonEl) return;
    buttonEl.disabled = !checks.every(Boolean);
  }

  // ========= Pengalaman =========
  setupDateFields('exp');
  const expForm = document.getElementById('formPengalaman');
  const btnSaveExp = document.getElementById('btnSaveExp');
  const expDesc = document.getElementById('expDesc');
  const expDescCount = document.getElementById('expDescCount');

  function validateExp(){
    if(!expForm) return;
    const role = expForm.role?.value.trim();
    const comp = expForm.company?.value.trim();
    const ind  = expForm.industry?.value;
    const sM = document.getElementById('expStartMonth')?.value;
    const sY = document.getElementById('expStartYear')?.value;
    const isCur = document.getElementById('expIsCurrent')?.checked;
    const eM = document.getElementById('expEndMonth')?.value;
    const eY = document.getElementById('expEndYear')?.value;
    enableIfValid(btnSaveExp, [role,comp,ind,sM,sY,(isCur || (eM && eY))]);
  }
  const applyExpToggle = setupCurrentToggle('expIsCurrent','expEndMonth','expEndYear', validateExp);
  expForm?.addEventListener('input', validateExp);
  expDesc?.addEventListener('input',()=>{ if(expDescCount) expDescCount.textContent = expDesc.value.length; });
  validateExp();

  expForm?.addEventListener('submit', (e)=>{
    e.preventDefault();
    btnSaveExp.disabled = true;
    setTimeout(()=>{
      $.ambiance({message: 'Pengalaman Berhasil disimpan !',
                    type: "success",
                    fade: false});
      location.reload();
      $('#list-profils-list').click();
      bootstrap.Modal.getInstance(document.getElementById('pengalamanModal'))?.hide();
      expForm.reset();
      if(expDescCount) expDescCount.textContent='0';
      applyExpToggle(); // cukup apply ulang, jangan register listener baru
      validateExp();
    }, 300);
  });

  // ========= Pendidikan =========
  setupDateFields('edu');
  const eduForm = document.getElementById('formPendidikan');
  const btnSaveEdu = document.getElementById('btnSaveEdu');

  function validateEdu(){
    if(!eduForm) return;
    // pastikan name di input HTML: name="institution" dan name="major"
    const inst  = eduForm.institution?.value.trim();
    const major = eduForm.major?.value.trim();
    const sM = document.getElementById('eduStartMonth')?.value;
    const sY = document.getElementById('eduStartYear')?.value;
    const isCur = document.getElementById('eduIsCurrent')?.checked;
    const eM = document.getElementById('eduEndMonth')?.value;
    const eY = document.getElementById('eduEndYear')?.value;
    enableIfValid(btnSaveEdu, [inst,major,sM,sY,(isCur || (eM && eY))]);
  }
  const applyEduToggle = setupCurrentToggle('eduIsCurrent','eduEndMonth','eduEndYear', validateEdu);
  eduForm?.addEventListener('input', validateEdu);
  validateEdu();

  eduForm?.addEventListener('submit', (e)=>{
    e.preventDefault();
    btnSaveEdu.disabled = true;
    setTimeout(()=>{
      $.ambiance({message: 'Pendidikan Berhasil disimpan !',
                    type: "success",
                    fade: false});
      location.reload();
      bootstrap.Modal.getInstance(document.getElementById('pendidikanModal'))?.hide();
      eduForm.reset();
      applyEduToggle();
      validateEdu();
    }, 300);
  });
});
</script>
<script>

const csrfName = '<?= csrf_token() ?>';
let   csrfHash = '<?= csrf_hash() ?>';


async function postForm(url, fd){
  // tambah csrf
  fd.append(csrfName, csrfHash);
  const res = await fetch(url, {
    method: 'POST',
    headers: {'X-Requested-With':'XMLHttpRequest'},
    body: fd
  });

  const data = await res.json().catch(()=>({}));
  if (data?.token) csrfHash = data.token; 
  if (!res.ok || data.ok === false) throw data;
  return data;
}


// ------- Pengalaman submit -------
document.getElementById('formPengalaman').addEventListener('submit', async (e)=>{
  e.preventDefault();
  const f = e.currentTarget;
  const fd = new FormData();
  fd.append('role',        f.role.value);
  fd.append('company',     f.company.value);
  fd.append('industry',    f.industry.value);
  fd.append('start_month', document.getElementById('expStartMonth').value);
  fd.append('start_year',  document.getElementById('expStartYear').value);

  const isCur = document.getElementById('expIsCurrent').checked ? 1 : 0;
  fd.append('is_current',  isCur);
  if(!isCur){
    fd.append('end_month', document.getElementById('expEndMonth').value);
    fd.append('end_year',  document.getElementById('expEndYear').value);
  }
  fd.append('description', document.getElementById('expDesc').value);

  try{
    const out = await postForm('<?= base_url('profile/experience') ?>', fd);
    //alert('Pengalaman tersimpan! ID: '+ out.id);
    $.ambiance({message: 'Pengalaman Berhasil disimpan !',
                    type: "success",
                    fade: false});
    bootstrap.Modal.getInstance(document.getElementById('pengalamanModal'))?.hide();
    f.reset();
  }catch(err){
    console.error(err);
    alert('Gagal simpan pengalaman');
  }
});

// ------- Pendidikan submit -------
document.getElementById('formPendidikan').addEventListener('submit', async (e)=>{
  e.preventDefault();
  const f = e.currentTarget;
  const fd = new FormData();
  fd.append('institution', f.institution.value);
  fd.append('major',       f.major.value);
  fd.append('start_month', document.getElementById('eduStartMonth').value);
  fd.append('start_year',  document.getElementById('eduStartYear').value);

  const isCur = document.getElementById('eduIsCurrent').checked ? 1 : 0;
  fd.append('is_current',  isCur);
  if(!isCur){
    fd.append('end_month', document.getElementById('eduEndMonth').value);
    fd.append('end_year',  document.getElementById('eduEndYear').value);
  }

  try{
    const out = await postForm('<?= base_url('profile/education') ?>', fd);
    //alert('Pendidikan tersimpan! ID: '+ out.id);
    $.ambiance({message: 'Pendidikan Berhasil disimpan !',
                    type: "success",
                    fade: false});
    bootstrap.Modal.getInstance(document.getElementById('pendidikanModal'))?.hide();
    f.reset();
  }catch(err){
    console.error(err);
    alert('Gagal simpan pendidikan');
  }
});
</script>

<script>
document.getElementById('downloadKTA').addEventListener('click', function(){
  const ktaElement = document.getElementById('ktaCard');

  html2canvas(ktaElement, {backgroundColor: null}).then(canvas => {
    const link = document.createElement('a');
    link.download = 'KTA.png';
    link.href = canvas.toDataURL("image/png");
    link.click();
  });
});
</script>


<!-- Ubah Password area -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const np = document.getElementById('new_password');
  const nc = document.getElementById('new_password_confirm');
  const mh = document.getElementById('matchHelp');
  function checkMatch(){
    if(!np.value || !nc.value){ mh.textContent=''; return; }
    const ok = np.value === nc.value;
    mh.textContent = ok ? 'Cocok.' : 'Tidak cocok.';
    mh.className = 'form-text ' + (ok ? 'text-success' : 'text-danger');
  }
  np.addEventListener('input', checkMatch);
  nc.addEventListener('input', checkMatch);

  const form = document.getElementById('formUbahPassword');
  const btn  = document.getElementById('btnSavePwd');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    if (np.value !== nc.value) { $.ambiance({message:'Konfirmasi tidak cocok', type:'error'}); return; }

    btn.disabled = true;
    const fd = new FormData(form); // sudah include CSRF dari <?= csrf_field() ?>

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: fd
      });
      const out = await res.json().catch(()=>null);

      if (!res.ok || (out && out.ok === false)) {
        const msg = (out?.error) || (out?.errors ? Object.values(out.errors).join('<br>') : 'Gagal mengubah kata kunci');
        $.ambiance({message: msg, type:'error', fade:false});
        return;
      }

      $.ambiance({message:'Kata kunci berhasil diperbarui', type:'success'});
      form.reset(); checkMatch();

      // tetap/aktifkan tab Area Kerja setelah sukses
      const tabBtn = document.getElementById('tab-areakerja');
      if (tabBtn) new bootstrap.Tab(tabBtn).show();
    } catch (err) {
      console.error(err);
      $.ambiance({message:'Terjadi kesalahan jaringan', type:'error'});
    } finally {
      btn.disabled = false;
    }
  });
});
</script>
<?= $this->endSection() ?>