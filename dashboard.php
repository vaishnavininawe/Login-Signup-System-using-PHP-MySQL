<?php
session_start();
if (empty($_SESSION['user'])) {
    $_SESSION['flash']['warning'][] = "Please log in to access the dashboard.";
    header("Location: index.php");
    exit;
}
$user = $_SESSION['user'];
include_once __DIR__ . '/../includes/header.php';
?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
          <h3 class="mb-1">Hello, <?php echo htmlspecialchars($user['username']); ?> 👋</h3>
          <p class="text-muted mb-4">You are logged in with <strong><?php echo htmlspecialchars($user['email']); ?></strong></p>
          <a class="btn btn-outline-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
