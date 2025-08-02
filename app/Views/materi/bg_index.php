<?php
        use App\Models\MasterCourseParticipantModel;
        use App\Models\MasterCourseLesson;
        $coursePartModel = new MasterCourseParticipantModel();
        $courseLesson = new MasterCourseLesson();
        $user_id = session()->get('id');

?>

<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<?php if (empty($dataLesson)) { ?>
<div id="lesson-empty-notification" class="alert alert-warning text-center mt-4" role="alert">
  <i class="bi bi-exclamation-circle-fill me-2"></i>
  <strong>Belum ada lesson yang tersedia untuk course ini.</strong>
  <div class="mt-3">
    <a href="<?= base_url('dashboard'); ?>" class="btn btn-sm btn-secondary">
      <i class="bi bi-arrow-left-circle me-1"></i> Kembali ke Daftar Course
    </a>
  </div>
</div>
<?php } else { ?>
<div class="section-box">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Course</h5>
    <a href="<?= base_url()?>materi/konten/<?= $dataLessonAsc['id'] ?>" class="btn btn-orange">Mulai pelajaran</a>
  </div>

  <?php
      $jumlahPartisipasi = 0;
      $user_id = session()->get('id');

      foreach ($dataLesson as $lesson) {
          $getCourseLesson = $courseLesson->where('course_id', $course_id)
                                          ->where('uuid', $lesson['uuid'])
                                          ->first();

          $isParticipated = $coursePartModel->where('user_id', $user_id)
                                            ->where('course_id', $course_id)
                                            ->where('course_lesson_id', $getCourseLesson['id'])
                                            ->countAllResults() > 0;

          if ($isParticipated) {
              $jumlahPartisipasi++;
          }
      }

      $perTahap1 = $jumlahPartisipasi / count($dataLesson);
      $persen = $perTahap1 * 100; 
  ?>

  <!-- Progress -->
  <div class="mb-4">
    <h6 class="mb-1">Kemajuan Course</h6>
    <p class="text-muted mb-2">Menyelesaikan <?= $jumlahPartisipasi; ?> dari <?= count($dataLesson); ?> materi pelajaran</p>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: <?= $persen; ?>%;" aria-valuenow="16.6" aria-valuemin="0" aria-valuemax="100"><?= $persen; ?>%</div>
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

            <?php

            $getCourseLesson = $courseLesson->where('course_id', $course_id)
                                                  ->where('uuid', $lesson['uuid'])
                                                  ->first();

            $isParticipated = $coursePartModel->where('user_id', $user_id)
                                                  ->where('course_id', $course_id)
                                                  ->where('course_lesson_id', $getCourseLesson['id'])
                                                  ->countAllResults() > 0;

             ?>
          <label class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <?php if ($isParticipated): ?>
                  <i class="bi bi-check-circle-fill text-success me-2"></i>
                <?php else: ?>
                  <i class="bi bi-circle text-muted me-2"></i>
                <?php endif; ?>
                <?= esc($title); ?>
            </div>
            <small class="text-muted"><?= $data['posts'][0]['reading_time'] ?> menit baca</small>
          </label>
        <?php } ?>

    </div>
  </div>
</div>

<?php } ?>

<?= $this->endSection(); ?>