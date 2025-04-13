<?php
session_start();
include "config.php";

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? 'Admin';
$active_page = 'table';

$sql = "SELECT * FROM informasi";
$query = mysqli_query($koneksi, $sql);
$has_data = mysqli_num_rows($query) > 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/table-admin.css">
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
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="table.php" class="sidebar-link <?php echo $active_page == 'table' ? 'active' : ''; ?>">
                        <i class="bi bi-table"></i> Table
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
                        <span class="me-2">Welcome, <?php echo htmlspecialchars($username); ?></span>
                    </div>
                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                <h5 class="card-title mb-0">Data Table</h5>
                                <a href="add_data.php" class="btn btn-warning btn-sm">
                                    <i class="bi bi-plus"></i> Add New
                                </a>
                            </div>
                            <div class="card-body">
                                <?php if($has_data): ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Informasi</th>
                                                <th>Detail</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $no = 1;
                                            while($data = mysqli_fetch_array($query)): 
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($data['informasi']); ?></td>
                                                <td><?php echo htmlspecialchars($data['detail']); ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info text-center">
                                    <i class="bi bi-info-circle me-2"></i> Belum ada data
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
