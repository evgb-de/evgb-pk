<h1>ToDo items</h1>

<ul>
    <?php foreach($entries as $entry): ?>

    <?php if(!$entry['hidden']): ?>
        <li><?= $entry['desription'] ?></li>
    <?php endif ?>

    <?php endforeach; ?>
</ul>
