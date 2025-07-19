<?php
include '../header.php';

session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';

$issues = $pdo->query("SELECT i.*, b.title, m.name, DATEDIFF(CURDATE(), due_date) as overdue 
FROM issues i 
LEFT JOIN books b ON i.book_id = b.id 
LEFT JOIN members m ON i.member_id = m.id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Issue Records</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid px-4 mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <h2 class="mb-4">📚 Issue Records</h2>
      <a href="new.php" class="btn btn-info mb-3">Issue New Book</a>

      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
          <thead class="table-info">
            <tr>
              <th>Book</th>
              <th>Member</th>
              <th>Issue Date</th>
              <th>Due Date</th>
              <th>Return Date</th>
              <th>Fine</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($issues as $i): ?>
            <tr>
              <td><?= htmlspecialchars($i['title']) ?></td>
              <td><?= htmlspecialchars($i['name']) ?></td>
              <td><?= $i['issue_date'] ?></td>
              <td><?= $i['due_date'] ?></td>
              <td><?= $i['return_date'] ?? '<span class="text-danger">Not Returned</span>' ?></td>
              <td>
                <?= ($i['overdue'] > 0 && !$i['return_date']) 
                  ? '<span class="text-danger fw-bold">₹' . ($i['overdue'] * 10) . '</span>' 
                  : '-' ?>
              </td>
              <td>
                <?php if (!$i['return_date']): ?>
                  <a href="return.php?id=<?= $i['id'] ?>" class="btn btn-success btn-sm">Return</a>
                <?php else: ?>
                  <span class="text-success">Returned</span>
                <?php endif; ?>
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
