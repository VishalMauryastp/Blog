<!-- app/Views/blogs/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="<?= site_url('blogs/create'); ?>">Create New Blog Post</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($blogs as $blog): ?>
        <tr>
            <td><?= esc($blog['title']); ?></td>
            <td>
                <a href="<?= site_url('blogs/edit/' . $blog['id']); ?>">Edit</a>
                <form action="<?= site_url('blogs/delete/' . $blog['id']); ?>" method="post" style="display:inline;">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
