<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Simple flash message helper
function flash_show() {
    if (!empty($_SESSION['flash'])) {
        echo '<div class="container mt-3">';
        foreach ($_SESSION['flash'] as $type => $messages) {
            foreach ((array)$messages as $msg) {
                $typeClass = htmlspecialchars($type);
                echo '<div class="alert alert-' . $typeClass . ' alert-dismissible fade show" role="alert">'
                    . htmlspecialchars($msg) .
                    '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
                    . '</div>';
            }
        }
        echo '</div>';
        unset($_SESSION['flash']);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Auth System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body { background: #f6f9fc; }
    .auth-card {
        max-width: 420px;
        margin: 5vh auto;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 24px rgba(0,0,0,0.06);
        overflow: hidden;
    }
    .auth-card .card-header {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #fff;
    }
    .form-control:focus {
        box-shadow: none;
        border-color: #6a11cb;
    }
    a { text-decoration: none; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-white border-bottom">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">Auth<span class="text-primary">PHP</span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"
            aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="index.php">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php flash_show(); ?>
