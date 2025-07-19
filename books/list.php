<?php
include '../header.php';
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';

$books = $pdo->query("SELECT b.*, c.name as category, a.name as author 
                      FROM books b 
                      LEFT JOIN categories c ON b.category_id = c.id
                      LEFT JOIN authors a ON b.author_id = a.id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Books - Diya Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid mt-5 px-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📚 Book List</h2>
    <a href="add.php" class="btn btn-primary btn-sm">➕ Add Book</a>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle text-center">
      <thead class="table-primary">
        <tr>
          <th>Title</th>
          <th>Category</th>
          <th>Author</th>
          <th>ISBN</th>
          <th>Copies</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($books as $b): ?>
        <tr>
          <td><?= htmlspecialchars($b['title']) ?></td>
          <td><?= htmlspecialchars($b['category']) ?></td>
          <td><?= htmlspecialchars($b['author']) ?></td>
          <td><?= $b['isbn'] ?></td>
          <td><?= $b['copies'] ?></td>
          <td>
            <a href="delete.php?id=<?= $b['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this book?')">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php include '../footer.php'; ?>
</body>
</html>
