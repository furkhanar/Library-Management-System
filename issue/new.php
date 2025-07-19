
<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';
$books = $pdo->query("SELECT * FROM books")->fetchAll();
$members = $pdo->query("SELECT * FROM members")->fetchAll();
if ($_SERVER['REQUEST_METHOD']=='POST'){
$pdo->prepare("INSERT INTO issues (book_id, member_id, issue_date, due_date) VALUES (?, ?, NOW(), ?)")
    ->execute([$_POST['book_id'], $_POST['member_id'], $_POST['due_date']]);
header('Location: list.php');
}
?>
<!DOCTYPE html><html><head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="container mt-5">
<h2>Issue Book</h2>
<form method="post">
<select name="book_id" class="form-control mb-2"><?php foreach($books as $b) echo "<option value='{$b['id']}'>{$b['title']}</option>"; ?></select>
<select name="member_id" class="form-control mb-2"><?php foreach($members as $m) echo "<option value='{$m['id']}'>{$m['name']}</option>"; ?></select>
<input type="date" name="due_date" class="form-control mb-2">
<button class="btn btn-info">Issue</button>
</form></body></html>
