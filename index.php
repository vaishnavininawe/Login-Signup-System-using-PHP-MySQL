<?php include_once __DIR__ . '/../includes/header.php'; ?>
<div class="auth-card card">
  <div class="card-header text-center">
    <h4 class="mb-0">Welcome back</h4>
    <small>Login to your account</small>
  </div>
  <div class="card-body p-4">
    <form method="post" action="../actions/login_action.php" novalidate>
      <div class="mb-3">
        <label for="identity" class="form-label">Email or Username</label>
        <input type="text" class="form-control" id="identity" name="identity" placeholder="e.g. johndoe or john@mail.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <div class="text-center mt-3">
      <small>Don't have an account? <a href="signup.php">Create one</a></small>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
