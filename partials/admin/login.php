<?php
require_once __DIR__ . '/includes/auth.php';
csrf_check();
$msg = '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $email = trim($_POST['email'] ?? '');
  $pass  = trim($_POST['password'] ?? '');
  if (login($email, $pass)) { header('Location: /admin/'); exit; }
  $msg = 'Invalid login';
}
?><!doctype html><html><head><meta charset="utf-8"><title>Admin Login</title>
<link rel="stylesheet" href="/assets/css/theme.css"></head><body class="container">
<h2>Admin Login</h2>
<form method="post">
  <?php echo csrf_field(); ?>
  <div class="form-grid">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <button class="btn btn-blue" type="submit">Login</button>
  </div>
</form>
<p style="color:#ef4444;"><?php echo htmlspecialchars($msg); ?></p>
</body></html>
