<?php
session_start();
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? 'Admin';
$active_page = 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | SMK PESAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/dashboard-admin.css">
</head>
<body>
    <div class="d-flex">
        <div class="sidebar">
            <div class="p-3 border-bottom">
                <h4>Admin SMK pesat</h4>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard.php" class="sidebar-link <?php echo $active_page == 'dashboard' ? 'active' : ''; ?>">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item text-white">
                    <a href="table-admin.php" class="sidebar-link <?php echo $active_page == 'table' ? 'active' : ''; ?>">
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
                            <div class="card-header bg-primary text-white">
                                <h5 class="card-title">Dashboard</h5>
                            </div>
                            <div class="card-body">
                                <h2>Selamat datang di dashboard admin SMK pesat!</h2>
                                <p>I love you</p>
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
        // Toggle sidebar on mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });
    </script>
</body>
</html>
