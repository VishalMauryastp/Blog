<!-- app/Views/blogs/edit.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog Post</title>
</head>
<body>
    <h1>Edit Blog Post</h1>
    <form action="<?= site_url('blogs/update/' . $blog['id']); ?>" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= esc($blog['title']); ?>" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required><?= esc($blog['content']); ?></textarea><br><br>
        <button type="submit">Update</button>
    </form>
    <a href="<?= site_url('blogs'); ?>">Back to Blog Posts</a>
</body>
</html>
