<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Diya Library</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .navbar-brand {
      font-weight: bold;
      font-size: 1.5rem;
    }
    .navbar {
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    header .tagline {
      font-size: 1rem;
      font-style: italic;
      color: #f8f9fa;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">📚 Diya Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="/LibraryManagementSystem/library/index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="/LibraryManagementSystem/library/books/list.php" class="nav-link">Books</a></li>
        <li class="nav-item"><a href="/LibraryManagementSystem/library/members/list.php" class="nav-link">Members</a></li>
        <li class="nav-item"><a href="/LibraryManagementSystem/library/issue/list.php" class="nav-link">Issue Book</a></li>
      </ul>
    </div>
  </div>
</nav>

<header class="bg-primary text-white text-center py-3">
  <div class="container">
    <h1 class="mb-0">Diya Library</h1>
    <p class="tagline">Explore Knowledge, Empower Minds</p>
  </div>
</header>
