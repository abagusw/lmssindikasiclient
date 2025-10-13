<?= $this->extend('templates/app'); ?>

<?= $this->section('content'); ?>
<style>
  .course-status {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 0.5rem;
  }
  .status-completed { background-color: #d1e7dd; color: #0f5132; }
  .status-inprogress { background-color: #cff4fc; color: #055160; }
  .status-notstarted { background-color: #f8d7da; color: #842029; }
  .course-card:hover {
    transform: translateY(-3px);
    transition: 0.2s ease;
  }
</style>

<?php
  $perPage = $courses ? count($courses) : 0;
  $total = $pager->getTotal();
  $currentPage = $pager->getCurrentPage() ?? 1;
  $start = ($currentPage - 1) * $perPage + 1;
  $end = $start + $perPage - 1;
  if ($end > $total) $end = $total;

  $limitOptions = [5, 10, 15, 20];
  $selectedLimit = (int) ($request->getGet('limit') ?? 10);
  $sort = $request->getGet('sort') ?? 'desc';


  use App\Models\MasterCourseParticipantModel;
  use App\Models\MasterCourseLesson;
  $coursePartModel = new MasterCourseParticipantModel();
  $courseLesson = new MasterCourseLesson();
  $user_id = session()->get('id');
?>
<div class="container py-4">
  <h4 class="mb-3">Course</h4>

    <!-- Filter -->
  <form method="get" class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 mb-4">
    <div class="d-flex gap-2 align-items-center">
      <select name="limit" class="form-select form-select-sm" onchange="this.form.submit()">
        <?php foreach ($limitOptions as $limit): ?>
          <option value="<?= $limit ?>" <?= $selectedLimit == $limit ? 'selected' : '' ?>>
            Baris per halaman: <?= $limit ?>
          </option>
        <?php endforeach; ?>
      </select>

      <span class="text-muted small">
        Menampilkan <?= $start ?>–<?= $end ?> dari <?= $total ?> item
      </span>
    </div>

    <div>
      <select name="sort" class="form-select form-select-sm" onchange="this.form.submit()">
        <option value="desc" <?= $sort == 'desc' ? 'selected' : '' ?>>Urutkan: Paling Baru</option>
        <option value="asc" <?= $sort == 'asc' ? 'selected' : '' ?>>Urutkan: Paling Lama</option>
      </select>
    </div>
  </form>

  <div class="row gy-4">
    <?php foreach ($courses as $c): ?>
      <?php
      if($c['cover'] != ""){
        $gb = urlAdmin."uploads/course/" . $c['cover'];
      }else{
        $gb = "https://placehold.co/300x200?text=No+Image&font=roboto";
      }
      $countLesson = $courseLesson->where('course_id',$c['id'])->countAllResults();
      $jumlahPartisipasi = $coursePartModel->where('user_id', $user_id)
                                                  ->where('course_id', $c['id'])
                                                  ->countAllResults();

      // $perTahap1 = $jumlahPartisipasi / $countLesson;
      // $persens = $perTahap1 * 100; 
      // $persen = floor($persens * 100) / 100;

      if ($countLesson > 0) {
          $perTahap1 = $jumlahPartisipasi / $countLesson;
          $persens = $perTahap1 * 100; 
          $persen = floor($persens * 100) / 100;
      } else {
          // Handle case when there are no lessons
          $persen = 0;  // or some other default value
          // You can also display a message or log it if necessary.
          //echo "No lessons available for this course.";
      }
      ?>
      <div class="col-12">
        <div class="course-card d-flex flex-column flex-md-row p-3 bg-white rounded shadow-sm">
          <div class="flex-shrink-0 me-md-4 mb-3 mb-md-0">
            <img src="<?= $gb ?>" alt="Course image" class="img-fluid rounded" style="max-width: 200px;">
          </div>
          <div class="flex-grow-1">
            <h5 class="mb-1"><?= esc($c['judul']) ?></h5>
            <p class="text-muted mb-2"><?= esc($c['deskripsi']) ?></p>
            <div class="mb-2">
              <div class="progress">
                <div class="progress-bar bg-success" style="width: <?= $persen; ?>%"><?= $persen; ?>%</div>
              </div>
            </div>
            <a href="<?= base_url('materi/dasar/'.$c['id'].'') ?>" class="btn btn-sm btn-outline-warning">Lihat materi →</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<div class="mt-4">
  <?= $pager->links('default', 'bootstrap_full') ?>

</div>

<?= $this->endSection(); ?>
