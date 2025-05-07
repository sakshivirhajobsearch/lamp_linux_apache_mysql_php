<?php
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Get updated book details from the form
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    // Prepare and execute the update query
    $stmt = $pdo->prepare('UPDATE books SET title = ?, author = ?, year = ? WHERE id = ?');
    $stmt->execute([$title, $author, $year, $id]);

    // Redirect back to the book list
    header("Location: index.php");
    exit;
}

if (isset($_GET['id'])) {
    // Fetch the book to be updated
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM books WHERE id = ?');
    $stmt->execute([$id]);
    $book = $stmt->fetch();

    if (!$book) {
        // If book is not found, redirect to the index page
        header("Location: index.php");
        exit;
    }
} else {
    // If no book ID is provided, redirect to the index page
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Update Book</title></head>
<body class="container py-5">
    <h1>Update Book</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $book['id'] ?>">
        <input class="form-control mb-2" name="title" value="<?= htmlspecialchars($book['title']) ?>" placeholder="Title" required>
        <input class="form-control mb-2" name="author" value="<?= htmlspecialchars($book['author']) ?>" placeholder="Author" required>
        <input class="form-control mb-2" name="year" value="<?= $book['year'] ?>" placeholder="Year" type="number" required>
        <button class="btn btn-primary">Update Book</button>
    </form>
</body>
</html>

