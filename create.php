<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $pdo->prepare('INSERT INTO books (title, author, year) VALUES (?, ?, ?)');
    $stmt->execute([$_POST['title'], $_POST['author'], $_POST['year']]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body class="container py-5">
    <h1>Add New Book</h1>
    <form method="POST">
        <input class="form-control mb-2" name="title" placeholder="Title" required>
        <input class="form-control mb-2" name="author" placeholder="Author" required>
        <input class="form-control mb-2" name="year" placeholder="Year" type="number" required>
        <button class="btn btn-success">Add Book</button>
    </form>
</body>
</html>
