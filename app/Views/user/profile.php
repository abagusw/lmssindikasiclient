  <!-- Header -->
<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
  <div class="profile-header">
    <img src="user-avatar.png" class="profile-avatar" alt="Avatar">
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
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">Data Personal</a>
          <a href="#" class="list-group-item list-group-item-action">Data Profil</a>
          <a href="#" class="list-group-item list-group-item-action">Data Tanda Anggota</a>
          <a href="#" class="list-group-item list-group-item-action">Kegiatan DPS</a>
          <a href="#" class="list-group-item list-group-item-action">Checklist</a>
        </div>
      </div>

      <!-- Content -->
      <div class="col-lg-9">
        <!-- Data Pribadi -->
        <div class="section-box">
    <form id="formRegister">
    <!-- SECTION 1: Data Pribadi -->
    <div class="form-section">
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

        <!-- SECTION 2: Kontak -->
        <div class="form-section">
          <div class="section-header">2. Data Pekerjaan</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label required">Subsektor industri kreatif</label>
                <select class="form-select" id="subsektor" name="subsektor" required>
                  <option selected disabled>Pilih</option>
                  <?php 
                  foreach($getDataSubsektor as $subsektor){
                    echo"
                  <option value=".$subsektor['id'].">".$subsektor['name']."</option>";}?>
                </select>
            </div>
            <div class="col-md-6">
              <label class="form-label required">Instansi/perusahaan/pemberi kerja</label>
              <input type="text" id="instansi" name="instansi" class="form-control" required>
            </div>

            <div class="col-md-6">
              <label class="form-label required">Jabatan/profesi</label>
                <select class="form-select" id="jabatan" name="jabatan" required>
                  <option selected disabled>Pilih</option>
                  <?php 
                  foreach($getDataJabatan as $jabatan){
                    echo"
                  <option value=".$jabatan['id'].">".$jabatan['name']."</option>";}?>
                </select>
            </div>
            <div class="col-md-6">
              <label class="form-label required">Status ketenagakerjaan</label>
              <input type="text" id="status_ketenagakerjaan" name="status_ketenagakerjaan" class="form-control" required>
            </div>      
            <div class="col-md-12">
              <label class="form-label">Deskripsi pekerjaan</label>
              <textarea class="form-control" rows="3" id="deskripsi_pekerjaan" name="deskripsi_pekerjaan" maxlength="200" placeholder="Tulis tugas dan tanggung jawab anda"></textarea>
            </div>
            <div class="col-md-12">
              <label class="form-label">Masalah ketenagakerjaan <small>Anda bisa pilih lebih dari satu</small></label>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Upah dibawah standar" id="upah_dibawah_standar">
                      <label class="form-check-label" for="upah_dibawah_standar">Upah dibawah standar</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Tidak ada jaminan kesehatan" id="tidak_ada_jaminan_kesehatan">
                      <label class="form-check-label" for="tidak_ada_jaminan_kesehatan">Tidak ada jaminan kesehatan</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Jam kerja tidak teratur" id="jam_kerja_tidak_teratur">
                      <label class="form-check-label" for="jam_kerja_tidak_teratur">Jam kerja tidak teratur</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Tidak ada kontrak kerja" id="tidak_ada_kontrak_kerja">
                      <label class="form-check-label" for="tidak_ada_kontrak_kerja">Tidak ada kontrak kerja</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Pelecehan di tempat kerja" id="pelecehan_ditempat_kerja">
                      <label class="form-check-label" for="pelecehan_ditempat_kerja">Pelecehan di tempat kerja</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Diskriminasi" id="diskriminasi">
                      <label class="form-check-label" for="diskriminasi">Diskriminasi</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="PHK sepihak" id="phk_sepihak">
                      <label class="form-check-label" for="phk_sepihak">PHK sepihak</label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="masalah_ketenagakerjaan[]" value="Lainnya" id="masalah_ketenagakerjaan_lainnya">
                      <label class="form-check-label" for="masalah_ketenagakerjaan_lainnya">Lainnya</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <label class="form-label">Jenis masalah lainnya</label>
              <input type="text" id="jenis_masalah_lainnya" name="jenis_masalah_lainnya" class="form-control">
            </div>
            <div class="col-md-12">
              <label class="form-label">Alasan bergabung Sindikasi</label>
              <textarea class="form-control" rows="3" id="alasan_bergabung_sindikasi" name="alasan_bergabung_sindikasi" maxlength="200" placeholder="Jelaskan alasan anda ingin bergabung dengan sindikasi"></textarea>
            </div>
          </div>
        </div>

        <!-- SECTION 3: Pendidikan -->
        <div class="form-section">
          <div class="section-header">Media Sosial</div>
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

        <div class="form-section">
          <div class="section-header">Keanggotaan BPJS</div>
            <div class="mt-4">
              <label class="form-label">Status keanggotaan BPJSKS</label>
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="card-radio">
                      <div class="title">Terdaftar</div>
                      <div>Anda sudah memiliki kepesertaan BPJS Ketenagakerjaan yang aktif.</div>
                      <input type="radio" name="bpjstk" value="terdaftar_bpjstk" required>
                    </label>
                  </div>
                  <div class="col-md-6">
                    <label class="card-radio">
                      <div class="title">Belum terdaftar</div>
                      <div>Anda belum mendaftarkan diri sebagai peserta BPJS Ketenagakerjaan.</div>
                      <input type="radio" name="bpjstk" value="belum_terdaftar_bpjstk" required>
                    </label>
                  </div>
                </div>
                <div class="required-note">Kolom ini wajib diisi</div>
            </div>
        </div>

        <!-- BPJSKS -->
        <div class="mt-4">
          <label class="form-label">Status keanggotaan BPJSKS</label>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="card-radio">
                <div class="title">Terdaftar</div>
                <div>Anda sudah memiliki kepesertaan BPJS Kesehatan yang aktif.</div>
                <input type="radio" name="bpjsks" value="terdaftar_bpjsks" required>
              </label>
            </div>
            <div class="col-md-6">
              <label class="card-radio">
                <div class="title">Belum terdaftar</div>
                <div>Anda belum mendaftarkan diri sebagai peserta BPJS Kesehatan.</div>
                <input type="radio" name="bpjsks" value="belum_terdaftar_bpjsks" required>
              </label>
            </div>
          </div>
          <div class="required-note">Kolom ini wajib diisi</div>
        </div>


        <div class="form-section">
          <div class="section-header">Keanggotaan BPJS</div>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label required">Status keanggotaan BPJSTK</label>
              <select class="form-select" id="status_anggota_bpjstk" name="status_anggota_bpjstk" required>
                  <option value="" selected disabled>Pilih</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
            <div class="col-md-6">
              <label class="form-label required">Status keanggotaan BPJSKS</label>
              <select class="form-select" id="status_anggota_bpjsks" name="status_anggota_bpjsks" required>
                  <option value="" selected disabled>Pilih</option>
                  <option value="aktif">Aktif</option>
                  <option value="tidak_aktif">Tidak Aktif</option>
                </select>
            </div>
          </div>
        </div>

        <div class="form-section">
          <div class="section-header">Pakta Integritas</div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label"><small>Centang semua untuk melanjutkan</small></label>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 1" id="pakta_integritas_point_1" required><label class="form-check-label" for="pakta_integritas_point_1">Pakta Integritas Point 1</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 2" id="pakta_integritas_point_2" required>Pakta Integritas Point 2</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 3" id="pakta_integritas_point_3" required>Pakta Integritas Point 3</label></div>
                </div>
                <div class="col-md-6">
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 4" id="pakta_integritas_point_4" required><label class="form-check-label" for="pakta_integritas_point_4">Pakta Integritas Point 4</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 5" id="pakta_integritas_point_5" required><label class="form-check-label" for="pakta_integritas_point_5">Pakta Integritas Point 5</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pakta_integritas[]" value="Point 6" id="pakta_integritas_point_6" required><label class="form-check-label" for="pakta_integritas_point_6">Pakta Integritas Point 6</label></div>
                </div>

              </div>
              <div class="mt-4">
                <h6 class="fw-bold">Isi Lengkap Pakta Integritas:</h6>
                <ol class="ps-3">
                  <li>Tidak akan melakukan kekerasan dan pelecehan seksual baik itu di dalam dan di luar organisasi.</li>
                  <li>Mendukung <strong>SINDIKASI</strong> mewujudkan lingkungan yang aman dan nyaman untuk semua orang dalam memperoleh hak untuk hidup tanpa diskriminasi, terutama kekerasan dan pelecehan seksual.</li>
                  <li>Bersikap aktif mendukung <strong>SINDIKASI</strong> membangun budaya toleransi nol untuk segala bentuk kekerasan dan pelecehan seksual.</li>
                  <li>Mematuhi dan melaksanakan kode etik dan pedoman perilaku <strong>SINDIKASI</strong> untuk memberikan rasa aman dan nyaman sesuai dengan peraturan organisasi.</li>
                  <li>Menegakkan hak atas kebenaran serta mendukung upaya pencarian keadilan dan pemulihan bagi korban kekerasan dan pelecehan seksual.</li>
                  <li>Apabila melanggar hal-hal yang dinyatakan dalam <strong>PAKTA INTEGRITAS</strong> ini, bersedia menerima sanksi sesuai dengan peraturan <strong>SINDIKASI</strong>.</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="required-note">Pilihan ini wajib diisi</div>

        </div>

        <div class="form-section">
          <div class="section-header">Pernyataan Keanggotaan</div>
          <div class="row g-3">
            <div class="col-md-12">
              <label class="form-label"><small>Centang semua untuk melanjutkan</small></label>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-check">  <input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="bersedia_mematui_art" id="bersedia_mematui_art"><label class="form-check-label" for="bersedia_mematui_art">Bersedia mematuhi AD/ART Sindikasi</label></div>
                  <div class="form-check">  <input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="bersedia_mematuhi_kode_etik" id="bersedia_mematuhi_kode_etik"><label class="form-check-label" for="bersedia_mematuhi_kode_etik">Bersedia mematuhi kode etik sindikasi</label></div>
                  <div class="form-check">  <input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="bersedia_mengikuti_pendidikan" id="bersedia_mengikuti_pendidikan"><label class="form-check-label" for="bersedia_mengikuti_pendidikan">Bersedia mengikuti Pendidikan Dasar Anggota sindikasi</label></div>
                  <div class="form-check">  <input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="statement_keaslian_data" id="statement_keaslian_data"><label class="form-check-label" for="statement_keaslian_data">Statement keaslian data - Saya menyatakan bahwa data yang saya berikah adalah benar</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="bersedia_bergabung_grup" id="bersedia_bergabung_grup"><label class="form-check-label" for="bersedia_bergabung_grup">Bersedia bergabung dalam grup whatsapp dan telegram anggota SINDIKASI</label></div>
                  <div class="form-check"><input class="form-check-input" type="checkbox" name="pernyataan_keanggotaan[]" value="memberikan_konsen" id="memberikan_konsen"><label class="form-check-label" for="memberikan_konsen">Memberikan konsen untuk pemrosesan data sesuai kebijakan privasi SINDIKASI</label></div>
                </div>
              </div>
            </div>
          </div>
          <div class="required-note">Pilihan ini wajib diisi</div>

        </div>

        <div class="row g-3 justify-content-end">
          <div class="col-6 col-md-3">
            <a href="<?= base_url() ?>register" class="btn btn-orange-outline w-100">Batal</a>
          </div>
          <div class="col-6 col-md-3">
            <button type="submit" id="submitBtn" class="btn btn-orange w-100">
              Kirim <span class="ms-2">→</span>
            </button>
          </div>
        </div>
    </form>
        </div>
      </div>
    </div>  
  </div>

<?= $this->endSection() ?>