<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>

<div class="section-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Pendidikan Dasar Serikat</h5>
    <a href="<?= base_url()?>materi/konten/<?= $dataLessonAsc['uuid'] ?>" class="btn btn-orange">Mulai pelajaran</a>
  </div>

  <!-- Progress -->
  <div class="mb-4">
    <h6 class="mb-1">Kemajuan Course</h6>
    <p class="text-muted mb-2">Menyelesaikan 1 dari <?= count($dataLesson); ?> materi pelajaran</p>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 16.6%;" aria-valuenow="16.6" aria-valuemin="0" aria-valuemax="100">16,6%</div>
    </div>
  </div>

  <!-- Materi Kursus -->
  <div>
    <h6 class="mb-3">Materi Kursus <span class="text-muted">(<?= count($dataLesson); ?> materi)</span></h6>
    <div class="list-group">


        <?php
          foreach($dataLesson as $lesson){
            $key = ApiKeyGhost; // Ganti dengan API key kamu
            $url = URLGhost."/ghost/api/content/posts/?key=$key&filter=uuid:[".$lesson['uuid']."]&limit=1";

            $client = \Config\Services::curlrequest();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            if (!empty($data['posts'][0])) {
                $title = $data['posts'][0]['title'];
                $slug = $data['posts'][0]['slug'];
               // echo 'Judul: ' . $title;
            } else {
              $slug = "N/A";
              $title = "N/A";
               // echo 'Data tidak ditemukan.';
            }
            ?>
          <label class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <input class="form-check-input me-2" type="checkbox" disabled>
              <?= $title; ?>
            </div>
            <small class="text-muted">7 menit baca</small>
          </label>
        <?php } ?>

    </div>
  </div>
</div>

<?= $this->endSection(); ?>