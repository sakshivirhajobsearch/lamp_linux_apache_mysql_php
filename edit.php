<?php
require 'config/db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM books WHERE id = ?');
$stmt->execute([$id]);
$book = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare('UPDATE books SET title = ?, author = ?, year = ? WHERE id = ?');
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['year'], $id]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body class="container py-5">
    <h1>Edit Book</h1>
    <form method="POST">
        <input class="form-control mb-2" name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
        <input class="form-control mb-2" name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
        <input class="form-control mb-2" name="year" type="number" value="<?= $book['year'] ?>" required>
        <button class="btn btn-primary">Update Book</button>
    </form>
</body>
</html>
