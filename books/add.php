
<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO books (title, category_id, author_id, isbn, copies) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['title'], $_POST['category_id'], $_POST['author_id'], $_POST['isbn'], $_POST['copies']]);
    header('Location: list.php');
}
$cats = $pdo->query("SELECT * FROM categories")->fetchAll();
$auths = $pdo->query("SELECT * FROM authors")->fetchAll();
?>
<!DOCTYPE html><html><head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="container mt-5">
<h2>Add Book</h2>
<form method="post">
<input name="title" class="form-control mb-2" placeholder="Title" required>
<select name="category_id" class="form-control mb-2">
<?php foreach($cats as $c) echo "<option value='{$c['id']}'>{$c['name']}</option>"; ?>
</select>
<select name="author_id" class="form-control mb-2">
<?php foreach($auths as $a) echo "<option value='{$a['id']}'>{$a['name']}</option>"; ?>
</select>
<input name="isbn" class="form-control mb-2" placeholder="ISBN">
<input name="copies" type="number" class="form-control mb-2" placeholder="Copies">
<button class="btn btn-primary">Add</button>
</form></body></html>
