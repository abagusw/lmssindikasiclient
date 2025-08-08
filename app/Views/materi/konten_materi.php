<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Materi Kolektaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="<?=ASSETS_URL?>compo_notif/jquery.ambiance.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=URLGhost?>/assets/built/screen.css">
<!--   <style>
    body {
      background-color: #f9fafb;
    }

    .topbar {
      background-color: white;
      border-bottom: 1px solid #ddd;
      padding: 0.75rem 1.5rem;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .sidebar {
      min-width: 260px;
      max-width: 300px;
      background-color: #fff;
      border-left: 1px solid #e5e7eb;
      height: 100vh;
      padding: 1.5rem;
      position: sticky;
      top: 72px;
      overflow-y: auto;
    }

    .main-content {
      padding: 2rem;
      background-color: #fff;
      border-radius: 12px;
      border: 1px solid #e5e7eb;
      margin-top: 2rem;
    }

    .text-orange {
      color: #f97316;
    }

    .text-orange:hover {
      color: #ea580c;
    }

    .btn-orange {
      background-color: #f97316;
      color: white;
    }

    .btn-orange:hover {
      background-color: #ea580c;
    }

    .active-materi {
      background-color: #f3f4f6;
      font-weight: bold;
      color: #111827;
    }
  

/* Global container */
.ghost-post-content {
  font-family: 'Segoe UI', sans-serif;
  font-size: 1rem;
  color: #333;
  line-height: 1.8;
  padding: 1rem;
}

/* Headings */
.ghost-post-content h3 {
  font-size: 1.4rem;
  font-weight: 600;
  margin-top: 2rem;
  margin-bottom: 1rem;
  color: #212529;
  border-left: 4px solid #ff5e5e;
  padding-left: 0.75rem;
}

/* Paragraphs */
.ghost-post-content p {
  margin-bottom: 1rem;
}

/* Bookmark Card */
.ghost-post-content .kg-card.kg-bookmark-card {
  border: 1px solid #eee;
  border-radius: 10px;
  overflow: hidden;
  margin: 1.5rem 0;
  display: flex;
  flex-direction: column;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
}

.ghost-post-content .kg-bookmark-container {
  display: flex;
  flex-direction: row;
  text-decoration: none;
  color: inherit;
}

.ghost-post-content .kg-bookmark-content {
  flex: 1;
  padding: 1rem;
}

.ghost-post-content .kg-bookmark-title {
  font-weight: bold;
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
  color: #d62828;
}

.ghost-post-content .kg-bookmark-description {
  font-size: 0.95rem;
  color: #555;
  margin-bottom: 0.75rem;
}

.ghost-post-content .kg-bookmark-metadata {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.8rem;
  color: #888;
}

.ghost-post-content .kg-bookmark-icon {
  width: 18px;
  height: 18px;
}

.ghost-post-content .kg-bookmark-thumbnail {
  width: 160px;
  height: 100%;
  object-fit: cover;
  overflow: hidden;
}

.ghost-post-content .kg-bookmark-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Figure Caption */
.ghost-post-content figcaption {
  font-size: 0.9rem;
  text-align: center;
  margin-top: 0.5rem;
  color: #444;
}

/* Callout Card */
.ghost-post-content .kg-callout-card {
  background-color: #fdf6e3;
  border-left: 5px solid #ffb703;
  padding: 1rem;
  border-radius: 6px;
  margin: 2rem 0;
}

.ghost-post-content .kg-callout-text {
  font-size: 1rem;
  color: #333;
}


/* Responsive iframe (embed YouTube, etc.) */
.ghost-post-content .kg-embed-card iframe {
  width: 100%;
  height: 315px;
  max-width: 100%;
  border: none;
  border-radius: 8px;
  margin: 1.5rem 0;
}

/* Gambar dalam image card */
.ghost-post-content .kg-image-card img {
  width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 1.5rem 0;
}

/* Embed caption */
.ghost-post-content figure.kg-card-hascaption figcaption {
  font-style: italic;
  color: #666;
  font-size: 0.9rem;
  margin-top: 0.5rem;
}

/* Callout Card - accent (footer message) */
.ghost-post-content .kg-callout-card-accent {
  background-color: #e6f4ff;
  border-left: 5px solid #0077cc;
  padding: 1rem;
  border-radius: 6px;
  margin: 2rem 0;
  color: #003355;
}

/* Ordered & Unordered Lists */
.ghost-post-content ul,
.ghost-post-content ol {
  margin: 1rem 0 1.5rem 1.5rem;
  padding-left: 1rem;
}

.ghost-post-content li {
  margin-bottom: 0.5rem;
}

/* Blockquote */
.ghost-post-content blockquote {
  border-left: 4px solid #ccc;
  padding-left: 1rem;
  font-style: italic;
  color: #555;
  margin: 1.5rem 0;
  background: #f9f9f9;
  padding: 1rem 1.5rem;
  border-radius: 4px;
}

/* Horizontal rule */
.ghost-post-content hr {
  border: none;
  border-top: 1px solid #ddd;
  margin: 2rem 0;
}

/* H2 support */
.ghost-post-content h2 {
  font-size: 1.75rem;
  font-weight: 700;
  margin-top: 2.5rem;
  margin-bottom: 1.25rem;
  color: #c1121f;
}


/* Responsive adjustments */
@media (max-width: 768px) {
  .ghost-post-content .kg-bookmark-container {
    flex-direction: column;
  }

  .ghost-post-content .kg-bookmark-thumbnail {
    width: 100%;
    height: auto;
  }

  .ghost-post-content .kg-bookmark-thumbnail img {
    height: auto;
  }
}

  </style> -->
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
    <strong class="me-3"><a href="<?= base_url()?>dashboard">🧩 kolektaria</a></strong>
    <span class="text-muted">Course</span>
    <a href="#" id="toggleSidebar" class="text-orange ms-4 small">Sembunyikan daftar materi</a>
  </div>
  <div class="d-flex align-items-center gap-3">
    <input type="text" class="form-control form-control-sm" placeholder="Search" style="width: 200px;">
    <img src="<?= base_url('user-avatar.png') ?>" alt="avatar" class="rounded-circle" width="32" height="32">
  </div>
</div>



<!-- MAIN SECTION -->
<div class="container-fluid">
  <div class="row">
    <!-- KONTEN -->
    <div class="col-lg-9 p-4">
      <div class="main-content">
        <p class="text-muted small">Materi 6 dari 6</p>
        <h4 class="fw-bold mb-4"><?= $getData['title']; ?></h4>

        <img src="<?= $getData['feature_image']; ?>" class="img-fluid rounded mb-4" alt="Ilustrasi">
        <div class="ghost-post-content">
            <?= $getData['html']; ?>
        </div>
        <div class="text-center mt-5">
          <?php 
          if(!$cekCoursePart){
            ?>
          <button class="btn btn-orange px-4 rounded-pill" type="button" onclick="selesaiBaca(<?php echo $course_id; ?>,<?php echo $getMsCourseLessonByid['course_id']; ?>)">Selesai dibaca</button>
        <?php } else {?>
          <button class="btn btn-success px-4 rounded-pill" type="button" disabled>Sudah Dibaca</button> <?php } ?>

        </div>
      </div>
    </div>

    <!-- SIDEBAR -->
    <div class="col-lg-3 border-start px-4" id="sidebarBox">
      <h6 class="fw-semibold mt-4 mb-3">Daftar Materi</h6>
      <div class="list-group list-group-flush small">
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
            $isParticipated = $coursePartModel->where('user_id', $user_id)
                                                  ->where('course_id', $getMsCourseLessonByid['course_id'])
                                                  ->where('course_lesson_id', $lesson['id'])
                                                  ->countAllResults() > 0;

        ?>
<!--         <i class="bi bi-circle text-muted me-2"></i> -->

        <a href="<?= base_url()?>materi/konten/<?= $lesson['id'] ?>" class="list-group-item list-group-item-action">
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center border-0 rounded-4 shadow-sm p-3">
      
      <!-- Tombol Close -->
      <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>

      <!-- Gambar Sertifikat -->
      <img src="<?= base_url() ?>public/assets/images/final.png" alt="Ilustrasi Sertifikat" width="80" class="mx-auto mb-3">

      <!-- Isi Konten -->
      <h5 class="fw-bold">Materi selesai!</h5>
      <p class="mb-1">Selamat! Kamu telah menyelesaikan</p>
      <p class="fw-semibold" id="lblPendidikan">Pendidikan Dasar Serikat</p>

      <!-- Tombol Unduh -->
      <a href="<?= base_url() ?>materi/materi_selesai" class="btn btn-orange mt-2">Unduh Kartu Tanda Anggota</a>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?=ASSETS_URL?>compo_notif/jquery.ambiance.js"></script>
<script>
  const toggleSidebar = document.getElementById('toggleSidebar');
  const sidebarBox = document.getElementById('sidebarBox');

  toggleSidebar.addEventListener('click', function (e) {
    e.preventDefault();
    sidebarBox.classList.toggle('d-none');
    toggleSidebar.textContent = sidebarBox.classList.contains('d-none') ? 'Tampilkan daftar materi' : 'Sembunyikan daftar materi';
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
                $.ambiance({message: "Sukses disimpan",
                  type: "success",
                  fade: false});

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
                $.ambiance({message: response.respMessage,
                  type: "error",
                  fade: false});
                top.location.href="<?= base_url() ?>materi/konten/"+response.nextLessonId;
              }

            }

        });
  }

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
