
<?php
session_start();
if (!isset($_SESSION['admin'])) header('Location: ../login.php');
include '../db.php';
$pdo->prepare("DELETE FROM authors WHERE id = ?")->execute([$_GET['id']]);
header('Location: list.php');
?>
