<?php
  include "config.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil | SMK PESAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container position-relative">
        <a class="navbar-brand" href="#">
          <img src="https://tesis.sekolah-pesat.com/assets/images/logo-smk-pesat.png" alt="Bootstrap" width="80" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav fs-6">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../index.html">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active fw-500" href="#">Profil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ekskul.html">Ekstrakulikuler</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../galeri.html">Galeri</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../pendaftaran.html">Pendaftaran</a>
            </li>
          </ul>
          <div class="ms-auto">
            <a href="https://api.whatsapp.com/send/?phone=6287711177442&text=Hallo%2C+saya+ingin+lebih+tahu+tentang+SMK+Pesat+IT+XPro&type=phone_number&app_absent=0"><button class="btn btn-outline-orange" type="button">Kontak kami</button></a>
          </div>
        </div>
      </div>
    </nav>
        
     <br><br><br><br>
    <div class="container mt-5">
      <div class="row align-items-center hero-section">
        <div class="col-md-6 hero-content">
          <p class="text-primary fw-medium">TENTANG KAMI</p>
          <h1 class="fs-1 lh-base">Unggul, Mandiri dan Berbudaya.</h1>
          <p class="lh-small mt-3 text-justify">Dengan fokus pada keterampilan praktis dan inovasi, kami membekali siswa dengan pengalaman belajar yang relevan di bidang teknologi informasi, desain komunikasi visual, serta kompetensi lainnya.</p>
          <div class="d-flex gap-2 mt-4">
            <a href="#tentangkami"><button class="btn btn-primary" type="button">Pelajari lebih lanjut</button></a>
            <a href="pendaftaran.html"><button class="btn btn-outline-orange" type="button">Daftar Sekarang</button></a>
          </div>
        </div>
        <div class="col-md-6 hero-image rounded">
          <img src="../img/kegiatan-parentinh.jpg" alt="image" class="img-fluid" width="90%">
        </div>
      </div>
    </div>

    <br><br><br>
    <div class="container mt-5">
    <div class="container mt-5">
    <h1 class="text-center">Tabel informasi SMK informatika pesat</h1>
    <p></p>
    
    <?php
      $sql = "SELECT * FROM informasi";
      $query = mysqli_query($koneksi, $sql);
      if(mysqli_num_rows($query) > 0) {
          echo '<table class="table border text-center">';
          echo '<thead>';
          echo '<tr>';
          echo '<th scope="col">No</th>';
          echo '<th scope="col">Informasi</th>';
          echo '<th scope="col">Detail</th>';
          echo '<th scope="col">Foto</th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          
          $no = 1;
          while($data = mysqli_fetch_array($query)){
              echo "<tr>";
              echo "<td>".$no++."</td>";
              echo "<td>".$data['informasi']."</td>";
              echo "<td>".$data['detail']."</td>";
              echo '<td><img src="../img/' . htmlspecialchars($data['foto']) . '" alt="Foto" style="max-width: 100px; max-height: 100px;"></td>';
              echo "</tr>";
          }
          
          echo '</tbody>';
          echo '</table>';
      } else {
          echo '<div class="alert alert-info text-center">Belum ada informasi</div>';
      }
    ?>
</div>

</div>


    <br>
    <div class="container" id="tentangkami">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h1>Pencapaian kami</h1>
          <p class="lh-base">Pencapaian bukan akhir dari perjalanan, tapi awal dari <br>tantangan yang lebih besar.</p>
          
          <div class="progress mt-4" role="progressbar" aria-label="Wirausaha" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 25%">Wirausaha</div>
          </div>
          
          <div class="progress mt-4" role="progressbar" aria-label="Kuliah" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 50%">Kuliah</div>
          </div>
          
          <div class="progress mt-4" role="progressbar" aria-label="Bekerja" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: 75%">Bekerja</div>
          </div>
        </div>
        
        <div class="col-md-6">
          <div class="row text-center counter-section">
            <div class="col-6 mb-4">
              <div class="counter-box">
                <div class="counter-value text-warning" data-count="459">0</div>
                <div class="counter-title">Wirausaha</div>
              </div>
            </div>
            
            <div class="col-6 mb-4">
              <div class="counter-box">
                <div class="counter-value" data-count="783">0</div>
                <div class="counter-title">Kuliah</div>
              </div>
            </div>
            
            <div class="col-6 mb-4">
              <div class="counter-box">
                <div class="counter-value" data-count="1068">0</div>
                <div class="counter-title">Bekerja</div>
              </div>
            </div>
            
            <div class="col-6 mb-4">
              <div class="counter-box">
                <div class="counter-value text-warning" data-count="145">0</div>
                <div class="counter-title">Startup Founder</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid container">
      <div class="map-responsive">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.511860712817!2d106.76539617480644!3d-6.583111093410447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4ff2d5ecf4b%3A0x9da488eab0064996!2sSMK%20informatika%20Pesat%20Kota%20Bogor!5e0!3m2!1sid!2sid!4v1744525709968!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="1300" height="600">
        </iframe>
      </div>
    </div>
    

     <!-- footer -->
<footer class="pt-5 pb-4 mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <img src="https://tesis.sekolah-pesat.com/assets/images/logo-smk-pesat.png" alt="SMK Pesat Logo" width="120" class="mb-3">
        <p class="mb-3">SMK Pesat IT XPRO - Mencetak generasi yang religius, expert, dan professional di bidang teknologi informasi.</p>
        <div class="d-flex gap-3 mt-4">
          <a href="#" class="">
            <i class="bi bi-facebook fs-5"></i>
          </a>
          <a href="#" class="">
            <i class="bi bi-instagram fs-5"></i>
          </a>
          <a href="#" class="">
            <i class="bi bi-youtube fs-5"></i>
          </a>
          <a href="#" class="">
            <i class="bi bi-twitter-x fs-5"></i>
          </a>
        </div>
      </div>
      <div class="col-md-2 mb-4">
        <h5 class="mb-4 fw-bold">Tautan Cepat</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Beranda</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Profil</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Ekstrakulikuler</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Galeri</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Pendaftaran</a></li>
        </ul>
      </div>

      <!-- Program Keahlian -->
      <div class="col-md-3 mb-4">
        <h5 class="mb-4 fw-bold">Program Keahlian</h5>
        <ul class="list-unstyled">
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Rekayasa Perangkat Lunak</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Desain Komunikasi Visual</a></li>
          <li class="mb-2"><a href="#" class="text-decoration-none text-black">Teknik Komputer & Jaringan</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="col-md-3 mb-4">
        <h5 class="mb-4 fw-bold">Kontak Kami</h5>
        <ul class="list-unstyled">
          <li class="mb-3 d-flex align-items-start">
            <i class="bi bi-geo-alt-fill me-2 mt-1"></i>
            <span>Jl. Raya Bogor KM 28, Pekayon, Pasar Rebo, Jakarta Timur</span>
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="bi bi-telephone-fill me-2"></i>
            <span>(021) 8778-9000</span>
          </li>
          <li class="mb-3 d-flex align-items-center">
            <i class="bi bi-envelope-fill me-2"></i>
            <span>info@smkpesat.sch.id</span>
          </li>
          <li class="d-flex align-items-center">
            <i class="bi bi-clock-fill me-2"></i>
            <span>Senin - Jumat: 07.00 - 16.00</span>
          </li>
        </ul>
      </div>
    </div>

    <hr class="mt-4">

    <!-- Copyright -->
    <div class="row">
      <div class="col-md-6 text-center text-md-start">
        <p class="mb-0">© 2024 SMK Pesat IT XPRO. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <p class="mb-0">
          <a href="#" class="text-decoration-none me-3">Kebijakan Privasi</a>
          <a href="#" class="text-warning">Syarat & Ketentuan</a>
        </p>
      </div>
    </div>
  </div>
</footer>

        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>
