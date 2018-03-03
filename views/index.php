<?php $view->script('pkddl', 'pkddl:js/user.js', 'vue') ?>
<div id="pkddl">
  <h1>{{ 'DDLs' | trans }}:</h1>
  <div class="uk-overflow-container uk-width-1-1">
    <table class="uk-table-striped uk-table-hover uk-width-1-1">
      <thead>
        <tr>
          <th v-for class="uk-width-1-6 uk-text-left">{{ 'Title' | trans }}</th>
          <th class="uk-width-1-6 uk-text-left">{{ 'Bible passage' | trans }}</th>
          <th class="uk-width-1-6 uk-text-left">{{ 'Description' | trans }}</th>
          <th class="uk-width-1-6 uk-text-left">{{ 'Date' | trans }}</th>
          <th class="uk-width-2-6 uk-text-left">{{ 'Files' | trans }}</th>
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
          <td>
            <?php foreach ($entry['links'] as $link): ?>
              <a class="uk-button uk-button-small" href="<?= $link['link'] ?>"><?= $link['description'] ?></a>
            <?php endforeach; ?>
          </td>
        </tr>
<?php endif ?>
<?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
