<?php $view->script('sermon', 'sermon:js/user.js', 'vue') ?>
<div id="sermon">
  <h1>{{ 'Sermons' | trans }}:</h1>
  <div class="uk-overflow-container uk-width-1-1">
    <table class="uk-table-striped uk-table-hover uk-width-1-1">
      <thead>
        <tr>
          <th class="uk-width-1-4 uk-text-left">{{ 'Preacher' | trans }}</th>
          <th class="uk-width-1-4 uk-text-left">{{ 'Bible passage' | trans }}</th>
          <th class="uk-width-1-4 uk-text-left">{{ 'Description' | trans }}</th>
          <th class="uk-width-1-4 uk-text-left">{{ 'Date' | trans }}</th>
        </tr>
      </thead>
      <tbody>
<?php foreach($entries as $entry): ?>
<?php if(!$entry['hidden']): ?>
        <tr>
          <td><?= $entry['preacher'] ?></td>
          <td><?= $entry['biblepassage'] ?></td>
          <td><?= $entry['description'] ?></td>
          <td><?= $entry['date'] ?></td>
        </tr>
<?php endif ?>
<?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
