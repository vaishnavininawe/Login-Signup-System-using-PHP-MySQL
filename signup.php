<?php include_once __DIR__ . '/../includes/header.php'; ?>
<div class="auth-card card">
  <div class="card-header text-center">
    <h4 class="mb-0">Create account</h4>
    <small>Sign up to get started</small>
  </div>
  <div class="card-body p-4">
    <form method="post" action="../actions/signup_action.php" novalidate>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Minimum 6 characters" required>
      </div>
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Sign Up</button>
    </form>
    <div class="text-center mt-3">
      <small>Already have an account? <a href="index.php">Login</a></small>
    </div>
  </div>
</div>
<?php include_once __DIR__ . '/../includes/footer.php'; ?>
