<?php
    include "config.php";
    $delete_message = '';
    if (isset($_GET['delete']) && $_GET['delete'] == 'success') {
        $delete_message = 'success';
    }
        
    $alert_message = '';
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Admin';
    
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: table-admin.php");
        exit;
    }
    
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query_select = "SELECT * FROM informasi WHERE id = '$id'";
    $result_select = mysqli_query($koneksi, $query_select);
    
    if (mysqli_num_rows($result_select) == 0) {
        header("Location: table-admin.php");
        exit;
    }
    
    $data = mysqli_fetch_assoc($result_select);
    if (isset($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
        $query = "DELETE FROM informasi WHERE id = '$id'";
            
        try {
            $result = mysqli_query($koneksi, $query);
            
            if ($result) {
                header("Location: table-admin.php?delete=success");
                exit;
            } else {
                $alert_message = "error";
                error_log("MySQL Error: " . mysqli_error($koneksi));
            }
        } catch (Exception $e) {
            $alert_message = "error";
            error_log("Exception: " . $e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data</title>
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
                    <a href="dashboard-admin.php" class="sidebar-link">
                        <i class="bi bi-speedometer2"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a href="table-admin.php" class="sidebar-link active">
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
                <div class="container-fluid">
                    <button class="btn" id="sidebar-toggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="ms-auto">
                        <span class="me-2">Selamat datang, <?php echo htmlspecialchars($username); ?></span>
                    </div>
                </div>
            </nav>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center bg-danger text-white">
                                <h5 class="card-title mb-0">Hapus Data</h5>
                                <a href="table-admin.php" class="btn btn-light btn-sm">
                                    <i class="bi bi-arrow-left"></i> Kembali
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-warning">
                                    <h5><i class="bi bi-exclamation-triangle-fill"></i> Konfirmasi Penghapusan</h5>
                                    <p>Anda yakin ingin menghapus data berikut?</p>
                                </div>
                                
                                <div class="table-responsive mb-4">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="200">ID</th>
                                            <td><?php echo htmlspecialchars($data['id']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Informasi</th>
                                            <td><?php echo htmlspecialchars($data['informasi']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td><?php echo htmlspecialchars($data['detail']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                
                                <form method="POST">
                                    <input type="hidden" name="confirm_delete" value="yes">
                                    <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                        <a href="table-admin.php" class="btn btn-secondary">
                                            <i class="bi bi-x-circle"></i> Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php if($delete_message === 'success'): ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil dihapus',
            timer: 2000,
            showConfirmButton: false
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
