<?php
include 'header.php';
session_start();
if (!isset($_SESSION['admin'])) header('Location: login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Library Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: #f5f7fa;
    }
    .dashboard-card {
      padding: 30px;
      border-radius: 12px;
      background: white;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .dashboard-card h1 {
      font-weight: bold;
      margin-bottom: 30px;
    }
    .btn-group a {
      min-width: 180px;
      margin: 10px;
    }
  </style>
</head>
<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="dashboard-card text-center">
      <h1 class="text-primary">Welcome, <?= htmlspecialchars($_SESSION['admin']) ?> 👋</h1>
      <div class="btn-group d-flex flex-wrap justify-content-center">
        <a href="books/list.php" class="btn btn-outline-primary"><i class="fas fa-book"></i> Manage Books</a>
        <a href="categories/list.php" class="btn btn-outline-secondary"><i class="fas fa-list"></i> Categories</a>
        <a href="authors/list.php" class="btn btn-outline-success"><i class="fas fa-user-edit"></i> Authors</a>
        <a href="members/list.php" class="btn btn-outline-warning"><i class="fas fa-users"></i> Members</a>
        <a href="issue/list.php" class="btn btn-outline-info"><i class="fas fa-exchange-alt"></i> Issue/Return</a>
        <a href="logout.php" class="btn btn-outline-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>
</html>
