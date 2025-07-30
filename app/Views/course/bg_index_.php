<?= $this->extend('layouts/main'); ?>
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
<div class="container py-4">
  <h4 class="mb-3">Course</h4>

  <!-- Filter -->
  <div class="d-flex flex-column flex-md-row gap-2 justify-content-between mb-4">
    <div class="d-flex gap-2">
      <select class="form-select" style="max-width: 200px;">
        <option selected>Filter per Kategori</option>
        <option>Umum</option>
        <option>Serikat</option>
      </select>
      <select class="form-select" style="max-width: 200px;">
        <option selected>Urutkan: Paling Baru</option>
        <option>Paling Lama</option>
        <option>A-Z</option>
      </select>
    </div>
    <div class="text-muted">Menampilkan <?= count($courses) ?> course</div>
  </div>

  <div class="row gy-4">
    <?php foreach ($courses as $c): ?>
      <div class="col-12">
        <div class="course-card d-flex flex-column flex-md-row p-3 bg-white rounded shadow-sm">
          <div class="flex-shrink-0 me-md-4 mb-3 mb-md-0">
            <img src="<?= base_url('uploads/course/' . $c['cover']) ?>" alt="Course image" class="img-fluid rounded" style="max-width: 200px;">
          </div>
          <div class="flex-grow-1">
            <div class="d-flex justify-content-between align-items-center mb-2">
<!--               <?php
                $statusClass = [
                  'completed' => 'status-completed',
                  'inprogress' => 'status-inprogress',
                  'notstarted' => 'status-notstarted'
                ][$c['status']];
              ?> -->
              <span class="course-status <?= $statusClass ?> text-capitalize"><?= $c['status'] ?></span>
              <small class="text-muted"><?= $c['modul'] ?> modul • <?= $c['durasi'] ?></small>
            </div>
            <h5 class="mb-1"><?= esc($c['title']) ?></h5>
            <p class="text-muted mb-2"><?= esc($c['description']) ?></p>
            <div class="mb-2">
              <div class="progress">
                <div class="progress-bar bg-<?= $c['status'] == 'completed' ? 'success' : ($c['status'] == 'inprogress' ? 'info' : 'secondary') ?>" style="width: <?= $c['progress'] ?>%"></div>
              </div>
            </div>
            <a href="<?= base_url('course/view/' . $c['id']) ?>" class="btn btn-sm btn-outline-warning">Lihat materi →</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?= $this->endSection(); ?>
