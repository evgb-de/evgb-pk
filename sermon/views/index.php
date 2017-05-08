<?php $view->script('sermon', 'sermon:js/user.js', 'vue') ?>
<div id="sermon">
  <h1>{{ 'Sermons' | trans }}:</h1>

  <ul>
      <?php foreach($entries as $entry): ?>

      <?php if(!$entry['hidden']): ?>
          <li><?= $entry['preacher'] ?> | <?= $entry['description'] ?></li>
      <?php endif ?>

      <?php endforeach; ?>
  </ul>
</div>
