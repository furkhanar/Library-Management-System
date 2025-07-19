<?php
include '../header.php'; 
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pdo->prepare("INSERT INTO authors (name) VALUES (?)")->execute([$_POST['name']]);
    header('Location: list.php');
    exit;
}

$auths = $pdo->query("SELECT * FROM authors")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Authors - Diya Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid px-4 mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">

      <h2 class="mb-4">✍️ Authors</h2>

      <form method="post" class="d-flex mb-4">
        <input name="name" class="form-control me-2" placeholder="Enter author name" required>
        <button class="btn btn-success">Add</button>
      </form>

      <div class="table-responsive">
        <table class="table table-bordered table-hover text-center">
          <thead class="table-success">
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($auths as $a): ?>
            <tr>
              <td><?= htmlspecialchars($a['name']) ?></td>
              <td>
                <a href="delete.php?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
              </td>
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
