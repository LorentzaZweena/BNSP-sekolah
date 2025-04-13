<?php
include "config.php";
session_start();
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['logged_in'] = true;

        header("Location: dashboard-admin.php");
        exit();
    } else {
        $error = "<p class='text-danger'>Invalid username or password</p>";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SMK PESAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <div class="card mt-5">
                    <h5 class="card-header fs-2 p-4 text-center bg-dark text-light">Login</h5>
                    <div class="card-body">
                    <?php if(isset($error)): ?>
                        <div class="alert-danger" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php endif; ?>
                    <form method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold">Username</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Masukkan password" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-dark w-100" id="submit" name="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>