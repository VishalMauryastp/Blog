<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| My Blog</title>
    <link rel="stylesheet" href="css/style.css"> 
    <?= $this->include('include/head-links') ?>
</head>
<body>

<?= $this->include('include/header') ?>

<main class="max-w-[1920px] mx-auto">
    <?= $this->renderSection('content') ?>
</main>
<?= $this->include('include/footer') ?>
<script>

var toggleOpen = document.getElementById('toggleOpen');
var toggleClose = document.getElementById('toggleClose');
var collapseMenu = document.getElementById('collapseMenu');

function handleClick() {
  if (collapseMenu.style.display === 'block') {
    collapseMenu.style.display = 'none';
  } else {
    collapseMenu.style.display = 'block';
  }
}

toggleOpen.addEventListener('click', handleClick);
toggleClose.addEventListener('click', handleClick);

</script>
<?= $this->include('include/footer-script') ?>

</body>
</html>
