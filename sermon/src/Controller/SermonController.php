<?php

namespace Pagekit\Sermon\Controller;

use Pagekit\Application as App;

class SermonController
{
  /**
  * @Access(admin=true)
  */
  public function indexAction()
  {
      $module = App::module('sermon');
      $config = $module->config;
      return [
          '$view' => [
              'title' => 'Sermons',
              'name' => 'sermon:views/admin/index.php'
          ],
          '$data' => $config,
          'title' => 'Manage Sermons',
          // 'entries' => $config['entries']
      ];
  }
}
 ?>
