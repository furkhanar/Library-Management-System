<?php
include 'header.php'; 
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['admin'] = $user['username'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<div class="container mt-5">
  <div class="row justify-content-center align-items-center">
    <div class="col-md-6 col-lg-4">
      <div class="card shadow p-4">
        <h2 class="text-center mb-4">Login</h2>
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input name="username" class="form-control" placeholder="Enter username" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
          </div>
          <button class="btn btn-primary w-100">Login</button>
        </form>
        <?php if (isset($error)) : ?>
          <div class="alert alert-danger mt-3 text-center"><?= $error ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-md-6 d-none d-md-block">
      <img src="https://plus.unsplash.com/premium_photo-1723619021737-df1d775eccc8?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fGJvb2tzJTIwd2l0aCUyMHdoaXRlJTIwYmFja2dyb3VuZHxlbnwwfHwwfHx8MA%3D%3D"
        alt="Books" class="img-fluid rounded shadow">
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
