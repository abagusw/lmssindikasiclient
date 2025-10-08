<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Materi SINDIKASI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= URLGhost ?>/assets/built/screen.css?v=<?= time() ?>">

  <script defer src="<?= URLGhost ?>/public/cards.min.js?v=<?= time() ?>"></script>
  <link rel="stylesheet" href="<?= URLGhost ?>/public/cards.min.css?v=<?= time() ?>">
  <link rel="stylesheet" href="<?= ASSETS_URL ?>/assets_fe/custom-ghost.css" />
</head>
<body>
<?php
    $user_id = session()->get('id');
    use App\Models\MasterCourseParticipantModel;

    $coursePartModel = new MasterCourseParticipantModel();

    $cekCoursePart = $coursePartModel->where('user_id', $user_id)
                                      ->where('course_id', $getMsCourseLessonByid['course_id'])
                                      ->where('course_lesson_id', $course_id)
                                      ->countAllResults() > 0;
?>
<!-- TOPBAR -->
<div class="topbar d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center gap-3">
   <!--  <img src="<?= base_url('logo.png') ?>" alt="logo" height="32"> -->
    <strong class="me-3"><a class="brand-link" href="<?= base_url()?>dashboard">SINDIKASI</a></strong>
    <span class="text-muted">Course</span>
    <a href="#" id="toggleSidebar" class="text-orange ms-4 small">Sembunyikan Daftar Materi</a>
  </div>
<!--   <div class="d-flex align-items-center gap-3">
    <input type="text" class="form-control form-control-lg" placeholder="Search" style="width: 200px;">
    <img src="<?= base_url('user-avatar.png') ?>" alt="avatar" class="rounded-circle" width="32" height="32">
  </div> -->
</div>



<!-- MAIN SECTION -->
<div class="container-fluid">
  <div class="row">
    <!-- KONTEN -->
    <div id="mainContent" class="col-lg-9 p-4">
      <div class="main-content">
        <p class="text-muted small">Materi <?= $currentIndex; ?> dari <?= $totalLesson; ?> </p>
        <h4 class="fw-bold mb-4"><?= $getData['title']; ?></h4>

        <img src="<?= $getData['feature_image']; ?>" class="img-fluid rounded mb-4" alt="Ilustrasi">
        <div class="ghost-post-content">
            <?= $getData['html']; ?>
        </div>
        <div class="text-center mt-5">
          <?php 
          if(!$cekCoursePart){
            ?>
          <button class="btn btn-orange px-4 rounded-pill btn-big-custom" type="button" onclick="selesaiBaca(<?php echo $course_id; ?>,<?php echo $getMsCourseLessonByid['course_id']; ?>)">Lanjut</button>
        <?php } else {?>
          <button class="btn btn-success px-4 rounded-pill btn-big-custom" type="button" disabled>Lanjut</button> <?php } ?>

        </div>
      </div>
    </div>

    <!-- SIDEBAR -->
    <div class="col-lg-3 border-start px-4" id="sidebarBox">
      <h6 class="fw-semibold mt-4 mb-3">Daftar Materi</h6>
      <div class="list-group list-group-flush small">
        <?php

        $currentLessonId = $getMsCourseLessonByid['id']; // materi yang sedang dibuka (misal ambil dari controller/URL)

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
            $isParticipated = $coursePartModel->where('user_id', $user_id)
                                                  ->where('course_id', $getMsCourseLessonByid['course_id'])
                                                  ->where('course_lesson_id', $lesson['id'])
                                                  ->countAllResults() > 0;

            $activeClass = ($lesson['id'] == $currentLessonId) ? 'active' : '';

        ?>
<!--         <i class="bi bi-circle text-muted me-2"></i> -->

        <a href="<?= base_url()?>materi/konten/<?= $lesson['id'] ?>" class="list-group-item list-group-item-action <?= $activeClass ?>">
          <?php if ($isParticipated): ?>
            <i class="bi bi-check-circle-fill text-success me-2"></i>
          <?php else: ?>
            <i class="bi bi-circle text-muted me-2"></i>
          <?php endif; ?>
          <?= esc($title); ?>
        </a>
      <?php } ?>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalSelesai" tabindex="-1" aria-labelledby="modalSelesaiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-custom">
    <div class="modal-content text-center border-0 rounded-4 shadow-sm p-3">
      
      <!-- Tombol Close -->
      <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

      <!-- Gambar Sertifikat -->
      <img src="<?= base_url() ?>public/assets/images/final.png" alt="Ilustrasi Sertifikat" width="80" class="mx-auto mb-3">

      <!-- Isi Konten -->
      <h5 class="fw-bold text-dark">Materi selesai!</h5>
      <p class="mb-1 text-dark">Selamat! Kamu telah menyelesaikan</p>
      <p class="fw-semibold" id="lblPendidikan">Pendidikan Dasar Serikat</p>

      <!-- Tombol Unduh -->
      <a href="<?= base_url() ?>materi/materi_selesai/<?= $course_id; ?>" class="btn btn-orange mt-2">Unduh Kartu Tanda Anggota</a>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>

<!-- <script>
  $('#modalSelesai').modal('show');
</script> -->
<script>
  const toggleSidebar = document.getElementById('toggleSidebar');
  const sidebarBox = document.getElementById('sidebarBox');
  const mainContent = document.getElementById('mainContent');

  toggleSidebar.addEventListener('click', function (e) {
    e.preventDefault();
    sidebarBox.classList.toggle('d-none');

    const isHidden = sidebarBox.classList.contains('d-none');

    // Ubah kelas col-lg-9 jadi col-lg-12 dan sebaliknya
    mainContent.classList.remove(isHidden ? 'col-lg-9' : 'col-lg-12');
    mainContent.classList.add(isHidden ? 'col-lg-12' : 'col-lg-9');

    // Ganti teks tombol
    toggleSidebar.textContent = isHidden ? 'Tampilkan daftar materi' : 'Sembunyikan daftar materi';
  });
</script>

<script>
  function selesaiBaca(course_lesson_id,course_id){
        $.ajax({
            type: 'POST',
            data: {course_lesson_id:course_lesson_id,course_id:course_id,'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('materi/selesai_baca')?>",
            async: false,
            dataType: 'JSON',
            success: function(response) {
              if(response.respCode == 0){
                // $.ambiance({message: "Sukses disimpan",
                //   type: "success",
                //   fade: false});

                cekMateriSelesai(course_lesson_id,course_id);
              }else{
                $.ambiance({message: response.respMessage,
                  type: "error",
                  fade: false});
              }

            }

        });
  }

  function cekMateriSelesai(course_lesson_id,course_id){
        $.ajax({
            type: 'POST',
            data: {course_lesson_id:course_lesson_id,course_id:course_id,'<?= csrf_token() ?>': '<?= csrf_hash() ?>'},
            url: "<?php echo base_url('materi/cekMateriSelesai')?>",
            async: false,
            dataType: 'JSON',
            success: function(response) {
              if(response.respCode == 0){
                if(response.kategori != 0){
                  top.location.href="<?= base_url() ?>course/list";
                }else{
                  $('#modalSelesai').modal('show');
                  $('#lblPendidikan').html(response.lblPendidikan);
                }
                $.ambiance({message: "Lesson telah selesai",
                  type: "success",
                  fade: false});

              }else{
                // $.ambiance({message: response.respMessage,
                //   type: "error",
                //   fade: false});
                top.location.href="<?= base_url() ?>materi/konten/"+response.nextLessonId;
              }

            }

        });
  }

</script>

</body>
</html>
