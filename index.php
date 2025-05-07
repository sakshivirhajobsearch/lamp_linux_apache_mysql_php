<?php
require 'config/db.php';

$stmt = $pdo->query('SELECT * FROM books');
$books = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container py-5">
    <h1>Book List</h1>
    <a href="create.php" class="btn btn-success mb-3">Add Book</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Title</th><th>Author</th><th>Year</th><th>Actions</th></tr></thead>
        <tbody>
            <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= htmlspecialchars($book['title']) ?></td>
                <td><?= htmlspecialchars($book['author']) ?></td>
                <td><?= $book['year'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="delete.php?id=<?= $book['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
