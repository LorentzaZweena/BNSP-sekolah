<?php
    include "config.php";
        
    $alert_message = '';
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
    $active_page = 'table';

        
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $informasi = mysqli_real_escape_string($koneksi, $_POST['informasi']);
        $detail = mysqli_real_escape_string($koneksi, $_POST['detail']);
        
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $file_tmp = $_FILES['foto']['tmp_name'];
            $file_name = $_FILES['foto']['name'];
            $file_size = $_FILES['foto']['size'];
            $file_type = $_FILES['foto']['type'];
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($file_type, $allowed_types)) {
                $alert_message = "error";
                error_log("Invalid file type: " . $file_type);
            } else if ($file_size > 5000000) {
                $alert_message = "error";
                error_log("File size exceeds limit.");
            } else {
                $upload_dir = '../img/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                $file_path = $upload_dir . uniqid() . '-' . basename($file_name);
                if (move_uploaded_file($file_tmp, $file_path)) {
                    $query = "INSERT INTO informasi (informasi, detail, foto) VALUES ('$informasi', '$detail', '$file_path')";
                    
                    try {
                        $result = mysqli_query($koneksi, $query);
                        
                        if($result){
                            $alert_message = "success";
                        } else {
                            $alert_message = "error";
                            error_log("MySQL Error: " . mysqli_error($koneksi));
                        }
                    } catch (Exception $e) {
                        $alert_message = "error";
                        error_log("Exception: " . $e->getMessage());
                    }
                } else {
                    $alert_message = "error";
                    error_log("Failed to upload the file.");
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/table-admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar bg-white">
            <div class="p-3 border-bottom">
                <h4>Admin SMK pesat</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard-admin.php" class="sidebar-link <?php echo $active_page == 'dashboard' ? 'active' : ''; ?>">
                        <i class="bi bi-speedometer2"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="sidebar-link <?php echo $active_page == 'table' ? 'active' : ''; ?>">
                        <i class="bi bi-table"></i> Tabel informasi
                    </a>
                </li>
            </ul>
            <div class="mt-auto p-3 border-top">
                <a href="logout.php" class="btn btn-outline-danger w-100">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>
        </div>
        <div class="main-content">
            <nav class="navbar navbar-expand-lg navbar-light mb-4">
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                <h5 class="card-title mb-0">Tambah data sekolah SMK PESAT</h5>
                            </div>
                            <div class="container mt-3">
                            <form class="mb-4" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="informasi" class="form-label fw-semibold">Informasi</label>
                                        <input type="text" class="form-control" id="informasi" aria-describedby="infoHelp" placeholder="Masukkan informasi" name="informasi" required>
                                        <div id="infoHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail" class="form-label fw-semibold">Detail</label>
                                        <input type="text" class="form-control" id="detail" aria-describedby="detailHelp" placeholder="Masukkan detail informasi" name="detail" required>
                                        <div id="detailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Foto</label>
                                        <input class="form-control" type="file" id="formFile" name="foto" required>
                                    </div>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php if($alert_message === 'success'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Berhasil menambah data',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'table-admin.php';
                }
            });
        });
    </script>
    <?php elseif($alert_message === 'error'): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Gagal menambah data. Silakan coba lagi.',
            });
        });
    </script>
    <?php endif; ?>
    
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
