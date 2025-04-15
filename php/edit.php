<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $informasi = mysqli_real_escape_string($koneksi, $_POST['informasi']);
    $detail = mysqli_real_escape_string($koneksi, $_POST['detail']);

    if (isset($_FILES['photo']) && $_FILES['photo']['size'] > 0) {
        $photo = $_FILES['photo']['name'];
        $photo_tmp = $_FILES['photo']['tmp_name'];
        $photo_destination = "../img/" . $photo;
        move_uploaded_file($photo_tmp, $photo_destination);
        
        $sql = "UPDATE informasi SET informasi = '$informasi', detail = '$detail', foto = '$photo' WHERE id = '$id'";
    } else {
        $sql = "UPDATE informasi SET informasi = '$informasi', detail = '$detail' WHERE id = '$id'";
    }
    
    if (mysqli_query($koneksi, $sql)) {
        header("Location: table-admin.php");
        exit();
    } else {
        $alert_message = 'error';
    }
} else {
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($koneksi, $_GET['id']);
        $query = "SELECT * FROM informasi WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);
        } else {
            $alert_message = 'error';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
                <h4>Admin SMK Pesat</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard-admin.php" class="sidebar-link <?php echo $active_page == 'dashboard' ? 'active' : ''; ?>">
                        <i class="bi bi-speedometer2"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="table-admin.php" class="sidebar-link <?php echo $active_page == 'table' ? 'active' : ''; ?>">
                        <i class="bi bi-table"></i> Tabel Informasi
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
                <div class="container-fluid">
                    <button class="btn" id="sidebar-toggle"></button>
                    <div class="ms-auto">
                        <span class="me-2">Selamat datang, <?php echo htmlspecialchars($username); ?></span>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                <h5 class="card-title mb-0">Edit Data Informasi</h5>
                            </div>
                            <div class="container mt-3">
                                <form class="mb-4" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="informasi" class="form-label fw-semibold">Informasi</label>
                                        <input type="text" class="form-control" id="informasi" name="informasi" required value="<?php echo isset($data['informasi']) ? htmlspecialchars($data['informasi']) : ''; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail" class="form-label fw-semibold">Detail</label>
                                        <input type="text" class="form-control" id="detail" name="detail" required value="<?php echo isset($data['detail']) ? htmlspecialchars($data['detail']) : ''; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label fw-semibold">Upload New Image (optional)</label>
                                        <input type="file" class="form-control" id="image" name="photo" accept="image/*">
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo isset($data['id']) ? htmlspecialchars($data['id']) : ''; ?>">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="table-admin.php" class="btn btn-secondary">Batal</a>
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
                text: 'Data berhasil diperbarui',
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
                text: 'Gagal memperbarui data. Silakan coba lagi.',
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
