<!-- app/Views/blogs/create.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
</head>
<body>
    <h1>Create New Blog Post</h1>
    <form action="<?= site_url('blogs/store') ?>" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br><br>
        <button type="submit">Create</button>
    </form>
    <a href="<?= site_url('blogs'); ?>">Back to Blog Posts</a>
</body>
</html>
