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

    .chip{
      padding:5px 10px; border-radius:16px; background:#0d6efd; color:#fff; font-size:14px;
      display:inline-flex; align-items:center; gap:6px;
    }
    .chip .x{ cursor:pointer; line-height:1; }

    .bg-light-subtle {
      background: #f6f7f9!important;
    }
    .rounded-4 {
      border-radius: 1rem!important;
    }

  

    .avatar-wrapper {
      position: relative;
      display: inline-block;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 4px solid #fff;
      object-fit: cover;
      cursor: pointer;
    }

    .avatar-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: rgba(0,0,0,0.5);
      color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 14px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .avatar-wrapper:hover .avatar-overlay {
      opacity: 1;
    }

  </style>
  <div class="profile-header">
    <!-- Klik gambar langsung buka file chooser -->
    <label for="avatarInput">
      <img id="avatarPreview"
           src="<?= base_url() ?>public/assets/images/user.avif"
           class="profile-avatar"
           alt="Avatar">
    </label>
    <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display:none;">
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
        <button type="submit" id="btnSaveProfil" form="formProfil" class="btn btn-warning btn-sm">
          Simpan Profil
        </button>
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
            <form id="formProfil" action="<?= base_url('profile/save') ?>" method="post">
            <div class="tab-content" id="nav-tabContent">

                 <?= csrf_field() ?>
                <div class="tab-pane fade show active" id="list-personal" role="tabpanel">
                    <div class="section-header">📄 Data Pribadi</div>
                    <?php
                    function is_checked($arr, $val){ return in_array($val, (array)$arr) ? 'checked' : ''; }
                    $member = $member ?? [];
                    ?>
                    <div class="row g-3">
                          <div class="col-md-6">
                            <label class="form-label required">Nama lengkap</label>
                            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= $user_logged_in['nama_lengkap'] ?>" required>
                            <div class="form-text-muted">Sesuai dengan yang tertera di KTP</div>
                          </div>
                          <div class="col-md-6">
                            <label class="form-label">Nama panggilan <small>(opsional)</small></label>
                            <input type="text" name="nama_panggilan" id="nama_panggilan" class="form-control"
                            value="<?= esc(old('nama_panggilan', $user_logged_in['nama_panggilan'] ?? '')) ?>">
                          </div>

                          <div class="col-md-12">
                            <label class="form-label">Nama anggota yang mereferensikan <small>(opsional)</small></label>
                            <input type="text" name="referensi" id="referensi" class="form-control" value="<?= esc(old('referensi', $user_logged_in['referensi'] ?? '')) ?>">
                          </div>

                          <div class="col-md-6">
                            <label class="form-label required">Alamat email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?= $user_logged_in['email'] ?>" required>
                            <div class="form-text-muted">Contoh: namakamu@gmail.com</div>
                            <div class="form-text-muted text-warning">Pastikan anda menggunakan alamat email yang valid karena proses aktivasi akan dilakukan melalui email</div>
                          </div>
<!-- 
                          <div class="col-md-6">
                            <label class="form-label required">Nomor ponsel</label>
                            <div class="input-group">
                              <span class="input-group-text">+62</span>
                              <input type="tel" name="telp" id="telp" class="form-control" required
                            value="<?= esc(old('telp', ltrim($member['no_hp'] ?? '', '0'))) ?>">
                            </div>
                          </div> -->

                          <div class="col-md-6">
                            <label class="form-label required">Gender</label>
                            <?php $jk = old('gender', $member['jenis_kelamin'] ?? ''); ?>
                            <select class="form-select" name="gender" id="gender" required>
                              <option <?= $jk===''?'selected':''; ?>>Pilih</option>
            <?php 
                foreach($getGender as $gender){
                  ?>
                  <option value="<?= $gender['id']; ?>" <?= $jk===$gender['id']?'selected':''; ?>><?= $gender['name']; ?></option>
                  <?php
                  }
            ?>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label class="form-label required">Kota kelahiran</label>
                            <?php $kotaLahir = old('kota_kelahiran', $member['tempat_lahir'] ?? ''); ?>
                            <select class="form-select" name="kota_kelahiran" id="kota_kelahiran" required>
                              <option disabled <?= $kotaLahir===''?'selected':''; ?>>Pilih</option>
                              <?php foreach($getCity as $city): ?>
                                <option value="<?= $city['id'] ?>" <?= ($kotaLahir==$city['id']?'selected':'') ?>>
                                  <?= esc($city['name']) ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label class="form-label required">Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                                   value="<?= esc(old('tanggal_lahir', $member['tanggal_lahir'] ?? '')) ?>">
                          </div>

                          <div class="col-md-6">
                            <label class="form-label required">Kota domisili</label>
                            <?php $dom = old('kota_domisili', $member['domisili'] ?? ''); ?>
                            <select class="form-select" name="kota_domisili" id="kota_domisili" required>
                              <option disabled <?= $dom===''?'selected':''; ?>>Pilih</option>
                              <?php foreach($getCity as $city): ?>
                                <option value="<?= $city['id'] ?>" <?= ($dom==$city['id']?'selected':'') ?>>
                                  <?= esc($city['name']) ?>
                                </option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <?php
                          $showPendidikan = false; // Atur menjadi false untuk mematikan, true untuk menampilkan
                          if ($showPendidikan) {
                            ?>
                          <div class="col-md-6">
                            <label class="form-label required">Pendidikan terakhir</label>
                            <?php $pend = old('pendidikan_terakhir', $member['pendidikan_terakhir'] ?? ''); ?>
                            <select class="form-select" name="pendidikan_terakhir" id="pendidikan_terakhir" required>
                              <?php
                                $opts = ['SD','SMP','SMA','D3','S1','S2','S3'];
                                echo '<option disabled '.($pend===''?'selected':'').'>Pilih</option>';
                                foreach($opts as $o){
                                  $sel = ($pend===$o)?'selected':'';
                                  echo "<option value=\"$o\" $sel>$o</option>";
                                }
                              ?>
                            </select>
                          </div>   <?php
                          }
                          ?>

                          <div class="col-md-12">
                            <label class="form-label required">Nama instansi pendidikan</label>
                             <input type="text" name="nama_instansi_pendidikan" id="nama_instansi_pendidikan" class="form-control"
                            value="<?= esc(old('nama_instansi_pendidikan', $member['nama_instansi_pendidikan'] ?? '')) ?>" required>
                          </div>

                          <div class="col-md-12">
                            <label class="form-label">Pengalaman organisasi <small>(opsional)</small></label>
                            <textarea name="pengalaman_organisasi" id="pengalaman_organisasi" class="form-control" rows="3" maxlength="200"
                            ><?= esc(old('pengalaman_organisasi', $member['pengalaman_organisasi'] ?? '')) ?></textarea>
                            <div class="form-text text-end"><small><?= strlen(old('pengalaman_organisasi', $member['pengalaman_organisasi'] ?? '')) ?>/200</small></div>
                          </div>

                          <!-- Disabilitas -->
                          <?php $disArr = $disArr ?? []; ?>
                          <div class="col-md-12">
                            <label class="form-label">Disabilitas <small>(opsional)</small></label>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna netra"  <?= is_checked($disArr,'Tuna netra') ?>> Tuna Netra</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna rungu"  <?= is_checked($disArr,'Tuna rungu') ?>> Tuna Rungu</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna grahita" <?= is_checked($disArr,'Tuna grahita') ?>> Tuna Grahita</div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna laras"   <?= is_checked($disArr,'Tuna laras') ?>> Tuna Laras</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Tuna wicara"  <?= is_checked($disArr,'Tuna wicara') ?>> Tuna Wicara</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Spektrum autisme" <?= is_checked($disArr,'Spektrum autisme') ?>> Spektrum Autisme</div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="disabilitas[]" value="Lainnya" <?= is_checked($disArr,'Lainnya') ?>> Lainnya</div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <label class="form-label">Jenis disabilitas lainnya</label>
                            <input type="text" class="form-control" id="disabilitas_lainnya" name="disabilitas_lainnya"
                                   value="<?= esc(old('disabilitas_lainnya', $member['disabilitas_lainnya'] ?? '')) ?>" placeholder="Ketik di sini">
                          </div>

                          <div class="col-md-12">
                            <label for="telp" class="form-label">Nomor ponsel <span class="text-danger">*</span></label>
                            <div class="input-group">
                              <span class="input-group-text">+62</span>
                              <input type="text" id="telp" name="telp" class="form-control" value="<?= $user_logged_in['no_hp']; ?>">
                            </div>
                            <small class="text-muted">Nomor aktif yang terhubung dengan WhatsApp</small>
                        </div>

                    </div>
                </div>

                <?php
                $bahasaFromDb = [];
                if (!empty($member['bahasa'])) {
                    $tmp = json_decode($member['bahasa'], true);
                    $bahasaFromDb = is_array($tmp) ? $tmp : [];
                }

               $allLanguages = [
                    "Afrikaans","Albanian","Amharic","Arabic","Armenian","Azerbaijani","Basque","Belarusian",
                    "Bengali","Bosnian","Bulgarian","Burmese","Catalan","Cebuano","Chichewa","Chinese",
                    "Corsican","Croatian","Czech","Danish","Dutch","English","Esperanto","Estonian","Filipino",
                    "Finnish","French","Frisian","Galician","Georgian","German","Greek","Gujarati",
                    "Haitian Creole","Hausa","Hawaiian","Hebrew","Hindi","Hmong","Hungarian","Icelandic","Igbo",
                    "Indonesian","Irish","Italian","Japanese","Javanese","Kannada","Kazakh","Khmer","Kinyarwanda",
                    "Korean","Kurdish","Kyrgyz","Lao","Latin","Latvian","Lithuanian","Luxembourgish","Macedonian",
                    "Malagasy","Malay","Malayalam","Maltese","Maori","Marathi","Mongolian","Nepali","Norwegian",
                    "Odia","Pashto","Persian","Polish","Portuguese","Punjabi","Romanian","Russian","Samoan",
                    "Scots Gaelic","Serbian","Sesotho","Shona","Sindhi","Sinhala","Slovak","Slovenian","Somali",
                    "Spanish","Sundanese","Swahili","Swedish","Tajik","Tamil","Tatar","Telugu","Thai","Turkish",
                    "Turkmen","Ukrainian","Urdu","Uyghur","Uzbek","Vietnamese","Welsh","Xhosa","Yiddish","Yoruba","Zulu"
                ];
                ?>
                <div class="tab-pane fade" id="list-profils" role="tabpanel">
                    <div class="section-header">Data Profil</div>
                    <div class="mb-3">
                      <label for="bahasa" class="form-label">Bahasa yang dikuasai</label>
                      <select id="bahasa" name="bahasa[]" multiple="multiple" style="width: 100%;" class="form-control">
                          <?php foreach ($allLanguages as $lang): ?>
                            <option value="<?= esc($lang) ?>" <?= in_array($lang, $bahasaFromDb ?? []) ? 'selected' : '' ?>>
                              <?= esc($lang) ?>
                            </option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Biografi</label>
                      <textarea name="biografi" id="biografi" class="form-control" rows="3" placeholder="Tulis biografi singkat..."><?= $member['biografi']; ?></textarea>
                    </div>

                    <?php
                    $skillsFromDb = [];
                    if (!empty($member['keahlian'])) {
                        $tmp = json_decode($member['keahlian'], true);
                        $skillsFromDb = is_array($tmp) ? $tmp : [];
                    }
                    ?>
                    <!-- Keahlian -->
                    <div class="section-card">
                      <div class="section-title">Keahlian</div>
                      <div class="mb-3">
                        <div id="skillsWrapper" class="form-control d-flex flex-wrap" style="gap:6px; min-height:42px;">
                          <input type="text" id="skillsInput" placeholder="Ketik lalu Enter / ,"
                                 style="border:none; outline:none; flex:1;" autocomplete="off" enterkeyhint="done">
                        </div>
                          <input type="hidden" name="skills" id="skillsHidden">
                          <div class="form-text">Tekan Enter atau koma untuk membuat chip.</div>

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
                        <a href="#!" class="btn-add" data-bs-toggle="modal" data-bs-target="#pengalamanModal">+ Tambah pengalaman</a>
                      </div>
                        <div id="experienceList">
                          <?php if (!empty($experiences)): ?>
                            <?php foreach ($experiences as $x): ?>
                              <div class="experience-item mb-2" 
                                   data-src="db"
                                   data-id="<?= (int)$x['id'] ?>"
                                   data-role="<?= esc($x['role']) ?>"
                                   data-company="<?= esc($x['company']) ?>"
                                   data-industry="<?= esc($x['industry'] ?? '') ?>"
                                   data-start_month="<?= esc($x['start_month']) ?>"
                                   data-start_year="<?= esc($x['start_year']) ?>"
                                   data-is_current="<?= (int)$x['is_current'] ?>"
                                   data-end_month="<?= esc($x['end_month']) ?>"
                                   data-end_year="<?= esc($x['end_year']) ?>"
                                   data-description="<?= esc($x['description'] ?? '') ?>">
                                <div class="d-flex justify-content-between">
                                  <div>
                                    <strong><?= esc($x['role']) ?> - <?= esc($x['company']) ?></strong>
                                    <span class="text-muted">
                                      (<?= ($x['start_month']? date('M', mktime(0,0,0,$x['start_month'],1)) . ' ' : '') . esc($x['start_year']) ?> -
                                      <?= $x['is_current'] ? 'Sekarang' :
                                          (($x['end_month']? date('M', mktime(0,0,0,$x['end_month'],1)).' ' : '') . esc($x['end_year'])) ?>)
                                    </span>
                                    <?php if (!empty($x['description'])): ?>
                                      <div class="small text-muted mt-1"><?= nl2br(esc($x['description'])) ?></div>
                                    <?php endif; ?>
                                    <div class="small text-warning mt-1 d-none db-pending-label"></div>
                                  </div>
                                  <div class="ms-2 text-nowrap">
                                    <button type="button" class="btn btn-sm btn-outline-secondary me-1" 
                                            data-action="db-exp-edit" data-id="<?= (int)$x['id'] ?>">Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                            data-action="db-exp-del" data-id="<?= (int)$x['id'] ?>">Hapus</button>
                                  </div>
                                </div>
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
                        <a href="#!" class="btn-add" data-bs-toggle="modal" data-bs-target="#pendidikanModal">+ Tambah pendidikan</a>
                      </div>
                          <div id="educationList">
                            <?php if (!empty($educations)): ?>
                              <?php foreach ($educations as $e): ?>
                                <div class="education-item mb-2"
                                     data-src="db"
                                     data-id="<?= (int)$e['id'] ?>"
                                     data-institution="<?= esc($e['institution']) ?>"
                                     data-major="<?= esc($e['major']) ?>"
                                     data-start_month="<?= esc($e['start_month']) ?>"
                                     data-start_year="<?= esc($e['start_year']) ?>"
                                     data-is_current="<?= (int)$e['is_current'] ?>"
                                     data-end_month="<?= esc($e['end_month']) ?>"
                                     data-end_year="<?= esc($e['end_year']) ?>">
                                  <div class="d-flex justify-content-between">
                                    <div>
                                      <strong><?= esc($e['institution']) ?></strong> 
                                      <span class="text-muted"> - <?= esc($e['major']) ?></span>
                                      <span class="text-muted">
                                        (<?= ($e['start_month']? date('M', mktime(0,0,0,$e['start_month'],1)) . ' ' : '') . esc($e['start_year']) ?> -
                                        <?= $e['is_current'] ? 'Sekarang' :
                                            (($e['end_month']? date('M', mktime(0,0,0,$e['end_month'],1)).' ' : '') . esc($e['end_year'])) ?>)
                                      </span>
                                      <div class="small text-warning mt-1 d-none db-pending-label"></div>
                                    </div>
                                    <div class="ms-2 text-nowrap">
                                      <button type="button" class="btn btn-sm btn-outline-secondary me-1" 
                                              data-action="db-edu-edit" data-id="<?= (int)$e['id'] ?>">Edit</button>
                                      <button type="button" class="btn btn-sm btn-outline-danger" 
                                              data-action="db-edu-del" data-id="<?= (int)$e['id'] ?>">Hapus</button>
                                    </div>
                                  </div>
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
                          <input type="text" id="link_instagram" name="link_instagram" class="form-control"
                                 value="<?= esc(old('link_instagram', $member['link_instagram'] ?? '')) ?>">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label">Link X (Twitter) (pilihan)</label>
                          <input type="text" id="link_twitter" name="link_twitter" class="form-control"
                                 value="<?= esc(old('link_twitter', $member['link_twitter'] ?? '')) ?>">
                        </div>
                      </div>

                      <div class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label">Link Facebook (pilihan)</label>
                          <input type="text" id="link_facebook" name="link_facebook" class="form-control"
                                 value="<?= esc(old('link_facebook', $member['link_facebook'] ?? '')) ?>">
                        </div>

                        <div class="col-md-6">
                          <label class="form-label">Link LinkedIn (pilihan)</label>
                          <input type="text" id="link_linkedin" name="link_linkedin" class="form-control"
                                 value="<?= esc(old('link_linkedin', $member['link_linkedin'] ?? '')) ?>">
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

                  <div id="alertPwd" class="alert d-none"></div>

                  <?= csrf_field() ?>
                  <div class="mb-3">
                    <label class="form-label">Kata kunci saat ini <span class="text-danger">*</span></label>
                    <input type="password" id="current_password" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kata kunci baru <span class="text-danger">*</span></label>
                    <input type="password" id="new_password" class="form-control" minlength="8" maxlength="72">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Ulangi kata kunci <span class="text-danger">*</span></label>
                    <input type="password" id="new_password_confirm" class="form-control">
                    <div id="matchHelp" class="form-text"></div>
                  </div>
                  <button id="btnSavePwd" type="button" class="btn btn-primary">Simpan</button>
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
                          <input type="email" id="email" class="form-control" value="<?= $user_logged_in['email']; ?>" disabled>
                        </div>

                        <!-- Nomor Ponsel -->

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
                        <button class="btn btn-danger" type="button" onclick="openDeactivateModal('<?= $member['email'] ?>')">
                          Nonaktifkan akun saya
                        </button>
                      </div>
                    </div>

                  </div>
              </div>
            </div>
          </form>
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
          <button type="submit" id="btnSaveExp" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
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
          <button type="submit" id="btnSaveEdu" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- form modal konfirmasi deactivate -->
<!-- Modal: Nonaktifkan Akun -->
<div class="modal fade" id="deactivateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm rounded-4">
      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-semibold">Nonaktifkan Akun Kolektaria</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>

      <div class="modal-body pt-2">
        <p class="mb-3 text-secondary">
          Apakah kamu yakin akan menonaktifkan akun ini? Anda dapat mengaktifkan kembali akun kapan saja
          dengan masuk kembali menggunakan email dan kata sandi Anda.
        </p>

        <label class="form-label small text-muted mb-1">Akun</label>
        <div class="form-control bg-light-subtle border-0 rounded-3 py-2 px-3">
          <span id="deactivateEmail" class="fw-medium"></span>
        </div>
      </div>

      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
        <button id="btnConfirmDeactivate" type="button" class="btn btn-orange">
          <span class="me-1 align-middle">✓</span> Nonaktifkan akun
        </button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
// ===============================
// Select2 & Tab manual
// ===============================
document.querySelectorAll('#list-tab a').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelectorAll('#list-tab a').forEach(el => el.classList.remove('active'));
    this.classList.add('active');
    document.querySelectorAll('.tab-content-item').forEach(tab => tab.style.display = 'none');
    const targetId = this.getAttribute('data-target');
    document.getElementById(targetId).style.display = 'block';
  });
});

$('#bahasa').select2({ placeholder: "Pilih Bahasa...", allowClear: true });
$('#keahlian').select2({ placeholder: "Pilih Keahlian...", allowClear: true });

</script>

<script>
// ===============================
// Helper tanggal (bulan/tahun) untuk form pengalaman/pendidikan
// ===============================
document.addEventListener('DOMContentLoaded', () => {
  const months = ["Bulan","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];

  function fillMonths(sel){
    if(!sel) return;
    sel.innerHTML = "";
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
    sel.innerHTML = "";
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
    cur.onchange = apply;
    apply();
    return apply; 
  }

  // Init pengalaman
  setupDateFields('exp');
  const expForm = document.getElementById('formPengalaman');
  const expDesc = document.getElementById('expDesc');
  const expDescCount = document.getElementById('expDescCount');
  const applyExpToggle = setupCurrentToggle('expIsCurrent','expEndMonth','expEndYear', ()=>{});
  expDesc?.addEventListener('input',()=>{ if(expDescCount) expDescCount.textContent = expDesc.value.length; });

  // Init pendidikan
  setupDateFields('edu');
  const eduForm = document.getElementById('formPendidikan');
  const applyEduToggle = setupCurrentToggle('eduIsCurrent','eduEndMonth','eduEndYear', ()=>{});

  // Reset counter saat modal ditutup (biar flag edit tidak nyangkut)
  ;['pengalamanModal','pendidikanModal'].forEach(id=>{
    const el = document.getElementById(id);
    if(!el) return;
    el.addEventListener('hidden.bs.modal', ()=>{
      window.__editingExpIndex = null;
      window.__editingEduIndex = null;
      window.__editingExpDbId = null;
      window.__editingEduDbId = null;
      expForm?.reset(); eduForm?.reset();
      if(expDescCount) expDescCount.textContent='0';
      applyExpToggle && applyExpToggle();
      applyEduToggle && applyEduToggle();
    });
  });

});
</script>

<script>
// ===============================
// LocalStorage utils & renderer
// ===============================
const LS_EXP = 'pending_experiences';           // draft baru pengalaman
const LS_EDU = 'pending_educations';            // draft baru pendidikan
const LS_EXP_UPDATES = 'pending_experience_updates'; // patch UPDATE pengalaman DB
const LS_EXP_DELETES = 'pending_experience_deletes'; // patch DELETE pengalaman DB
const LS_EDU_UPDATES = 'pending_education_updates';  // patch UPDATE pendidikan DB
const LS_EDU_DELETES = 'pending_education_deletes';  // patch DELETE pendidikan DB

function lsGet(key){ try { return JSON.parse(localStorage.getItem(key) || '[]'); } catch(e){ return []; } }
function lsSet(key, val){ localStorage.setItem(key, JSON.stringify(val)); }
function addPending(key, obj){ const arr = lsGet(key); arr.push(obj); lsSet(key, arr); }
function lsUpdateAt(key, index, obj){ const arr = lsGet(key); if(index>=0 && index<arr.length){ arr[index]=obj; lsSet(key,arr);} }
function lsRemoveAt(key, index){ const arr = lsGet(key); if(index>=0 && index<arr.length){ arr.splice(index,1); lsSet(key,arr);} }
function lsPush(key, obj){ const a = lsGet(key); a.push(obj); lsSet(key,a); }
function lsRemoveValue(key, val){ lsSet(key, lsGet(key).filter(v => String(v)!==String(val))); }
function lsUpsertById(key, id, obj){
  const a = lsGet(key);
  const i = a.findIndex(x=> String(x.id)===String(id));
  if(i>=0) a[i]=obj; else a.push(obj);
  lsSet(key,a);
}

const MONTHS = ["","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
function fmtPeriod(x){
  const s = (x.start_month ? MONTHS[parseInt(x.start_month)]+' ' : '') + (x.start_year||'');
  const e = String(x.is_current)==='1' ? 'Sekarang'
          : ((x.end_month ? MONTHS[parseInt(x.end_month)]+' ' : '') + (x.end_year||''));
  return `${s} - ${e}`;
}
function escapeHtml(s){
  return String(s ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;')
    .replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
}

function renderPendingExperiences(){
  const list = document.getElementById('experienceList');
  if(!list) return;
  list.querySelectorAll('.exp-pending').forEach(el=>el.remove());
  const arr = lsGet(LS_EXP);
  arr.slice().reverse().forEach((x, revIdx)=>{
    const origIdx = arr.length - 1 - revIdx;
    const html = `
      <div class="experience-item mb-2 border-warning exp-pending">
        <div class="d-flex justify-content-between">
          <div>
            <strong>${escapeHtml(x.role)} - ${escapeHtml(x.company)}</strong>
            <span class="text-muted">(${fmtPeriod(x)})</span>
            ${x.description ? `<div class="small text-muted mt-1">${escapeHtml(x.description).replace(/\n/g,'<br>')}</div>` : ``}
            <div class="small text-warning mt-1">(baru • belum disimpan)</div>
          </div>
          <div class="ms-2 text-nowrap">
            <button type="button" class="btn btn-sm btn-outline-secondary me-1" data-action="exp-edit" data-index="${origIdx}">Edit</button>
            <button type="button" class="btn btn-sm btn-outline-danger" data-action="exp-del" data-index="${origIdx}">Hapus</button>
          </div>
        </div>
      </div>`;
    list.insertAdjacentHTML('afterbegin', html);
  });
}

function renderPendingEducations(){
  const list = document.getElementById('educationList');
  if(!list) return;
  list.querySelectorAll('.edu-pending').forEach(el=>el.remove());
  const arr = lsGet(LS_EDU);
  arr.slice().reverse().forEach((x, revIdx)=>{
    const origIdx = arr.length - 1 - revIdx;
    const html = `
      <div class="education-item mb-2 border-warning edu-pending">
        <div class="d-flex justify-content-between">
          <div>
            <strong>${escapeHtml(x.institution)}</strong>
            <span class="text-muted"> - ${escapeHtml(x.major)}</span>
            <span class="text-muted">(${fmtPeriod(x)})</span>
            <div class="small text-warning mt-1">(baru • belum disimpan)</div>
          </div>
          <div class="ms-2 text-nowrap">
            <button type="button" class="btn btn-sm btn-outline-secondary me-1" data-action="edu-edit" data-index="${origIdx}">Edit</button>
            <button type="button" class="btn btn-sm btn-outline-danger" data-action="edu-del" data-index="${origIdx}">Hapus</button>
          </div>
        </div>
      </div>`;
    list.insertAdjacentHTML('afterbegin', html);
  });
}

function markDbItemPending(containerEl, text){
  if(!containerEl) return;
  const label = containerEl.querySelector('.db-pending-label');
  if(label){
    label.textContent = text || '';
    label.classList.toggle('d-none', !text);
  }
  containerEl.classList.add('border','border-warning','rounded-3','p-2');
}

// Render awal draft local
document.addEventListener('DOMContentLoaded', ()=>{
  renderPendingExperiences();
  renderPendingEducations();
});
</script>

<script>
// ===============================
// Flags mode edit
// ===============================
let __editingExpIndex = null; // draft pengalaman (index array LS_EXP)
let __editingEduIndex = null; // draft pendidikan (index array LS_EDU)
let __editingExpDbId  = null; // edit pengalaman dari DB (id)
let __editingEduDbId  = null; // edit pendidikan dari DB (id)
</script>

<script>
// ===============================
// Delegasi klik tombol Edit/Hapus (draft & DB)
// ===============================
document.addEventListener('click', (e)=>{
  const btn = e.target.closest('button[data-action]');
  if(!btn) return;
  e.preventDefault(); e.stopPropagation();

  const action = btn.getAttribute('data-action');
  const idx    = btn.hasAttribute('data-index') ? parseInt(btn.getAttribute('data-index'), 10) : null;
  const id     = btn.getAttribute('data-id');
  const itemEl = btn.closest('[data-src="db"][data-id]');

  // ------- DRAFT: Pengalaman -------
  if(action === 'exp-edit' && idx !== null){
    __editingExpDbId = null;
    const arr = lsGet(LS_EXP); const it = arr[idx]; if(!it) return;
    const f = document.getElementById('formPengalaman');
    f.role.value = it.role || '';
    f.company.value = it.company || '';
    if(f.industry) f.industry.value = it.industry || '';
    document.getElementById('expStartMonth').value = it.start_month || '';
    document.getElementById('expStartYear').value  = it.start_year || '';
    document.getElementById('expIsCurrent').checked = String(it.is_current)==='1';
    document.getElementById('expEndMonth').value   = it.end_month || '';
    document.getElementById('expEndYear').value    = it.end_year || '';
    const d = document.getElementById('expDesc');
    if(d){ d.value = it.description || ''; const c=document.getElementById('expDescCount'); if(c) c.textContent = d.value.length; }
    document.getElementById('expIsCurrent').dispatchEvent(new Event('change'));
    __editingExpIndex = idx;
    new bootstrap.Modal(document.getElementById('pengalamanModal')).show();
    return;
  }
  if(action === 'exp-del' && idx !== null){
    if(confirm('Hapus pengalaman ini dari draft?')){ lsRemoveAt(LS_EXP, idx); renderPendingExperiences(); }
    return;
  }

  // ------- DRAFT: Pendidikan -------
  if(action === 'edu-edit' && idx !== null){
    __editingEduDbId = null;
    const arr = lsGet(LS_EDU); const it = arr[idx]; if(!it) return;
    const f = document.getElementById('formPendidikan');
    f.institution.value = it.institution || '';
    f.major.value       = it.major || '';
    document.getElementById('eduStartMonth').value = it.start_month || '';
    document.getElementById('eduStartYear').value  = it.start_year || '';
    document.getElementById('eduIsCurrent').checked = String(it.is_current)==='1';
    document.getElementById('eduEndMonth').value   = it.end_month || '';
    document.getElementById('eduEndYear').value    = it.end_year || '';
    document.getElementById('eduIsCurrent').dispatchEvent(new Event('change'));
    __editingEduIndex = idx;
    new bootstrap.Modal(document.getElementById('pendidikanModal')).show();
    return;
  }
  if(action === 'edu-del' && idx !== null){
    if(confirm('Hapus pendidikan ini dari draft?')){ lsRemoveAt(LS_EDU, idx); renderPendingEducations(); }
    return;
  }

  // ------- DB: Pengalaman -------
  if(action === 'db-exp-edit' && id){
    __editingExpIndex = null;
    const role = itemEl?.dataset.role || '';
    const company = itemEl?.dataset.company || '';
    const industry = itemEl?.dataset.industry || '';
    const sm = itemEl?.dataset.start_month || '';
    const sy = itemEl?.dataset.start_year || '';
    const ic = itemEl?.dataset.is_current === '1';
    const em = itemEl?.dataset.end_month || '';
    const ey = itemEl?.dataset.end_year || '';
    const desc = itemEl?.dataset.description || '';
    const f = document.getElementById('formPengalaman');
    f.role.value = role; f.company.value = company; if(f.industry) f.industry.value = industry;
    document.getElementById('expStartMonth').value = sm;
    document.getElementById('expStartYear').value  = sy;
    document.getElementById('expIsCurrent').checked = ic;
    document.getElementById('expEndMonth').value   = ic ? '' : em;
    document.getElementById('expEndYear').value    = ic ? '' : ey;
    const d = document.getElementById('expDesc');
    if(d){ d.value = desc; const c=document.getElementById('expDescCount'); if(c) c.textContent = d.value.length; }
    document.getElementById('expIsCurrent').dispatchEvent(new Event('change'));
    __editingExpDbId = id;
    new bootstrap.Modal(document.getElementById('pengalamanModal')).show();
    return;
  }
  if(action === 'db-exp-del' && id){
    if(confirm('Tandai pengalaman ini untuk dihapus saat Simpan Profil?')){
      const dels = lsGet(LS_EXP_DELETES);
      if(!dels.includes(id)) lsPush(LS_EXP_DELETES, id);
      lsSet(LS_EXP_UPDATES, lsGet(LS_EXP_UPDATES).filter(x=> String(x.id)!==String(id)));
      markDbItemPending(itemEl, '(akan dihapus saat Simpan Profil)');
    }
    return;
  }

  // ------- DB: Pendidikan -------
  if(action === 'db-edu-edit' && id){
    __editingEduIndex = null;
    const inst = itemEl?.dataset.institution || '';
    const maj  = itemEl?.dataset.major || '';
    const sm = itemEl?.dataset.start_month || '';
    const sy = itemEl?.dataset.start_year || '';
    const ic = itemEl?.dataset.is_current === '1';
    const em = itemEl?.dataset.end_month || '';
    const ey = itemEl?.dataset.end_year || '';
    const f = document.getElementById('formPendidikan');
    f.institution.value = inst; f.major.value = maj;
    document.getElementById('eduStartMonth').value = sm;
    document.getElementById('eduStartYear').value  = sy;
    document.getElementById('eduIsCurrent').checked = ic;
    document.getElementById('eduEndMonth').value   = ic ? '' : em;
    document.getElementById('eduEndYear').value    = ic ? '' : ey;
    document.getElementById('eduIsCurrent').dispatchEvent(new Event('change'));
    __editingEduDbId = id;
    new bootstrap.Modal(document.getElementById('pendidikanModal')).show();
    return;
  }
  if(action === 'db-edu-del' && id){
    if(confirm('Tandai pendidikan ini untuk dihapus saat Simpan Profil?')){
      const dels = lsGet(LS_EDU_DELETES);
      if(!dels.includes(id)) lsPush(LS_EDU_DELETES, id);
      lsSet(LS_EDU_UPDATES, lsGet(LS_EDU_UPDATES).filter(x=> String(x.id)!==String(id)));
      markDbItemPending(itemEl, '(akan dihapus saat Simpan Profil)');
    }
    return;
  }
});
</script>

<script>
// ===============================
// Submit modal Pengalaman & Pendidikan (prioritas: db-edit -> draft-edit -> add)
// ===============================
(function(){
  const expForm = document.getElementById('formPengalaman');
  const expDesc = document.getElementById('expDesc');
  const expDescCount = document.getElementById('expDescCount');
  const eduForm = document.getElementById('formPendidikan');

  function collectExp(){
    return {
      role:        expForm.role.value.trim(),
      company:     expForm.company.value.trim(),
      industry:    expForm.industry?.value ?? '',
      start_month: document.getElementById('expStartMonth').value,
      start_year:  document.getElementById('expStartYear').value,
      is_current:  document.getElementById('expIsCurrent').checked ? 1 : 0,
      end_month:   document.getElementById('expIsCurrent').checked ? "" : document.getElementById('expEndMonth').value,
      end_year:    document.getElementById('expIsCurrent').checked ? "" : document.getElementById('expEndYear').value,
      description: (expDesc?.value ?? '')
    };
  }
  function collectEdu(){
    return {
      institution: eduForm.institution.value.trim(),
      major:       eduForm.major.value.trim(),
      start_month: document.getElementById('eduStartMonth').value,
      start_year:  document.getElementById('eduStartYear').value,
      is_current:  document.getElementById('eduIsCurrent').checked ? 1 : 0,
      end_month:   document.getElementById('eduIsCurrent').checked ? "" : document.getElementById('eduEndMonth').value,
      end_year:    document.getElementById('eduIsCurrent').checked ? "" : document.getElementById('eduEndYear').value
    };
  }

  if (expForm){
    expForm.addEventListener('submit', (e)=>{
      e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
      const item = collectExp();

      // 1) Edit DB?
      if (__editingExpDbId){
        lsUpsertById(LS_EXP_UPDATES, __editingExpDbId, { id: __editingExpDbId, ...item });
        lsRemoveValue(LS_EXP_DELETES, __editingExpDbId);
        const sel = `[data-src="db"][data-id="${CSS?.escape ? CSS.escape(__editingExpDbId) : __editingExpDbId}"]`;
        const el  = document.querySelector(sel);
        if (el){
          el.dataset.role = item.role;
          el.dataset.company = item.company;
          el.dataset.industry = item.industry;
          el.dataset.start_month = item.start_month;
          el.dataset.start_year = item.start_year;
          el.dataset.is_current = String(item.is_current);
          el.dataset.end_month = item.end_month;
          el.dataset.end_year = item.end_year;
          el.dataset.description = item.description;
          markDbItemPending(el, '(perubahan menunggu Simpan Profil)');
        }
        __editingExpDbId = null;
        $.ambiance?.({message:'Perubahan pengalaman disimpan ke draft (belum ke server).', type:'success'});
        bootstrap.Modal.getInstance(document.getElementById('pengalamanModal'))?.hide();
        expForm.reset(); if(expDescCount) expDescCount.textContent='0';
        return;
      }

      // 2) Edit draft?
      if (typeof __editingExpIndex === 'number'){
        lsUpdateAt(LS_EXP, __editingExpIndex, item);
        __editingExpIndex = null;
        $.ambiance?.({message:'Pengalaman diperbarui (belum disimpan).', type:'success'});
        renderPendingExperiences();
        bootstrap.Modal.getInstance(document.getElementById('pengalamanModal'))?.hide();
        expForm.reset(); if(expDescCount) expDescCount.textContent='0';
        return;
      }

      // 3) Tambah draft baru
      addPending(LS_EXP, item);
      $.ambiance?.({message:'Pengalaman ditambahkan (belum disimpan).', type:'success'});
      renderPendingExperiences();
      bootstrap.Modal.getInstance(document.getElementById('pengalamanModal'))?.hide();
      expForm.reset(); if(expDescCount) expDescCount.textContent='0';
    });
  }

  if (eduForm){
    eduForm.addEventListener('submit', (e)=>{
      e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
      const item = collectEdu();

      // 1) Edit DB?
      if (__editingEduDbId){
        lsUpsertById(LS_EDU_UPDATES, __editingEduDbId, { id: __editingEduDbId, ...item });
        lsRemoveValue(LS_EDU_DELETES, __editingEduDbId);
        const sel = `[data-src="db"][data-id="${CSS?.escape ? CSS.escape(__editingEduDbId) : __editingEduDbId}"]`;
        const el  = document.querySelector(sel);
        if (el){
          el.dataset.institution = item.institution;
          el.dataset.major = item.major;
          el.dataset.start_month = item.start_month;
          el.dataset.start_year = item.start_year;
          el.dataset.is_current = String(item.is_current);
          el.dataset.end_month = item.end_month;
          el.dataset.end_year = item.end_year;
          markDbItemPending(el, '(perubahan menunggu Simpan Profil)');
        }
        __editingEduDbId = null;
        $.ambiance?.({message:'Perubahan pendidikan disimpan ke draft (belum ke server).', type:'success'});
        bootstrap.Modal.getInstance(document.getElementById('pendidikanModal'))?.hide();
        eduForm.reset();
        return;
      }

      // 2) Edit draft?
      if (typeof __editingEduIndex === 'number'){
        lsUpdateAt(LS_EDU, __editingEduIndex, item);
        __editingEduIndex = null;
        $.ambiance?.({message:'Pendidikan diperbarui (belum disimpan).', type:'success'});
        renderPendingEducations();
        bootstrap.Modal.getInstance(document.getElementById('pendidikanModal'))?.hide();
        eduForm.reset();
        return;
      }

      // 3) Tambah draft baru
      addPending(LS_EDU, item);
      $.ambiance?.({message:'Pendidikan ditambahkan (belum disimpan).', type:'success'});
      renderPendingEducations();
      bootstrap.Modal.getInstance(document.getElementById('pendidikanModal'))?.hide();
      eduForm.reset();
    });
  }
})();
</script>

<script>
// ===============================
// Submit form Profil: kirim draft + patch queue
// ===============================
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formProfil');
  const btn  = document.getElementById('btnSaveProfil');
  if(!form) return;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    btn && (btn.disabled = true);

    // Ambil pending draft
    const pendingExp = lsGet(LS_EXP);
    const pendingEdu = lsGet(LS_EDU);

    // Patch queue DB
    const expUpdates = lsGet(LS_EXP_UPDATES);
    const expDeletes = lsGet(LS_EXP_DELETES);
    const eduUpdates = lsGet(LS_EDU_UPDATES);
    const eduDeletes = lsGet(LS_EDU_DELETES);

    const fd = new FormData(form);
    fd.append('experiences_json', JSON.stringify(pendingExp));
    fd.append('educations_json', JSON.stringify(pendingEdu));
    fd.append('experiences_updates_json', JSON.stringify(expUpdates));
    fd.append('experiences_deletes_json', JSON.stringify(expDeletes));
    fd.append('educations_updates_json',  JSON.stringify(eduUpdates));
    fd.append('educations_deletes_json',  JSON.stringify(eduDeletes));

    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        body: fd
      });
      const out = await res.json().catch(()=>null);

      if (!res.ok || (out && out.ok === false)) {
        const msg = (out?.errors ? Object.values(out.errors).join('<br>') : (out?.error || 'Gagal menyimpan profil'));
        $.ambiance?.({ message: msg, type: "error", fade: false });
        return;
      }

      // sukses -> bersihkan semua LS
      [LS_EXP,LS_EDU,LS_EXP_UPDATES,LS_EXP_DELETES,LS_EDU_UPDATES,LS_EDU_DELETES].forEach(k=> localStorage.removeItem(k));
      renderPendingExperiences();
      renderPendingEducations();

      // refresh token csrf jika disediakan server
      if (out?.token) {
        const csrf = form.querySelector('input[name="<?= csrf_token() ?>"]');
        if (csrf) csrf.value = out.token;
      }

      $.ambiance?.({ message: 'Profil & riwayat berhasil disimpan', type: "success" });
      location.reload();
      // optional: location.reload(); // jika ingin reload penuh
    } catch (err) {
      console.error(err);
      $.ambiance?.({ message: 'Network error', type: "error" });
    } finally {
      btn && (btn.disabled = false);
    }
  });
});
</script>

<script>
// ===============================
// Download KTA (html2canvas)
// ===============================
document.getElementById('downloadKTA')?.addEventListener('click', function(){
  const ktaElement = document.getElementById('ktaCard');
  if(!ktaElement) return;
  html2canvas(ktaElement, {backgroundColor: null}).then(canvas => {
    const link = document.createElement('a');
    link.download = 'KTA.png';
    link.href = canvas.toDataURL("image/png");
    link.click();
  });
});
</script>

<script>
// ===============================
// Ubah Password (AJAX)
// ===============================
const csrfNameChgPass = '<?= csrf_token() ?>';
let   csrfHashChgPass = '<?= csrf_hash() ?>';

document.getElementById('btnSavePwd')?.addEventListener('click', async () => {
  const cur = document.getElementById('current_password').value.trim();
  const np  = document.getElementById('new_password').value.trim();
  const nc  = document.getElementById('new_password_confirm').value.trim();
  const alertBox = document.getElementById('alertPwd');

  function show(msg, isErr){
    if(!alertBox) return;
    alertBox.className = 'alert ' + (isErr ? 'alert-danger' : 'alert-success');
    alertBox.innerHTML = msg;
    alertBox.classList.remove('d-none');
  }

  if (!cur || !np || !nc) return show('Semua field wajib diisi.', true);
  if (np.length < 8)      return show('Kata kunci baru minimal 8 karakter.', true);
  if (np !== nc)          return show('Konfirmasi kata kunci tidak sama.', true);

  const fd = new FormData();
  fd.append(csrfNameChgPass, csrfHashChgPass);
  fd.append('current_password', cur);
  fd.append('new_password', np);
  fd.append('new_password_confirm', nc);

  try {
    const res = await fetch('<?= base_url('profile/update-password') ?>', {
      method: 'POST',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: fd,
      credentials: 'same-origin' 
    });
    const data = await res.json().catch(() => ({}));
    if (data.token) csrfHashChgPass = data.token;
    if (!res.ok || data.ok === false) {
      const msg = data.error || (data.errors ? Object.values(data.errors).join('<br>') : 'Gagal memperbarui kata kunci.');
      return show(msg, true);
    }
    show(data.message || 'Kata kunci berhasil diperbarui.', false);
  } catch (e) {
    show('Terjadi kesalahan jaringan.', true);
  }
});
</script>

<script>
// ===============================
// Tampilkan tombol Simpan hanya di tab personal
// ===============================
document.addEventListener('DOMContentLoaded', () => {
  const btnSave = document.getElementById('btnSaveProfil');
  const tabLinks = document.querySelectorAll('#list-tab a[data-bs-toggle="list"]');
  tabLinks.forEach(link => {
    link.addEventListener('shown.bs.tab', function (e) {
      const target = e.target.getAttribute('href');
      if (target === '#list-personal' || target === '#list-profils' ) { btnSave.style.display = 'inline-block'; }
      else { btnSave.style.display = 'none'; }
    });
  });
  if (!document.querySelector('#list-personal')?.classList.contains('show')) {
    btnSave && (btnSave.style.display = 'none');
  }
});
</script>

<script>
// ===============================
// Avatar preview
// ===============================
document.getElementById('avatarInput')?.addEventListener('change', function (e) {
  const file = e.target.files?.[0];
  if (!file) return;
  const reader = new FileReader();
  reader.onload = function (evt) {
    const img = document.getElementById('avatarPreview');
    if(img) img.src = evt.target.result;
  };
  reader.readAsDataURL(file);
});
</script>

<script>
// ===============================
// Modal deactivate
// ===============================
function openDeactivateModal(email){
  const span = document.getElementById('deactivateEmail');
  if(span) span.textContent = email || '';
  const m = new bootstrap.Modal(document.getElementById('deactivateModal'));
  m.show();
}
document.getElementById('btnConfirmDeactivate')?.addEventListener('click', async function(){
  const email = (document.getElementById('deactivateEmail')?.textContent || '').trim();
  const fd = new FormData();
  fd.append('email', email);
  fd.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
  try {
    const res = await fetch('<?= base_url('profile/deactivate') ?>', {
      method: 'POST',
      headers: { 'X-Requested-With': 'XMLHttpRequest' },
      body: fd
    });
    const out = await res.json();
    if (out.ok) {
      bootstrap.Modal.getInstance(document.getElementById('deactivateModal'))?.hide();
      $.ambiance?.({ message: 'Akun berhasil dinonaktifkan: ' + email, type: "success" });
      setTimeout(()=>{ window.location.href = '<?= base_url('auth/logout') ?>'; }, 1500);
    } else {
      $.ambiance?.({ message: 'Gagal menonaktifkan akun: ' + (out.error || 'Tidak diketahui'), type: "error" });
    }
  } catch {
    $.ambiance?.({ message: 'Network error', type: "error" });
  }
});
</script>

<script>
// ===============================
// Skills chips (tetap sama)
// ===============================
(function(){
  const skillsWrapper = document.getElementById('skillsWrapper');
  const skillsInput   = document.getElementById('skillsInput');
  const skillsHidden  = document.getElementById('skillsHidden');
  window.__initialSkills = <?= json_encode($skillsFromDb, JSON_UNESCAPED_UNICODE) ?>;
  let skills = Array.isArray(window.__initialSkills) ? window.__initialSkills : [];

  function syncHidden(){ if(skillsHidden) skillsHidden.value = JSON.stringify(skills); }
  function render(){
    if(!skillsWrapper) return;
    [...skillsWrapper.querySelectorAll('.chip')].forEach(el => el.remove());
    skills.forEach((t,i)=>{
      const chip = document.createElement('span');
      chip.className = 'chip';
      chip.innerHTML = `${t}<span class="x" data-i="${i}">&times;</span>`;
      skillsWrapper.insertBefore(chip, skillsInput);
    });
    syncHidden();
  }
  function addFromInput(){
    const val = (skillsInput?.value || '').trim();
    if(!val) return;
    if(!skills.includes(val)) skills.push(val);
    skillsInput.value = '';
    render();
  }
  skillsInput?.addEventListener('keydown', (e)=>{
    if(e.key === 'Enter' || e.key === ','){ e.preventDefault(); e.stopPropagation(); addFromInput(); }
  });
  skillsInput?.addEventListener('paste', (e)=>{
    const text = (e.clipboardData || window.clipboardData).getData('text');
    if(text.includes(',')){
      e.preventDefault();
      text.split(',').map(s=>s.trim()).filter(Boolean).forEach(s=>{ if(!skills.includes(s)) skills.push(s); });
      render();
    }
  });
  skillsWrapper?.addEventListener('click', (e)=>{
    if(e.target.classList.contains('x')){ const i = +e.target.dataset.i; skills.splice(i,1); render(); }
  });
  skillsInput?.addEventListener('blur', addFromInput);
  render();
})();
</script>

<script>
// ===============================
// Util: close modal by id
// ===============================
function closeModalById(id){
  const el = document.getElementById(id);
  if (!el) return;
  let modal = bootstrap.Modal.getInstance(el);
  if (!modal) { modal = new bootstrap.Modal(el); }
  modal.hide();
}
</script>


<?= $this->endSection() ?>