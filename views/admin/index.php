<h1><?php echo $message; ?></h1>

<ul>
  <?php foreach ($entries as $entry): ?>
    <li><?= $entry['name'] ?>: <?= $entry['property'] ?></li>
  <?php endforeach; ?>
</ul>
