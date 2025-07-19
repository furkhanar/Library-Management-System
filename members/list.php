<?php
include '../header.php';
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo->prepare("INSERT INTO members (name, email, phone) VALUES (?, ?, ?)")
        ->execute([$_POST['name'], $_POST['email'], $_POST['phone']]);
    header('Location: list.php');
    exit;
}

$members = $pdo->query("SELECT * FROM members")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Members - Diya Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap (if not already loaded) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid px-4 mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <h2 class="mb-4">📚 Library Members</h2>

      <form method="post" class="bg-light p-4 rounded shadow-sm mb-4">
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input name="name" class="form-control" placeholder="Full Name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
        </div>
        <button class="btn btn-warning">Add Member</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
          <thead class="table-warning">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Joined</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($members as $m): ?>
            <tr>
              <td><?= htmlspecialchars($m['name']) ?></td>
              <td><?= htmlspecialchars($m['email']) ?></td>
              <td><?= htmlspecialchars($m['phone']) ?></td>
              <td><?= htmlspecialchars($m['registered_on']) ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<?php include '../footer.php'; ?>
</body>
</html>
